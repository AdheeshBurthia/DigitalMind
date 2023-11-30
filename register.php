<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require $_SERVER['DOCUMENT_ROOT'] . '/Ecommerce Site PHP/ecommerce/includes/mail/Exception.php';
require $_SERVER['DOCUMENT_ROOT'] . '/Ecommerce Site PHP/ecommerce/includes/mail/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'] . '/Ecommerce Site PHP/ecommerce/includes/mail/SMTP.php';

include 'includes/session.php';

if (isset($_POST['signup'])) {
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];

	$_SESSION['firstname'] = $firstname;
	$_SESSION['lastname'] = $lastname;
	$_SESSION['email'] = $email;

	if (!isset($_SESSION['captcha'])) {
		// Storing google recaptcha response
		// in $recaptcha variable
		$recaptcha = $_POST['g-recaptcha-response'];

		// Put secret key here, which we get
		// from google console
		$secret_key = '6Lfz1gEhAAAAAKUjNYqlnYlqWB3Go2PuuSxZgk80';

		// Hitting request to the URL, Google will
		// respond with success or error scenario
		$url = 'https://www.google.com/recaptcha/api/siteverify?secret='
			. $secret_key . '&response=' . $recaptcha;

		// Making request to verify captcha
		$response = file_get_contents($url);

		// Response return by google is in
		// JSON format, so we have to parse
		// that json
		$response = json_decode($response);

		// Checking, if response is true or not
		if ($response->success == true) {
			$_SESSION['captcha'] = time() + (10 * 60);
		} else {
			$_SESSION['error'] = 'Please answer recaptcha correctly';
			header('location: signup.php');
			return;
		}
	}

	if ($password != $repassword) {
		$_SESSION['error'] = 'Passwords did not match';
		header('location: signup.php');
	} else {
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE email=:email");
		$stmt->execute(['email' => $email]);
		$row = $stmt->fetch();
		if ($row['numrows'] > 0) {
			$_SESSION['error'] = 'Email already taken';
			header('location: signup.php');
		} else {
			$now = date('Y-m-d');
			$password = password_hash($password, PASSWORD_DEFAULT);

			//generate code
			$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$code = substr(str_shuffle($set), 0, 12);

			$stmt = $conn->prepare("INSERT INTO users (email, password, firstname, lastname, activate_code, created_on) VALUES (:email, :password, :firstname, :lastname, :code, :now)");
			$stmt->execute(['email' => $email, 'password' => $password, 'firstname' => $firstname, 'lastname' => $lastname, 'code' => $code, 'now' => $now]);
			$userid = $conn->lastInsertId();
			$subject = 'Email Verification Code';
			$message = "
						<h2>Thank you for Registering.</h2>
						<p>Your Account:</p>
						<p>Email: " . $email . "</p>
						<p>Password: " . $_POST['password'] . "</p>
						<p>Please click the link below to activate your account.</p>
						<a href='http://localhost/DigitalMind/activate.php?code=" . $code . "&user=" . $userid . "'>Activate Account</a>
					";

			$mail = new PHPMailer(true);
			//Server settings
			$mail->isSMTP();
			$mail->SMTPDebug = 2; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
			$mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
			$mail->Port = 587; // TLS only
			$mail->SMTPSecure = 'tls'; // ssl is deprecated
			$mail->SMTPAuth = true;
			$mail->Username = 'musclematrixnoreply@gmail.com'; // email
			$mail->Password = 'uqpjwvqyetbxohda'; // password
			$mail->setFrom('system@cksoftwares.com', 'MuscleMatrix'); // From email and name
			$mail->addAddress($email, $firstname); // to email and name
			$mail->Subject = $subject;
			$mail->msgHTML($message); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
			$mail->AltBody = 'HTML messaging not supported'; // If html emails is not supported by the receiver, show this body
			// $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file
			$mail->SMTPOptions = array(
				'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
				)
			);

			unset($_SESSION['firstname']);
			unset($_SESSION['lastname']);
			unset($_SESSION['email']);

			if (!$mail->send()) {
				$_SESSION['error'] = 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
				header('location: signup.php');
			} else {
				$_SESSION['success'] = 'Account created. Check your email to activate.';
				header('location: signup.php');
			}

			$pdo->close();
		}
	}
} else {
	$_SESSION['error'] = 'Fill up signup form first';
	header('location: signup.php');
}

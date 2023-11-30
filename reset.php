<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require $_SERVER['DOCUMENT_ROOT'] . '/Ecommerce Site PHP/ecommerce/includes/mail/Exception.php';
require $_SERVER['DOCUMENT_ROOT'] . '/Ecommerce Site PHP/ecommerce/includes/mail/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'] . '/Ecommerce Site PHP/ecommerce/includes/mail/SMTP.php';

include 'includes/session.php';

if (isset($_POST['reset'])) {
	$email = $_POST['email'];

	$conn = $pdo->open();

	$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE email=:email");
	$stmt->execute(['email' => $email]);
	$row = $stmt->fetch();

	if ($row['numrows'] > 0) {
		//generate code
		$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$code = substr(str_shuffle($set), 0, 15);
		$stmt = $conn->prepare("UPDATE users SET reset_code=:code WHERE id=:id");
		$stmt->execute(['code' => $code, 'id' => $row['id']]);
		$subject = 'Password Reset Code';
		$message = "
					<h2>Password Reset</h2>
					<p>Your Account:</p>
					<p>Email: " . $email . "</p>
					<p>Please click the link below to reset your password.</p>
					<a href='http://localhost/DigitalMind/password_reset.php?code=" . $code . "&user=" . $row['id'] . "'>Reset Password</a>
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

		if (!$mail->send()) {
			$_SESSION['error'] = 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
			header('location: reset.php');
		} else {
			$_SESSION['success'] = 'Password reset link sent';
			header('location: reset.php');
		}
	} else {
		$_SESSION['error'] = 'Email not found';
	}

	$pdo->close();
} else {
	$_SESSION['error'] = 'Input email associated with account';
}

header('location: password_forgot.php');

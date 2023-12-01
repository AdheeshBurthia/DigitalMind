<?php
include 'includes/session.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['email']) || empty($_POST['message'])) {

        $_SESSION['error'] = 'Please complete all fields!';
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

        $_SESSION['error'] = 'Email is not valid!';
    } else {

        $firstname = htmlspecialchars($_POST['firstname']);
        $lastname = htmlspecialchars($_POST['lastname']);
        $email = htmlspecialchars($_POST['email']);
        $mobile = htmlspecialchars($_POST['mobile']);
        $message = htmlspecialchars($_POST['message']);
        $created_on = date('Y-m-d H:i:s');

        $conn = $pdo->open();
        $stmt = $conn->prepare("INSERT INTO support (firstname, lastname, email, mobile, message, created_on) VALUES (:firstname, :lastname, :email, :mobile, :message, :created_on)");
        $result = $stmt->execute(['firstname' => $firstname, 'lastname' => $lastname, 'email' => $email, 'mobile' => $mobile, 'message' => $message, 'created_on' => $created_on]);

        if ($result) {
            $_SESSION['success'] = 'Message sent successfully!';
        } else {
            $_SESSION['error'] = 'An error occurred, please try again!';
        }
    }

    header('Location: contactus.php');
    exit();
}

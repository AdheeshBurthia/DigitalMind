<?php
include 'includes/session.php';

if (isset($_POST['btn-quote'])) {
    $_SESSION['printingName'] = $_POST['printingName'];
    $_SESSION['quantity'] = $_POST['quantity'];
    if ($_POST['paper_format'] == 'Custom') {
        $_SESSION['paper_format'] = $_POST['custom_paper_format'];
    } else {
        $_SESSION['paper_format'] = $_POST['paper_format'];
    }
    $_SESSION['color'] = $_POST['color'];
    if ($_POST['coating'] == 'Custom') {
        $_SESSION['coating'] = $_POST['customCoating'];
    } else {
        $_SESSION['coating'] = $_POST['coating'];
    }
    if ($_POST['lamination'] == 'Custom') {
        $_SESSION['lamination'] = $_POST['customLamination'];
    } else {
        $_SESSION['lamination'] = $_POST['lamination'];
    }
    if ($_POST['paperType'] == 'Custom') {
        $_SESSION['paperType'] = $_POST['customPaper'];
    } else {
        $_SESSION['paperType'] = $_POST['paperType'];
    }
    $_SESSION['printingSide'] = $_POST['printingSide'];
    $_SESSION['additionalDetails'] = $_POST['additionalDetails'];

    header('location: quote.php');
}



if (isset($_POST['confirmQuote'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $printingName = $_SESSION['printingName'];
    $quantity = $_SESSION['quantity'];
    $paperFormat = $_SESSION['paper_format'];
    $color = $_SESSION['color'];
    $coating = $_SESSION['coating'];
    $lamination = $_SESSION['lamination'];
    $paperType = $_SESSION['paperType'];
    $printingSide = $_SESSION['printingSide'];
    $additionalDetails = $_SESSION['additionalDetails'];


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'Invalid Email Format';
    } else if (!preg_match("/^[a-zA-Z ]+$/", $firstName)) {
        $_SESSION['error'] = 'First Name Should Contain Letters Only';
    } else if (!preg_match("/^[a-zA-Z ]+$/", $lastName)) {
        $_SESSION['error'] = 'Last Name Should Contain Letters Only';
    } else if (!preg_match("/^[0-9]+$/", $phone)) {
        $_SESSION['error'] = 'Phone Number Should Contain Numbers Only';
    } else {
        $conn = $pdo->open();
        $stmt = $conn->prepare("INSERT INTO quotation (first_name, last_name, email, phone, printing_name, quantity, paper_format, color, coating, lamination, paper_type, printing_side, additional_details) VALUES (:first_name, :last_name, :email, :phone, :printing_name, :quantity, :paper_format, :color, :coating, :lamination, :paper_type, :printing_side, :additional_details)");
        $stmt->execute(['first_name' => $firstName, 'last_name' => $lastName, 'email' => $email, 'phone' => $phone, 'printing_name' => $printingName, 'quantity' => $quantity, 'paper_format' => $paperFormat, 'color' => $color, 'coating' => $coating, 'lamination' => $lamination, 'paper_type' => $paperType, 'printing_side' => $printingSide, 'additional_details' => $additionalDetails]);

        unset($_SESSION['printingName']);
        unset($_SESSION['quantity']);
        unset($_SESSION['paper_format']);
        unset($_SESSION['color']);
        unset($_SESSION['coating']);
        unset($_SESSION['lamination']);
        unset($_SESSION['paperType']);
        unset($_SESSION['printingSide']);
        unset($_SESSION['additionalDetails']);
        $_SESSION['success'] = 'Quotation sent Successfully';
        $pdo->close();
    }
    header('location: quote.php');
}

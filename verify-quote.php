<?php
include 'includes/session.php';
$conn = $pdo->open();

if (isset($_POST['verify-quote'])) {
    if (!empty($_POST['product_name']) && !empty($_POST['quantity']) && !empty($_POST['paper_format']) && !empty($_POST['color']) && !empty($_POST['coating']) && !empty($_POST['lamination']) && !empty($_POST['paper_type']) && !empty($_POST['details']) && !empty($_POST['additional_details'])) {
        $product_name = $_POST['product_name'];
        $quantity = $_POST['quantity'];
        $paper_format = $_POST['paper_format'];
        $color = $_POST['color'];
        $coating = $_POST['coating'];
        $lamination = $_POST['lamination'];
        $paper_type = $_POST['paper_type'];
        $details = $_POST['details'];
        $additional_details = $_POST['additional_details'];

        try {
            $stmt = $conn->prepare("INSERT INTO quotation (product_name, quantity, paper_format, color, coating, lamination, paper_type, details, additional_details) VALUES (:product_name, :quantity, :paper_format, :color, :coating, :lamination, :paper_type, :details, :additional_details)");
            $stmt->execute(['product_name' => $product_name, 'quantity' => $quantity, 'paper_format' => $paper_format, 'color' => $color, 'coating' => $coating, 'lamination' => $lamination, 'paper_type' => $paper_type, 'details' => $details, 'additional_details' => $additional_details]);
            $_SESSION['success'] = 'Quotation request sent successfully';
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
        }
    } else {
        $_SESSION['error'] = 'Please fill in all the fields';
    }
}

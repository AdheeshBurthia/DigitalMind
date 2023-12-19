<?php
include 'includes/session.php';

if (isset($_POST['edit'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];

	try {
		$stmt = $conn->prepare("UPDATE subcategory SET name=:name WHERE id=:id");
		$stmt->execute(['name' => $name, 'id' => $id]);
		$_SESSION['success'] = 'Category updated successfully';
	} catch (PDOException $e) {
		$_SESSION['error'] = $e->getMessage();
	}

	$pdo->close();
} else {
	$_SESSION['error'] = 'Fill up edit subcategory form first';
}

header('location: subcategory.php');

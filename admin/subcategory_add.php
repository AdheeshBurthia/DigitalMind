<?php
include 'includes/session.php';

if (isset($_POST['add'])) {
	$name = $_POST['name'];
	$category = $_POST['category'];

	$conn = $pdo->open();

	// Fix the table name in the SELECT query
	$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM subcategory WHERE name=:name");
	$stmt->execute(['name' => $name]);
	$row = $stmt->fetch();

	if ($row['numrows'] > 0) {
		$_SESSION['error'] = 'Subcategory already exists';
	} else {
		try {
			// Fix the table name in the INSERT INTO query
			$stmt = $conn->prepare("INSERT INTO subcategory (name, category_id) VALUES (:name, :category)");

			// Bind both parameters in a single execute call
			$stmt->execute(['name' => $name, 'category' => $category]); // Corrected parameter name

			$_SESSION['success'] = 'Subcategory added successfully';
		} catch (PDOException $e) {
			$_SESSION['error'] = $e->getMessage();
		}
	}

	$pdo->close();
} else {
	$_SESSION['error'] = 'Fill up subcategory form first';
}

header('location: subcategory.php');

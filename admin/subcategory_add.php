
<?php
include 'includes/session.php';

if (isset($_POST['add'])) {
	$name = $_POST['name'];

	$conn = $pdo->open();

	$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM admin subcategory_add.php WHERE name=:name");
	$stmt->execute(['name' => $name]);
	$row = $stmt->fetch();

	if ($row['numrows'] > 0) {
		$_SESSION['error'] = 'Subcategory already exist';
	} else {
		try {
			$stmt = $conn->prepare("INSERT INTO admin subcategory_add.php (name) VALUES (:name)");
			$stmt->execute(['name' => $name]);
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

?>
<?php
// include 'includes/header.php';
include './includes/session.php';
include "./components/ShowCase.php";
include "./components/BestSeller.php";
include "./components/Category.php";
$slug = $_GET['category'];
$conn = $pdo->open();
try {
    $stmt = $conn->prepare("SELECT * FROM category WHERE cat_slug = :slug");
    $stmt->execute(['slug' => $slug]);
    $cat = $stmt->fetch();
    $catid = $cat['id'];
} catch (PDOException $e) {
    echo "There is some problem in connection: " . $e->getMessage();
}
$pdo->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIGITALMIND | Category</title>
    <!--- favicon -->
    <link rel="shortcut icon" href="./dist/images/logo/favicon.ico" type="image/x-icon">
    <!--- custom css link -->
    <link rel="stylesheet" href="./dist/css/style-prefix.css">
    <!--- google font link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>

<body>
    <!--- NAVBAR -->
    <?php include 'includes/navbar.php'; ?>
    <div class="overlay" data-overlay></div>
    <div class="modal" data-modal>
        <div class="modal-close-overlay" data-modal-overlay></div>
        <button class="modal-close-btn" data-modal-close>
        </button>
    </div>
    <!--- NOTIFICATION TOAST --->
    <div class="notification-toast" data-toast>
        <button class="toast-close-btn" data-toast-close>
        </button>
    </div>
    <main>
        <!--- PRODUCT -->
        <div class="product-container">
            <div class="container">
                <!--- SIDEBAR -->
                <?php Category($pdo); ?>
                <div class="product-box">
                    <!-- - PRODUCT GRID -->
                    <div class="product-main">
                        <h2 class="title">New Products</h2>
                        <div class="product-grid">
                            <?php
                            $conn = $pdo->open();
                            try {
                                $inc = 3;
                                $stmt = $conn->prepare("SELECT * FROM products WHERE subcategory_id = :catid");
                                $stmt->execute(['catid' => $catid]);
                                foreach ($stmt as $row) {
                                    $image = (!empty($row['photo'])) ? 'images/' . $row['photo'] : 'images/noimage.jpg';
                                    ShowCase($row['name'], $row['slug'],  3, number_format($row['price'], 2), "15%", "75.00", $image, "./dist/images/products/jacket-4.jpg");
                                }
                            } catch (PDOException $e) {
                                echo "There is some problem in connection: " . $e->getMessage();
                            }
                            $pdo->close();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--- FOOTER-->
    <?php include 'includes/footer.php'; ?>
    <!--- custom js link -->
    <script src="./dist/js/script.js"></script>
    <!--- ionicon link -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
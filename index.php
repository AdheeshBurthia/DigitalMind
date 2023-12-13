<?php
include 'includes/session.php';
include 'includes/header.php';
include 'includes/scripts.php';
include "./components/ShowCase.php";
include "./components/BestSeller.php";
include "./components/Category.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIGITALMIND | Home</title>
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
    <main>
        <div class="banner">
            <div class="container">
                <div class="slider-container has-scrollbar">
                    <div class="slider-item">
                        <img src="https://i.pinimg.com/564x/60/54/87/605487f99a33a932afd9b6db36ef9892.jpg" alt="women's latest fashion sale" class="banner-img">
                        <div class="banner-content">
                            <p class="banner-subtitle">Trending item</p>
                            <h2 class="banner-title">Women's latest fashion sale</h2>
                            <p class="banner-text">
                                starting at &dollar; <b>20</b>.00
                            </p>
                            <a href="#" class="banner-btn">Shop now</a>
                        </div>
                    </div>
                    <div class="slider-item">
                        <img src="https://i.pinimg.com/564x/c3/67/06/c36706eac045e04cb2ef80a1e95b5842.jpg" alt="modern sunglasses" class="banner-img">
                        <div class="banner-content">
                            <p class="banner-subtitle">Trending accessories</p>
                            <h2 class="banner-title">Modern sunglasses</h2>
                            <p class="banner-text">
                                starting at &dollar; <b>15</b>.00
                            </p>
                            <a href="#" class="banner-btn">Shop now</a>
                        </div>
                    </div>
                    <div class="slider-item">
                        <img src="https://i.pinimg.com/736x/97/ba/49/97ba495fbec2300d597085b0ad6da8db.jpg" alt="modern sunglasses" class="banner-img">
                        <div class="banner-content">
                            <p class="banner-subtitle">Trending accessories</p>
                            <h2 class="banner-title">Modern sunglasses</h2>
                            <p class="banner-text">
                                starting at &dollar; <b>15</b>.00
                            </p>
                            <a href="#" class="banner-btn">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- <div class="category">
            <div class="container">
                <div class="category-item-container has-scrollbar">
                    <?php
                    $conn = $pdo->open();
                    try {
                        $stmt = $conn->prepare("SELECT category.*, COUNT(*) AS total_qty FROM products LEFT JOIN category ON category.id = products.category_id GROUP BY category_id ORDER BY total_qty DESC ");
                        $stmt->execute();
                        foreach ($stmt as $row) {
                    ?>
                            <div class="category-item">
                                <div class="category-img-box">
                                    <img src=<?php echo $row['icon'] ?> alt="dress & frock" width="30">
                                </div>
                                <div class="category-content-box">
                                    <div class="category-content-flex">
                                        <h3 class="category-item-title"><?php echo $row['name']; ?></h3>
                                        <p class="category-item-amount"><?php echo $row['total_qty']; ?></p>
                                    </div>
                                    <?php
                                    echo "<li><a href='category.php?category=" . $row['cat_slug'] . "' class='category-btn'>Show all</a></li>";  ?>
                                </div>
                            </div>
                    <?php
                        }
                    } catch (PDOException $e) {
                        echo "There is some problem in connection: " . $e->getMessage();
                    }
                    $pdo->close();
                    ?>
                </div>
            </div>
        </div> -->
        <!--- PRODUCT -->
        <div class="product-container">
            <div class="container" style="gap: 0;">
                <!--- SIDEBAR -->
                <div class="sidebar  has-scrollbar" style="margin-right:30px ;" data-mobile-menu>
                    <?php Category($pdo); ?>
                    <div class="product-showcase">
                        <h3 class="showcase-heading">best sellers</h3>
                        <div class="showcase-wrapper">
                            <div class="showcase-container">
                                <?php
                                $month = date('m');
                                $conn = $pdo->open();
                                try {
                                    $inc = 3;
                                    $stmt = $conn->prepare("SELECT *, SUM(quantity) AS total_qty FROM details LEFT JOIN sales ON sales.id=details.sales_id LEFT JOIN products ON products.id=details.product_id WHERE MONTH(sales_date) = '$month' GROUP BY details.product_id ORDER BY total_qty DESC LIMIT 6");
                                    $stmt->execute();
                                    foreach ($stmt as $row) {
                                        $image = (!empty($row['photo'])) ? 'images/' . $row['photo'] : 'images/noimage.jpg';
                                        BestSellers($row['name'], $row['slug'], "75.00", number_format($row['price'], 2), $image, 2);
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
                <div class="product-box">
                    <!--- PRODUCT GRID -->
                    <div class="product-main">
                        <h2 class="title">New Products</h2>
                        <div class="product-grid">
                            <?php
                            $conn = $pdo->open();
                            try {
                                $inc = 3;
                                $stmt = $conn->prepare("SELECT *, SUM(quantity) AS total_qty FROM details LEFT JOIN sales ON sales.id=details.sales_id LEFT JOIN products ON products.id=details.product_id   GROUP BY details.product_id ORDER BY total_qty DESC LIMIT 6");
                                $stmt->execute();
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
    <!--- custom js link-->
    <script src="./dist/js/script.js"></script>
    <!--- ionicon link-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            var currentIndex = 0;
            var items = $('.slider-item');
            var totalItems = items.length;

            function cycleItems() {
                var item = $('.slider-item').eq(currentIndex);
                items.hide();
                item.css('display', 'flex'); // Assuming flex display for container
            }

            var autoSlide = setInterval(function() {
                currentIndex += 1;
                if (currentIndex > totalItems - 1) {
                    currentIndex = 0;
                }
                cycleItems();
            }, 5000); // Change slide every 5 seconds (adjust as needed)

            // Optionally, pause on hover
            $('.slider-container').hover(function() {
                clearInterval(autoSlide);
            }, function() {
                autoSlide = setInterval(function() {
                    currentIndex += 1;
                    if (currentIndex > totalItems - 1) {
                        currentIndex = 0;
                    }
                    cycleItems();
                }, 5000);
            });
        });
    </script>
</body>

</html>
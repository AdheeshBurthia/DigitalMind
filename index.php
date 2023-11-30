<?php
include 'includes/session.php';
// include 'includes/header.php';
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
	<title>DIGITAL MIND</title>
	<!--- favicon -->
	<link rel="shortcut icon" href="./dist/images/logo/favicon.ico" type="image/x-icon">
	<!--- custom css link -->
	<link rel="stylesheet" href="./dist/css/style-prefix.css">
	<!--- google font link -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>

<body>
	<div class="overlay" data-overlay></div>
	<!--- MODAL -->
	<div class="modal" data-modal>
		<div class="modal-close-overlay" data-modal-overlay></div>
		<div class="modal-content">
			<button class="modal-close-btn" data-modal-close>
				<ion-icon name="close-outline"></ion-icon>
			</button>
			<div class="newsletter-img">
				<img src="./dist/images/newsletter.png" alt="subscribe newsletter" width="400" height="400">
			</div>
			<div class="newsletter">
				<form action="#">
					<div class="newsletter-header">
						<h3 class="newsletter-title">Subscribe Newsletter.</h3>
						<p class="newsletter-desc">
							Subscribe the <b>Anon</b> to get latest products and discount update.
						</p>
					</div>
					<input type="email" name="email" class="email-field" placeholder="Email Address" required>
					<button type="submit" class="btn-newsletter">Subscribe</button>
				</form>
			</div>
		</div>
	</div>
	<!--- NOTIFICATION TOAST --->
	<div class="notification-toast" data-toast>
		<button class="toast-close-btn" data-toast-close>
			<ion-icon name="close-outline"></ion-icon>
		</button>
		<div class="toast-banner">
			<img src="./dist/images/products/jewellery-1.jpg" alt="Rose Gold Earrings" width="80" height="70">
		</div>
		<div class="toast-detail">
			<p class="toast-message">
				Someone in new just bought
			</p>
			<p class="toast-title">
				Rose Gold Earrings
			</p>
			<p class="toast-meta">
				<time datetime="PT2M">2 Minutes</time> ago
			</p>
		</div>
	</div>
	<main>
		<div class="category">
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
									<img src="./dist/images/icons/dress.svg" alt="dress & frock" width="30">
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
		</div>
		<!--- PRODUCT -->
		<div class="product-container">
			<div class="container">
				<!--- SIDEBAR -->
				<div class="sidebar  has-scrollbar" data-mobile-menu>
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
		<!--- BLOG -->
		<div class="blog">
			<div class="container">
				<div class="service">
					<h2 class="title">Our Newsletter</h2>
				</div>
				<div class="blog-container has-scrollbar">
					<div class="blog-card">
						<a href="#">
							<img src="./dist/images/blog-1.jpg" alt="Clothes Retail KPIs 2021 Guide for Clothes Executives" width="300" class="blog-banner">
						</a>
						<div class="blog-content">
							<a href="#" class="blog-category">Fashion</a>
							<a href="#">
								<h3 class="blog-title">Clothes Retail KPIs 2021 Guide for Clothes Executives.</h3>
							</a>
							<p class="blog-meta">
								By <cite>Mr Admin</cite> / <time datetime="2022-04-06">Apr 06, 2022</time>
							</p>
						</div>
					</div>
					<div class="blog-card">
						<a href="#">
							<img src="./dist/images/blog-2.jpg" alt="Curbside fashion Trends: How to Win the Pickup Battle." class="blog-banner" width="300">
						</a>
						<div class="blog-content">
							<a href="#" class="blog-category">Clothes</a>
							<h3>
								<a href="#" class="blog-title">Curbside fashion Trends: How to Win the Pickup Battle.</a>
							</h3>
							<p class="blog-meta">
								By <cite>Mr Robin</cite> / <time datetime="2022-01-18">Jan 18, 2022</time>
							</p>
						</div>
					</div>
					<div class="blog-card">
						<a href="#">
							<img src="./dist/images/blog-3.jpg" alt="EBT vendors: Claim Your Share of SNAP Online Revenue." class="blog-banner" width="300">
						</a>
						<div class="blog-content">
							<a href="#" class="blog-category">Shoes</a>
							<h3>
								<a href="#" class="blog-title">EBT vendors: Claim Your Share of SNAP Online Revenue.</a>
							</h3>
							<p class="blog-meta">
								By <cite>Mr Selsa</cite> / <time datetime="2022-02-10">Feb 10, 2022</time>
							</p>
						</div>
					</div>
					<div class="blog-card">
						<a href="#">
							<img src="./dist/images/blog-4.jpg" alt="Curbside fashion Trends: How to Win the Pickup Battle." class="blog-banner" width="300">
						</a>
						<div class="blog-content">
							<a href="#" class="blog-category">Electronics</a>
							<h3>
								<a href="#" class="blog-title">Curbside fashion Trends: How to Win the Pickup Battle.</a>
							</h3>
							<p class="blog-meta">
								By <cite>Mr Pawar</cite> / <time datetime="2022-03-15">Mar 15, 2022</time>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<!--- FOOTER-->
	<!--- custom js link-->
	<script src="./dist/js/script.js"></script>
	<!--- ionicon link-->
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
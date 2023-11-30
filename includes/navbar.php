<!--
    - HEADER
  -->

<header>

    <div class="header-top">

        <div class="container-2">

            <ul class="header-social-container">

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-twitter"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-instagram"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-linkedin"></ion-icon>
                    </a>
                </li>

            </ul>

            <div class="header-alert-news">
                <p>
                    Enjoy the quality of luxury items
                </p>
            </div>

            <div class="header-top-actions">

                <select name="language">

                    <option value="en-US">English</option>
                    <option value="es-ES">Espa&ntilde;ol</option>
                    <option value="fr">Fran&ccedil;ais</option>

                </select>

            </div>

        </div>

    </div>

    <div class="header-main">

        <div class="container-2">

            <a href="./" class="header-logo">
                DigitalMind
            </a>

            <form method="POST" class="header-search-container" action="search.php">

                <input type="search" name="keyword" class="search-field" placeholder="Enter your product name...">

                <button type="submit" class="search-btn">
                    <ion-icon name="search-outline"></ion-icon>
                </button>

            </form>

            <div class="header-user-actions">

                <button class="action-btn">
                    <ion-icon name="heart-outline"></ion-icon>
                    <span class="count">0</span>
                </button>

                <a href="cart_view.php">
                    <button class="action-btn">
                        <ion-icon name="bag-handle-outline"></ion-icon>
                        <span class="count"><span class="cart_count"></span></span>
                    </button>
                </a>

                <?php
                if (isset($_SESSION['user'])) {
                    echo '
                        <a href="profile.php">
                            <button class="action-btn">
                                <ion-icon name="person-outline"></ion-icon>
                            </button>
                        </a>

                        <a href="logout.php">
                            <button class="action-btn">
                                <ion-icon name="log-out-outline"></ion-icon>
                            </button>
                        </a>
                        ';
                } else {
                    echo '
                    <a href="login.php">
                        <button class="action-btn">
                            <ion-icon name="log-in-outline"></ion-icon>
                        </button>
                    </a>
                    ';
                }
                ?>
            </div>

        </div>

    </div>

    <nav class="desktop-navigation-menu">

        <div class="container-2">

            <ul class="desktop-menu-category-list">

                <li class="menu-category">
                    <a href="./" class="menu-title">Home</a>
                </li>

                <li class="menu-category">
                    <a href="./printing.php" class="menu-title">Printing Services</a>
                </li>

                <li class="menu-category">
                    <a href="aboutus.php" class="menu-title">About Us</a>
                </li>

                <li class="menu-category">
                    <a href="contactus.php" class="menu-title">Contact Us</a>
                </li>

            </ul>

        </div>

    </nav>

    <div class="mobile-bottom-navigation">

        <button class="action-btn" data-mobile-menu-open-btn>
            <ion-icon name="menu-outline"></ion-icon>
        </button>

        <a href="cart_view.php">
            <button class="action-btn">
                <ion-icon name="bag-handle-outline"></ion-icon>
                <span class="count"><span class="cart_count"></span></span>
            </button>
        </a>

        <a href="./">
            <button class="action-btn">
                <ion-icon name="home-outline"></ion-icon>
            </button>
        </a>

        <button class="action-btn">
            <ion-icon name="heart-outline"></ion-icon>

            <span class="count">0</span>
        </button>

        <button class="action-btn" data-mobile-menu-open-btn>
            <ion-icon name="grid-outline"></ion-icon>
        </button>

    </div>

    <nav class="mobile-navigation-menu  has-scrollbar" data-mobile-menu>

        <div class="menu-top">
            <h2 class="menu-title">Menu</h2>

            <button class="menu-close-btn" data-mobile-menu-close-btn>
                <ion-icon name="close-outline"></ion-icon>
            </button>
        </div>

        <ul class="mobile-menu-category-list">

            <li class="menu-category">
                <a href="./" class="menu-title">Home</a>
            </li>

            <li class="menu-category">
                <a href="printing.php" class="menu-title">Printing Services</a>
            </li>

            <li class="menu-category">
                <a href="aboutus.php" class="menu-title">About Us</a>
            </li>

            <li class="menu-category">
                <a href="contactus.php" class="menu-title">Contact Us</a>
            </li>

            <?php
            if (isset($_SESSION['user'])) {
                echo '
                    <li class="menu-category">
                        <a href="profile.php" class="menu-title">Profile</a>
                    </li>

                    <li class="menu-category">
                        <a href="logout.php" class="menu-title">Log out</a>
                    </li>
                    ';
            } else {
                echo '
                    <li class="menu-category">
                        <a href="login.php" class="menu-title">Sign in</a>
                    </li>
                    ';
            }
            ?>

        </ul>

        <div class="menu-bottom">

            <ul class="menu-category-list">

                <li class="menu-category">

                    <button class="accordion-menu" data-accordion-btn>
                        <p class="menu-title">Language</p>

                        <ion-icon name="caret-back-outline" class="caret-back"></ion-icon>
                    </button>

                    <ul class="submenu-category-list" data-accordion>

                        <li class="submenu-category">
                            <a href="#" class="submenu-title">English</a>
                        </li>

                        <li class="submenu-category">
                            <a href="#" class="submenu-title">Espa&ntilde;ol</a>
                        </li>

                        <li class="submenu-category">
                            <a href="#" class="submenu-title">Fren&ccedil;h</a>
                        </li>

                    </ul>

                </li>

            </ul>

            <ul class="menu-social-container">

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-twitter"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-instagram"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-linkedin"></ion-icon>
                    </a>
                </li>

            </ul>

        </div>

    </nav>

</header>

<script src="../dist/js/navbar.js"></script>
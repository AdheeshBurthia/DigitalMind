<?php include 'includes/session.php'; ?>
<?php
if (isset($_SESSION['user'])) {
    header('location: cart_view.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DIGITALMIND | Sign In</title>
    <link rel="stylesheet" type="text/css" href="dist/css/login.css" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="verify.php" method="POST" class="sign-in-form">
                    <h2 class="title">Sign In</h2>
                    <?php
                    if (isset($_SESSION['error'])) {
                        echo "
                            <div class='callout callout-danger text-center'>
                                <p>" . $_SESSION['error'] . "</p> 
                            </div>
                            ";
                        unset($_SESSION['error']);
                    }
                    if (isset($_SESSION['success'])) {
                        echo "
                            <div class='callout callout-success text-center'>
                                <p>" . $_SESSION['success'] . "</p> 
                            </div>
                            ";
                        unset($_SESSION['success']);
                    }
                    ?>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Email" name="email" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password" required />
                    </div>
                    <input type="submit" value="Sign in" name="login" class="btn solid" />

                    <div class="forgot-password">
                        <a href="password_forgot.php">
                            I forgot my password
                        </a>
                    </div>

                    <div class="social-media">
                        <a href="./" class="social-icon">
                            <i class="fa fa-home" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New here?</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio minus natus est.</p>
                    <a href="signup.php" class="btn transparent" id="sign-up-btn">Sign Up</a>
                </div>
                <img src="./dist/images/log.svg" class="image" alt="">
            </div>
        </div>
    </div>
</body>

</html>
<?php include 'includes/session.php'; ?>
<?php
if (isset($_SESSION['user'])) {
  header('location: cart_view.php');
}

if (isset($_SESSION['captcha'])) {
  $now = time();
  if ($now >= $_SESSION['captcha']) {
    unset($_SESSION['captcha']);
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="dist/css/login.css" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <!-- Google Recaptcha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
    <div class="container signup-container">
        <div class="forms-container">
            <div class="signin-signup signup">
                <form action="register.php" method="POST" class="sign-in-form">
                    <h2 class="title">Sign Up</h2>
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
                        <input type="text" name="firstname" placeholder="Firstname"
                            value="<?php echo (isset($_SESSION['firstname'])) ? $_SESSION['firstname'] : '' ?>"
                            required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="lastname" placeholder="Lastname"
                            value="<?php echo (isset($_SESSION['lastname'])) ? $_SESSION['lastname'] : '' ?>" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="text" name="email" placeholder="Email"
                            value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : '' ?>" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="repassword" placeholder="Retype password" required>
                    </div>
                    <?php
          if (!isset($_SESSION['captcha'])) {
            echo '
                <div class="input-recaptcha" style="width:100%;">
                  <div class="g-recaptcha" data-sitekey="6Lfz1gEhAAAAAMB2VjCU4xwbI2XzYNzdwORN1UH7"></div>
                </div>
              ';
          }
          ?>
                    <input type="submit" value="Sign up" name="signup" class="btn solid" />

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
                    <h3>One of us?</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio minus natus est.</p>
                    <a href="login.php" class="btn transparent" id="sign-up-btn">Sign In</a>
                </div>
                <img src="./dist/images/register.svg" class="image" alt="">
            </div>
        </div>
    </div>
</body>

</html>
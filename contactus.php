<?php
include 'includes/session.php';
include 'includes/header.php';
include 'includes/scripts.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIGITALMIND | Contact Us</title>
    <link rel="stylesheet" href="./dist/css/contactus.css">
</head>

<body>
    <!--- NAVBAR -->
    <?php include 'includes/navbar.php'; ?>
    <section>
        <div class="container">
            <div class="contactInfo">
                <div>
                    <h2>Contact Info</h2>
                    <ul class="info">
                        <li>
                            <span><img src="./dist/images/location.png"></span>
                            <span>184 Ippokratous Street<br>
                                Athens, Gr<br>
                                11472</span>
                            </span>
                        </li>
                        <li>
                            <span><img src="./dist/images/mail.png"></span>
                            <!-- <span>nassosanagn@gmail.com</span> -->
                            <span><a href="mailto: nassosanagn@gmail.com">nassosanagn@gmail.com</a></span>
                        </li>
                        <li>
                            <span><img src="./dist/images/call.png"></span>
                            <span>702-279-3488</span>
                        </li>

                    </ul>
                </div>
                <ul class="sci">
                    <li><a href="https://www.facebook.com/nassosanagn/"><img src="./dist/images/1.png"></a></li>
                    <li><a href="https://www.instagram.com/nassosanagn_/?hl=el"><img src="./dist/images/3.png"></a></li>
                    <li><a href="https://twitter.com/nassosanagn"><img src="./dist/images/2.png"></a></li>
                    <li><a href="https://www.linkedin.com/in/nassos-anagnostopoulos-2b9631196/"><img src="./dist/images/5.png"></a></li>

                </ul>
            </div>
            <form method="POST" action="contact_mail.php" class="contactForm">
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
                <h2 class="title">Send a Message</h2>
                <div class="formBox">
                    <div class="inputBox w50">
                        <input type="text" placeholder="First Name" name="firstname">
                    </div>
                    <div class="inputBox w50">
                        <input type="text" placeholder="Last Name" name="lastname">
                    </div>
                    <div class="inputBox w50">
                        <input type="email" placeholder="Email Address" name="email">
                    </div>
                    <div class="inputBox w50">
                        <input type="text" placeholder="Mobile Number" name="mobile">
                    </div>
                    <div class="inputBox w100">
                        <textarea name="message" placeholder="Write your message here. . ."></textarea>
                    </div>
                    <div class="inputBox w100">
                        <input type="submit" value="Send">
                    </div>
                </div>
            </form>
    </section>
    <!--- FOOTER-->
    <?php include 'includes/footer.php'; ?>
</body>

</html>
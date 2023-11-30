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
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@800&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@900&display=swap');
    </style>
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
            <div class="contactForm">
                <h2>Send a Message</h2>
                <div class="formBox">
                    <div class="inputBox w50">
                        <span>First Name</span>
                        <input type="text" name="" required>
                    </div>
                    <div class="inputBox w50">
                        <span>Last Name</span>
                        <input type="text" required>
                    </div>
                    <div class="inputBox w50">
                        <span>Email Address</span>
                        <input type="email" required>
                    </div>
                    <div class="inputBox w50">
                        <span>Mobile Number</span>
                        <input type="text" required>
                    </div>
                    <div class="inputBox w100">
                        <span>Write your message here...</span>
                        <textarea required></textarea>
                    </div>
                    <div class="inputBox w100">
                        <input type="submit" value="Send">
                    </div>
                </div>
            </div>
    </section>
    <!--- FOOTER-->
    <?php include 'includes/footer.php'; ?>
</body>

</html>
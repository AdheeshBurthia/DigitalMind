<?php
session_start();
include 'includes/header.php';
include 'includes/scripts.php';

if (!isset($_SESSION['printingName'])) {
    header("Location: printing.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIGITALMIND | Printing Quotation</title>
    <link rel="stylesheet" href="./dist/css/quote.css">
</head>

<body>
    <!--- NAVBAR -->
    <?php include 'includes/navbar.php'; ?>

    <section class="quotation-details">
        <div class="quotation-container">
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
            <table>
                <tbody>
                    <tr>
                        <td class="product-details">
                            <h3>Printing Details</h3>
                            <p><strong>Printing Name:</strong> <span id="printingName">:
                                    <?php if (isset($_SESSION['printingName'])) echo $_SESSION['printingName']; ?></span>
                            </p>
                            <p><strong>Quantity:</strong> <span id="quantity">:
                                    <?php if (isset($_SESSION['quantity'])) echo $_SESSION['quantity']; ?></span></p>
                        </td>
                        <td class="additional-info">
                            <h3>Additional Information</h3>
                            <p><strong>Paper Format</strong> <span id="paperFormat">:
                                    <?php if (isset($_SESSION['paper_format'])) {
                                        echo $_SESSION['paper_format'];
                                    }  ?></span>
                            </p>
                            <p><strong>Color or Black</strong> <span id="color">:
                                    <?php if (isset($_SESSION['color'])) echo $_SESSION['color']; ?></span></p>
                            <p><strong>Coating</strong> <span id="coating">:
                                    <?php if (isset($_SESSION['coating'])) {
                                        if ($_SESSION['coating'] == 'Custom') {
                                            echo $_SESSION['customCoating'];
                                        } else {
                                            echo $_SESSION['coating'];
                                        }
                                    }  ?></span></p>
                            <p><strong>Lamination</strong> <span id="lamination">:
                                    <?php if (isset($_SESSION['lamination'])) {
                                        if ($_SESSION['lamination'] == 'Custom') {
                                            echo $_SESSION['customLamination'];
                                        } else {
                                            echo $_SESSION['lamination'];
                                        }
                                    }  ?></span></p>
                            <p><strong>Type of Paper</strong> <span id="paperType">:
                                    <?php if (isset($_SESSION['paperType'])) {
                                        if ($_SESSION['paperType'] == 'Custom') {
                                            echo $_SESSION['customPaper'];
                                        } else {
                                            echo $_SESSION['paperType'];
                                        }
                                    }  ?></span></p>
                            <p><strong>Printing Sides</strong> <span id="printingSide">:
                                    <?php if (isset($_SESSION['printingSide'])) {
                                        echo $_SESSION['printingSide'];
                                    }  ?></span></p>
                            <p><strong>Additional Details</strong> <span id="details">:
                                    <?php if (isset($_SESSION['additionalDetails'])) echo $_SESSION['additionalDetails']; ?></span>
                            </p>
                            <p id="additionalDetails"></p>
                        </td>
                    </tr>
                </tbody>
            </table>

            <form action="verify-quote.php" method="post" class="customer-details">
                <h3>Customer Details</h3>
                <div class="input-row">
                    <div class="input-group">
                        <label for="firstName">First Name:</label>
                        <input type="text" id="firstName" name="firstName" required>
                    </div>
                    <div class="input-group">
                        <label for="lastName">Last Name:</label>
                        <input type="text" id="lastName" name="lastName" required>
                    </div>
                    <div class="input-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="input-group">
                        <label for="phone">Phone Number:</label>
                        <input type="tel" id="phone" name="phone" required>
                    </div>
                </div>
                <div class="input-row">
                    <input type="submit" value="Confirm" name="confirmQuote" id="confirmQuote" class="confirmQuote">
                    <!-- <input type="submit" value="Edit Printing" id="editButton" class="editButton"> -->
                </div>

            </form>
        </div>
    </section>

    <!--- FOOTER-->
    <?php include 'includes/footer.php'; ?>
</body>

</html>
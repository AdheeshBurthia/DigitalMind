<?php
include 'includes/header.php';
include 'includes/scripts.php';
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
            <table>
                <tbody>
                    <tr>
                        <td class="product-details">
                            <h3>Printing Details</h3>
                            <p><strong>Printing Name:</strong> <span id="productName">:
                                    <?php if (isset($_POST['productName'])) echo $_POST['productName']; ?></span></p>
                            <p><strong>Quantity:</strong> <span id="quantity">:
                                    <?php if (isset($_POST['quantity'])) echo $_POST['quantity']; ?></span></p>
                        </td>
                        <td class="additional-info">
                            <h3>Additional Information</h3>
                            <p><strong>Paper Format</strong> <span id="paperFormat">:
                                    <?php if (isset($_POST['paper_format'])) {
                                        if ($_POST['paper_format'] == 'Custom') {
                                            echo $_POST['custom_paper_format'];
                                        } else {
                                            echo $_POST['paper_format'];
                                        }
                                    }  ?></span>
                            </p>
                            <p><strong>Color or Black</strong> <span id="color">:
                                    <?php if (isset($_POST['color'])) echo $_POST['color']; ?></span></p>
                            <p><strong>Coating</strong> <span id="coating">:
                                    <?php if (isset($_POST['coating'])) {
                                        if ($_POST['coating'] == 'Custom') {
                                            echo $_POST['customCoating'];
                                        } else {
                                            echo $_POST['coating'];
                                        }
                                    }  ?></span></p>
                            <p><strong>Lamination</strong> <span id="lamination">:
                                    <?php if (isset($_POST['lamination'])) {
                                        if ($_POST['lamination'] == 'Custom') {
                                            echo $_POST['customLamination'];
                                        } else {
                                            echo $_POST['lamination'];
                                        }
                                    }  ?></span></p>
                            <p><strong>Type of Paper</strong> <span id="paperType">:
                                    <?php if (isset($_POST['paperType'])) {
                                        if ($_POST['paperType'] == 'Custom') {
                                            echo $_POST['customPaper'];
                                        } else {
                                            echo $_POST['paperType'];
                                        }
                                    }  ?></span></p>
                            <p><strong>Printing Sides</strong> <span id="printingSide">:
                                    <?php if (isset($_POST['printingSide'])) {
                                        echo $_POST['printingSide'];
                                    }  ?></span></p>
                            <p><strong>Additional Details</strong> <span id="details">:
                                    <?php if (isset($_POST['additionalDetails'])) echo $_POST['additionalDetails']; ?></span>
                            </p>
                            <p id="additionalDetails"></p>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="customer-details">
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
            </div>

            <button id="confirmButton" type="button" class="confirmButton">Confirm</button>
        </div>
    </section>

    <!--- FOOTER-->
    <?php include 'includes/footer.php'; ?>
</body>

</html>
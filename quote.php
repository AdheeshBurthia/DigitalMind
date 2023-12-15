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
                            <h3>Product Details</h3>
                            <p><strong>Product Name:</strong> <span id="productName">: Business Card</span></p>
                            <p><strong>Quantity:</strong> <span id="quantity">: 4</span></p>
                        </td>
                        <td class="additional-info">
                            <h3>Additional Information</h3>
                            <p><strong>Paper Format</strong> <span id="paperFormat">: A4</span></p>
                            <p><strong>Color or Black</strong> <span id="color">: Black</span></p>
                            <p><strong>Coating</strong> <span id="coating">: Matt</span></p>
                            <p><strong>Lamination</strong> <span id="lamination">: Matt</span></p>
                            <p><strong>Type of Paper</strong> <span id="paperType">: Standard</span></p>
                            <p><strong>Additional Details</strong> <span id="details">: </span></p>
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
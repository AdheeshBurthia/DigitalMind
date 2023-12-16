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
    <link rel="stylesheet" href="./dist/css/printing.css">
</head>

<body>
    <!--- NAVBAR -->
    <?php include 'includes/navbar.php'; ?>

    <section class="printing">
        <form action="quote.php" method="post" enctype="multipart/form-data" class="printing-form">
            <label for="productName">Product Name: <span class="required-input">*</span></label>
            <input type="text" id="productName" name="productName" required>
            <br>

            <label for="paper_format">Paper Format: <span class="required-input">*</span></label>
            <select id="paper_format" name="paper_format">
                <option>Select</option>
                <option value="A4">A4</option>
                <option value="Letter">Letter</option>
                <option value="A3">A3</option>
                <option value="A5">A5</option>
                <option value="B4">B4</option>
                <option value="B5">B5</option>
                <option value="Custom">Custom</option>
            </select>
            <br><br>

            <div id="custom_paper_input" class="custom-paper-input">
                <label for="custom_paper_format">Custom Paper Format: <span class="required-input">*</span></label>
                <input type="text" id="custom_paper_format" name="custom_paper_format">
                <br>
            </div>

            <label for="quantity">Quantity: <span class="required-input">*</span></label>
            <input type="number" id="quantity" name="quantity" required>
            <br>

            <label for="color">Color or Black: <span class="required-input">*</span></label>
            <select id="color" name="color">
                <option>Select</option>
                <option value="Color">Color</option>
                <option value="Black">Black</option>
            </select>
            <br><br>

            <label for="coating">Coating:</label>
            <select id="coating" name="coating" required>
                <option value="None">None</option>
                <option value="Glossy">Glossy</option>
                <option value="Matte">Matte</option>
                <option value="Custom">Custom</option>
            </select>
            <br><br>

            <div id="customCoatingInput" class="custom-paper-input">
                <label for="customCoating">Custom Coating:</label>
                <input type="text" id="customCoating" name="customCoating">
                <br><br>
            </div>

            <label for="lamination">Lamination:</label>
            <select id="lamination" name="lamination" required>
                <option value="None">None</option>
                <option value="Glossy">Glossy</option>
                <option value="Matte">Matte</option>
                <option value="Custom">Custom</option>
            </select>
            <br><br>

            <div id="customLaminationInput" class="custom-paper-input">
                <label for="customLamination">Custom Lamination:</label>
                <input type="text" id="customLamination" name="customLamination">
                <br><br>
            </div>

            <label for="paperType">Type of Paper: <span class="required-input">*</span></label>
            <select id="paperType" name="paperType" required>
                <option value="Standard">Standard</option>
                <option value="Coated">Coated</option>
                <option value="Uncoated">Uncoated</option>
                <option value="Recycled">Recycled</option>
                <option value="Cardstock">Cardstock</option>
                <option value="Vellum">Vellum</option>
                <option value="Linen">Linen</option>
                <option value="Custom">Custom</option>
            </select>
            <br><br>

            <div id="customPaperInput" class="custom-paper-input">
                <label for="customPaper">Custom Paper:</label>
                <input type="text" id="customPaper" name="customPaper">
                <br><br>
            </div>

            <label for="lamination">Printing Sides: <span class="required-input">*</span></label>
            <select id="lamination" name="lamination" required>
                <option value="none">None</option>
                <option value="glossy">Single Sided</option>
                <option value="matte">Double Sided</option>
            </select>
            <br><br>

            <label for="additionalDetails">Additional Details:</label>
            <textarea id="additionalDetails" name="additionalDetails" rows="4"></textarea>
            <br><br>

            <label for="file">Upload Artwork:</label>
            <input type="file" id="file" name="file">
            <br>

            <input type="submit" value="Ask for Quotation" name="btn-quote">
        </form>
    </section>

    <!--- FOOTER-->
    <?php include 'includes/footer.php'; ?>

    <script>
    // JavaScript code
    window.addEventListener("DOMContentLoaded", function() {
        var paperFormatSelect = document.getElementById("paper_format");
        var customPaperInput = document.getElementById("custom_paper_input");

        paperFormatSelect.addEventListener("change", function() {
            if (paperFormatSelect.value === "Custom") {
                customPaperInput.style.display = "block";
            } else {
                customPaperInput.style.display = "none";
            }
        });
    });

    window.addEventListener("DOMContentLoaded", function() {
        var coatingSelect = document.getElementById("coating");
        var customCoatingInput = document.getElementById("customCoatingInput");

        coatingSelect.addEventListener("change", function() {
            if (coatingSelect.value === "Custom") {
                customCoatingInput.style.display = "block";
            } else {
                customCoatingInput.style.display = "none";
            }
        });
    });

    window.addEventListener("DOMContentLoaded", function() {
        var laminationSelect = document.getElementById("lamination");
        var customLaminationInput = document.getElementById("customLaminationInput");

        laminationSelect.addEventListener("change", function() {
            if (laminationSelect.value === "Custom") {
                customLaminationInput.style.display = "block";
            } else {
                customLaminationInput.style.display = "none";
            }
        });
    });

    window.addEventListener("DOMContentLoaded", function() {
        var paperTypeSelect = document.getElementById("paperType");
        var customPaperInput = document.getElementById("customPaperInput");

        paperTypeSelect.addEventListener("change", function() {
            if (paperTypeSelect.value === "Custom") {
                customPaperInput.style.display = "block";
            } else {
                customPaperInput.style.display = "none";
            }
        });
    });
    </script>

</body>

</html>
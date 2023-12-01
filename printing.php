<!DOCTYPE html>
<html>

<head>
    <title>Paper Printing Quotation</title>
    <style>
        .printing {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }

        .printing-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        select,
        input[type="text"],
        input[type="number"],
        textarea,
        input[type="file"] {
            padding: 8px;
            width: 100%;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-size: 16px;
        }

        input[type="number"],
        textarea {
            resize: vertical;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .custom-paper-input {
            display: none;
        }
    </style>
</head>

<body>
    <section class="printing">
        <form action="quote.php" method="post" enctype="multipart/form-data" class="printing-form">
            <label for="productName">Product Name:</label>
            <input type="text" id="productName" name="productName" required>
            <br><br>

            <label for="paper_format">Paper Format:</label>
            <select id="paper_format" name="paper_format">
                <option value="a4">A4</option>
                <option value="letter">Letter</option>
                <option value="legal">Legal</option>
                <option value="a3">A3</option>
                <option value="a5">A5</option>
                <option value="b4">B4</option>
                <option value="b5">B5</option>
                <option value="custom">Custom</option>
            </select>
            <br><br>

            <div id="custom_paper_input" class="custom-paper-input">
                <label for="custom_paper_format">Custom Paper Format:</label>
                <input type="text" id="custom_paper_format" name="custom_paper_format">
                <br><br>
            </div>

            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" required>
            <br><br>

            <label for="color">Color or Black:</label>
            <select id="color" name="color">
                <option value="color">Color</option>
                <option value="black">Black</option>
            </select>
            <br><br>

            <label for="coating">Coating:</label>
            <select id="coating" name="coating" required>
                <option value="none">None</option>
                <option value="glossy">Glossy</option>
                <option value="matte">Matte</option>
                <option value="satin">Satin</option>
                <option value="soft-touch">Soft Touch</option>
                <option value="aqueous">Aqueous Coating</option>
                <option value="uv">UV Coating</option>
                <option value="custom">Custom</option>
            </select>
            <br><br>

            <div id="customCoatingInput" class="custom-paper-input">
                <label for="customCoating">Custom Coating:</label>
                <input type="text" id="customCoating" name="customCoating">
                <br><br>
            </div>

            <label for="lamination">Lamination:</label>
            <select id="lamination" name="lamination" required>
                <option value="none">None</option>
                <option value="glossy">Glossy Lamination</option>
                <option value="matte">Matte Lamination</option>
                <option value="satin">Satin Lamination</option>
                <option value="soft-touch">Soft Touch Lamination</option>
                <option value="anti-scratch">Anti-Scratch Lamination</option>
                <option value="custom">Custom</option>
            </select>
            <br><br>

            <div id="customLaminationInput" class="custom-paper-input">
                <label for="customLamination">Custom Lamination:</label>
                <input type="text" id="customLamination" name="customLamination">
                <br><br>
            </div>

            <label for="paperType">Type of Paper:</label>
            <select id="paperType" name="paperType" required>
                <option value="standard">Standard</option>
                <option value="coated">Coated</option>
                <option value="uncoated">Uncoated</option>
                <option value="recycled">Recycled</option>
                <option value="cardstock">Cardstock</option>
                <option value="vellum">Vellum</option>
                <option value="linen">Linen</option>
                <option value="custom">Custom</option>
            </select>
            <br><br>

            <div id="customPaperInput" class="custom-paper-input">
                <label for="customPaper">Custom Paper:</label>
                <input type="text" id="customPaper" name="customPaper">
                <br><br>
            </div>

            <label for="additionalDetails">Additional Details:</label>
            <textarea id="additionalDetails" name="additionalDetails" rows="4" required></textarea>
            <br><br>

            <label for="file">Upload File:</label>
            <input type="file" id="file" name="file">
            <br><br>

            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone">
            <br><br>

            <input type="submit" value="Send for Quote">
        </form>
    </section>

    <script>
        // JavaScript code
        window.addEventListener("DOMContentLoaded", function() {
            var paperFormatSelect = document.getElementById("paper_format");
            var customPaperInput = document.getElementById("custom_paper_input");

            paperFormatSelect.addEventListener("change", function() {
                if (paperFormatSelect.value === "custom") {
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
                if (coatingSelect.value === "custom") {
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
                if (laminationSelect.value === "custom") {
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
                if (paperTypeSelect.value === "custom") {
                    customPaperInput.style.display = "block";
                } else {
                    customPaperInput.style.display = "none";
                }
            });
        });
    </script>
</body>

</html>
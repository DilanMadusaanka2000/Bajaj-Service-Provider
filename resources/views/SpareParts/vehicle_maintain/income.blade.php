<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Income</title>
    <style>
        .form-container {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            width: 400px;
        }
        .form-container label {
            display: block;
            margin-bottom: 8px;
        }
        .form-container input {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-container button {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #45a049;
        }
        .result {
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <h1>Income Calculation</h1>

    <div class="form-container">
        <form id="billForm">
            <label for="serviceCost">Service Cost ($):</label>
            <input type="number" id="serviceCost" name="serviceCost" required>

            <label for="partsCost">Parts Cost ($):</label>
            <input type="number" id="partsCost" name="partsCost" required>

            <label for="additionalCharges">Additional Charges ($):</label>
            <input type="number" id="additionalCharges" name="additionalCharges" required>

            <button type="submit">Calculate Total Bill</button>
        </form>

        <div class="result" id="result">
            <!-- Result will be displayed here -->
        </div>
    </div>

    <script>
        document.getElementById('billForm').addEventListener('submit', function(event) {
            event.preventDefault();

            // Get input values
            const serviceCost = parseFloat(document.getElementById('serviceCost').value);
            const partsCost = parseFloat(document.getElementById('partsCost').value);
            const additionalCharges = parseFloat(document.getElementById('additionalCharges').value);

            // Calculate the total bill
            const totalBill = serviceCost + partsCost + additionalCharges;

            // Display the result
            document.getElementById('result').innerHTML = `
                <h3>Total Bill: $${totalBill.toFixed(2)}</h3>
            `;
        });
    </script>

</body>
</html>

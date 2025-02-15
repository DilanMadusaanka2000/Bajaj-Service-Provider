<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }
        .cardBox {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            width: 100%;
            max-width: 800px;
        }
        .card {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card a {
            text-decoration: none;
            color: inherit;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .iconBx {
            font-size: 24px;
        }
        .logout {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="logout">
            <a href="{{ route('dashbord.login') }}">
                <button style="border: none; background: none; font-size: 18px; cursor: pointer; color: #333;">
                    <ion-icon name="log-out-outline"></ion-icon> Logout
                </button>
            </a>
        </div>

        <div class="cardBox">
            <div class="card">
                <a href="{{ route('inventory.view') }}">
                    <div>
                        <div class="numbers">9</div>
                        <div class="cardName">View Inventory</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </a>
            </div>

            <div class="card">
                <a href="{{ route('inventory.form') }}">
                    <div>
                        <div class="numbers">ADD</div>
                        <div class="cardName">Add Spare Parts</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </a>
            </div>

            <div class="card">
                <a href="{{ route('inventory.view.lowquantity') }}">
                    <div>
                        <div class="numbers">8</div>
                        <div class="cardName">Low Stock Alert</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <script src="assets/js/main.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>

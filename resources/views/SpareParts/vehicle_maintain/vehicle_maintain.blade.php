<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Maintenance System</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search vehicle here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="user">
                    <img src="assets/imgs/customer01.jpg" alt="User Profile">
                </div>
            </div>

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card">
                    <a href="{{ route('vehicle.view') }}" style="text-decoration: none; color: inherit;">
                        <div>
                            <div class="numbers">1,504</div>
                            <div class="cardName">View Vehicle Maintenance</div>
                        </div>

                        <div class="iconBx">
                            <ion-icon name="eye-outline"></ion-icon>
                        </div>
                    </a>
                </div>

                <div class="card" style="cursor: pointer;">
                    <a href="{{ route('income') }}" style="text-decoration: none; color: inherit;">
                    <div>
                        <div class="numbers">80</div>
                        <div class="cardName">Maintenance Bill generate</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                    </a>
                </div>

                <div class="card" style="cursor: pointer;">
                    <a href="{{ route('inventory.view.lowquantity') }}" style="text-decoration: none; color: inherit;">
                        <div>
                            <div class="numbers">Low Stock Alert</div>
                            <div class="cardName">Inventory Alerts</div>
                        </div>

                        <div class="iconBx">
                            <ion-icon name="cash-outline"></ion-icon>
                        </div>
                    </a>
                </div>
            </div>

            <!-- ================ Vehicle Maintenance Details ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Vehicle Maintenance Orders</h2>
                        <a href="#" class="btn">View All</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Vehicle Model</td>
                                <td>Maintenance Type</td>
                                <td>Cost</td>
                                <td>Status</td>
                                <td>Service Date</td>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>Honda Civic</td>
                                <td>Oil Change</td>
                                <td>$100</td>
                                <td><span class="status inProgress">In Progress</span></td>
                                <td>2025-01-15</td>
                            </tr>

                            <tr>
                                <td>Toyota Corolla</td>
                                <td>Tire Replacement</td>
                                <td>$200</td>
                                <td><span class="status delivered">Completed</span></td>
                                <td>2025-01-10</td>
                            </tr>

                            <tr>
                                <td>Ford Focus</td>
                                <td>Brake Service</td>
                                <td>$150</td>
                                <td><span class="status pending">Pending</span></td>
                                <td>2025-01-20</td>
                            </tr>

                            <tr>
                                <td>Nissan Altima</td>
                                <td>Oil Change</td>
                                <td>$80</td>
                                <td><span class="status inProgress">In Progress</span></td>
                                <td>2025-01-18</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">

        <div class="user">
            {{-- <img src="assets/imgs/customer01.jpg" alt=""> --}}
                <a href="{{ route('dashbord.login') }}">

                    <button type="submit" style="border: none; background: none; color: inherit; cursor: pointer;">
                        <ion-icon name="log-out-outline"></ion-icon> Logout
                    </button>
                </a>


        </div>





        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="user">
                    <img src="assets/imgs/customer01.jpg" alt="">
                </div>
            </div>

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card">
                    <a href="{{ route('inventory.view') }}" style="text-decoration: none; color: inherit;">
                    <div>
                        <div class="numbers">9</div>
                        <div class="cardName">view inventory</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </a>
                </div>



                <div class="card" style="cursor: pointer;">
                    <a href="{{ route('inventory.form') }}" style="text-decoration: none; color: inherit;">
                        <div>
                            <div class="numbers">ADD</div>
                            <div class="cardName">Add Spare Parts</div>
                        </div>

                        <div class="iconBx">
                            <ion-icon name="cart-outline"></ion-icon>
                        </div>

                    </a>
                </div>







                <div class="card" style="cursor: pointer;">
                <a href="{{ route('inventory.view.lowquantity') }}" style="text-decoration: none; color: inherit;">

                    <div>
                        <div class="numbers">8</div>
                        <div class="cardName">Low Stock Alert</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                  </div>
                </a>
            </div>

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Orders</h2>
                        <a href="#" class="btn">View All</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Price</td>
                                <td>Payment</td>
                                <td>Status</td>
                            </tr>
                        </thead>


                    </table>
                </div>

                <!-- ================= New Customers ================ -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Recent Customers</h2>
                    </div>


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

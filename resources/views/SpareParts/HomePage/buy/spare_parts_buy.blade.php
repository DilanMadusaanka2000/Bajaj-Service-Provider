<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spare Part Details</title>
    <style>

       body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        /* Navbar Styles */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #003366;
            padding: 15px 20px;
            color: white;
        }

        .logo {
            font-size: 20px;
            font-weight: bold;
        }

        .nav-links {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
        }

        .nav-links li {
            margin: 0 15px;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: #FFCC00;
        }

        .contact-info span,
        .contact-info a {
            color: white;
            text-decoration: none;
            margin-left: 10px;
        }

        /* Container Styles */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px auto;
            max-width: 1200px;
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
        }

        /* Spare Part Styles */
        .spare-part {
            display: flex;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            align-items: center;
        }

        .spare-part-img {
            width: 300px;
            height: 300px;
            border-radius: 8px;
            margin-right: 20px;
        }

        .spare-part-info {
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .spare-part-name {
            font-size: 32px;
            margin: 0 0 10px;
            color: #003366;
        }

        .spare-part-price {
            font-size: 24px;
            margin: 0 0 20px;
            color: #555;
        }

        #quantity {
            width: 80px;
            padding: 5px;
            margin: 10px 0;
            font-size: 16px;
        }

        .buy-now-button {
            background-color: #0056b3;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }

        .buy-now-button:hover {
            background-color: #003d80;
        }

        /* Delivery Details Styles */
        .delivery-details {
            display: none;
            margin-top: 20px;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
        }

        .delivery-details label {
            font-size: 18px;
            margin-bottom: 10px;
            display: block;
        }

        .delivery-details input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .delivery-details button {
            background-color: #0056b3;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .delivery-details button:hover {
            background-color: #003d80;
        }


    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">Bajaj Spare Parts Providers</div>
        <ul class="nav-links">
            <li><a href="/">HOME</a></li>
            <li><a href="#">SPARE PARTS</a></li>
            <li><a href="#">SERVICE GALLERY</a></li>
            <li><a href="#">ABOUT US</a></li>
            <li><a href="#">APPOINTMENT</a></li>
            <li><a href="#">COMMENT</a></li>
        </ul>
        <div class="contact-info">
            <span>011-2400100</span>
            <a href="mailto:BajajSPCS@gmail.com">BajajSPCS@gmail.com</a>
        </div>
    </nav>

    <!-- Spare Part Display -->
    <div class="container">
        <div class="spare-part">
            <img src="{{ $sparePart->image ? asset('storage/' . $sparePart->image) : asset('images/placeholder.png') }}" alt="Spare Part Image" class="spare-part-img">
            <div class="spare-part-info">
                <h2 class="spare-part-name">{{ $sparePart->name }}</h2>
                <p class="spare-part-price">Price: {{ $sparePart->price }} USD</p>
                <label for="quantity">Add Quantity:</label>
                <input type="number" id="quantity" name="quantity" min="1" value="1">
                <button class="buy-now-button" onclick="showDeliveryDetails()">Buy Now</button>
            </div>
        </div>
    </div>

    <!-- Delivery Details -->
    <div class="container">
        <form action="{{ route('order.store') }}" method="POST" class="delivery-details" id="deliveryDetails" style="display: none;" enctype="multipart/form-data">
            @csrf

            <h2>Cash on Delivery Details</h2>

            <input type="hidden" name="price" value="{{ $sparePart->price }}">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" required>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" placeholder="Enter your address" required>
            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" maxlength="10" pattern="\d{10}" required>
            <label for="postal-code">Postal Code:</label>
            <input type="text" id="postal_code" name="postal_code" placeholder="Enter your postal code" maxlength="5" pattern="\d{5}" required>
            <input type="hidden" name="spare_part_name" value="{{ $sparePart->name }}">
            <input type="hidden" name="spareParts_id" value="{{ $sparePart->spareParts_id }}">
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" min="1" required>
            <button type="submit">Submit</button>
        </form>
    </div>

    <script>
        function showDeliveryDetails() {
            document.getElementById('deliveryDetails').style.display = 'block';
        }

    </script>
</body>
</html>

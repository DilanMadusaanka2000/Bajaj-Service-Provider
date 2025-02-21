<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
</head>
<body>
    <h1>Order Confirmation</h1>
    <p>Dear {{ $order->name }},</p>
    <p>Thank you for your order!</p>
    <p><strong>Order Details:</strong></p>
    <ul>
        <li>Spare Part: {{ $order->spare_part_name }}</li>
        <li>Quantity: {{ $order->quantity }}</li>
        <li>Total Price: {{ $order->price }}</li>
    </ul>
    <p>We will deliver your order to the following address:</p>
    <p>{{ $order->address }}</p>

    <p>You can track your order and view details here:</p>
    <a href="{{ $orderLink }}" style="padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px;">
        View Order Details
    </a>

    <p>Thank you for choosing our service!</p>
</body>
</html>

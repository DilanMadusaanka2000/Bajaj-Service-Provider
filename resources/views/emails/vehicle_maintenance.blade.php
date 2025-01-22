<!DOCTYPE html>
<html>
<head>
    <title>Vehicle Maintenance Confirmation</title>
</head>
<body>
    <h1>Thank You, {{ $formData['full_name'] }}!</h1>
    <p>Your vehicle maintenance request has been received. Here are the details:</p>
    <ul>
        <li><strong>Vehicle Type:</strong> {{ $formData['vehicle_type'] }}</li>
        <li><strong>Vehicle Name:</strong> {{ $formData['vehicle_name'] }}</li>
        <li><strong>Vehicle Number:</strong> {{ $formData['vehicle_number'] }}</li>
        <li><strong>Maintenance Services:</strong> {{ $formData['maintenance_services'] }}</li> <!-- Stringified -->
        <li><strong>Wash Type:</strong> {{ $formData['wash_type'] }}</li>
        <li><strong>Date:</strong> {{ $formData['date'] }}</li>
        <li><strong>Time Slot:</strong> {{ $formData['time_slot'] }}</li>
    </ul>
    <p>We will contact you soon for further updates!</p>
</body>
</html>

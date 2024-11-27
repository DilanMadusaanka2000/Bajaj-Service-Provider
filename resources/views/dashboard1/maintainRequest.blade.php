<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Table</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin: 20px 0;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: center;
    }
    th {
      background-color: #A7C7E7; /* Updated header color */
      color: #333;
      font-weight: bold;
    }
    tr:nth-child(even) {
      background-color: #f9f9f9;
    }
    tr:hover {
      background-color: #f1f1f1;
    }
  </style>
</head>
<body>

<h2>Table</h2>

<table>
    <thead>
      <tr>
        <th>#</th>
        <th>ID</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Vehicle Type</th>
        <th>Vehicle Name</th>
        <th>Vehicle Number</th>
        <th>Maintenance Services</th>
        <th>Wash Type</th>
        <th>Additional Column 1</th>
        <th>Additional Column 2</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($tasks as $key => $task)
      <tr>
        <td>{{ $key + 1 }}</td> <!-- Increment correctly -->
        <td>{{ $task->id }}</td>
        <td>{{ $task->full_name }}</td>
        <td>{{ $task->email }}</td>
        <td>{{ $task->phone }}</td>
        <td>{{ $task->vehicle_type }}</td>
        <td>{{ $task->vehicle_name }}</td>
        <td>{{ $task->vehicle_number }}</td>
        <td>{{ $task->maintenance_services }}</td>
        <td>{{ $task->wash_type }}</td>
        <td>{{ $task->column_10 ?? 'N/A' }}</td> <!-- Replace 'N/A' with default or dynamic value -->
        <td>{{ $task->column_11 ?? 'N/A' }}</td> <!-- Replace 'N/A' with default or dynamic value -->
      </tr>
      @endforeach
    </tbody>
  </table>


</body>
</html>

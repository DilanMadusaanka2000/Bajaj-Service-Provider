<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Orders Table with Search</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 20px;
      background-color: #f5f5f5;
    }

    h2 {
      text-align: center;
      color: #4A90E2;
      margin-bottom: 20px;
    }

    .search-container {
      text-align: center;
      margin-bottom: 20px;
    }

    input[type="text"] {
      padding: 10px;
      width: 50%;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    button.search-button {
      padding: 10px 15px;
      font-size: 16px;
      margin-left: 10px;
      background-color: #4A90E2;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    button.search-button:hover {
      background-color: #3A78C2;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin: 0 auto;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      background: #fff;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 12px;
      text-align: center;
    }

    th {
      background-color: #4A90E2;
      color: white;
      font-weight: bold;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    tr:hover {
      background-color: #f1f1f1;
    }

    td.status-cell {
      font-weight: bold;
      color: white;
      border-radius: 5px;
    }

    .status-pending {
      background-color: #4A90E2;
    }

    .status-done, .status-completed {
      background-color: #FFD700;
    }

    button.status-button {
      padding: 8px 12px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 14px;
    }

    button.status-button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <h2>Orders Table</h2>

  <!-- Search Input and Button -->
  <div class="search-container">
    <form action="{{ route('orders.search') }}" method="GET">
      <input
        type="text"
        name="search"
        id="searchInput"
        placeholder="Search by ID, Name, Email, Vehicle Number, etc."
        value="{{ request('search') }}"
      >
      <button class="search-button" type="submit">Search</button>
    </form>
  </div>

  <!-- Orders Table -->
  <table>
    <thead>
      <tr>
        <th>Order ID</th>
        <th>Name</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Postal Code</th>
        <th>Spare Part Name</th>
        <th>Status</th>
        <th>Spare Parts ID</th>
        <th>Quantity</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($tasks as $task)
        <tr>
          <td>{{ $task->order_id }}</td>
          <td>{{ $task->name }}</td>
          <td>{{ $task->address }}</td>
          <td>{{ $task->phone }}</td>
          <td>{{ $task->postal_code }}</td>
          <td>{{ $task->spare_part_name }}</td>
          <td class="status-cell {{ $task->status === 'pending' || $task->status === 'completed' ? 'status-pending' : 'status-done' }}">
            {{ ucfirst($task->status) }}
          </td>
          <td>{{ $task->spareParts_id }}</td>
          <td>{{ $task->quantity }}</td>
          <td>
            <form action="{{ route('update-status', ['order_id' => $task->order_id]) }}" method="POST">
              @csrf
              <button type="submit" class="status-button">
                {{ $task->status === 'completed' ? 'Completed' : 'Done' }}
              </button>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="10">No results found.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</body>
</html>

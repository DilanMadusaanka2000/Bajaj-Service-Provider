{{-- In resources/views/inventory/lowquantity.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Low Stock Items</title>
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
      background-color: #A7C7E7;
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

<h2>Low Stock Items</h2>

<table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Category</th>
        <th>Price</th>
        <th>Discount</th>
        <th>Stock</th>
        <th>Description</th>
        <th>Image</th>
        <th>update</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($lowStockItems as $item)
      <tr>
        <td>{{ $item->spareParts_id }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->category }}</td>
        <td>{{ $item->price }}</td>
        <td>{{ $item->discount }}</td>
        <td>{{ $item->stock }}</td>
        <td>{{ $item->description }}</td>
        <td><img src="{{ asset('images/' . $item->imgname) }}" alt="{{ $item->name }}" width="50"></td>

        <td>
            @if(isset($task->spareParts_id))
                <a href="{{ route('inventory.update.view', ['id' => $task->spareParts_id]) }}">
                    <button>Update</button>
                </a>
            @else
                <button onclick="showError()">Update</button>
            @endif
        </td>
      </tr>
      @endforeach
    </tbody>
</table>

</body>
</html>

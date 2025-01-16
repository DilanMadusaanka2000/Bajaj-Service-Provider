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


    <input
  type="text"
  id="searchInput"
  placeholder="Search by ID, Name, Email, Vehicle Number, etc."
  onkeyup="liveSearch()"
  style="margin-bottom: 20px; padding: 8px; width: 50%; font-size: 16px;"
  >



<h2>Table</h2>

<table>
    <thead>
      <tr>
        {{-- <th>#</th> --}}
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>price</th>
        <th>Discount</th>
        <th>stock</th>
        <th>description</th>
        <th>imgname</th>
        <th> publish</th>
        <th>Update</th>


      </tr>
    </thead>
    <tbody>
      @foreach ($tasks as $key => $task)
      <tr>
        {{-- <td>{{ $key + 1 }}</td> <!-- Increment correctly --> --}}
        <td>{{ $task->spareParts_id ?? 'No ID' }}</td> <!-- Debug output -->

        <td>{{ $task->name }}</td>
        <td>{{ $task->category }}</td>
        <td>{{ $task->price }}</td>
        <td>{{ $task->discount }}</td>
        <td>{{ $task->stock }}</td>
        <td>{{ $task->description }}</td>
        <td>
            @if($task->image)
                <img src="{{ asset('storage/' . $task->image) }}" alt="Image" style="width: 30px; height: 30px;">
            @else
                No Image
            @endif
        </td>

        {{-- <td>{{ $task->column_10 ?? 'N/A' }}</td> <!-- Replace 'N/A' with default or dynamic value -->
        <td>{{ $task->column_11 ?? 'N/A' }}</td> <!-- Replace 'N/A' with default or dynamic value --> --}}

        <td>
            <button class="status-button" onclick="toggleStatus({{ $task->id }}, '{{ $task->status }}')">
               {{ $task->status === 'completed' ? 'Completed' : 'Done' }}
            </button>
         </td>

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

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
        <th>Category</th>
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
                </a>
            @else
                <button onclick="showError()">Updated!</button>
            @endif
        </td>

        <td>
            <form action="{{ route('inventory.form.delete', ['id' => $task->spareParts_id]) }}" method="POST" onsubmit="return confirmDelete(event, {{ $task->spareParts_id }})">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-button" style="background-color: red; color: white; border: none; padding: 5px 10px; cursor: pointer;">
                    Delete
                </button>
            </form>
        </td>





      </tr>
      @endforeach
    </tbody>
  </table>












  <script>
    function confirmDelete(event, id) {
        event.preventDefault();
        if (confirm('Are you sure you want to delete this item?')) {
            event.target.submit();
        }
    }






function liveSearch() {
    let input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.querySelector("table"); // Get the table
    tr = table.getElementsByTagName("tr"); // Get all rows

    for (i = 1; i < tr.length; i++) { // Start from 1 to skip the header row
        let found = false;
        td = tr[i].getElementsByTagName("td"); // Get all columns in the row

        for (let j = 0; j < td.length; j++) {
            if (td[j]) {
                txtValue = td[j].textContent || td[j].innerText; // Get the text value
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    found = true; // Match found
                    break;
                }
            }
        }

        tr[i].style.display = found ? "" : "none"; // Show/hide row
    }
}

</script>



</body>
</html>

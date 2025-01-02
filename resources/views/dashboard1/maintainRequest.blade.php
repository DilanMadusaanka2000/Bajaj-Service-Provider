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
        <th>Full Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Vehicle Type</th>
        <th>Vehicle Name</th>
        <th>Vehicle Number</th>
        <th>Maintenance Services</th>
        <th>Wash Type</th>
        <th>Make Done</th>

      </tr>
    </thead>
    <tbody>
      @foreach ($tasks as $key => $task)
      <tr>
        {{-- <td>{{ $key + 1 }}</td> <!-- Increment correctly --> --}}
        <td>{{ $task->id }}</td>
        <td>{{ $task->full_name }}</td>
        <td>{{ $task->email }}</td>
        <td>{{ $task->phone }}</td>
        <td>{{ $task->vehicle_type }}</td>
        <td>{{ $task->vehicle_name }}</td>
        <td>{{ $task->vehicle_number }}</td>
        <td>{{ $task->maintenance_services }}</td>
        <td>{{ $task->wash_type }}</td>
        {{-- <td>{{ $task->column_10 ?? 'N/A' }}</td> <!-- Replace 'N/A' with default or dynamic value -->
        <td>{{ $task->column_11 ?? 'N/A' }}</td> <!-- Replace 'N/A' with default or dynamic value --> --}}

        <td>
            <button class="status-button" onclick="toggleStatus({{ $task->id }}, '{{ $task->status }}')">
               {{ $task->status === 'completed' ? 'Completed' : 'Done' }}
            </button>
         </td>



      </tr>
      @endforeach
    </tbody>
  </table>









  <script>
    function toggleStatus(id, currentStatus) {
       // Determine the new status based on the current status
       const newStatus = currentStatus === 'completed' ? 'done' : 'completed';

       updateStatus(id, newStatus);
    }

    function updateStatus(id, status) {
       fetch(`/service/dashboard/maintain-request/${id}/status`, {
          method: 'POST',
          headers: {
             'Content-Type': 'application/json',
             'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token for security
          },
          body: JSON.stringify({ status: status })
       })
       .then(response => response.json())
       .then(data => {
          if (data.message) {
             alert(data.message);

             // Update the button text and status
             const button = document.querySelector(`button[onclick="toggleStatus(${id}, '${status}')"]`);
             if (button) {
                button.textContent = status.charAt(0).toUpperCase() + status.slice(1);
                button.setAttribute('onclick', `toggleStatus(${id}, '${status}')`);
             }
          }
       })
       .catch(error => console.error('Error:', error));
    }



//live search function

    function liveSearch() {
    // Get the search input and convert to lowercase
    const searchValue = document.getElementById('searchInput').value.toLowerCase();

    // Get all rows in the table (excluding the header row)
    const rows = document.querySelectorAll('table tbody tr');

    rows.forEach(row => {
      // Combine all column values in the row into a single string
      const rowText = Array.from(row.querySelectorAll('td')).map(td => td.textContent).join(' ').toLowerCase();

      // Check if the search value exists in the row
      if (rowText.includes(searchValue)) {
        row.style.display = ''; // Show the row
      } else {
        row.style.display = 'none'; // Hide the row
      }
    });
  }
 </script>






</body>
</html>

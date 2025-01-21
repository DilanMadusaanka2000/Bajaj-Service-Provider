<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Maintenance Requests</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        /* Custom Styles */
        body {
            background-color: #f4f8fb;
            font-family: 'Arial', sans-serif;
        }

        h2 {
            color: #0056b3;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        .container {
            margin-top: 30px;
            background: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .table {
            margin-top: 20px;
        }

        thead {
            background-color: #0056b3;
            color: #ffffff;
        }

        th {
            text-align: center;
            font-size: 14px;
        }

        td {
            text-align: center;
            font-size: 14px;
            vertical-align: middle;
        }

        tr:nth-child(even) {
            background-color: #f2f6fc;
        }

        tr:hover {
            background-color: #e1ecf8;
        }

        .alert {
            text-align: center;
            font-size: 16px;
        }

        /* Footer */
        footer {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Vehicle Maintenance Requests</h2>

        <!-- Success and Error Messages -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <!-- Search Box -->
        <form action="{{ route('vehicle.search') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search by Full Name" value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>

        @if($VehicleMaintain->isEmpty())
            <div class="alert alert-info">
                No maintenance requests found.
            </div>
        @else
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Vehicle Type</th>
                        <th>Vehicle Name</th>
                        <th>Vehicle Number</th>
                        <th>Maintenance Services</th>
                        <th>Wash Type</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Time Slot</th>
                        <th>User ID</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($VehicleMaintain as $index => $request)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $request->full_name }}</td>
                            <td>{{ $request->email }}</td>
                            <td>{{ $request->phone }}</td>
                            <td>{{ $request->vehicle_type }}</td>
                            <td>{{ $request->vehicle_name }}</td>
                            <td>{{ $request->vehicle_number }}</td>
                            <td>{{ $request->maintenance_services }}</td>
                            <td>{{ $request->wash_type }}</td>
                            <td>
                                <form action="{{ route('vehicle.updateStatus', $request->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" class="form-select" onchange="this.form.submit()">
                                        <option value="pending" {{ $request->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="cancelled" {{ $request->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                        <option value="completed" {{ $request->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                    </select>
                                </form>
                            </td>
                            <td>{{ $request->date }}</td>
                            <td>{{ $request->time_slot }}</td>
                            <td>{{ $request->user_id }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    <footer>
        © {{ date('Y') }} Vehicle Maintenance System
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

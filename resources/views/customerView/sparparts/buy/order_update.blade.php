<!DOCTYPE html>
<html>
<head>
    <title>Update Order</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Update Order</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        {{-- <form action="{{ route('order.update', $order->id) }}" method="POST"> --}}
        <form action="" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="spareParts_id" class="form-label">Spare Part</label>
                <select name="spareParts_id" id="spareParts_id" class="form-control" required>
                    <option value="{{ $order->spareParts_id }}">{{ $order->spare_part_name }}</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $order->quantity }}" required min="1">
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Customer Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $order->name }}" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" id="address" class="form-control" value="{{ $order->address }}" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ $order->phone }}" required>
            </div>

            <div class="mb-3">
                <label for="postal_code" class="form-label">Postal Code</label>
                <input type="text" name="postal_code" id="postal_code" class="form-control" value="{{ $order->postal_code }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Order</button>
            <a href="{{ route('home') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>



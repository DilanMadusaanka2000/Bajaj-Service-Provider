<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Spare Part</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f3f4f6;
        }
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 8px;
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group button {
            background-color: #28a745;
            color: #ffffff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        .form-group button:hover {
            background-color: #218838;
        }
        .error {
            color: red;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Add Spare Part</h2>
        <!-- Form starts -->
        <form action="{{ route('inventory.form.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Item Name -->
            <div class="form-group">
                <label for="item-name">Item Name</label>
                <input type="text" id="item-name" name="name" value="{{ old('name', $task->name ?? '') }}" placeholder="Enter item name" required>
                @error('name')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <!-- Category -->
            <div class="form-group">
                <label for="category">Category</label>
                <select id="category" name="category" required>
                    <option value="" disabled selected>Select a category</option>
                    <option value="engine" {{ old('category', $task->category ?? '') == 'engine' ? 'selected' : '' }}>Engine</option>
                    <option value="brakes" {{ old('category', $task->category ?? '') == 'brakes' ? 'selected' : '' }}>Brakes</option>
                    <option value="suspension" {{ old('category', $task->category ?? '') == 'suspension' ? 'selected' : '' }}>Suspension</option>
                    <option value="tires" {{ old('category', $task->category ?? '') == 'tires' ? 'selected' : '' }}>Tires</option>
                    <option value="others" {{ old('category', $task->category ?? '') == 'others' ? 'selected' : '' }}>Others</option>
                </select>
                @error('category')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <!-- Price -->
            <div class="form-group">
                <label for="price">Price (LKR)</label>
                <input type="number" id="price" name="price" value="{{ old('price', $task->price ?? '') }}" placeholder="Enter price" required>
                @error('price')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <!-- Discount -->
            <div class="form-group">
                <label for="discount">Discount (LKR)</label>
                <input type="number" id="discount" name="discount" value="{{ old('discount', $task->discount ?? '') }}" placeholder="Enter discount" required>
                @error('discount')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <!-- Stock Quantity -->
            <div class="form-group">
                <label for="stock">Stock Quantity</label>
                <input type="number" id="stock" name="stock" value="{{ old('stock', $task->stock ?? '') }}" placeholder="Enter stock quantity" required>
                @error('stock')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <!-- Description -->
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" placeholder="Enter item description" rows="4">{{ old('description', $task->description ?? '') }}</textarea>
                @error('description')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <!-- Image Upload -->
            <div class="form-group">
                <label for="image">Upload Image</label>
                <input type="file" id="image" name="image" accept="image/*">
                @error('image')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit">Update Inventory</button>
            </div>
        </form>

        <!-- Form ends -->
    </div>
</body>
</html>

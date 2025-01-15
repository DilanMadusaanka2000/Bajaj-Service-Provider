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
        }
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
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
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Add Spare Part</h2>
        <form action="{{ route('inventory.form.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Item Name -->
            <div class="form-group">
                <label for="item-name">Item Name</label>
                <input type="text" id="item-name" name="name" placeholder="Enter item name" required>
            </div>

            <!-- Category -->
            <div class="form-group">
                <label for="category">Category</label>
                <select id="category" name="category" required>
                    <option value="" disabled selected>Select a category</option>
                    <option value="engine">Engine</option>
                    <option value="brakes">Brakes</option>
                    <option value="suspension">Suspension</option>
                    <option value="tires">Tires</option>
                    <option value="others">Others</option>
                </select>
            </div>

            <!-- Price -->
            <div class="form-group">
                <label for="price">Price (LKR)</label>
                <input type="number" id="price" name="price" placeholder="Enter price" required>
            </div>

            <!-- Discount -->
            <div class="form-group">
                <label for="discount">Discount (LKR)</label>
                <input type="number" id="discount" name="discount" placeholder="Enter discount" required>
            </div>

            <!-- Stock Quantity -->
            <div class="form-group">
                <label for="stock">Stock Quantity</label>
                <input type="number" id="stock" name="stock" placeholder="Enter stock quantity" required>
            </div>

            <!-- Description -->
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" placeholder="Enter item description" rows="4"></textarea>
            </div>

            <!-- Image Upload -->
            <div class="form-group">
                <label for="image">Upload Image</label>
                <input type="file" id="image" name="image" accept="image/*" required>
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit">Add to Inventory</button>
            </div>
        </form>

    </div>
</body>
</html>

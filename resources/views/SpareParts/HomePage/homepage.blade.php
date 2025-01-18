<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Spare Parts Shop</title>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <style>

       <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        .grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            width: 300px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
        }
        .card h3 {
            margin: 10px 0;
            font-size: 1.5rem;
            color: #333;
        }
        .card p {
            color: #555;
            font-size: 1rem;
            margin: 10px 0;
        }
        .card .price {
            font-size: 1.2rem;
            font-weight: bold;
            color: #007BFF;
        }
        .card .discount {
            font-size: 1rem;
            text-decoration: line-through;
            color: #FF5733;
        }
        .btn {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 15px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1rem;
        }
        .btn:hover {
            background-color: #218838;
        }



    </style>
</head>
<body>
    <div class="container">
        <h1>Spare Parts Shop</h1>
        <div class="grid">
            @foreach ($spareParts as $part)
                <div class="card">
                    @if ($part->image)
                        <img src="{{ asset('storage/' . $part->image) }}" alt="{{ $part->name }}">
                    @else
                        <img src="{{ asset('images/placeholder.png') }}" alt="No Image Available">
                    @endif
                    <h3>{{ $part->name }}</h3>/
                    <p class="category">{{ $part->category }}</p>
                    <p class="price">
                        {{ $part->price - ($part->discount ?? 0) }} USD
                        @if ($part->discount)
                            <span class="discount">{{ $part->price }} USD</span>
                        @endif
                    </p>
                    <p class="stock">{{ $part->stock > 0 ? 'In Stock' : 'Out of Stock' }}</p>
                    <a href="{{ route('spareparts.buy', ['spareParts_id' => $part->spareParts_id]) }}" class="btn">Buy Now</a>

                </div>
            @endforeach
        </div>
    </div>
</body>
</html>

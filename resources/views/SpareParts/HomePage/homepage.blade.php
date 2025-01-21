<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Premium Spare Parts Shop</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f7fa;
        }

        .container {
            padding: 40px 20px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
        }

        .header h1 {
            font-size: 2.5rem;
            color: #2d3748;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .header p {
            color: #718096;
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
            padding: 20px;
        }

        .card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
            position: relative;
            border: 1px solid #e2e8f0;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .card:hover img {
            transform: scale(1.05);
        }

        .card-content {
            padding: 20px;
        }

        .category-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(255, 255, 255, 0.9);
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            color: #4a5568;
            font-weight: 500;
        }

        .card h3 {
            margin: 0 0 10px 0;
            font-size: 1.4rem;
            color: #2d3748;
            font-weight: 600;
        }

        .price-container {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 15px 0;
        }

        .price {
            font-size: 1.4rem;
            font-weight: 600;
            color: #2b6cb0;
        }

        .discount {
            font-size: 1rem;
            text-decoration: line-through;
            color: #a0aec0;
        }

        .stock-status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 500;
            margin: 10px 0;
        }

        .in-stock {
            background-color: #c6f6d5;
            color: #2f855a;
        }

        .out-of-stock {
            background-color: #fed7d7;
            color: #c53030;
        }

        .btn {
            display: inline-block;
            width: 100%;
            padding: 12px 0;
            background-color: #3182ce;
            color: white;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 500;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #2c5282;
        }

        .btn i {
            margin-right: 8px;
        }

        .comment-section {
            margin-top: 20px;
            padding: 20px;
            background-color: #f9fafb;
            border-radius: 10px;
            border: 1px solid #e2e8f0;
        }

        .comment-form textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            resize: none;
            font-size: 1rem;
        }

        .comment-form button {
            margin-top: 10px;
            background-color: #3182ce;
            color: white;
            padding: 12px 0;
            width: 100%;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .comment-form button:hover {
            background-color: #2c5282;
        }

        .comment {
            margin-top: 10px;
            padding: 12px;
            background-color: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
        }

        .comment .author {
            font-weight: bold;
        }

        .comment .date {
            font-size: 0.9rem;
            color: #718096;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px 10px;
            }

            .header h1 {
                font-size: 2rem;
            }

            .grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 20px;
                padding: 10px;
            }
        }



        .search-form {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.search-form input {
    padding: 10px;
    font-size: 1rem;
    width: 300px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.search-form button {
    padding: 10px 20px;
    background-color: #3182ce;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.search-form button:hover {
    background-color: #2c5282;
}

    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Premium Spare Parts</h1>
            <p>Discover quality automotive parts for your vehicle maintenance needs</p>
        </div>

        <div class="header">
            
            <!-- Search Form -->
            <form method="GET" action="{{ route('home') }}" class="search-form">
                <input type="text" name="search" placeholder="Search spare parts..." value="{{ request('search') }}">
                <button type="submit">Search</button>
            </form>
        </div>




        <div class="grid">
            @foreach ($spareParts as $part)
                <div class="card">
                    <span class="category-badge">{{ $part->category }}</span>
                    @if ($part->image)
                        <img src="{{ asset('storage/' . $part->image) }}" alt="{{ $part->name }}">
                    @else
                        <img src="{{ asset('images/placeholder.png') }}" alt="No Image Available">
                    @endif
                    <div class="card-content">
                        <h3>{{ $part->name }}</h3>
                        <div class="price-container">
                            <span class="price">${{ number_format($part->price - ($part->discount ?? 0), 2) }}</span>
                            @if ($part->discount)
                                <span class="discount">${{ number_format($part->price, 2) }}</span>
                            @endif
                        </div>
                        <span class="stock-status {{ $part->stock > 0 ? 'in-stock' : 'out-of-stock' }}">
                            <i class="fas {{ $part->stock > 0 ? 'fa-check-circle' : 'fa-times-circle' }}"></i>
                            {{ $part->stock > 0 ? 'In Stock' : 'Out of Stock' }}
                        </span>
                        <a href="{{ route('spareparts.buy', ['spareParts_id' => $part->spareParts_id]) }}" class="btn">
                            <i class="fas fa-shopping-cart"></i>Buy Now
                        </a>
                        <a href="{{ route('spareparts.comments', ['spareParts_id' => $part->spareParts_id]) }}" class="btn" style="background-color: #4caf50; margin-top: 10px;">
                            <i class="fas fa-comments"></i> View Comments
                        </a>

                        <!-- Comment Section -->
                        <div class="comment-section">
                            <h4>Leave a Comment</h4>
                            <form class="comment-form" action="{{ route('spareparts.add_comment', ['spareParts_id' => $part->spareParts_id]) }}" method="POST">
                                @csrf
                                <textarea name="comment" rows="4" placeholder="Write your comment..."></textarea>
                                <button type="submit">Submit Comment</button>
                            </form>


                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>

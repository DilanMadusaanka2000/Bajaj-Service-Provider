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






        * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: white;
      color: #3890e7;
      line-height: 1.6;
    }

    /* Header Styles */
    header {
      background: #003366;
      padding: 20px 40px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    header h1 {
      color: white;
      font-size: 1.8rem;
      font-weight: bold;
    }

    nav ul {
      display: flex;
      list-style: none;
    }

    nav ul li {
      margin: 0 15px;
    }

    nav ul li a {
      text-decoration: none;
      color: white;
      font-size: 1rem;
      font-weight: 600;
      padding: 8px 12px;
      border-radius: 5px;
      transition: background-color 0.3s;
    }

    nav ul li a:hover {
      background-color: rgba(255, 255, 255, 0.2);
    }

    /* Login and Register Buttons */
    .auth-button {
      background-color: white;
      color: #003366;
      font-weight: bold;
      padding: 8px 15px;
      border-radius: 20px;
      text-decoration: none;
      transition: background-color 0.3s, color 0.3s;
      border: 2px solid white;
    }

    .auth-button:hover {
      background-color: #0056b3;
      color: white;
    }

    /* Hero Section */
    .hero-section {
      background: #3491ef;
      color: white;
      text-align: center;
      padding: 160px 20px;
      position: relative;
    }

    .hero-section h2 {
      font-size: 3rem;
      margin-bottom: 20px;
    }

    .hero-section p {
      font-size: 1.2rem;
      margin-bottom: 40px;
    }

    .search-bar {
      margin: 0 auto;
      max-width: 600px;
      position: relative;
    }

    .search-bar input {
      width: 100%;
      padding: 15px 20px;
      background: white;
      border-radius: 30px;
      border: 2px solid #003366;
      font-size: 1rem;
      outline: none;
      color: #003366;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .search-bar button {
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      background-color: white;
      border: 2px solid #003366;
      padding: 12px 25px;
      border-radius: 20px;
      color: #003366;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s, color 0.3s;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .search-bar button:hover {
      background-color: #0056b3;
      color: white;
    }

    /* Features Section */
    .features-section {
      background-color: white;
      padding: 60px 20px;
      text-align: center;
    }

    .features-section h3 {
      font-size: 2.5rem;
      margin-bottom: 30px;
      color: #003366;
    }

    .features-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
      margin-top: 40px;
      padding: 0 10px;
    }

    .feature-item {
      background: #f4f4f9;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s, box-shadow 0.3s;
      text-align: center;
    }

    .feature-item:hover {
      transform: translateY(-10px);
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    .feature-item img {
      max-width: 60px;
      margin-bottom: 20px;
    }

    .feature-item h4 {
      font-size: 1.5rem;
      margin-bottom: 15px;
      color: #003366;
    }

    .feature-item p {
      font-size: 1rem;
      color: #003366;
    }

    .feature-item a {
      display: block;
      margin-top: 10px;
      font-size: 1rem;
      color: #003366;
      text-decoration: none;
      font-weight: bold;
      transition: color 0.3s;
    }

    .feature-item a:hover {
      color: #0056b3;
    }

    /* Footer Section */
    footer {
      background: #003366;
      color: white;
      padding: 30px 20px;
      text-align: center;
    }

    footer p {
      font-size: 1rem;
    }

    footer a {
      color: white;
      text-decoration: underline;
      font-weight: bold;
    }

    footer a:hover {
      color: #0056b3;
    }








    </style>
</head>
<body>



      <!-- Header Section -->
  <header>
    <h1>Bajaj Service Spar Parts</h1>
    <nav>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="#">About Us</a></li>
        {{-- <li><a href="#" class="auth-button">Login</a></li>
        <li><a href="#" class="auth-button">Register</a></li> --}}
      </ul>
    </nav>
  </header>

  <!-- Hero Section -->
  <section class="hero-section">
    <h2>Hi, How can we help?</h2>
    <p>Explore support articles or find the right service for your vehicle.</p>
    <div class="search-bar">
      <input type="text" placeholder="Search using keywords...">
      <button>Search</button>
    </div>
  </section>



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

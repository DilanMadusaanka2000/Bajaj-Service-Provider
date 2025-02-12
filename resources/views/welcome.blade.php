<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bajaj Service Center</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <style>
    /* Reset and Base Styles */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: white;
      color: #003366;
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

    /* Hero Section */
    .hero-section {
      background: #003366;
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
    <h1>Bajaj Service Center</h1>
    <nav>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="{{ url('/about') }}">About Us</a></li>
        @if (Route::has('login'))
    <nav class="-mx-3 flex flex-1 justify-end" style="display: flex; justify-content: flex-end; margin-left: -12px; margin-right: -12px;">
        @auth
            <!-- Dashboard Button -->
            <a href="{{ route('welcome1') }}"
                class="rounded-md px-3 py-2 text-gray-700 bg-gray-200 ring-1 ring-transparent transition hover:bg-gray-300 focus:outline-none focus-visible:ring-gray-400"
                style="padding: 8px 16px; background-color: #E2E8F0; color: #4A5568; border-radius: 4px; border: 1px solid transparent; text-decoration: none; display: inline-block; font-size: 1rem; font-weight: 500; transition: background-color 0.3s; cursor: pointer;">
                View
            </a>
        @else
            <!-- Login Button -->
            <a href="{{ route('login') }}"
                class="rounded-md px-3 py-2 text-gray-700 bg-gray-200 ring-1 ring-transparent transition hover:bg-gray-300 focus:outline-none focus-visible:ring-gray-400"
                style="padding: 8px 16px; background-color: #E2E8F0; color: #4A5568; border-radius: 4px; border: 1px solid transparent; text-decoration: none; display: inline-block; font-size: 1rem; font-weight: 500; transition: background-color 0.3s; cursor: pointer;">
                Log in
            </a>
            @if (Route::has('register'))
                <!-- Register Button -->
                <a href="{{ route('register') }}"
                    class="ml-3 rounded-md px-3 py-2 text-gray-700 bg-gray-200 ring-1 ring-transparent transition hover:bg-gray-300 focus:outline-none focus-visible:ring-gray-400"
                    style="margin-left: 12px; padding: 8px 16px; background-color: #E2E8F0; color: #4A5568; border-radius: 4px; border: 1px solid transparent; text-decoration: none; display: inline-block; font-size: 1rem; font-weight: 500; transition: background-color 0.3s; cursor: pointer;">
                    Register
                </a>
            @endif
        @endauth
    </nav>
@endif

      </ul>
    </nav>
  </header>

  <!-- Hero Section -->
  <section class="hero-section">
    <h2>Hi, How can we help?</h2>
    <p>Explore support articles or find the right service for your vehicle.</p>
    <div class="search-bar">
      <input type="text" placeholder="Search">
      <button>Search</button>
    </div>
  </section>

  <!-- Features Section -->


  <!-- Footer Section -->
  <footer>
    <p>&copy; 2024 Bajaj Service Center. All rights reserved. <a href="#">Privacy Policy</a></p>
  </footer>
</body>
</html>

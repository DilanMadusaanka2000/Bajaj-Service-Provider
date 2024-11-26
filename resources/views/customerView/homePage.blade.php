<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bajaj Service Center</title>
  <style>
    /* Reset and Base Styles */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Arial', sans-serif;
      background-color: #f4f4f9;
      color: #333;
    }

    /* Header Styles */
    header {
      background-color: #0056b3;
      padding: 15px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    header h1 {
      color: white;
      font-size: 1.5rem;
    }

    nav ul {
      display: flex;
      list-style: none;
    }

    nav ul li {
      margin: 0 10px;
    }

    nav ul li a {
      text-decoration: none;
      color: white;
      font-size: 1rem;
      font-weight: bold;
      transition: color 0.3s;
    }

    nav ul li a:hover {
      color: #f9a825;
    }

    /* Hero Section */
    .hero-section {
      background-color: #6200ea;
      color: white;
      text-align: center;
      padding: 60px 20px;
    }

    .hero-section h2 {
      font-size: 2.5rem;
      margin-bottom: 20px;
    }

    .hero-section p {
      font-size: 1.2rem;
      margin-bottom: 30px;
    }

    .search-bar {
      margin: 0 auto;
      max-width: 600px;
      position: relative;
    }

    .search-bar input {
      width: 100%;
      padding: 15px;
      border-radius: 30px;
      border: none;
      font-size: 1rem;
      outline: none;
    }

    .search-bar button {
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      background-color: #f9a825;
      border: none;
      padding: 10px 20px;
      border-radius: 20px;
      color: white;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .search-bar button:hover {
      background-color: #ffc107;
    }

    /* Features Section */
    .features-section {
      background-color: #f4f4f9;
      padding: 40px 20px;
      text-align: center;
    }

    .features-section h3 {
      font-size: 2rem;
      margin-bottom: 20px;
      color: #0056b3;
    }

    .features-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 20px;
      margin-top: 30px;
    }

    .feature-item {
      background-color: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s, box-shadow 0.3s;
    }

    .feature-item:hover {
      transform: translateY(-10px);
      box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
    }

    .feature-item img {
      max-width: 50px;
      margin-bottom: 15px;
    }

    .feature-item h4 {
      font-size: 1.2rem;
      margin-bottom: 10px;
      color: #333;
    }

    .feature-item p {
      font-size: 0.9rem;
      color: #666;
    }

    /* Footer */
    footer {
      background-color: #0056b3;
      color: white;
      padding: 20px;
      text-align: center;
    }

    footer p {
      font-size: 0.9rem;
    }

    footer a {
      color: #f9a825;
      text-decoration: none;
    }

    footer a:hover {
      color: #ffc107;
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
        <li><a href="#">About Us</a></li>
        <li><a href="#">Login</a></li>
        <li><a href="#">Register</a></li>
      </ul>
    </nav>
  </header>

  <!-- Hero Section -->
  <section class="hero-section">
    <h2>Hi, how can we help?</h2>
    <p>Explore support articles or find the right service for your vehicle.</p>
    <div class="search-bar">
      <input type="text" placeholder="Search using keywords..." />
      <button>Search</button>
    </div>
  </section>

  <!-- Features Section -->
  <section class="features-section">
    <h3>Explore Our Services</h3>
    <div class="features-grid">
    <a href="{{ route('maintain') }}" class="feature-item">
      <div class="feature-item">
        <img src="https://via.placeholder.com/50" alt="Feature Icon">
        <h4>Service Booking </h4>
        <p>Top-notch maintenance solutions to keep your vehicle running smoothly.</p>
      </div>
    </a>



      <div class="feature-item">
        <img src="https://via.placeholder.com/50" alt="Feature Icon">
        <h4>Spare Parts</h4>
        <p>High-quality spare parts for all types of Bajaj vehicles.</p>
      </div>
      <div class="feature-item">
        <img src="https://via.placeholder.com/50" alt="Feature Icon">
        <h4>Vehicle maintain</h4>
        <p>Book your vehicle's service easily through our online platform.</p>
      </div>
      <div class="feature-item">
        <img src="https://via.placeholder.com/50" alt="Feature Icon">
        <h4>Customer Support</h4>
        <p>Get assistance with any issues or queries about our services.</p>
      </div>
    </div>
  </section>

  <!-- Footer Section -->
  <footer>
    <p>&copy; 2024 Bajaj Service Center. All rights reserved. <a href="#">Privacy Policy</a></p>
  </footer>
</body>
</html>

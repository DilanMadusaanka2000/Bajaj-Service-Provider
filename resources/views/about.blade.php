<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bajaj Services</title>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f5f5f5;
        }

        /* Main Banner Styles */
        .main-banner {
            background-color: #003366;
            color: white;
            padding: 60px 20px;
            text-align: center;
        }

        .main-banner h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        .main-banner p {
            font-size: 1.2em;
            margin-bottom: 40px;
            color: #e6e6e6;
        }

        /* Animation Keyframes */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes scaleIn {
            from {
                transform: scale(0.9);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Service Section Styles with Animation */
        .services-section {
            max-width: 1200px;
            margin: -40px auto 40px;
            padding: 0 20px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            position: relative;
        }

        .service-card {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: all 0.3s ease;
            animation: fadeInUp 0.8s ease forwards;
            opacity: 0;
        }

        .service-card:nth-child(1) {
            animation-delay: 0.2s;
        }

        .service-card:nth-child(2) {
            animation-delay: 0.4s;
        }

        .service-card:nth-child(3) {
            animation-delay: 0.6s;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 15px rgba(0, 51, 102, 0.2);
        }

        .service-card h3 {
            color: #003366;
            margin-bottom: 15px;
            font-size: 1.5em;
            animation: scaleIn 0.5s ease forwards;
            animation-delay: 0.3s;
            opacity: 0;
        }

        .service-card p {
            color: #666;
            margin-bottom: 20px;
            animation: scaleIn 0.5s ease forwards;
            animation-delay: 0.4s;
            opacity: 0;
        }

        .service-features {
            text-align: left;
            margin-top: 20px;
        }

        .service-features li {
            margin-bottom: 10px;
            color: #444;
            list-style: none;
            padding-left: 25px;
            position: relative;
            animation: slideInLeft 0.5s ease forwards;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .service-features li:nth-child(1) { animation-delay: 0.5s; }
        .service-features li:nth-child(2) { animation-delay: 0.6s; }
        .service-features li:nth-child(3) { animation-delay: 0.7s; }
        .service-features li:nth-child(4) { animation-delay: 0.8s; }

        .service-features li:before {
            content: "✓";
            color: #003366;
            position: absolute;
            left: 0;
            animation: scaleIn 0.3s ease forwards;
            animation-delay: 0.9s;
            opacity: 0;
        }

        .service-features li:hover {
            transform: translateX(5px);
            color: #003366;
        }

        /* Footer Styles */
        .footer {
            background-color: #002244;
            color: white;
            padding: 40px 20px;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .footer-section h4 {
            color: #fff;
            margin-bottom: 20px;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 10px;
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 10px;
        }

        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background-color: rgba(255, 255, 255, 0.2);
            transform: translateY(-3px);
        }

        .social-links i {
            font-size: 20px;
            color: white;
        }

        .footer-section a {
            color: #e6e6e6;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-section a:hover {
            color: #fff;
            text-decoration: underline;
        }

        .footer-bottom {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        @media (max-width: 768px) {
            .services-section,
            .footer-content {
                grid-template-columns: 1fr;
            }

            .service-card {
                margin-bottom: 20px;
            }

            .social-links {
                justify-content: center;
            }

            .main-banner {
                padding: 40px 20px;
            }

            .main-banner h1 {
                font-size: 2em;
            }
        }
    </style>
</head>
<body>
    <!-- Main Banner -->
    <div class="main-banner">
        <h1>Welcome to Bajaj Services</h1>
        <p>Your trusted partner for all Bajaj vehicle needs</p>
    </div>

    <!-- Service Cards Section -->
    <div class="services-section">
        <div class="service-card">
            <h3>Genuine Spare Parts</h3>
            <p>Original Bajaj parts with warranty</p>
            <ul class="service-features">
                <li>100% Authentic Parts</li>
                <li>Warranty Coverage</li>
                <li>Quick Delivery</li>
                <li>Installation Service</li>
            </ul>
        </div>

        <div class="service-card">
            <h3>Professional Service</h3>
            <p>Expert maintenance and repairs</p>
            <ul class="service-features">
                <li>Certified Technicians</li>
                <li>Regular Maintenance</li>
                <li>Performance Tuning</li>
                <li>Diagnostic Services</li>
            </ul>
        </div>

        <div class="service-card">
            <h3>24/7 Support</h3>
            <p>Round-the-clock assistance</p>
            <ul class="service-features">
                <li>Emergency Repairs</li>
                <li>Roadside Assistance</li>
                <li>Online Booking</li>
                <li>Customer Support</li>
            </ul>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Spare Parts</a></li>
                    <li><a href="#">Book Service</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Contact Info</h4>
                <ul>
                    <li><i class="fas fa-phone"></i> 1800-XXX-XXXX</li>
                    <li><i class="fas fa-envelope"></i> service@bajaj.com</li>
                    <li><i class="fas fa-map-marker-alt"></i> Your Location</li>
                    <li><i class="fas fa-clock"></i> Mon-Sat 9AM-6PM</li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Follow Us</h4>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 Bajaj Services. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>

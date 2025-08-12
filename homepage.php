<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>FOOTHILLS SCHOOL</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      overflow-x: hidden;
      color: white;
      background: url('homepageff.jpg') no-repeat center center fixed;
      background-size: cover;
      position: relative;
    }

    /* Admin Button */
    .admin-link {
      position: absolute;
      top: 20px;
      right: 20px;
      color: white;
      font-weight: bold;
      text-decoration: none;
      background-color: rgba(255, 0, 0, 0.7);
      padding: 6px 12px;
      border-radius: 6px;
      transition: background-color 0.3s ease;
      z-index: 10;
    }

    .admin-link:hover {
      background-color: red;
    }

    .navbar {
      position: relative;
      padding: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .logo-center {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
      margin-top: 10px;
    }

    @keyframes fadeInZoom {
      from {
        opacity: 0;
        transform: scale(0.5);
      }
      to {
        opacity: 1;
        transform: scale(1);
      }
    }

    .logo-center img {
      height: 80px;
      animation: fadeInZoom 1.2s ease forwards;
    }

    .hero {
      position: relative;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      padding: 40px;
      z-index: 1;
    }

    .hero::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(to bottom right, rgba(0, 0, 0, 0.6), rgba(20, 20, 20, 0.6));
      backdrop-filter: blur(1.5px);
      z-index: 0;
    }

    .hero-content,
    .values,
    footer {
      position: relative;
      z-index: 1;
    }

    /* Hero Animation */
    .hero-content {
      text-align: center;
      padding-top: 40px;
      opacity: 0;
      transform: translateY(50px);
      animation: slideUpFade 1s ease-out 0.5s forwards;
    }

    @keyframes slideUpFade {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .hero-content h4 {
      font-size: 28px;
      color: yellow;
      margin-bottom: 10px;
    }

    .hero-content h1 {
      font-size: 3.5em;
      margin-bottom: 30px;
    }

    .btn {
      background-color: red;
      color: white;
      padding: 15px 30px;
      border: none;
      border-radius: 8px;
      text-decoration: none;
      font-size: 18px;
      font-weight: bold;
      transition: background-color 0.5s ease;
    }

    .btn:hover {
      background-color: #b30000;
    }

    .gradient-line {
      width: 100px;
      height: 5px;
      background: linear-gradient(to right, red, orange);
      margin: 20px auto;
    }

    /* Values Section Animation */
    .values {
      display: flex;
      justify-content: space-evenly;
      align-items: stretch;
      width: 100%;
      padding: 40px 60px;
      gap: 30px;
      flex-wrap: wrap;
    }

    .value-block {
      background: rgba(0, 0, 0, 0.6);
      padding: 30px 20px;
      border-radius: 12px;
      width: 240px;
      display: flex;
      flex-direction: column;
      justify-content: flex-start;
      opacity: 0;
      transform: translateY(50px);
      animation: slideUpFade 0.8s ease forwards;
    }

    .value-block:nth-child(1) { animation-delay: 0.3s; }
    .value-block:nth-child(2) { animation-delay: 0.5s; }
    .value-block:nth-child(3) { animation-delay: 0.7s; }
    .value-block:nth-child(4) { animation-delay: 0.9s; }

    .value-block h3 {
      text-align: center;
      color: #f44336;
      font-size: 22px;
      margin-bottom: 15px;
    }

    .value-block p {
      font-size: 16px;
      line-height: 1.5;
    }

    footer {
      background-color: rgba(0, 0, 0, 0.5);
      padding: 20px;
      text-align: center;
      margin-top: 40px;
      opacity: 0;
      transform: translateY(50px);
      animation: slideUpFade 1s ease forwards;
      animation-delay: 1.0s;
    }

    footer a {
      color: red;
      text-decoration: none;
    }

    footer a:hover {
      text-decoration: underline;
    }

    @media (max-width: 1000px) {
      .hero-content h1 {
        font-size: 2.5em;
      }

      .value-block {
        width: 90%;
        margin-bottom: 20px;
      }
    }
  </style>
</head>
<body>

  <!-- Admin Button -->
  <a href="roles.html" class="admin-link">staffs</a>

  <header class="hero">

    <!-- Logo -->
    <nav class="navbar">
      <div class="logo-center">
        <img src="logo.png" alt="School Logo">
      </div>
    </nav>

    <!-- Hero Text -->
    <div class="hero-content">
      <div class="gradient-line"></div>
      <h4>FOOT HILLS SCHOOL</h4>
      <h1>A Clear Path for Potential</h1>
      <a href="loginp.php" class="btn">JOIN US</a>
    </div>

    <!-- School Values -->
    <div class="values">
      <div class="value-block">
        <h3>MIND</h3>
        <p>A strong academic foundation for independent thinking and innovation.</p>
      </div>
      <div class="value-block">
        <h3>BODY</h3>
        <p>Athletic opportunities to develop physical skills and teamwork.</p>
      </div>
      <div class="value-block">
        <h3>SPIRIT</h3>
        <p>Connecting students to a higher mission and purpose-driven life.</p>
      </div>
      <div class="value-block">
        <h3>CHARACTER</h3>
        <p>Building integrity and holding each other to the highest standards.</p>
      </div>
    </div>

    <!-- Footer -->
    <footer>
      &copy; 2025 Foothills School. All Rights Reserved. |
      <a href="PRIVACY.PHP">Privacy Policy</a> |
      <a href="terms and conditions.php">Terms of Service</a> |
      Contact: <a href="mailto:info@foothillsschool.ac.ke">info@foothillsschool.ac.ke</a>
    </footer>

  </header>

</body>
</html>

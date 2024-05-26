<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Futsal Booking Admin Dashboard</title>
  <style>
    /* CSS styling for the dashboard */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #fff;
      color: #333;
    }
    header {
      background-color: #f2f2f2;
      color: #333;
      padding: 10px;
      text-align: center;
    }
    .logo {
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 20px;
    }
    .logo img {
      max-width: 100px;
    }
    .container {
      display: flex;
    }
    .sidebar {
      background-color: #e6e6e6;
      padding: 20px;
      width: 250px;
    }
    .sidebar ul {
      list-style-type: none;
      padding: 0;
    }
    .sidebar li {
      margin-bottom: 10px;
    }
    .sidebar a {
      color: #333;
      text-decoration: none;
      display: block;
      padding: 5px;
      border-radius: 5px;
      background-color: #f2f2f2;
    }
    .sidebar a:hover {
      background-color: #ccc;
    }
    .content {
      flex-grow: 1;
      padding: 20px;
      background-color: #fff;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    .content h2 {
      margin-top: 0;
    }
    .footer {
      background-color: #f2f2f2;
      color: #333;
      padding: 10px;
      text-align: center;
    }
  </style>
</head>
<body>
  <header>
    <div class="logo">
      <img src="logo.png" alt="Futsal Booking System Logo">
    </div>
    <h1>Admin dashboard</h1>
  </header>
  <div class="container">
    <div class="sidebar">
      <h2>Menu</h2>
      <ul>
        <li><a href="admin_dashboard.php">Dashboard</a></li>
        <li><a href="Booking.php">Bookings</a></li>
        <li><a href="list of player.php">list of player</a></li>
        <li><a href="#">court</a></li>
        <li><a href="#">contact</a></li>
        <li><a href="#">logout</a></li>
      </ul>
    </div>
    <div class="content">
      <h2>Welcome to the Dashboard</h2>
      <p>Here you can manage your futsal bookings and customers.</p>
    </div>
  </div>
  <footer class="footer">
    &copy; 2023 Futsal Booking System. All rights reserved.
  </footer>
</html>
<?php
include 'connect.php';
session_start();
if (!isset($_SESSION['username']) || $_SESSION['login_status'] !== true) {
    // Redirect the user to the login page
    header("Location: login.php?err=1");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Futsal Booking Admin Dashboard</title>
    <link rel="stylesheet" href="css folder/admin-css.css">
  <style>
    /* CSS styling for the dashboard */
   /* body {
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
      border:1px solid black;
    }
    .sidebar {
      background-color: #e6e6e6;
      padding: 20px;
      width: 250px;
      border:1px solid black;
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
    */
    .top
    {
      
    }
    .dashboard {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      grid-gap: 20px;
      padding: 20px;
    }

    .card {
      background-color: #f5f5f5;
      padding: 20px;
      border-radius: 5px;
    }

    h2 {
      margin-top: 0;
    }

    p {
      margin-bottom: 0;
    }

    .card.blue {
      background-color: #2196f3;
      color: #fff;
    }

    .card.red {
      background-color: #f44336;
      color: #fff;
    }

    .card.green {
      background-color: #4caf50;
      color: #fff;
    }
  </style>
</head>
<body>
  <?php 
  require_once 'connect.php';
  $dataC=[];
  $dataP=[];
  $sql="select * from courts";
  $sql1="select*from players";
  $res=$conn->query($sql);
  $ply=$conn->query($sql1);
  
  if($res->num_rows>0){
    while($row=$res->fetch_assoc()){
      array_push($dataC,$row);
      
    
    }
    $countCourtNo=count($dataC);
  }
  if($ply->num_rows>0){
    while($row=$ply->fetch_assoc())
    {
      array_push($dataP,$row);
    }
    $countPlayerNo=count($dataP);
  }
  ?>
  <header class="top">
    <div class="logo">
      <img src="image/admin logo.jpg" alt="Futsal Booking System Logo">
    </div>
    <h1>Admin dashboard</h1>
  </header>
  <div class="container">
    <div class="sidebar">
      <h2>Menu</h2>
      <ul>
        <li><a href="admin_dashboard.php">Dashboard</a></li>
        <li><a href="schedule.php">Schedule</a></li>
        <li><a href="list of player.php">list of player</a></li>
        <li><a href="courts.php">court</a></li>
        <li><a href="#">contact</a></li>
        <li><a href="logout.php">logout</a></li>
        

      </ul>
    </div>
    <div class="content">
      <h2>Welcome to the Dashboard</h2>
      <p style="">Here is Total number of player,booking and courts</p>
    
  <div class="dashboard">
    <div class="card blue">
      <h2>list of player</h2>
      <h3>Total:<?php echo $countPlayerNo;?></h3>
     
    </div>
    <div class="card red">
      <h2>list of Schedule</h2>
      
      
    </div>
    <div class="card green">
      <h2>list of courts</h2>
      <h3>Total: <?php echo $countCourtNo;?></h3>
      
    </div>
  </div>
  </div>
  </div>
  
  
</html>
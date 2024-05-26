<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Futsal Booking player Dashboard</title>
    <link rel="stylesheet" href="css folder/admin-css.css">
</head>
<body>
  <header>
    <style>
        .content{

        }
       h2 a
        {   
            background-color:#007bff;
            color:white;
            text-decoration:none;
            padding:10px;
            
        }
        h2 a:hover
        {
            background-color:black;
            padding:10px;
        }
        table
        {   
            border-collapse: collapse;
            border:3px solid black;
            width:70%;
            height:40%;
            text-align:center;
        }
        th
        {
            background-color:#00abff                                ;
        }
        
        
        
        
    </style>
    
    
    <h1>player dashboard</h1>
  </header>
  <div class="container">
    <div class="sidebar">
      <h2>Menu</h2>
      <ul>
        <li><a href="player_dashboard.php">Dashboard</a></li>
         <li><a href="player_court.php">court</a></li>
        <li><a href="#">contact</a></li>
        <li><a href="player_logout.php">logout</a></li>
      </ul>
    </div>
    <div class="content">
      
      
      <h2>your booking</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>name</th>
            <th>price</th>
            <th>status</th>
            
            
            
        </tr>

<?php
include 'connect.php';
session_start();
if (!isset($_SESSION['username']) || $_SESSION['login_status'] !== true) {
    // Redirect the user to the login page
    header("Location: player_login.php?err=1");
    exit;
}

?>


    <br><br>
    
    </div>
    
  </div>
  

   

</body>
</html>
  
    
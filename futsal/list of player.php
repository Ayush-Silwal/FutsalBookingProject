<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Futsal Booking Admin Dashboard</title>
    <link rel="stylesheet" href="css folder/admin-css.css">
</head>
<body>
  <header>
    
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
      <h2>list of player</h2>
      
      
    <table border="1">
        <tr>
            <th>ID</th>
            <th>username</th>
            <th>Email</th>
            <th>phone</th>
            
            <th>password </th>
            
            <th>Action</th>  
            
            
        </tr>

        <?php
        include 'connect.php';

        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        
        $sql = "SELECT * FROM players";
        $result = $conn->query($sql);
        

        if ($result->num_rows > 0) {
           
            while ($row = $result->fetch_assoc()) {
              
              
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["username"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["phone"] . "</td>";
                echo "<td>" . $row["password"] . "</td>";
                // echo "<td>" . $row["cpassword"] . "</td>";
                echo "<td ><a class='edit' href='edit list of player.php?id=" . $row["id"] . "'>Edit</a> <a href='delete list of player.php?id=" . $row["id"] . "' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='10'>No records found</td></tr>";
        }

        // Close the database connection
        $conn->close();
        ?>
    </table>
    </div>
  </div>
  <style>
    table
        {   
            border-collapse: collapse;
            border:3px solid black;
            width:80%;
            height:70%;
        }
        th
        {
            background-color:#00abff;                                
        }
        td a
        {
          text-decoration:none;
          color:white;
          background-color:green;
          padding:3px 10px;
          border:1px solid black;
          align:center;

        }
        td a:hover
        {
          padding:3px 10px;
          background-color:black;
        }
        
        .edit{
          background-color:red;
        }
  </style>
  

   

</body>
</html>

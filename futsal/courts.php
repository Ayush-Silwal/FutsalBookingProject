<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Futsal Booking Admin Dashboard</title>
    <link rel="stylesheet" href="css folder/admin-css.css">
    <link rel="stylesheet" href="css folder/format.css">
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
            width:80%;
            
            
        }
        th
        {
            background-color:#00abff;  
            height:20%;                                         ;
        }
        tr{
          height:50px;
          
        }
        td a
        {
          
          text-decoration:none;
          color:white;
          background-color:green;
          padding:5px;
          border:1px solid black;
          align:center;

        }
        td a:hover
        {
          padding:5px;
          background-color:black;
        }
        
        .edit{
          background-color:red;
        }

        .delete{

        }
        
        
    </style>
    
    
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
        
        <li><a href="logout.php">logout</a></li>
      </ul>
    </div>
    <div class="content">
      
      
      <h2>List of courts:</h2>
    <table border="1">
        <tr>
            <th>court ID</th>
            <th>court name</th>
            <th>price</th>
            <th>status</th>
            <th>created</th>
            <th>updated</th>
            <th>image</th>
            <th>Action</th>
            
        </tr>

        <?php
        include 'connect.php';

        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        
        $sql = "SELECT * FROM courts";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
           
            while ($row = $result->fetch_assoc()) {
              echo "<tr>";
                  echo "<td>" . $row["id"] . "</td>";
                  echo "<td>" . $row["name"] . "</td>";
                  echo "<td>" . $row["price"] . "</td>";
                  echo "<td>" . $row["status"] . "</td>";
                   echo "<td>" . $row["created_at"] . "</td>";
                  echo "<td>" . $row["updated_at"] . "</td>";
                   echo "<td><img src='image/" . $row["image"] . "' width='40' height='40'></td>";
                   echo "<td><a class='edit' href='edit court.php?id=" . $row["id"] . "'>Edit</a>
                   <a class='delete' href='delete court.php?id=" . $row["id"] . "' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a></td>";
                  echo "</tr>"; 
               }
            
                
        } else {
            echo "<tr><td colspan='10'>No records found</td></tr>";
        }

        
        ?>
    </table>
    <br><br>
    <?php
      // Check the count of courts
      $limit = 8; // Set the desired limit
      
      if ($result->num_rows < $limit) {
          echo "<h2><a href='add court.php'>Add </a></h2>";
      } else {
          echo "<h2>Cannot add more courts the Limit reached.</h2>";
      }
      // Close the database connection
      $conn->close();
      ?>
  </div>
  </div>
  

   

</body>
</html>
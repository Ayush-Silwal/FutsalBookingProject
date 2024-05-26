
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
            height:85%;
            text-align:center;
        }
        th
        {
            background-color:#00abff                                ;
        }
        td a
        {
          text-decoration:none;
          color:white;
          background-color:red;
          
          border:2px solid black;

        }
        .available
        {
          padding:4px 10px;
          font-size:20px;
          background-color: green ;
        }
        .available:hover
        {
          padding:5px 10px;
          font-size:20px;
          background-color:#006400;
        }
        .not
        {
          background-color:grey;
          padding:4px 10px;
          font-size:20px;
        }
        .not:hover
        {
          padding:5px 10px;
          font-size:20px;
          background-color:black;
        }
        .book{
          background-color:red;
          padding:5px 10px;
          font-size:20px;

        }
        .book:hover
        {
          padding:5px 10px;
          font-size:20px;
          background-color:black;
        }
        .unbook{
          padding:5px 10px;
          font-size:20px;

        }
        .unbook:hover{
          background-color:grey;

        }
        a{
          
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
      
      
      <h2>List of courts:</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>name</th>
            <th>price</th>
            <th>status</th>
            <th>time</th>
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
              if($row['status']=='available'){
              echo "<td><a class='available' href='player_booking.php?id=" . $row["id"] . "&time=9am-10am'>9:00am-10:00am</a><a class='available' href=''>11am-12pm</a><a class='available' href=''>12pm-1pm</a></td>";

              }
              else if($row['status']=='not available'){
                echo "<td><a class='not' href=''>book</a></td>";
              }
              else{
                echo "<td><a class='unbook' href=''>book</a></td>";
              }
              echo "</tr>"; 
              
                  }
        } else {
            echo "<tr><td colspan='10'>No records found</td></tr>";
        }
      
        // Close the database connection
        $conn->close();
        ?>
    </table>
    <br><br>
    
    </div>
    
  </div>
  

   

</body>
</html>
  
    
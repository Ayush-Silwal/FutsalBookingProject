<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username']) || !$_SESSION['login_status']) {
    header("Location: user_login.php");
    exit;
}

// Include database connection
include 'connect.php';

// Check database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$courtID = $_GET['id'];

// Fetch court data
$sql = "SELECT * FROM courts WHERE courtID = $courtID";
$result = $conn->query($sql);

 if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
       
        $row["courtID"];
        $row["courtname"];
       $row["price"];
       $row["status"];
      
       
        
        } else {
            echo "Error fetching records: " . $conn->error;
        }
        // Check if the form is submitted

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bookingUsername = $_SESSION['username'];
    $courtID=$row['courtID'];
    $courtname = $row['courtname'];
    $price = $row['price'];
    $status = 'pending';
    
    $timeinterval=$_POST['timeinterval'];
   
    

    // Insert booking data into booking table
    $insertSql = "INSERT INTO booking (username,courtID,courtName,price, status,timeinterval)
                  VALUES ('$bookingUsername','$courtID','$courtname','$price', '$status','$timeinterval')";
    if ($conn->query($insertSql) === TRUE) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Update the value 
    $row["status"] ="pending";
    $row["updated_at"]=date("Y-m-d H:i:s");
    $booked_at=$row["booked_at"];
    // Update the value in the database
    $updateSql = "UPDATE courts SET status = 'pending',updated_at = now() WHERE courtID = $courtID";
    }
    }
    if ($conn->query($updateSql) === TRUE) {
        header("Location: player_dashboard.php?id1=" . $courtID);
    } else {
        echo "Error booking court: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    
</head>
<body>
    <h2>Booking:</h2>
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id=" . $courtID); ?>" class="booking-form">
    <label class="booking-label">Username: <?php echo $_SESSION['username']; ?></label><br><br>
    <label class="booking-label">Name: <?php echo $row["courtname"]; ?></label><br><br>
    <label class="booking-label">Price: <?php echo $row["price"]; ?></label><br><br>
    <label class="booking-label">Status: <?php echo $row["status"]; ?></label><br><br>
    
    <select name="timeinterval" class="booking-input" id="time">
        <option value="30 min">30 min</option>
        <option value="1 hour">1 hour</option>
        <option value="2 hour">2 hour</option>
        <option value="All day">All day</option>
    </select><br><br>
    <input type="submit" class="booking-btn" name="BtnUpload" value="Book">
</form>
    
    <style>
        
    .booking-container {
    text-align:center;
    
    margin: 0 auto;
    padding: 20px;
    background-color: #f7f7f7;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Style form headings */
.booking-heading {
    font-size: 24px;
    margin-bottom: 15px;
}

/* Style form labels */
.booking-label {
    font-weight: bold;
}

/* Style form inputs and select */
.booking-input {
    width: 10%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

/* Style form button */
.booking-btn {
    display: block;
    width: 10%;
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    
    transition: background-color 0.3s ease;
}

.booking-btn:hover {
    background-color: #0056b3;
}
    </style>
</body>
</html>


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
$time = isset($_GET['time']) ? $_GET['time'] : '';


// Fetch court data
$sql = "SELECT * FROM courts WHERE id = $courtID";
$result = $conn->query($sql);

 if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
       
        $row["id"];
        $row["name"];
       $row["price"];
       $row["status"];
       $row["time"];
       
        
        } else {
            echo "Error fetching records: " . $conn->error;
        }
        // Check if the form is submitted

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bookingUsername = $_SESSION['username'];
    $courtname = $row['name'];
    $price = $row['price'];
    $status = 'booked';
    $bookingTimestamp = date("Y-m-d H:i:s");
    

    // Insert booking data into booking table
    $insertSql = "INSERT INTO book_details(name, price, status, booked_at,time)
                  VALUES ('$courtname', $price, '$status', '$bookingTimestamp','$time')";
    if ($conn->query($insertSql) === TRUE) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Update the value 
    $row["status"] ="booked";
    $row["updated_at"]=date("Y-m-d H:i:s");
    
    // Update the value in the database
    $updateSql = "UPDATE courts SET status = 'booked',updated_at = now() WHERE id = $courtID";
    }
    }
    if ($conn->query($updateSql) === TRUE) {
        header("Location: player_dashboard.php?id=" . $courtID);
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
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id=" . $courtID); ?>">
        Username: <?php echo $_SESSION['username']; ?><br><br>
        Name: <?php echo $row["name"]; ?><br><br>
        Price: <?php echo $row["price"]; ?><br><br>
        Status: <?php echo $row["status"]; ?><br><br>
        Booked At: <?php echo $row["updated_at"]; ?><br><br>
        time:<?php echo $time; ?><br><br>

        <input type="submit" name="BtnUpload" value="Book">
    </form>
</body>
</html>
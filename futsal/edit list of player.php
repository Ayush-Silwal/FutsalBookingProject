<!DOCTYPE html>
<html>
<head>
    <title>Edit list of player</title>
</head>
<body>
    <?php
    

    // Create connection
    $conn = new mysqli('localhost', 'root','', 'player_db');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the record ID from the query string
    $id = $_GET['id'];

    // Fetch the record from the database
    $sql = "SELECT*FROM players WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "Record not found.";
        exit;
    }

    // Function to sanitize input data
    function sanitize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Update record in the database
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = sanitize($_POST["username"]);
        $email = sanitize($_POST["email"]);
        $phone = sanitize($_POST["phone"]);
       
        

        // Update the record in the database
        $updateSql = "UPDATE players SET username='$username', email='$email', phone='$phone' WHERE id=$id";

        if ($conn->query($updateSql) === TRUE) {
            echo "Record updated successfully.";
            $row['useranme'] = $username;
            $row['email'] = $email;
            $row['phone'] = $phone;
            header('location:list of player.php');
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    
    $conn->close();
    ?>

    <h2>Edit Record:</h2>
    <a href="list of player.php">List Of Data</a>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id=" . $id); ?>">
        username: <input type="text" name="username" value="<?php echo $row['username']; ?>"><br><br>
        email: <input type="text" name="email" value="<?php echo $row['email']; ?>" ><br><br>
        phone:<input type="number" name="phone" value="<?php echo $row['phone']; ?>" ><br><br>
        <br><br>
       
        
        <input type="submit" name="submit" value="Update">
    </form>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Record</title>
</head>
<body>
    <?php
    

    // Create connection
    include 'connect.php';
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the record ID from the query string
    $id = $_GET['id'];

    // Fetch the record from the database
    $sql = "SELECT * FROM courts WHERE id = $id";
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
        $name = sanitize($_POST["name"]);
        $rank = sanitize($_POST["price"]);
        $status = sanitize($_POST["status"]);
        $createdby = sanitize($_POST['created_at']);
        $updatedby = sanitize($_POST['updated_at']);
        

        // Update the record in the database
        $updateSql = "UPDATE tbl_data SET name='$name', rank='$rank', status='$status', created_by='$createdby',updated_by='$updatedby',updated_at = NOW() WHERE id=$id";

        if ($conn->query($updateSql) === TRUE) {
            echo "Record updated successfully.";
            $row['name'] = $name;
            $row['rank'] = $rank;
            $row['status'] = $status;
            $row['updated_at'] = date("Y-m-d H:i:s");
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    
    $conn->close();
    ?>

    <h2>Edit Record:</h2>
    <a href="lab 5 L1 list.php">List Of Data</a>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id=" . $id); ?>">
        Name: <input type="text" name="name" value="<?php echo $row['name']; ?>"><br><br>
        Rank: <input type="text" name="rank" value="<?php echo $row['rank']; ?>" ><br><br>
        Status: <input type="text" name="status" value="<?php echo $row['status']; ?>"><br><br>
        Created By: <input type="text" name="created_by" value="<?php echo $row['created_by']; ?>"><br><br>
        Updated By: <input type="text" name="updated_by" value="<?php echo $row['updated_by']; ?>"><br><br>
        Created At: <input type="text" name="created_at" value="<?php echo $row['created_at']; ?>"><br><br>
        Updated At: <input type="text" name="updated_at" value="<?php echo $row['updated_at']; ?>"><br><br>
        
        <input type="submit" name="submit" value="Update">
    </form>
</body>
</html>

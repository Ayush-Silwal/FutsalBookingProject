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
    $sql = "SELECT*FROM courts WHERE id = $id";
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
        $price = sanitize($_POST["price"]);
        $status = sanitize($_POST["status"]);
        // $createdAt = sanitize($_POST['created_at']);
        // $updatedAt = sanitize($_POST['updated_at']);
        

        // Update the record in the database
        $updateSql = "UPDATE courts SET name='$name', price='$price', status='$status',updated_at = NOW() WHERE id=$id";
        //validation
        if(isset($_POST['BtnUpload'])){
        if(isset($_POST['name']) && !empty($_POST['name'])){
            $name = $_POST['name'];
        }
        else{
            $err['name'] = 'Enter name';
        }
        if(isset($_POST['price']) && !empty($_POST['price'])){
            $price = $_POST['price'];
        }
        else{
            $err['price'] = 'Enter price';
        }
        if(isset($_POST['status']) && !empty($_POST['status'])){
            $status = $_POST['status'];
        }
         else{
          $err['status'] = 'Enter status ';
        }
        
        if ($conn->query($updateSql) === TRUE) {
            echo "Record updated successfully.";
            $row['name'] = $name;
            $row['price'] = $price;
            $row['status'] = $status;
            $row['updated_at'] = date("Y-m-d H:i:s");
            header('location:courts.php');
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
}

    
    $conn->close();
    ?>

    <h2>Edit Record:</h2>
    <a href="courts.php">List Of Data</a>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id=" . $id); ?>">
        Name: <input type="text" name="name" value="<?php echo $row['name']; ?>"><br><br>
        Price: <input type="text" name="price" value="<?php echo $row['price']; ?>" ><br><br>
        Status:<select name="status">
            <option name="available">available</option>
            <option name="not available">not available</option>
            <option name="booked">booked</option>
        </select>
        <br><br>
        Updated At: <input type="text" name="updated_at" value="<?php echo $row['updated_at']; ?>"><br><br>
        
        <input type="submit" name="BtnUpload" value="Update" >
    </form>
</body>
</html>

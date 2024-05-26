<?php
    $courtname = $rank = $status =$image= '';
    
    if(isset($_POST['BtnUpload'])){
        $err = [];
        if(isset($_POST['courtname']) && !empty($_POST['courtname'])){
            $courtname = $_POST['courtname'];
        }
        else{
            $err['courtname'] = 'Enter courtname';
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
        if ($_FILES['image']['name']) {
            $image = $_FILES['image']['name'];
            $temp_name = $_FILES['image']['tmp_name'];
            $target_path = "image/";
            $target_path = $target_path . basename($image);
            move_uploaded_file($temp_name, $target_path);
        } else {
            $err['image'] = "Choose Image";
        }

        

        if (count($err) == 0) {
            try{
              include 'connect.php';
              $sql = "INSERT INTO courts (name, price, status, created_at, updated_at, image) VALUES ('$courtname', '$price', '$status', NOW(), NOW(), '$image')";

              $conn->query($sql);
              if ($conn->affected_rows == 1 && $conn->insert_id > 0 ) {
                echo "DATA inserted success";
                header('location:courts.php');
              }
            }
            catch(Exception $e){
               die('Database  Error : ' .$e->getMessage());
            }
          }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css folder/crud css.css">
    
    <title>Add Courts</title>
</head>
<body>
    <div class="container">
        <h2>Enter court details:</h2>
        
        <form method="post" action="<?php echo ($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="courtname">Name:</label>
                <input type="text" name="courtname" ><?php echo (isset($err['courtname'])?$err['courtname']:'')?> <br><br>
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" name="price" ><?php echo (isset($err['price'])?$err['price']:'')?><br><br>
            </div>
            <div class="form-group">
            Image: <input type="file" name="image"><?php echo (isset($err['image'])?$err['image']:'')?><br><br>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status">
                    <option value="available">available</option>
                    <option value="not available">not available</option>
                </select>
                <?php echo (isset($err['status'])?$err['status']:'')?><br><br>
            </div>

            <input type="submit" name="BtnUpload" value="Submit">
        </form>
    </div>
</body>
</html>

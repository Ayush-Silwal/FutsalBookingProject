<?php 
$id = $_GET['id'];

try{
  include 'connect.php';
  
  $sql = "delete from players where id=$id";
  $conn->query($sql);
  if ($conn->affected_rows == 1 ) {
    echo "User delete success";
  }
  header('location:list of player.php?action=1');
}
catch(Exception $e){
   die('Database  Error : ' .$e->getMessage());
}
 ?>
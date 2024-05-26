<?php
$conn=new mysqli('localhost','root','','player_db');

if(!$conn){
    die(mysqli_error($conn));
}

?>

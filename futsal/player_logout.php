<?php 
session_start();
session_destroy();
//remove cookie
setcookie('username',null,time()-1);
header('location:player_login.php');
 ?>
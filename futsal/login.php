<?php 
// //cookie
// if (isset($_COOKIE['username'])) {
//   session_start();
//   $_SESSION['username'] =  $_COOKIE['username'];
//   $_SESSION['login_status'] = true;
//   header('location:dashboard.php');
// }


$username = '';
if (isset($_POST['btnLogin'])) {
  $err  = [];
  if (isset($_POST['username']) && !empty($_POST['username']) && trim($_POST['username'])) {
    
      $username =  $_POST['username'];
    }
   else {
    $err['username'] =  'Enter username';
  }

  if (isset($_POST['password']) && !empty($_POST['password']) && trim($_POST['password'])) {
    $password = $_POST['password'];
  } else {
    $err['password'] =  'Enter password';
  }
  

  if(count($err) == 0){
    
    
    if ($username == "futsal123" && $password == "12345") {
      
      //check remember me section
      if (isset($_POST['remember'])) {
        setcookie('username',$username,time()+7*24*60*60);
      }
      //start session
      session_start();
      //store username into session
      $_SESSION['username'] =  $username;
      $_SESSION['login_status'] = true;
      header('location:admin_dashboard.php');
    }
     else {
       $msg='Login Failed';
    
  
  
}
  
}
}

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="general1.css">
</head>
<body>
    
    <div class="header">
        <img src="image/logo.png" alt="Logo">
        <b><h1>Admin login page</h1></b>
        <h2> Log in </h2>
    </div>
    <?php if (isset($msg)) {?>
    <p class="error_message"> <?php echo $msg; }?></p>
    <?php if (isset($_GET['err']) && $_GET['err']==1) {?>
     <p class="error_message">Please login in</p> 
     <?php }?>
    
    
     
      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo isset($username)?$username:'' ?>"  />
        <p style="color:red;"><?php echo (isset($err['username'])?$err['username']:''); ?></p>
       
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"  >
        <p style="color:red;"><?php echo (isset($err['password'])?$err['password']:''); ?></p>
       
        
        <input type="checkbox" name="remember">remember me 
        <br><br>    
        <input type="submit" value="Log In" name="btnLogin" value="Login">
        

      </form>
    <style>
        body
        {
          color:blue;
        }
        form {
          max-width: 400px;
          margin: 0 auto;
          font-family: Arial, sans-serif;
          background-color: #f2f2f2;
          padding: 20px;
          border-radius: 5px;
          box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }
      
        label {
          display: block;
          margin-bottom: 10px;
          font-weight: bold;
        }
        /*select{
          width:50%;
          margin-bottom: 20px;
          padding-bottom:10px;
        }*/
      
        input[type="text"],
        input[type="password"]
         {
          width: 100%;
          padding: 10px;
          
          margin-bottom: 10px;
          border: 1px solid #ccc;
          border-radius: 5px;
          box-sizing: border-box;
          font-size: 14px;
        }
        
      
        input[type="submit"] {
          background-color: #4CAF50;
          color: #fff;
          padding: 10px 20px;
          border: none;
          border-radius: 5px;
          cursor: pointer;
          font-size: 16px;
        }
      
        input[type="submit"]:hover {
          background-color: #45a049;
        }

        .header {
          text-align: center;
          margin-bottom: 20px;
        }
        
        .header img {
          height: 100px;
          width: auto;
        }

        .forgot-password {
          text-align: center;
          margin-top: 10px;
        }
        /*
        .forgot-password a {
          color: #777;
          text-decoration: none;
        }*/
        .error_message
        {
          position:relative;
          left:45%;
          background-color:red;
          padding:10px;
          text-align:center;
          width:10%;
          color:white;
        }
        input[type="radio"]
        {
          color:green;
        }
      
    </style>
    
</body>
</html>

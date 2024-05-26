<?php
include 'connect.php';
if(isset($_POST['submit'])){
	$username=$_POST['username'];
  $phone = $_POST['phone'];
	$email = $_POST['email'];
	 $password = md5($_POST['password']);
 $cpassword = $_POST['cpassword'];
	
	
	

	$sql="insert into `players` (username,email,phone,password)
	values('$username','$email','$phone','$password')";
	$result=mysqli_query($conn,$sql);
	if($result){
		header('location:player_login.php');
	} else{
		die(mysqli_error($conn));
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="general1.css">
</head>


    <style>
      .error{
        color:red;
      }
        body{
          background-color:#9b59b6;
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
          margin-bottom: 15px;
          font-weight: bold;
          color:purple;
        }
      
        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="phone"] {
          width: 100%;
          padding: 10px;
          margin-bottom: 10px;
          border: 1px solid #ccc;
          border-radius: 5px;
          box-sizing: border-box;
          font-size: 14px;
        }
      
        input[type="radio"] {
          
          margin-top: 5px;
          margin-right: 10px;
          
        }
      
        #gender {
          display: flex;
          align-items: center;
        }
      
        #gender label {
          margin-right: 10px;
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
      
        input[type="button"]:hover {
          background-color: #45a049;
        }

        .header {
          text-align: center;
          margin-bottom: 10px;
        }
        
        .header img {
          height: 80px;
          width: auto;
        }
        select{
            width:50%;
            padding-bottom:10px;
      }
    </style>
</head>
<body>
    <div class="header">
       <img src="image/logo.png" alt="Logo">
        <b><h2>Futsal booking</h2></b>
        <h3> Sign up </h3>
        <h4> It’s quick and easy.</h4>
    </div>

    <form method="post"  name="register" id="register" >
        <label>Username</label>
        <input type="text" name="username">
        <span id="error_username" class="error"></span>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email"  >
        <span id="error_email" class="error"></span>
        <label for="phone">phone:</label>
        <input type="phone" id="phone" name="phone" >
        <span id="error_phone" class="error"></span>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" >
        <span id="error_password" class="error"></span>
         <label for="password">Confirm Password:</label>
       <input type="password" id="cpassword" name="cpassword" >
        <span id="error_cpassword" class="error"></span>  
        
      </div>
        
      <div id="sign">
        <br>
        <input type="submit" value="register" name="submit" onclick="return checkRegisterForm()">
      </div>
      
      <p style="font-family:bold;font-size:20px;color:black;">already have an account?<a style="color:red;text-decoration:none;" href="player_login.php">login now</a></p>
    </form>
</body>
<script>
  function checkRegisterForm()
  {
  let registerForm = document.forms.register;
  let username = registerForm.username.value.trim();
  let email=registerForm.email.value.trim();
  let phone = registerForm.phone.value.trim();
  let password = registerForm.password.value.trim();
  let cpassword=registerForm.cpassword.value.trim();
  let usernamepattern = /^([a-zA-Z][a-z0-9]{7,19})$/;
  let emailpattern=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  let phonepattern=/^([9][7-8][0-9]{8})$/;
  let passwordpattern=/^([a-zA-Z0-9]{8,20})$/;

  
  if (username == '') {
    // alert('Enter username');
    document.getElementById('error_username').innerText = 'Enter username';
    registerForm.username.style.border = "1px solid red";
    registerForm.username.focus();
    return false;
  } else if(username.length < 8) {
    document.getElementById('error_username').innerText = 'Username must be 8 character';
    registerForm.username.style.border = "1px solid red";
    registerForm.username.focus();
    return false;
  } else if(!usernamepattern.test(username)) {
    document.getElementById('error_username').innerText = 'Username must be valid (a-z,0-9)';
    registerForm.username.style.border = "1px solid red";
    registerForm.username.focus();
    return false;
  }
  else {
    document.getElementById('error_username').innerText = '';
    registerForm.username.style.border = "3px solid green";
  }
  //email
  if (email == '') {
    // alert('Enter email');
    document.getElementById('error_email').innerText = 'Enter email';
    registerForm.email.style.border = "1px solid red";
    registerForm.email.focus();
    return false;
  } 
   else if(!emailpattern.test(email)) {
    document.getElementById('error_email').innerText = 'email must be valid form like "name@gmail.com"';
    registerForm.email.style.border = "1px solid red";
    registerForm.email.focus();
    return false;
  }
  else {
    document.getElementById('error_email').innerText = '';
    registerForm.email.style.border = "3px solid green";
  }
  
  //phone
  if (phone == '') {
    document.getElementById('error_phone').innerText = 'Enter Phone';
    registerForm.phone.style.border = "1px solid red";
    registerForm.phone.focus();
    return false;
  } else if(!phonepattern.test(phone)) {
    document.getElementById('error_phone').innerText = 'Phone must be 10 digit starting with 98';
    registerForm.phone.style.border = "1px solid red";
    registerForm.phone.focus();
    return false;
  } else {
    document.getElementById('error_phone').innerText = '';
    registerForm.phone.style.border = "3px solid green";
    
  }
  //password
  if (password == '') {
    document.getElementById('error_password').innerText = 'Enter password';
    registerForm.password.style.border = "1px solid red";
    registerForm.password.focus();
    return false;
  }
  else if(!passwordpattern.test(password))
  {
    document.getElementById('error_password').innerText='password must be within 8 to 20 ';
    registerForm.password.style.border="1px solid red";
    registerForm.password.focus();
    return false;
  }
  else {
    document.getElementById('error_password').innerText = '';
    registerForm.password.style.border = "3px solid green";
    
  }
  //confirm password
  if(cpassword=='')
  {
    document.getElementById('error_cpassword').innerText='enter confirm password';
    registerForm.cpassword.style.border="1px solid red";
    registerForm.cpassword.focus();
    return false;
    }
    else if(cpassword!=password)
    {
      document.getElementById('error_cpassword').innerText='repassword must be same';
    registerForm.cpassword.style.border="1px solid red";
    registerForm.cpassword.focus();
    return false;
    }
    else{
    document.getElementById('error_cpassword').innerText = '';
    registerForm.cpassword.style.border = "3px solid green";
    }
    
  
  
  }

  

  </script>
</html>
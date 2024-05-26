<!DOCTYPE html>
<html>
<head>
  <div class="img">
    
  
  <title>Futsal Booking System</title>
  
  
  
</head>


  
    <h1>Futsal Booking System </h1>
    
    <div class="home">
    
    <header class="ft">
       <nav>
      <ul>
        <li><a href="home page.php">Home</a></li>
        <li><a href="contact us.php">Contact us</a></li>
        <li><a  href="About.php">About us</a></li>
        <li><a href="login.php"class="admin">Admin login</a></li>
        
        <li><a href="player_login.php" class="log">login</a></li>
        
      </ul>
    </nav>
</div>

  </header>

  <body>
    
    <p class="line">wanna play futsal sign up and book your fustal now<a href="signUp.php" class="sign">Sign up</a></p>
 <style>
  *
  {
    padding:0px;
    margin:0px;
  }
  .img
  {

    width:100%;
    height:100vh;
    background-image:linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)),url(image/ball.jpg);
    background-size: cover;
    background-position: center;
  }
  body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}
.ft
{

  float:right;
  width:50%;
  margin:auto;
  padding:35px 0;
  display:flex;
  align-items:center;
  justify-content:space-between;

}
.ft  ul li  
{

  display: inline-block;
  margin-right:40px;
}
.ft ul li a::after{
        color:red;
        content:'';
        height:3px;
        width:0;
        background:#009688;
        postion:absolute;
        left:0;
        bottom:-10px;
      transition: 0.5s;
}

.ft ul li a:hover::after
{
  width:100%;
}
h1
{
  font-size: 50px;
  color:white;
  font-family: bold;
}

header {
  
  color: #fff;
  padding: 20px;
}

header h1 {
  margin: 0;
}

nav ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}


nav ul li a {
  color: #fff;
  text-decoration: none;
}



.admin
  {
    position:relative;
      
    
    padding:10px;
    color:white;
    

  }
  .admin:hover
  {
    background-color: lightcoral;
      transition: border-bottom 1s,  background-color 1s;
  }
  
  
  .sign{
    
    position:relative;
    background-color: red;
     
    margin-left:10px;
      padding:10px;
   color:white;
   text-decoration: none;
    
  }
  .sign:hover{
    background-color: darkolivegreen;
  }


  
  .log
  {
    position:relative;
     
    padding:10px;
    color:white;
    

  }
  .log:hover
{
  background-color: lightblue;
      transition: width 1s, height 1s, background-color 1s;
}
.line{
  width:100%;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 50vh;
  margin: 0;
  font-size: 30px;
  color:white;

  
}

 </style>
      

</body>

<!-- <head>
  <title>Futsal Booking System</title>
  <link rel="stylesheet" type="text/css" href="general1.css">
  
  
</head>


  <header>
    <h1>Futsal Booking System </h1>
    
    <div class="home">
    
    
       <nav>
      <ul>
        <li><a href="home page.php">Home</a></li>
        <li><a href="contact us.php">Contact us</a></li>
        <li><a  href="About.php">About us</a></li>
        <li><a href="SignUp.php"class="sign">sign up</a></li>
        <li><a href="login.php" class="log">login</a></li>
        
      </ul>
    </nav>
</div>
  </header>

  <body>
  
    <img src="image/futsal booking.jpg" width="100%" height="100%" alt="logo">

 <style>
  .log
  {
    position:relative;
      left:70%;
    background-color:blue;
    padding:10px;
    color:white;
    

  }
  .log:hover
{
  background-color:#000;
}
  .sign{
    
    position:relative;
      left:68%;
      background-color:red;
      padding:10px;
   color:white;
    
  }
  .sign:hover
{
  background-color:#000;
}
 </style>
      
</body> -->


  
</html>

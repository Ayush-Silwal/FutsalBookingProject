<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <h2>Register</h2>
</head>
<body>
    
        <form action="" method="post">
    <div class="container">
        <label for="first name">First name</label>
        <input type="text" name="first name" id="first name">
    </div>
    <div class="container">
        <label for="last name">last name</label>
        <input type="text" name="last name" id="last name">
    </div>
    <div class="container">
        <label for="phone">phone</label>
        <input type="number" name="phone" id="phone">
    </div>
    <div class="container">
        <label for="email"></label>
        <input type="email" name="email" id="email">
    </div>
    <div class="container">
        <label for="gender">gender</label>
        <input type="radio" name="gender" value="male">male
        <input type="radio" name="gender" value="female">female
    </div>
    <div class="container">
        <input type="submit" name="register" value="register">
        <input type="reset" name="clear" value="clear">
    </div>
    </form>
    </div>
    <style>
        *
        {
            padding:0;

        }
        body{
            text-align:text;
            width:50%;
        }
        div{
            padding-bottom:10px;
            display:flex;
            

        
        } 
        input [type=radio],input[type=checkbox]{
            width:50%;
            height:auto;
        }  
		input[type=submit],input[type=reset]{
            width:10%;
			background-color:blue;
			color:white;
            padding :20px;
        }
		input[type=reset]
		{
			background-color:red;
		}      
    </style>
</body>
</html>
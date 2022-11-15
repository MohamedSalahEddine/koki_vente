<?php
    include('connection.php');
    include('functions.php');
    include('student.php');

    if( isset($_POST['email']) && 
        isset($_POST['psw'])){
            $email= $_POST['email'];
            $psw=$_POST['psw'];
            $auth = authentify($email, $psw, $connection);
            if(!$auth){
              echo "<h1><mark>email or password incorrect !</mark><h1>";
              header('Refresh: 3; url=sign_in.php');
            }else{
              header('Location: index.php');
            }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style_auth.css">
    <title>Document</title>
</head>
<body>
<form action="#" method="POST" style="border:1px solid #ccc">
  <div class="container">
    <h1>Log In</h1>
    <p>Please fill in this form to Log In</p>
    <hr>

   

    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

   
    <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>

    <p>You don't have an acccount ? click <a href="sign_up.php" style="color:dodgerblue">here</a> to create one.</p>

    <div class="clearfix">
      <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn">Sign Up</button>
    </div>
  </div>
</form>
</body>
</html>
<?php
    include('connection.php');
    
    include('functions.php');

    if( isset($_POST['email']) && 
        isset($_POST['psw']) &&
        isset($_POST['psw-repeat'])&&
        isset($_POST['first_name']) && 
        isset($_POST['last_name']) ){
            $first_name= $_POST['first_name'];
            $last_name= $_POST['last_name'];
            $email= $_POST['email'];
            $psw=$_POST['psw'];
            $psw_repeat=$_POST['psw-repeat'];
            $psw_hached = sha1($psw);

            if(in_array($email, get_emails($connection))){
              echo "<h1><mark>email already exists</mark><h1>";
              header('Refresh: 3; url=sign_up.php');
            }else if(!validate_password($psw)){
              echo "<h1><mark>Password too short</mark><h1>";
              header('Refresh: 3; url=sign_up.php');
            }else if($psw_repeat != $psw){
              echo "<h1><mark>Please make sure the two passwords are indettical!</mark><h1>";
              header('Refresh: 3; url=sign_up.php');
            }else{
              $stmt = $connection->prepare("INSERT INTO users(first_name, last_name, email, password, sign_up_date, role) VALUES (?, ?, ?, ?, NOW(), 'guest')");
              $stmt->bind_param("ssss", $first_name, $last_name, $email, $psw_hached);
              $stmt->execute();
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
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="first_name"><b>Last Name</b></label>
    <input type="text" placeholder="Enter First Name" name="first_name" required>

    <label for="last_name"><b>First Name</b></label>
    <input type="text" placeholder="Enter Last Name" name="last_name" required>

    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>

    <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>

    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn">Sign Up</button>
    </div>
  </div>
</form>
</body>
</html>
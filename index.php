<?php
session_start();
if(isset($_SESSION['authorized'])) {
    header('location:admin.php');
    die();
} else if( isset($_COOKIE['remember']) ) {
    header('location:admin.php');
    die();
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="style/index.css">
</head>
<body>
    
<form action="checkData.php" method="post" id="sign_in">
    <input type="text" name="userName" placeholder="User name" spellcheck="false">
    <input type="password" name="password" placeholder="Password" spellcheck="false">
    <input type="checkbox" name="remember" value="1">
    <input type="submit" value="Sign In">
    <p></p>
</form>

</body>
</html>




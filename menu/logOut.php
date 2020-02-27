<?php
session_start();

unset($_SESSION['authorized']);
if(isset($_COOKIE['remember'])) {
    setcookie('remember',null,-1,'/');
}
header("location: $domain/index.php");
?>
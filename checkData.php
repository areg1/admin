<?php
session_start();
include("backToIndex.php");
include('conf/connectAdmin.php');

$email = $_POST['userName'];
$password = md5($_POST['password']);

$query = $db->query("SELECT * FROM `admin` WHERE `email` = '$email' AND `password` = '$password'");
if(mysqli_num_rows($query) > 0){
    $_SESSION['authorized'] = true;
    if($_POST['remember'] == '1') {
       setcookie('remember',true,time() + (24*3600*365),'/');
    }
    header('location:admin.php');
} else {
    header('location:index.php');
}
?>
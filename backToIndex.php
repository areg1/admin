<?php
session_start();
$domain = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]"; 
if( !isset($_SESSION['authorized']) && !isset($_COOKIE['remember'])) {
    header("location: $domain/index.php");
}
?>
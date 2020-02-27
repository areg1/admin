<?php
$db = @new mysqli("localhost","root","","admin");

if($db -> connect_error){
	die('<span style="color: red"> Error</span>');
}
else{
	mysqli_set_charset($db,'utf8');
}
?>

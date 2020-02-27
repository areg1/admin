<?php
include('conf/connectAdmin.php');
include("backToIndex.php");

$table = $_POST['fileName'];
$fieldCategory = $_POST['fieldCategory'];
$lineId = $_GET['id'];
$fieldValue = $_POST['fieldValue'];

foreach ($fieldCategory as $key => $value) {

    $query = $db->query(" UPDATE `$table` SET `$value`='$fieldValue[$key]' WHERE `id`='$lineId' ");
}
 
header('location:'.$_SERVER['HTTP_REFERER']);
?>
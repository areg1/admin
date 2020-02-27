<?php
include('conf/connectAdmin.php');
include("backToIndex.php");

$lineId = $_GET['d'];
$table = $_GET['n'];
$countLine = $_GET['c'];


$query = $db->query(" DELETE FROM `$table` WHERE `id`='$lineId' ");

$lineId++;

for ($i = $lineId; $i <= $countLine; $i++) {
    $j = $i - 1;
    $query = $db->query(" UPDATE `$table` SET `id`='$j' WHERE `id`='$i' ");
}

header('location:'.$_SERVER['HTTP_REFERER']);
?>
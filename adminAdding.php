<?php

include('conf/connectAdmin.php');

    $name = $_POST['name'];
    $lastName =  $_POST['lastName'];
    $email =  $_POST['email'];
    $password =  md5( $_POST['password'] );
    $phoneNumber =  $_POST['phoneNumber'];

    if( $name != '' && $lastName != '' && $email != '' && $password != '' && $phoneNumber != '' ) {

        $forId = $db->query( "SELECT `id` FROM `admin` ");
        $countLine = mysqli_num_rows($forId);
        $id = $countLine + 1;

        $insert = $db->query(" INSERT INTO `admin` (`id`, `name`, `lastName`, `email`, `phoneNumber`, `password`) VALUES ('$id','$name','$lastName','$email','$phoneNumber','$password') ");
    }

header('location:admin.php');

?>
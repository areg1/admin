<?php 
include("backToIndex.php");
include('conf/connectAdmin.php');

$slashCount = substr_count($_SERVER['PHP_SELF'],'/') - 1;

for($i = 0; $i < $slashCount; $i++) {
    $exits .= '../';
}

$updateDbPath = $exits.'updateDb.php';
$deleteFieldDbPath = $exits.'deleteFieldDb.php';

$fileName = basename($_SERVER["SCRIPT_FILENAME"], '.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/menu.css">
    <link rel="stylesheet" href="style/admin.css">
    <link rel="stylesheet" href="style/addAdmin.css">
    <link rel="stylesheet" href="style/table.css">
</head>
<body>
    <?php include('menu/menu.php'); ?>

    <div id="btnAdd">Add admin</div>

    <div id="add">
        <div id="closeAdd"></div>
        <span id="add_category">
           <form action="adminAdding.php" method="post">
                <input class="form-control" type="text" name="name" placeholder="Admin name">
                <input class="form-control" type="text" name="lastName" placeholder="Admin last name">
                <input class="form-control" type="text" name="email" placeholder="Email">
                <input class="form-control" type="text" name="phoneNumber" placeholder="Phone number">
                <input class="form-control" type="password" name="password" placeholder="Password">   
                <button type="submit">Add</button>
           </form>
        </span>
    </div>

    <div id="work">

        <div id="on_table">
        <table id="data_table" cellpadding="5px">
            <tr id="table_categorys">
               <td>Name</td>
               <td>Last name</td>
               <td>Phone number</td>
               <td>Email</td>
               <td>Edit</td>
               <td>Delete</td>
            </tr>
            <?php
        $query = $db->query("SELECT * FROM `$fileName` ");
        $countLine = mysqli_num_rows($query);
        
        if( $countLine > 0 ) {
            $category = ["Name","lastName","phoneNumber","Email"];

            for($i = 1; $i <= $countLine; $i++) {
        ?>
                <tr class="table_fields">

                    <form method="post" action="<?=$updateDbPath.'?id='.$i ?>" >
                        
                        <input hidden type="text" name="fileName" value="<?=$fileName?>">

                        <?php
                        $j = 0;
                        $result = $db->query("SELECT * FROM `$fileName` WHERE id='$i'");
                        $result = mysqli_fetch_assoc($result);
                        foreach ($result as $key => $value) {
                            if($key != 'id' && $key != 'password') {
                                echo '<input type="text" value="'.$category[$j++].'" name="fieldCategory[]" hidden>';
                                echo '<td><input value="'.$value.'" class="form-control" name="fieldValue[]"></td>';
                            }
                        }  
                        ?>

                        <td class="change_table edit">
                            <button type="submit" class="on_img">
                                <img class="edit_image" src="../../img/admin/edit.png" alt="">
                            </button>
                        </td>

                    </form>
                    <form method="post" action="<?= $deleteFieldDbPath.'?d='.$i.'&n='.$fileName.'&c='.$countLine ?>" >

                        <td class="change_table delete">
                            <button type="submit" class="on_img">
                                <img src="../../img/admin/delete.png" alt="">  
                            </button>
                        </td>

                    </form>

                </tr>
        <?php
            } 
        }
        ?>
        </table>
        </div>
    </div>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/menuHover.js"></script>
    <script type="text/javascript" src="js/addAdminToggle.js"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

</body>
</html>
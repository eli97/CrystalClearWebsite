<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "pic";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$update_image = $_FILES['update_image']['name'];
$update_image_size = $_FILES['update_image']['size'];
$update_image_tmp_name = $_FILES['update_image']['tmp_name'];
$update_image_folder = 'uploaded_img/'.$update_image;

    if(!empty($update_image)){
        if($update_image_size > 2000000){
            $message[] = 'image is too large';
        }else{
            $image_update_query = mysqli_query($conn, "UPDATE `imgs` SET image = '$update_image' WHERE id = '$id'") or die('query failed');
            if($image_update_query){
                move_uploaded_file($update_image_tmp_name, $update_image_folder);
            }
            $message[] = 'image updated succssfully!';
        }
    }

?>

<!doctype html>
<html>
    <head>
        <title>PHP, MySQL, and Images</title>
    </head>
    <body>

        <h1>PHP, MySQL, and Images</h1>

    <?php
      $select = mysqli_query($conn, "SELECT * FROM `imgs` WHERE id = 'id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
    ?>        

    <form action="" method="post" enctype="multipart/form-data">
    <?php
        if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
        }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
        }
        if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
        }
    ?>

    <div class="flex">
         <div class="inputBox">
            <span>update pic :</span>
            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
         </div>
    </div>
    <input type="submit" value="save changes" name="pics" class="btn">

    </body>
</html>
<form action="upload.php" method="post" enctype="multipart/form-data">
    File:
    <input type="file" name="image"/>
    <input type="submit" value="Upload">
</form>

<?php
require("login.php");


//connect to database
$db_connect or die(mysql_error());
$db_select or die(mysql_error());

//file properties

if (isset($_FILES['image'])){
    $file = $_FILES['image']['tmp_name'];
    $image = addslashes(file_get_contents($file));
    $image_name = addslashes($_FILES['image']['name']);
    $image_size = getimagesize($file);

    if ($image_size == false){
        echo "That is not an image!";
    } else {
        if (!$insert = mysql_query("INSERT INTO $db_database VALUES ('','$user->username, $user->password, '$image_name', $image)")){
            echo "Problem uploading image";
        } else {
            $lastId = mysql_insert_id();
            echo "Image uploaded. <p /> Your image: <p /><img src=get.php?id=$lastId>";
        }
    }
} else {
    echo "Please select an image";
}
?>
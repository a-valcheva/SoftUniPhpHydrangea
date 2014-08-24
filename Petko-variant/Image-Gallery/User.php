<?php

class User {

    public $username;
    public $password;

    public function __construct($username = "sample", $password = "sample") {
        $this->username = $username;
        $this->password = $password;
    }

    public function uploadImage() {
        if (isset($_FILES['image'])){
            $file = $_FILES['image']['tmp_name'];
            $image = addslashes(file_get_contents($file));
            $image_name = addslashes($_FILES['image']['name']);
            $image_size = getimagesize($file);

            if ($image_size == false){
                echo "That is not an image!";
            } else {
                if (!$insert = mysql_query("INSERT INTO imagegallery VALUES ('','$this->username, $this->password, '$image_name', $image)")){
                    echo "Problem uploading image";
                } else {
                    $lastId = mysql_insert_id();
                    echo "Image uploaded. <p /> Your image: <p /><img src=get.php?id=$lastId>";
                }
            }
        } else {
            echo "Please select an image";
        }
    }

}

?>
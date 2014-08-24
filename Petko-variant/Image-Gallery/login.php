<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="utf-8" http-equiv="content-type" content="text/html"/>
</head>

<div style="margin: 0 auto; text-align:center;">
    <?php

    session_start();
    include("conf.php");
    include("User.php");

    //$user = new User();
    //$username;
    //$password;

    function renderLoginForm(){
        echo "	<body>";
        echo "		<div id='container'>";
        echo "			<form action='login.php' method='POST'>";
        echo "				<div class='login'>Потребителски вход</div>";
        echo "			<div class='username-text'>Потребителско име:</div>";
        echo "			<div class='password-text'>Парола:</div>";
        echo "			<div class='username-field'>";
        echo "				<input type='text' name='username' />";
        echo "			</div>";
        echo "			<div class='password-field'>";
        echo "				<input type='password' name='password' />";
        echo "			</div>";
        echo "			<input type='checkbox' name='remember-me' id='remember-me' /><label for='remember-me'>Запомни ме</label>";
        echo "			<div class='forgot-usr-pwd'>Забравено <a href='#'>име</a> или <a href='#'>парола</a>?</div>";
        echo "			<input type='submit' name='submit' value='Вход' />";
        echo "		</form>";
        echo "	</div>";
        echo "	</body>";
    }

    function renderUploadForm() {
        echo ' <form action="login.php" method="post" enctype="multipart/form-data">';
        File:
        echo '<input type="file" name="image"/>';
        echo '<input type="submit" name="create" value="Upload">';
        echo '</form>';
    }

    function getUsername(){
        global $username, $password, $user;
        $username = form($_POST['username']);
        $password = md5($_POST['password']);
        $user = new User($username, $password);
    }


    if (!isset($_POST['submit']) && !isset($_FILES['image'])) {
        if (!isset($username)){
            renderLoginForm();
        }
    } else if(isset($_FILES['image'])){
        $file = $_FILES['image']['tmp_name'];
        $image = addslashes(file_get_contents($file));
        $image_name = addslashes($_FILES['image']['name']);
        $image_size = getimagesize($file);

        $username = $_SESSION['username'];

        $user = new User($username);
        $insert = mysql_query("INSERT INTO images (username, album, image) VALUES ('$user->username', '$image_name', '$image')");
        if ($image_size == false){
            echo "That is not an image!";
        } else {
            if (!$insert){
                echo "Problem uploading image";
            } else {
                $lastId = mysql_insert_id();
                echo "Image uploaded. <p /> Your image: <p /><img src=get.php?id=$lastId>";
            }
        }
    } else {
        getUsername();
        $query = mysql_query("SELECT * FROM images WHERE username = '$user->username'") or die (mysql_error());
        // mySQL query
        $r = mysql_num_rows($query);

        if ($r >= 1) {
            $_SESSION['username']=$username;
            renderUploadForm();

        } else {
            exit("	<body>
              <div id='container'>
              <div class='welcome'>
              <div class='welcome-user'>ГРЕШКА!</div>
              <div class='welcome-text'>Въвели сте невалидно потребителско име или парола!<br> Моля, опитайте отново.<br> Ако нямате създаден акаунт <a href='registration.php'>регистрирайте се от тук.</a> .</div>
              <div class='home'><a href='login.php'>НАЗАД</a></div>
              </div>
              </div>
              </body>");
        }

    // mysql_close($db_connect);
    }
    ?>
</div>
</html>

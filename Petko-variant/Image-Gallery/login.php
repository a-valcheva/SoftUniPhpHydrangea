<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="utf-8" http-equiv="content-type" content="text/html"/>
</head>

<div style="margin: 0 auto; text-align:center;">
    <?php
    include("conf.php");
    include("User.php");
    session_start();
        if (!isset($_POST['submit'])) {
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
        } else {

            $username = form($_POST['username']);
            $password = md5($_POST['password']);
            $user = new User($username, $password);

            $query = mysql_query("SELECT * FROM images WHERE username = '$user->username' AND password = '$user->password'") or die (mysql_error());
            // mySQL query

            $r = mysql_num_rows($query);

            if ($r >= 1) {
                $_SESSION['user']=$username;

                header("Location: upload.php");
                exit();
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
        }
   // mysql_close($db_connect);
    ?>
</div>
</html>

<?php
require("conf.php"); // Âêëþ÷âà ôàéëà ñ èíôîðìàöèÿ çà áàçàòà äàííè.
require("User.php");

function renderForm() {
    echo '<form action="registration.php" method="POST">';
    echo "Enter your details: ";
    echo '<input type="text" name="username" size="18" placeholder="username"/>';
    echo '<input type="password" name="password" size="18" placeholder="password"/>';
    echo '<input type="submit" name="submit" value="Register"</td>';
    echo '</form>';
}
if (!isset($_POST['submit'])) { // Àêî çàÿâêàòà íå å èçïðàòåíà.
    renderForm();
} else { // fields are not blank
    $username = form($_POST['username']);
    $password = md5($_POST['password']); // Crypted password

    $user = new User($username, $password);
    if (($username == "") || ($password == "") ) { // Ïðîâåðÿâà çà ïðàçíè ìåñòà
        echo ("Please input valid values!");
        return renderForm();
    }

    $query = mysql_query("SELECT username FROM images WHERE username = '$user->username'") or die (mysql_error()); // mySQL Query
    $rows = mysql_num_rows($query); // Ïðîâåðÿâà äàëè èìà íåùî â áàçàòà äàííè

    if ($rows > 0) { // Èìà ëè ïîòðåáèòåëè ñúñ ñúùîòî èìå/èìåéë
        renderForm();
        echo("Username already taken!");
    } else {
        mysql_query("INSERT INTO `images` (username, password) VALUES ('$user->username','$user->password')") or die (mysql_error()); // Äîáàâÿ ïîòðåáèòåëÿ.
        header("Location: login.php"); // Îáðàòíî íà âõîäà.
    }
}
//mysql_close($db_connect); // Çàòâàðÿ âðúçêàòà.
?>

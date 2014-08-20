<html>
<head>
    <title>HomePage</title>
    <link rel="stylesheet" type="text/css" href="stylesheets\styles.css">
</head>
<body>

</body>
</html>

<?php
$sessionid = session_id();
if ($sessionid == '') session_start();
if (isset($_SESSION['username'])) {
    echo "Your username is " . $_SESSION['username'];
} else {
    echo "Go back and enter your username in the textbox.";
}
?>
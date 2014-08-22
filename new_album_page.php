<?php $target = "upload/";
$sessionid = session_id();
if ($sessionid == '') session_start();
if (!$_SESSION['album_created']) {
    $_SESSION['album_created'] = true;  
    $target = $target . basename($_FILES['uploaded']['name']);
    $ok = 1;
    if (move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) {
        echo "The file " . basename($_FILES['uploaded']['name']) . " has been uploaded";
    }
    $_SESSION['filename'] = basename($_FILES['uploaded']['name']);
}
?>
<html>
<head>
    <meta charset="UTF-8"/>
</head>
<body>
<img src="upload/<?= $_SESSION['filename'] ?>" alt=""/>
</body>
</html>

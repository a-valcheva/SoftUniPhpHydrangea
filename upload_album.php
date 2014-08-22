<form enctype="multipart/form-data" action="new_album_page.php" method="POST">
    Please choose a file: <input name="uploaded" type="file"/><br/>
    <input type="submit" value="Upload"/></form>
<?php
$sessionid = session_id();
if ($sessionid == '') session_start();
$_SESSION['filename'] = "file_name";
$_SESSION['album_created'] = false;
session_regenerate_id(true);
$_SESSION['sessionid'] = session_id();
?>
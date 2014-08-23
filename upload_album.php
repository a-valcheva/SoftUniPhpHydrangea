<html>
<head>
</head>
<body>
<form enctype="multipart/form-data" action="new_album_page.php" method="POST"><!--  -->
    Please choose the file/-s you want to upload: <br>
    <input name="uploaded[]" type="file"/><br/>
    <input name="uploaded[]" type="file"/><br/>
    <input name="uploaded[]" type="file"/><br/>
    <input name="uploaded[]" type="file"/><br/>
    <input type="submit" name="submit" value="Upload"/>
</form>
</body>
</html>
<?php
$sessionid = session_id();
if ($sessionid == '') session_start();
$_SESSION['filename'] = "file_name";
$_SESSION['album_created'] = false;
session_regenerate_id(true);
$_SESSION['sessionid'] = session_id();
$html = htmlentities(file_get_contents('./upload_album.php', FILE_USE_INCLUDE_PATH));
$_SESSION['number_of_files_uploaded'] = substr_count($html, 'uploaded[]')-1;
?>
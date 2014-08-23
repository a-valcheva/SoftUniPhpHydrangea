<?php

require("conf.php");

$db_connect or die(mysql_error());
$db_select or die(mysql_error());

$id = addslashes($_REQUEST['id']);

$image = mysql_query("SELECT * FROM images WHERE id=$id");
$image = mysql_fetch_assoc($image);
$image = $image['ímage'];

header("Content-type: image/jpeg");

echo $image;

?>
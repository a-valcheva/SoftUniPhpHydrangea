<?php
$db_user = "root"; // Потребителско име
$db_pass = ""; // Парола
$db_database = "imageGallery"; // Датабаза име
$db_host = "localhost"; // Сървър , обикновено е localhost
$db_connect = mysql_connect ($db_host, $db_user, $db_pass); // Връзка.
$db_select = mysql_select_db ($db_database); // Избира датабазата.

function form($data) { // Защита
    global $db_connect;
    //$data = ereg_replace("[\'\")(;|`,<>]", "", $data); // TODO update this line /
    $data = mysql_real_escape_string(trim($data), $db_connect);
    return stripslashes($data);
}
?>
<?php $target = "upload/";
$sessionid = session_id();
if ($sessionid == '') session_start();
if (!$_SESSION['album_created']) {
    $_SESSION['album_created'] = true;
    for ($i = 0; $i <= $_SESSION["number_of_files_uploaded"] - 1; $i++) {
        $target = "upload/";
        $target = $target . basename($_FILES['uploaded']['name'][$i]);
        $ok = 1;
        if (move_uploaded_file($_FILES['uploaded']['tmp_name'][$i], $target)) {
            echo "The file " . basename($_FILES['uploaded']['name'][$i]) . " has been uploaded <br>";
        }
    }
}

?>
<html>
<head>
    <meta charset="UTF-8"/>
</head>
<body>
<script>
    "use strict";
    var jsvar = <?= $_SESSION["number_of_files_uploaded"] ?>;
    console.log(jsvar);
    var container = document.createElement("div");
    container.setAttribute("id", "container");
    <?php
    for ($i = 0; $i < $_SESSION["number_of_files_uploaded"]; $i++) {
    ?>

    var img = document.createElement("img");
    img.setAttribute("src", "upload/" + "<?=basename($_FILES['uploaded']['name'][$i])?>");
    container.appendChild(img);
    <?php
    }
    ?>
    document.body.appendChild(container);
</script>
</body>
</html>
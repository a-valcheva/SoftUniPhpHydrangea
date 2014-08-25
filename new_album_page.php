<?php $target = "upload/";
$sessionid = session_id();
if ($sessionid == '') session_start();
if (!$_SESSION['album_created']) {
    $_SESSION['album_created'] = true;
    $_SESSION['number_of_images_uploaded'] = 0;
    $count = 0;
    $successfulUploads = 0;
    $sample = [5, 6];
    echo isset($sample[2]);
    while (isset($_FILES['albums']['name'][$count])) {
        $count++;
    }
    for ($i = 0; $i < $count; $i++) {
        $target = "upload/";
        $target = $target . basename($_FILES['albums']['name'][$i]);
        $ok = 0;
        if ((($_FILES['albums']['size'][$i]) < 16000) && (($_FILES['albums']['type'][$i] == "image/gif")
                || ($_FILES['albums']['type'][$i] == "image/png") || ($_FILES['albums']['type'][$i] == "image/jpg")
                || ($_FILES['albums']['type'][$i] == "image/jpeg"))
        ) {
            $ok = 1;
            $successfulUploads++;
        }
        if ($ok) {
            if (move_uploaded_file($_FILES['albums']['tmp_name'][$i], $target)) {
                echo "The file " . basename($_FILES['albums']['name'][$i]) . " has been uploaded <br>";
            }
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
    var jsvar = <?= $count ?>;
    console.log(jsvar);
    var container = document.createElement("div");
    container.setAttribute("id", "container");
    <?php
    for ($i = 0; $i < $successfulUploads; $i++) {
    ?>

    var img = document.createElement("img");
    img.setAttribute("src", "upload/" + "<?=basename($_FILES['albums']['name'][$i])?>");
    container.appendChild(img);
    <?php
    }
    ?>
    document.body.appendChild(container);
</script>
</body>
</html>
<html>
<head>
</head>
<body>
<form enctype="multipart/form-data" action="new_album_page.php" method="POST">
    Please choose the file/-s you want to upload: <br>

    <div id="parent">
        <div id="album1">
            <input type="file" name="albums[]"> <a href="javascript:removeElement('album1')">[Remove]</a><br>
        </div>
        <script>addInput();</script>
    </div>
    <a href="javascript:addInput()">[Add]</a><br/>
    <input type="submit" name="submit" value="Upload"/>
</form>
<script>
    var nextId = 0;

    function addInput() {
        nextId++;
        var inputDiv = document.createElement("div");
        inputDiv.setAttribute("id", "album" + nextId);
        inputDiv.innerHTML =
            "<input type='file' name='albums[]' /> " +
                "<a href=\"javascript:removeElement('album" + nextId + "')\">[Remove]</a>" + "<br/>";
        document.getElementById('parent').appendChild(inputDiv);
    }

    function removeElement(id) {
        var inputDiv = document.getElementById(id);
        document.getElementById('parent').removeChild(inputDiv);
    }
</script>
</body>
</html>
<?php
$sessionid = session_id();
if ($sessionid == '') session_start();
$_SESSION['filename'] = "file_name";
$_SESSION['album_created'] = false;
session_regenerate_id(true);
$_SESSION['sessionid'] = session_id();
?>
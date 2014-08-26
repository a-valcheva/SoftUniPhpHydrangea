<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<section class="photos" id="photos">
<h1 class="album">Album Name</h1>
<div class="photo" class="upload">
<form action="upload_file.php" method="post"
enctype="multipart/form-data">
<label class="file" for="file">Filename:</label>
<input type="file" name="file" id="file"><br>
<input type="submit" name="submit" value="Submit">
</form>
</div>
<?php
require ('generatePhotoPage.php');
?>


</section>
<section class="comments">
	
<?php
require ('albumComments.php');
?>

<?php
require ('comments.php');
?>

	<form action="" method="post">
	<input type="text" name="name" placeholder="Name" />
	<input type="text" name="comment" placeholder="Write a comment" />
	<input type="submit" name="submitComment" value="Comment" />
	</form>
	
</section>
</body>
</html>
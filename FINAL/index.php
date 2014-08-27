<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<section class="photos" id="photos">
<h1 class="album">Albums</h1>
<div class="photo" class="upload">
<form action="" method="get"
enctype="multipart/form-data">
<label class="text" for="text">Album</label><br>
<input type="text" name="text" />
<input type="submit" name="submit" value="Create Album">
</form>
</div>
<?php
if (isset($_GET["text"])) {
	$myfile = fopen("{$_GET["text"]}.php", "w");
	$txt = "
<html>
<head>
<link rel='stylesheet' type='text/css' href='style.css'>
</head>
<body>
<section class='photos' id='photos'>
<a href='index.php'>Back to Albums</a>
<h1 class='album'>{$_GET['text']}</h1>
<div class='photo' class='upload'>
<form action='' method='post'
enctype='multipart/form-data'>
<label class='file' for='file'>Photo</label>
<input type='file' name='file' id='file'><br>
<input type='submit' name='submit' value='Add Photo'>
</form>
</div>
<?php
require ('generatePhotoPage.php');
?>


</section>
<section class='comments'>
	
<?php
require ('albumComments.php');
?>

<?php
require ('comments.php');
?>

	<form action='' method='post'>
	<input type='text' name='name' placeholder='Name' />
	<input type='text' name='comment' placeholder='Write a comment...' />
	<input type='submit' name='submitComment' value='Comment' />
	</form>
	
</section>
</body>
</html>
	";
	fwrite($myfile, $txt);
	fclose($myfile);
}
?>

<?php

$con=mysqli_connect("localhost","root","");
// Check connection
if (mysqli_connect_errno()) {
  //echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Create database
$sql="CREATE DATABASE my_db";
if (mysqli_query($con,$sql)) {
  //echo "Database my_db created successfully";
} else {
  //echo "Error creating database: " . mysqli_error($con);
}

$con=mysqli_connect("localhost","root","","my_db");
// Check connection
if (mysqli_connect_errno()) {
  //echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Create table
$sql="CREATE TABLE albums(id INT, name CHAR(100))";

// Execute query
if (mysqli_query($con,$sql)) {
  //echo "Table persons created successfully";
} else {
  //echo "Error creating table: " . mysqli_error($con);
}

$con=mysqli_connect("localhost","root","");
// Check connection
if (mysqli_connect_errno()) {
  //echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Create database
$sql="CREATE DATABASE my_db";
if (mysqli_query($con,$sql)) {
  //echo "Database my_db created successfully";
} else {
  //echo "Error creating database: " . mysqli_error($con);
}

$con=mysqli_connect("localhost","root","","my_db");
// Check connection
if (mysqli_connect_errno()) {
  //echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Create table
//$sql="CREATE TABLE albums(id INT, name CHAR(100))";
if (isset($_GET["text"])) {
$sql="CREATE TABLE {$_GET["text"]} (id INT, name CHAR(100))";


}


// Execute query
if (mysqli_query($con,$sql)) {
  //echo "Table persons created successfully";
} else {
  //echo "Error creating table: " . mysqli_error($con);
}

$con=mysqli_connect("localhost","root","");
// Check connection
if (mysqli_connect_errno()) {
  //echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Create database
$sql="CREATE DATABASE my_db";
if (mysqli_query($con,$sql)) {
  //echo "Database my_db created successfully";
} else {
  //echo "Error creating database: " . mysqli_error($con);
}

$con=mysqli_connect("localhost","root","","my_db");
// Check connection
if (mysqli_connect_errno()) {
  //echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Create table

if (isset($_GET["text"])) {
	$nameComment = "{$_GET["text"]}C";
	$sql="CREATE TABLE {$nameComment} (id INT, name CHAR(100), comment TEXT)";
}

// Execute query
if (mysqli_query($con,$sql)) {
  //echo "Table persons created successfully";
} else {
  //echo "Error creating table: " . mysqli_error($con);
}

if (isset($_GET["text"])) {

	$nameP = "{$_GET["text"]}.php";
	mysql_connect("localhost", "root", "");
	mysql_select_db("my_db");
	
	$insert = mysql_query("INSERT INTO albums (name) VALUES ('$nameP')");
}
mysql_connect("localhost", "root", "");
mysql_select_db("my_db");

 
$getquery = mysql_query("SELECT * FROM albums ORDER BY id DESC");
while ($rows=mysql_fetch_assoc($getquery)) {
$idP = $rows['id'];
$nameP = $rows['name'];
$namePi = $rows['name'];
$namePi = str_replace(".php", '', $namePi);

echo "<div class='photo'>
<a href='$nameP'>$namePi</a>
</div>";
}



?>

</section>
</body>
</html>







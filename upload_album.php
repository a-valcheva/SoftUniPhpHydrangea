<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<section class="photos" id="photos">
<h1 class="album">Album</h1>
<div class="photo" class="upload">
<form action="" method="post"
enctype="multipart/form-data">
<label class="text" for="text">Album:</label>
<input type="text" name="text" />
<input type="submit" name="submit" value="Create">
</form>
</div>
<?php
if (isset($_GET["text"])) {
	echo "
		<table border='1'>	
	";
	$text = $_GET["text"];
	var_dump($text);
	$text = explode(", ", $text);
	for ($i=0; $i < sizeof($text); $i++) { 
		if (is_int((int)$text[$i])) {
			echo "<tr><td> $text[$i] </td>";
			$len = strlen((string)$text[$i]);
			$sum = 0;
			for ($j=0; $j < $len; $j++) {
				$sum = $sum +  (int)$text[$i] % 10;
				$text[$i] = (int)$text[$i] / 10;
			}
			if ($sum == 0) {
				echo "<td>I cannot sum that </td>
			</tr>";
			} else {
				echo "
			<td> $sum </td>
			</tr>
			";
			}
		}
	}
}
?>
</section>
</body>
</html>







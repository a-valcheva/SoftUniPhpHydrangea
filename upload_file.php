<html>
<body>
<section class="photos" id="photos">
<h1 class="album">Album Name</h1>
<div class="photo">
<form action="upload_file.php" method="post"
enctype="multipart/form-data">
<label class="file" for="file">Filename:</label>
<input type="file" name="file" id="file"><br>
<input type="submit" name="submit" value="Submit">
</form>
</div>
<div class="photo">
</div>
<div class="photo">
</div>
<div class="photo">
</div>
<div class="photo">
</div>
<div class="photo">
</div>



</section>
<section class="comments">
	<div class="comment">Comment</div>
	<div class="comment">Comment</div>
	<div class="comment">Comment</div>
	<form method="post">
	<input type="text" name="name" placeholder="Name" />
	<input type="text" name="comment" placeholder="Write a comment" />
	<input type="submit" name="submitComment" value="Comment" />
	</form>
</section>
</body>
</html>



<style>
	.album {
		text-align: center;
		padding: 10px;
		margin: 10px;
	}
	.photos, .comments {
		background-color: red;
		width: 75%;
		margin: 10px auto;
		padding: 10px;
	}
	.photo {
		margin: 10px;
		background-color: yellow;
		width: 200px;
		height: 200px;
		display: inline-block;
		vertical-align: top;
	}
	.photo form {
		text-align: center;
		
	}
	.comment, .comments input {
		margin: 10px auto;
		padding: 10px;
		background-color: yellow;
		width: 90%;
		
	}
	.comments form {
		text-align: center;

	}
	
	
</style>

<script>
var next = 0;
	function add() {
		<?php
		foreach ($photos as $key => $value) { ?>
			var node=document.createElement('div');
			node.setAttribute('class','photo');
			var textnode=document.createTextNode('Water');
			node.appendChild(textnode);
			document.getElementById('photos').appendChild(node);
		<?php
		}
		?>
		next++;
		var node=document.createElement('div');
		node.setAttribute('class','photo');
		node.setAttribute('id','num' + next);
		var textnode=document.createTextNode('Water');
		node.appendChild(textnode);
		document.getElementById('photos').appendChild(node);
	}
	add();
</script>

<?php
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
$result = '';
$photos = array();
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 20000000000000)
&& in_array($extension, $allowedExts)) {
  if ($_FILES["file"]["error"] > 0) {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
  } else {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
    if (file_exists("upload/" . $_FILES["file"]["name"])) {
      echo $_FILES["file"]["name"] . " already exists. ";
    } else {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
	  
	  array_push($photos, $_FILES["file"]["name"]);
	  //var_dump($photos);
	 
    }
  }
  
} else {
  echo "Invalid file";
}
?>
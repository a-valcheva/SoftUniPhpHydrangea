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
$allowedExts = array("gif", "jpeg", "jpg", "png");
if(isset($_FILES["file"]["name"])) {
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
    //echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    //echo "Type: " . $_FILES["file"]["type"] . "<br>";
    //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
    if (file_exists("upload/" . $_FILES["file"]["name"])) {
      //echo $_FILES["file"]["name"] . " already exists. ";
      require ('connect.php');

    } else {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);
      //echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
      
      
      	
      
		$con=mysqli_connect("localhost", "root", "");
		// Check connection
		if (mysqli_connect_errno()) {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		
		
		
		// Create database
		$sql="CREATE DATABASE my_db";
		if (mysqli_query($con,$sql)) {
		  echo "Database my_db created successfully";
		} else {
		  echo "Error creating database: " . mysqli_error($con);
		}
      
		$con=mysqli_connect("localhost", "root", "", "my_db");
		// Check connection
		if (mysqli_connect_errno()) {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		
		
		// Create table
		$imgName = $_FILES['file']['name'];
		$imgName = str_replace('.jpg','',$imgName);
		
		$sql="CREATE TABLE {$imgName}(id INT,name CHAR(30), comment CHAR(30))";
		
		// Execute query
		if (mysqli_query($con,$sql)) {
		  echo "Table persons created successfully";
		} else {
		  echo "Error creating table: " . mysqli_error($con);
		}
      
      $myfile = fopen("{$_FILES['file']['name']}.php", "w");
	  $txt = "
		<html>
		<head>
		<link rel='stylesheet' type='text/css' href='style.css'>
		</head>
		<body>
		<section class='photos' id='photos'>
		<h1 class='album'>{$_FILES['file']['name']}</h1>
		<img src = 'upload/{$_FILES['file']['name']}'>
		</section>
		<section class='comments'>
		<?php
			require ('com.php');
		?>
			<form action='' method='post'>
			<input type='text' name='name' placeholder='Name' />
			<input type='text' name='comment' placeholder='Write a comment' />
			<input type='submit' name='submitComment' value='Comment' />
			</form>
			
		</section>
		</body>
		</html>
	  ";
	  fwrite($myfile, $txt);
	  fclose($myfile);
	  
	  array_push($photos, $_FILES["file"]["name"]);
	  //var_dump($photos);
	  
	  require ('connect.php');
	  if(isset($_FILES["file"]["name"])){ $nameP = $_FILES["file"]["name"]; } 
	  if(isset($_POST['submit'])){ $submitComment = $_POST['submit']; } 
	  
	  if(isset($_POST['submit'])){
	    if ($nameP) {
	    	
		$con=mysqli_connect("localhost", "root", "");
		// Check connection
		if (mysqli_connect_errno()) {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		
		
		
		// Create database
		$sql="CREATE DATABASE my_db";
		if (mysqli_query($con,$sql)) {
		  echo "Database my_db created successfully";
		} else {
		  echo "Error creating database: " . mysqli_error($con);
		}
      
		$con=mysqli_connect("localhost", "root", "", "my_db");
		// Check connection
		if (mysqli_connect_errno()) {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		
		
		// Create table
		
		
		$sql="CREATE TABLE photos(id INT,name CHAR(30))";
		
		// Execute query
		if (mysqli_query($con,$sql)) {
		  echo "Table persons created successfully";
		} else {
		  echo "Error creating table: " . mysqli_error($con);
		}
		mysql_connect("localhost", "root", "");
		mysql_select_db("my_db");
			$insert = mysql_query("INSERT INTO photos (name) VALUES ('$nameP')");
			} else {
			//echo "Please fill out all the fields";
			  //require ('connect.php');
			
	  	}
	  }
	  

	    
	  
	 
    }
  }
  
} else {
  //echo "Invalid file";
  
}
}
    //require ('connect.php');
  
    mysql_connect("localhost", "root", "");
	mysql_select_db("my_db");
  
	$getquery = mysql_query("SELECT * FROM photos ORDER BY id DESC");
		while ($rows=mysql_fetch_assoc($getquery)) {
		$idP = $rows['id'];
		$nameP = $rows['name'];
		echo "<div class='photo'>
      <a href='$nameP.php'><img src = 'upload/$nameP'></a>
	  </div>";
	}
?>



</section>
<section class="comments">
	
<?php
		//require ('connect.php');
		mysql_connect("localhost", "root", "");
		//mysql_select_db("comment");
		if(isset($_POST['name'])){ $name = $_POST['name']; } 
		if(isset($_POST['comment'])){ $comment = $_POST['comment']; } 
		if(isset($_POST['submitComment'])){ $submitComment = $_POST['submitComment']; } 
		
		if(isset($_POST['submitComment'])){
			if ($name && $comment) {
					
		$con=mysqli_connect("localhost", "root", "");
		// Check connection
		if (mysqli_connect_errno()) {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		
		
		
		// Create database
		$sql="CREATE DATABASE my_db";
		if (mysqli_query($con,$sql)) {
		  echo "Database my_db created successfully";
		} else {
		  echo "Error creating database: " . mysqli_error($con);
		}
      
		$con=mysqli_connect("localhost", "root", "", "my_db");
		// Check connection
		if (mysqli_connect_errno()) {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		
		
		// Create table
		
		
		$sql="CREATE TABLE comment(id INT,name CHAR(30), comment CHAR(30))";
		
		// Execute query
		if (mysqli_query($con,$sql)) {
		  echo "Table persons created successfully";
		} else {
		  echo "Error creating table: " . mysqli_error($con);
		}
		mysql_connect("localhost", "root", "");
		mysql_select_db("my_db");
						
			
		
				$insert = mysql_query("INSERT INTO comment (name, comment) VALUES ('$name','$comment')");
			} else {
				echo "Please fill out all the fields";
				
				
			}
		}
?>

<?php
	mysql_connect("localhost", "root", "");
	mysql_select_db("my_db");
	$getquery = mysql_query("SELECT * FROM comment ORDER BY id DESC");
	while ($rows=mysql_fetch_assoc($getquery)) {
		$id = $rows['id'];
		$name = $rows['name'];
		$comment = $rows['comment'];
		echo "<div class='comment'>
		<strong> $name </strong>
		$comment
		</div>";
	}
?>
	<form action="" method="post">
	<input type="text" name="name" placeholder="Name" />
	<input type="text" name="comment" placeholder="Write a comment" />
	<input type="submit" name="submitComment" value="Comment" />
	</form>
	
</section>
</body>
</html>





<style>
	body {
		background-color: grey;

	}
	.album {
		text-align: center;
		padding: 10px;
		margin: 10px;
	}
	.photos, .comments {
		background-color: white;
		width: 75%;
		margin: 10px auto;
		padding: 10px;
	}
	.photo {
		margin: 10px;
		background-color: white;
		
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
		background-color: white;
		width: 90%;
		
	}
	.comments form {
		text-align: center;

	}
	img {
		max-width: 100%;
	}
	
	
</style>






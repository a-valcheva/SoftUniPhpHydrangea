<?php
		//require ('connect.php');
		mysql_connect("localhost", "root", "");
		mysql_select_db("my_db");
		
		$currentFile = $_SERVER["PHP_SELF"];
		$parts = Explode('/', $currentFile);
		$pageName = $parts[count($parts) - 1];
		$pageName = str_replace('.jpg.php','',$pageName);
		//var_dump($pageName);

		
		if(isset($_POST['name'])){ $name = $_POST['name']; } 
		if(isset($_POST['comment'])){ $comment = $_POST['comment']; } 
		if(isset($_POST['submitComment'])){ $submitComment = $_POST['submitComment']; } 
		
		if(isset($_POST['submitComment'])){
			if ($name && $comment) {
				$insert = mysql_query("INSERT INTO $pageName (name, comment) VALUES ('$name','$comment')");
			} else {
				echo "Please fill out all the fields";
				
				
			}
		}
?>

<?php
	$getquery = mysql_query("SELECT * FROM {$pageName} ORDER BY id DESC");
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
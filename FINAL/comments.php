<?php
	$pageName = basename($_SERVER['PHP_SELF']); 
	$pageName = str_replace(".php", '', $pageName);
	$pageName = "{$pageName}C";
	
	mysql_connect("localhost", "root", "");
	mysql_select_db("my_db");
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
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
		  //echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		
		
		
		// Create database
		$sql="CREATE DATABASE my_db";
		if (mysqli_query($con,$sql)) {
		  //echo "Database my_db created successfully";
		} else {
		  //echo "Error creating database: " . mysqli_error($con);
		}
      
		$con=mysqli_connect("localhost", "root", "", "my_db");
		// Check connection
		if (mysqli_connect_errno()) {
		  //echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		
		
		// Create table
		
		
		$sql="CREATE TABLE comment(id INT,name CHAR(30), comment CHAR(30))";
		
		// Execute query
		if (mysqli_query($con,$sql)) {
		  //echo "Table persons created successfully";
		} else {
		  //echo "Error creating table: " . mysqli_error($con);
		}
		mysql_connect("localhost", "root", "");
		mysql_select_db("my_db");
						
			
		
				$insert = mysql_query("INSERT INTO comment (name, comment) VALUES ('$name','$comment')");
			} else {
				echo "Please fill out all the fields";
				
				
			}
		}
?>
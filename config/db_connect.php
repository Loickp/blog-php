<?php 

	// connect to the database
	$conn = mysqli_connect('localhost', 'loick', 'test1234', 'blog');

	// check connection
	if(!$conn){
		echo 'Connection error: '. mysqli_connect_error();
	}

?>
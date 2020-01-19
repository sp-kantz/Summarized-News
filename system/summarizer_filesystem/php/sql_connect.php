<?php

	DEFINE('USER', 'root');
	DEFINE('PASSWORD', '');
	DEFINE('HOST', 'localhost');
	DEFINE('NAME', 'summarizer');

	$con = @mysqli_connect(HOST, USER, PASSWORD, NAME);
	
?>
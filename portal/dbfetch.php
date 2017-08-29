<?php
	require "dbconfig.php";
	require_once("class.user.php");
	
	$auth_user = new Database();
	$conn = $auth_user.dbConnection();

	$query = $conn->prepare('SELECT * FROM taskrecord');
	$query->execute();
	$task = $query->fetchAll();

	$row = $query->rowCount();

	echo $row;
?>
<?php
	require_once("session.php");
	require_once("class.user.php");
	
	$user = new USER();
	$stud_id = $_SESSION['user_session'];
	
	echo $user->total_task();
    
?>
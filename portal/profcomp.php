<?php
	require_once("session.php");
	require_once("class.user.php");
	
	$user = new USER();
	$stud_id = $_SESSION['user_session'];
	echo "<h5>Completed Tasks</h5>";
	echo $user->profcomp_task();
    
?>
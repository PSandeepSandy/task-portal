<?php
	require_once("session.php");
	require_once("class.user.php");
	
	$user = new USER();
	$stud_id = $_SESSION['user_session'];
	echo "<h5>Assign Task to </h5>";
	echo $user->stud_list();
    
?>
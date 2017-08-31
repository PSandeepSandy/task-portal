<?php
	require_once("session.php");
	require_once("class.user.php");
	
	$user = new USER();
	$stud_id = $_SESSION['user_session'];
	echo "<h5>Edit or delete assigned tasks </h5>";
	echo $user->profassgn_task();
    
?>
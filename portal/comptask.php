<?php
	require_once("session.php");
	require_once("class.user.php");
	
	$user = new USER();
	$stud_id = $_SESSION['user_session'];
	$task_id=$_POST['user2'];
	$user->comp_task($task_id);
	echo $user->stud_task();
    
?>
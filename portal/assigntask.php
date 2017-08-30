<?php
	require_once("session.php");
	require_once("class.user.php");
	
	$user = new USER();
	$stud_id = $_SESSION['user_session'];
	$sid=$_POST['sid'];
	$pid=$_POST['pid'];
	$task=$_POST['task'];
	$user->assign_task($sid, $pid, $task );
	echo $user->stud_list();
	
?>
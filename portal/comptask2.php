<?php
	require_once("session.php");
	require_once("class.user.php");
	
	$user = new USER();
	$stud_id = $_SESSION['user_session'];
	$task_id=$_POST['task_id'];
	$stud_id=$_POST['stud_id'];
	$user->comp_task2($task_id,$stud_id);
	echo $user->profassgn_task();
    
?>
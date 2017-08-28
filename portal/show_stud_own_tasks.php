<?php
	require_once("session.php");
	require_once("class.user.php");
	require('dbconfig.php');
	$auth_user = new USER();
	$stud_id = $_SESSION['user_session'];
	$stmt = $auth_user->runQuery("SELECT * FROM taskrecord WHERE Stud_id=:stud_id AND Status = '1' ");   
	//status 1 means incomplete task and 0 means completed task
	$stmt->execute(array(":stud_id"=>$stud_id));
	
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);	

	echo '<div class="row">';
	echo '<div class="col s12 m6">';
	echo '<div class="card blue-grey darken-1">';
	echo '<div class="card-content white-text">';
	echo '<span class="card-title">Card Title</span>';
	echo '<p>I am a very simple card. I am good at containing small bits of information.;
              I am convenient because I require little markup to use effectively.</p>';
    echo '</div>';
    echo '<div class="card-action">';
    echo '<a href="#"><i class="zmdi zmdi-check zmdi-hc-3x"></i></a>'  ; 
    echo '</div>'   ;   
    echo '</div>';
    echo '</div>';
    echo '</div>';
?>
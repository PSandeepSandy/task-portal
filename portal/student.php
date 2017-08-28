<?php

	require_once("session.php");
	
	require_once("class.user.php");
	$auth_user = new USER();
	
	
	$user_id = $_SESSION['user_session'];
	
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));
	
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1">

<script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>
<link rel="stylesheet" href="style.css" type="text/css"  />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

<title>welcome - <?php print($userRow['user_email']); ?></title>
</head>

<body>

<nav>
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo">Taskit</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#">My Tasks</a></li>
        <li><a href="#">All Tasks</a></li>
        <li><a href="#">Completed Tasks</a></li>
        <li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
        
      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="#" id="show_own_tasks">My Tasks</a></li>
        <li><a href="#" id="show_all_tasks">All Tasks</a></li>
        <li><a href="#" id="show_own_tasks_completed">Completed Tasks</a></li>
        <li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
      </ul>
    </div>
  </nav>
    
<div class="container-fluid" style="margin-top:80px;">
	
    <div class="container">
    
    	<h5>welcome : <?php print($userRow['user_name']); ?></h5>
        <hr />
        
      <br><br>  
      <h5>Select a tab from above to see tasks allocated</h5>
      <!--
        <div class="row">
        <div class="col s12 m6">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Card Title</span>
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
              <a href="#"><i class="zmdi zmdi-check zmdi-hc-3x"></i></a>
              
            </div>
          </div>
        </div>
      </div>
       -->
      <script type="text/javascript">
          
          $(document).ready(function() {
            $("#show_own_tasks").click(function() {alert("clicked");
              jq.ajax({
                url: "show_stud_own_tasks.php",
                type: "post",
                data: {},
                //datatype: "html",
                success: function(response){
                jq(".container").html(response);
                }
                
                });

            });
            $("#show_all_tasks").click(function() {});
            $("#show_own_tasks_completed").click(function() {});
            
          })




      </script>
              
    
    </div>

</div>

<script src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
  $( document ).ready(function(){
    $(".button-collapse").sideNav();
  });
</script>
</body>
</html>
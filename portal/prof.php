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
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<title>welcome - <?php print($userRow['user_email']); ?></title>
</head>

<body>

<nav>
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo">Taskit</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#">Assign Tasks</a></li>
        <li><a href="#">Assigned Tasks</a></li>
        <li><a href="#">Completed Tasks</a></li>


        <li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
        
      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="#">Assign Tasks</a></li>
        <li><a href="#">Assigned Tasks</a></li>
        <li><a href="#">Completed Tasks</a></li>
        <li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
      </ul>
    </div>
  </nav>

    
    	
    
<div class="container-fluid" style="margin-top:80px;">
	
    <div class="container">
    
    	<h5>welcome : <?php print($userRow['user_name']); ?></h5>
        <hr />
        
        
        <div class="row">
    <form class="col l12">
      <div class="row">
        <div class="input-field col l6 m12 s12">
         <h5>Available Students</h5>
        </div>
        <div class="input-field col l6 m12 s12">
          <i class="material-icons prefix">mode_edit</i>
          <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
          <label for="icon_prefix2">Write Task</label>
        

      </div>
      
    </form>
  </div>
       
        
    
    
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
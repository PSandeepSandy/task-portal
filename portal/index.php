<?php
session_start();
require_once("class.user.php");
$login = new USER();

if($login->is_loggedin()!="")
{
  $login->redirect('student.php');
}

if(isset($_POST['btn-login']))
{
  $uname = strip_tags($_POST['txt_uname_email']);
  $umail = strip_tags($_POST['txt_uname_email']);
  $upass = strip_tags($_POST['txt_password']);
    
  if($login->doLogin($uname,$umail,$upass))
  {
    $login->redirect('student.php');
  }
  else
  {
    $error = "Wrong Details !";
  } 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Coding Cage : Login</title>

<link rel="stylesheet" href="style.css" type="text/css"  />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

</head>
<body>

<div class="signin-form">

  <div class="container">
     
        
       <form class="form-signin" method="post" id="login-form">
      
        <h5 class="form-signin-heading">Log In to Taskit.</h5><hr />
        
        <div id="error">
        <?php
      if(isset($error))
      {
        ?>
                <div class="alert alert-danger">
                   <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                </div>
                <?php
      }
    ?>
        </div>
        
        <div class="form-group">
        <input type="text" class="form-control" name="txt_uname_email" placeholder="Username or E mail ID" required />
        <span id="check-e"></span>
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" name="txt_password" placeholder="Your Password" />
        </div>
       
      <br />
        
        <div class="form-group">
            <button type="submit" name="btn-login" class="waves-effect waves-light btn">
                  <i class="glyphicon glyphicon-log-in"></i> &nbsp; SIGN IN
            </button>
        </div>  
        <br />
            
      </form>

    </div>
    
</div>

</body>
</html>
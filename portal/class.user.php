
<?php

require_once('dbconfig.php');

class USER
{	

	private $conn;
	
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
	
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
    
    public function stud_list(){
    	$user_id = $_SESSION['user_session'];
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE avail = '0' and type= 's' ");
		$stmt->execute();
		while($taskRow=$stmt->fetch(PDO::FETCH_ASSOC)){

             echo '<div class="row">
        <div class="col s12 m12 l12">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              
              <p>'.$taskRow['fullname'].'
              <hr>
                     <button onclick="Assign('.$taskRow['user_id'].','.$user_id.')" class="btn waves-effect waves-light  blue lighten-2" style="" >assign</button>
              </p>
              

              </div>
            
          </div>
        </div>
      </div>';
}    
    }
    
    public function assign_task($sid, $pid, $task ){
        $stmt = $this->conn->prepare("INSERT INTO taskrecord(Prof_id, Stud_id, Task_desc, Status) VALUES($pid, $sid, '$task', '0')");
        $stmt2 = $this->conn->prepare("UPDATE users SET avail='1' where user_id=$sid");
		$stmt->execute();
        $stmt2->execute();

    
    }

    public function delete_task($task_id){
		$stmt = $this->conn->prepare("DELETE FROM taskrecord WHERE task_id = $task_id ");
		$stmt->execute(); 
	}
    

	public function comp_task($task_id){
		$user_id = $_SESSION['user_session'];
		$stmt = $this->conn->prepare("UPDATE taskrecord SET Status='1' where id=$task_id");
		$stmt2 = $this->conn->prepare("UPDATE users SET avail='0' where user_id=$user_id");
		$stmt->execute(); 
	    $stmt2->execute(); 

	}
	public function comp_task2($task_id,$stud_id){
		$user_id = $_SESSION['user_session'];
		$stmt = $this->conn->prepare("UPDATE taskrecord SET Status='1' where id=$task_id");
		$stmt2 = $this->conn->prepare("UPDATE users SET avail='0' where user_id=$stud_id");
		$stmt->execute(); 
	    $stmt2->execute(); 

	}

    public function total_task(){
		$stmt = $this->conn->prepare("SELECT * FROM taskrecord WHERE Status = '0' ");
		$stmt->execute();
		while($taskRow=$stmt->fetch(PDO::FETCH_ASSOC)){

             echo '<div class="row">
        <div class="col s12 m6">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              
              <p>'.$taskRow['Task_desc'].'</p>
            </div>
            
          </div>
        </div>
      </div>';
}    
	}


	public function stud_task(){
		$user_id = $_SESSION['user_session'];
		$stmt = $this->conn->prepare("SELECT * FROM taskrecord WHERE stud_id=$user_id and Status='0' ");
		$stmt->execute();
		while($taskRow=$stmt->fetch(PDO::FETCH_ASSOC)){
		return '<div class="row">
        <div class="col s12 m6">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              
              <p>'.$taskRow['Task_desc'].'</p>
            </div>
            <div class="card-action">
               <button onclick="Completed('.$taskRow['id'].');" class="btn waves-effect waves-light"><i class="zmdi zmdi-check zmdi-hc-3x"></i></button>
              
            </div>
          </div>
        </div>
      </div>';
  };
	}
	public function studcomp_task(){
		$user_id = $_SESSION['user_session'];
		$stmt = $this->conn->prepare("SELECT * FROM taskrecord WHERE stud_id=$user_id and Status='1' ");
		$stmt->execute();
		while($taskRow=$stmt->fetch(PDO::FETCH_ASSOC)){
		echo '<div class="row">
        <div class="col s12 m6">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              
              <p>'.$taskRow['Task_desc'].'</p>
            </div>
          </div>
        </div>
      </div>';
  };
	}

	public function profassgn_task(){
		$user_id = $_SESSION['user_session'];
		$stmt = $this->conn->prepare("SELECT * FROM taskrecord WHERE prof_id=$user_id and Status='0' ");
		$stmt->execute();
		while($taskRow=$stmt->fetch(PDO::FETCH_ASSOC)){
		$stmt1 = $this->conn->prepare("SELECT * FROM users WHERE user_id={$taskRow['Stud_id']} ");
		$stmt1->execute();
		$userRow=$stmt1->fetch(PDO::FETCH_ASSOC);
		echo '<div class="row">
        <div class="col s12 m12 l12">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <p>'.$userRow['user_name'].'</p>
              <p>'.$taskRow['Task_desc'].'</p>
              <hr>
              <button onclick="" class="btn waves-effect waves-light " style="" >edit</button>
			  <button onclick="Completed('.$taskRow['id'].','.$taskRow['Stud_id'].')" class="btn waves-effect waves-light blue " style="" >completed</button>
              <button onclick="Delete('.$taskRow['id'].')" class="btn waves-effect waves-light red darken-2" style="" >delete</button>
            </div>
          </div>
        </div>
      </div>';
  };
	}

	public function profcomp_task(){
		$user_id = $_SESSION['user_session'];
		$stmt = $this->conn->prepare("SELECT * FROM taskrecord WHERE prof_id=$user_id and Status='1' ");
		$stmt->execute();
		while($taskRow=$stmt->fetch(PDO::FETCH_ASSOC)){
		$stmt1 = $this->conn->prepare("SELECT * FROM users WHERE user_id={$taskRow['Stud_id']} ");
		$stmt1->execute();
		$userRow=$stmt1->fetch(PDO::FETCH_ASSOC);
		echo '<div class="row">
        <div class="col s12 m12 l12">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <p>'.$userRow['user_name'].'</p>
              <p>'.$taskRow['Task_desc'].'</p>
            </div>
          </div>
        </div>
      </div>';
  };
	}


	public function register($uname,$umail,$upass)
	{
		try
		{
			$new_password = password_hash($upass, PASSWORD_DEFAULT);
			
			$stmt = $this->conn->prepare("INSERT INTO users(user_name,user_email,user_pass) 
		                                               VALUES(:uname, :umail, :upass)");
												  
			$stmt->bindparam(":uname", $uname);
			$stmt->bindparam(":umail", $umail);
			$stmt->bindparam(":upass", $new_password);										  
				
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}
	
	
	public function doLogin($uname,$umail,$upass)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT user_id, user_name, user_email, user_pass FROM users WHERE user_name=:uname OR user_email=:umail ");
			$stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1)
			{
				if(($upass==$userRow['user_pass']))
				{
					$_SESSION['user_session'] = $userRow['user_id'];
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function is_loggedin()
	{
		if(isset($_SESSION['user_session']))
		{
			return true;
		}
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	public function doLogout()
	{
		session_destroy();
		unset($_SESSION['user_session']);
		return true;
	}
}
?>
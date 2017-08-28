<?php
require_once('dbconfig.php');


	$database = new Database();
	$db = $database->dbConnection();
	$this->conn = $db;
    
	
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	
	public function create_task($stud_id,$task_desc,$task_id)
	{
		$time = time();
		$user_id = $_SESSION['user_session'];
		$stmt = runQuery("SELECT * FROM users WHERE user_id=:user_id");
		$stmt->execute(array(":user_id"=>$user_id));
		$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
		
		$stmt = $auth_user->runQuery("SELECT * FROM task-records ORDER BY id DESC");
		$stmt->execute();
		$taskRow=$stmt->fetch(PDO::FETCH_ASSOC);
		$stmt = $this->conn->prepare("INSERT INTO taskrecord(Prof_id,Stud_id,Task_id,Task_desc,Status,time_stamp) 		
		                                               VALUES($userRow['id'],$stud_id,$task_id,$task_desc,'0',$time)");
		$stmt->execute();		
	}
	public function delete_task($task_id){
		$stmt = $this->conn->prepare("DELETE FROM taskrecord WHERE task_id = $task_id ");
		$stmt->execute();
		
	}
	
	public function stud_task(){
		$user_id = $_SESSION['user_session'];
		$stmt = $this->conn->prepare("SELECT * FROM task-records WHERE stud_id=$user_id");
		$stmt->execute();
		$taskRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $taskRow;
	}
	public function total_task($task_id){
		$stmt = $this->conn->prepare("SELECT * FROM task-records WHERE Status = '0' ");
		$stmt->execute();
		$taskRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $taskRow;
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	
}
?>
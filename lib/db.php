<?php
    include "config.inc";

	try {
		$con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
	}
	 
	// to handle connection error
	catch(PDOException $exception){
		echo "Connection error: " . $exception->getMessage();
	}
	
	function check_login($username="",$password=""){
		global $con;
		$password=hash('sha512',$password);
		$stmt = $con->prepare("SELECT id FROM user WHERE txt_username = :username AND cod_password = :password");
		$stmt->bindValue(':username', $username, PDO::PARAM_STR);
		$stmt->bindValue(':password', $password, PDO::PARAM_STR);
		$stmt->execute();
		
		return $stmt->rowCount();
	}

	function get_users($search="",$order="",$limit="",$offset="",$sort=""){
		global $con;
		$query="SELECT * FROM user ";
		if($search) $query.="WHERE (txt_name LIKE '%".$search."%') OR (txt_surname LIKE '%".$search."%') OR (txt_username LIKE '%".$search."%') OR (id='".$search."')";
		// if($order) $query.="ORDER BY ".$order." ";
		if($sort) $query.=" ORDER BY ".$sort." ".$order;
		$query_limit=$query;
		if($limit) $query_limit.=" LIMIT ".$offset.",".$limit;
		
		$fp=fopen("debug_db.txt","w");
		fwrite($fp,$query_limit);
		fclose($fp);
		$stmt = $con->prepare($query_limit);
		$stmt2 = $con->prepare($query);
		$stmt->execute();
		$stmt2->execute();
		// $row = $stmt->fetch(PDO::FETCH_ASSOC);
		$users["num_users"]=$stmt2->rowCount();
		$users["result"]=$stmt;
		return $users;
	}	
	
	
	function get_active_users_number(){
		global $con;
		$stmt = $con->prepare("SELECT count(*) AS num_users FROM user WHERE fg_status=1");
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		return $row;
	}
	
	function get_users_number(){
		global $con;
		$stmt = $con->prepare("SELECT count(*) AS num_users FROM user");
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		return $row;
	}

	function get_active_detectors_number(){
		global $con;
		$stmt = $con->prepare("SELECT count(*) AS num_detectors FROM detector WHERE fg_status=1");
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		return $row;
	}	
	
	function get_detectors($search="",$order="",$limit="",$offset="",$sort=""){
		global $con;
		$query="SELECT * FROM detector ";
				
		if($search) $query.="WHERE (de_detector LIKE '%".$search."%') ";
		// if($order) $query.="ORDER BY ".$order." ";
		if($sort) $query.=" ORDER BY ".$sort." ".$order;
		$query_limit=$query;
		if($limit) $query_limit.=" LIMIT ".$offset.",".$limit;

		$fp=fopen("debug_db.txt","w");
		fwrite($fp,$query_limit);
		fclose($fp);
				
		$stmt = $con->prepare($query_limit);
		$stmt2 = $con->prepare($query);
		$stmt->execute();
		$stmt2->execute();
		// $row = $stmt->fetch(PDO::FETCH_ASSOC);
		$detectors["num_detectors"]=$stmt2->rowCount();
		$detectors["result"]=$stmt;
		return $detectors;
	}		
	
	function get_tags($search="",$order="",$limit="",$offset="",$sort=""){
		global $con;
		$query="SELECT * FROM tag ";
				
		if($search) $query.="WHERE (de_tag LIKE '%".$search."%') ";
		// if($order) $query.="ORDER BY ".$order." ";
		if($sort) $query.=" ORDER BY ".$sort." ".$order;
		$query_limit=$query;
		if($limit) $query_limit.=" LIMIT ".$offset.",".$limit;

		$fp=fopen("debug_db.txt","w");
		fwrite($fp,$query_limit);
		fclose($fp);
				
		$stmt = $con->prepare($query_limit);
		$stmt2 = $con->prepare($query);
		$stmt->execute();
		$stmt2->execute();
		// $row = $stmt->fetch(PDO::FETCH_ASSOC);
		$detectors["num_tags"]=$stmt2->rowCount();
		$detectors["result"]=$stmt;
		return $detectors;
	}		
	
	
	
	function get_active_tags(){
		global $con;
		$stmt = $con->prepare("SELECT count(*) AS num_tags FROM detection WHERE fk_tag IS NOT NULL");
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		return $row;
	}		
	
	function get_unknown_tags(){
		global $con;
		$stmt = $con->prepare("SELECT count(*) AS num_tags FROM detection WHERE fk_tag IS NULL");
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		return $row;
	}		
	
	function get_month_timesheet($month="",$year="",$tag=""){
		global $con;
		$stmt = $con->prepare("SELECT * FROM detection WHERE MONTH(dt_detection) = $month AND YEAR(dt_detection) = $year AND fk_tag=$tag");
		$stmt->execute();
		while($rows[] = $stmt->fetch(PDO::FETCH_ASSOC)) {}
		
		return $rows;
	}		


	if(false && $_GET["action"]=="create_demo_users"){
		for($i=2;$i<3000;$i++){
			$query="INSERT INTO `kairos`.`user` (`id`, `txt_name`, `txt_surname`, `txt_username`, `cod_password`, `fg_status`) VALUES (NULL, 'user".$i."', 'surname".$i."', 'username".$i."', 'abc', '1')";
			$stmt = $con->prepare($query);
			$stmt->execute();
		}	
	}
	
?>
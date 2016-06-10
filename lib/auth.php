<?php
	$protocol='http' . (isset($_SERVER['HTTPS']) ? 's' : ''); 
	$host="{$_SERVER['HTTP_HOST']}"; 
	$port=(($_SERVER['SERVER_PORT'] != 80 || $_SERVER['SERVER_PORT'] != 443) ? "" : ":" . $_SERVER['SERVER_PORT']); 
	$request_uri="{$_SERVER['REQUEST_URI']}"; 
	$server_url= $protocol.'://'.$host.$port.$request_uri;
	
	if ($_POST["username"]){		
		$_SESSION["username"]=$_POST["username"];
		$_SESSION["logged_in"]=check_login($_SESSION["username"],$_POST["password"]);
		if($_SESSION["logged_in"]){
			header('Location: home.php');		
		}	
    }else{
		header("Location: index.php?redirect=".$server_url);	
	}
/*	
	if($_SESSION["logged_in"]){
	    $_SESSION["logged_in"]=true;
	}else{
		header('Location: index.php');	
	} */
	
	if ($_POST["remember"]){	
		$_SESSION["remember"]="checked";
	}	
	else{
		unset($_SESSION["remember"]);
		unset($_SESSION["username"]);
		unset($_SESSION["password"]);
	}	

?>
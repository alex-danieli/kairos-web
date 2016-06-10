<?php
error_reporting(0);
require_once("../lib/db.php");


$users=get_users($_GET["search"],$_GET["order"],$_GET["limit"],$_GET["offset"],$_GET["sort"]);
$stmt=$users["result"];


?>
{
	"total": <?php echo $users["num_users"]; ?>,
	"rows": 
<?php
$fp=fopen("debug.txt","w");
		

while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
	$user[]=$row;
	unset($user[sizeof($user)-1]["cod_password"]);
}

fwrite($fp,print_r($_GET,TRUE));
fwrite($fp,print_r($user,TRUE));
fclose($fp);
// print_r($user);


	echo json_encode($user);	

	
?>
	
}	


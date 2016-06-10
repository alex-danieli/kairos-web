<?php
error_reporting(0);
require_once("../lib/db.php");


$detectors=get_detectors($_GET["search"],$_GET["order"],$_GET["limit"],$_GET["offset"],$_GET["sort"]);
$stmt=$detectors["result"];


?>
{
	"total": <?php echo $detectors["num_detectors"]; ?>,
	"rows": 
<?php
$fp=fopen("debug.txt","w");
		

while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
	$detector[]=$row;
	
}

fwrite($fp,print_r($_GET,TRUE));
fwrite($fp,print_r($detector,TRUE));
fclose($fp);



	echo json_encode($detector);	

	
?>
	
}	


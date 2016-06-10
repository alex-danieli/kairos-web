<?php
error_reporting(0);
require_once("../lib/db.php");


$tags=get_tags($_GET["search"],$_GET["order"],$_GET["limit"],$_GET["offset"],$_GET["sort"]);
$stmt=$tags["result"];


?>
{
	"total": <?php echo $tags["num_tags"]; ?>,
	"rows": 
<?php
$fp=fopen("debug.txt","w");
		

while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
	$tag[]=$row;
	
}

fwrite($fp,print_r($_GET,TRUE));
fwrite($fp,print_r($tag,TRUE));
fclose($fp);



	echo json_encode($tag);	

	
?>
	
}	


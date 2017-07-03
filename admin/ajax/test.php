<?


session_start();
require_once("../_lib/config.php");
require_once("../_lib/MysqliDb.php");
$db2 = new MysqliDb (DBHOST, DBUSER, DBPASS, DBNAME);


function existeOT($ot){
	$db2 = new MysqliDb (DBHOST, DBUSER, DBPASS, DBNAME);
	$db2->where ("tareaOT", $ot);
	$user = $db2->get("tareas");
	$total = $db2->count;
	return $total;
}

echo existeOT($_GET['OT']);


?>
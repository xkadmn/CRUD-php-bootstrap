<?php
$contrasena = "";
$usuario = "root";
$nombre_db = "login";

try {
	$db = new PDO (
	'mysql:host=localhost;
	dbname='.$nombre_db,
	$usuario,$contrasena,
	array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
	);

}catch (Exception $e){
	echo "problema con la conexion: ".$e->getMessage();
}
?>
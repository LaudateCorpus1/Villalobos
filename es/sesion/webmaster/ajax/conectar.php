<?php 
error_reporting(0);

	$servidor = "localhost";
  	$usuario = "root";
 	$pass = "";
 	$db = "villalobos";

	/*$servidor = "localhost";
  	$usuario = "u514965505_root";
 	$pass = "N05L3N_soto";
 	$db = "u514965505_awdm";*/

$conexion = mysql_connect($servidor, $usuario, $pass);

if (!$conexion){
     echo "Error al conectar a la base de datos.";
} else {
    mysql_select_db($db);
}
return $conexion; 
?>


<?php 
error_reporting(0);

 	$servidor = "localhost";
  	$usuario = "root";
 	$pass = "";
 	$db = "villalobos";


$conexion = mysql_connect($servidor, $usuario, $pass);

if (!$conexion){
     echo "Error al conectar a la base de datos.";
} else {
    mysql_select_db($db);
}
return $conexion; 
?>


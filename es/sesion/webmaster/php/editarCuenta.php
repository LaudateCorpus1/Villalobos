<meta charset="UTF-8">
<?PHP

require("../../../php/conectar.php");

$id_usuario = $_POST['id_usuario'];
$nombre = $_POST['nombre'];
$apellido_p = $_POST['apellido_p'];
$apellido_m = $_POST['apellido_m'];
$calle = $_POST['calle'];
$numero = $_POST['numero'];
$colonia = $_POST['colonia'];
$telefono = $_POST['tel'];
$celular = $_POST['cel'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];


	$act = mysql_query("UPDATE usuarios SET nombre='$nombre', apellido_p='$apellido_p', apellido_m='$apellido_m', calle='$calle', numero='$numero', colonia='$colonia', usuario='$usuario', telefono='$telefono', celular='$celular', correo='$correo' WHERE id_usuario='$id_usuario' ");

	if ($act) 
		{
			echo "<script>alert('Usuario editado con Exito!')</script>";
			echo "<script>alert('Vuelva a iniciar Sesión!')</script>";
			session_start();
			session_destroy();
			echo "<script>location.href='../../../index.php'</script>";
			
	
}else
{
	
			echo "<script>alert('Error al editar los datos')</script>";
			echo "<script>location.href='../cuenta.php'</script>";
		
}
?>
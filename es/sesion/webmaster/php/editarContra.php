<meta charset="UTF-8">
<?PHP

require("../../../php/conectar.php");

$id_usuario = $_POST['id_usuario'];
$pass = $_POST['contra'];
$r_pass = $_POST['r_contra'];


if ($pass == $r_pass) {
	$contra = crypt($pass,"villalobos");
	$r_contra = crypt($r_pass,"villalobos");

	$act = mysql_query("UPDATE usuarios SET contra='$contra', r_contra='$r_contra' WHERE id_usuario='$id_usuario' ");

	if ($act) 
		{
			echo "<script>alert('Contraseña editada con Exito!')</script>";
			echo "<script>alert('Vuelva a iniciar Sesión!')</script>";
			session_start();
			session_destroy();
			echo "<script>location.href='../../index.php'</script>";
			
	
		}else
			{
	
				echo "<script>alert('Error al editar la contraseña')</script>";
				echo "<script>location.href='../cuenta.php'</script>";
		
			}
	
}
else
{
			echo "<script>alert('Las Contraseñas no coinciden')</script>";
			echo "<script>location.href='../ediCon.php'</script>";
}
?>
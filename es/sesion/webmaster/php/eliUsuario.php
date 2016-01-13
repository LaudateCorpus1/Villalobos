<meta charset="UTF-8">
<?PHP

require("../../../php/conectar.php");

$id_usuario = $_GET['id'];

$resul = mysql_query("DELETE FROM usuarios WHERE id_usuario = '$id_usuario'");


	if ($resul) 
	{
		echo "<script>alert('Usuario eliminado con Exito!')</script>";
		echo "<script>location.href='../../index.php'</script>";
	}
		else
		{
			echo "<script>alert('Ocurrio un error, intentelo de nuevo')</script>";
			echo "<script>location.href='../datosUsuario.php'</script>";
		}

?>
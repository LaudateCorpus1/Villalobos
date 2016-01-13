<meta charset="UTF-8"/>
<?PHP
	require("../../../php/conectar.php");

	$nombre = $_POST['nombre'];
	$apellido_p = $_POST['apellido_p'];
	$apellido_m = $_POST['apellido_m'];
	$calle = $_POST['calle'];
	$numero = $_POST['numero'];
	$colonia = $_POST['colonia'];
	$cp = $_POST['cp'];
	$telefono = $_POST['telefono'];
	$celular = $_POST['celular'];
	$correo = $_POST['correo'];
	$usuario = $_POST['usuario'];
	$pass = $_POST['contra'];
	$r_pass = $_POST['r_contra'];
	$perfil = $_POST['perfil'];

	$fecha = date("Y-m-d");

	$contra = crypt($pass,"villalobos");
	$r_contra = crypt($r_pass,"villalobos");

	if ($contra == $r_contra) {
		$insert = mysql_query("INSERT INTO usuarios (id_usuario, nombre, apellido_p, apellido_m, calle, numero, colonia, cp, usuario, contra, r_contra, telefono, celular, correo, fecha, perfil) VALUES ('', '".$nombre."', '".$apellido_p."', '".$apellido_m."', '".$calle."', '".$numero."', '".$colonia."', '".$cp."', '".$usuario."', '".$contra."', '".$r_contra."', '".$telefono."', '".$celular."', '".$correo."', '".$fecha."', '".$perfil."');") or die(mysql_error());

		if ($insert) {
			echo "<script>alert('Usuario agregado con exito!')</script>";
			echo "<script>location.href='../usuarios.php'</script>";
		}
			else
			{
				echo "<script>alert('Ocurrio un error!, Vuelva a intentarlo')</script>";
				echo "<script>location.href='../agrUsuario.php'</script>";
			}
	}
		else
			{
				echo "<script>alert('Las constraseñas no coinciden')</script>";
				echo "<script>location.href='../agrUsuario.php'</script>";
			}



?>
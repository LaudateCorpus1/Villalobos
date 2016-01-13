<meta charset = "UTF-8" />
<?php

ini_set('session.use_cookies', '1'); 

ob_start();

	session_start();
	
	require("conectar.php");

	$usuario=$_POST['usuario'];
	$pass = $_POST['pass'];
	$encrip = md5 ($pass);

	

	$resul = mysql_query("SELECT * FROM usuarios WHERE usuario = '$usuario' AND contra = '$pass'");
	
		if($row = mysql_fetch_array($resul))
			{				
				$role = $row['perfil'];

				switch ($role) {

					case 'normal':
						$_SESSION['log'] = 'yes';
						$_SESSION['id'] = $row['id_usuario'];
						$_SESSION['user'] = $row['nombre'];
						$_SESSION['apellido_p'] = $row['apellido_p'];
						$_SESSION['apellido_m'] = $row['apellido_m'];
						$_SESSION['perfil'] = $row['perfil'];

						/*header('Location: ../sesion/usuario/index.php');*/
						/*echo "<script type='text/javascript'> document.location = '../sesion/usuario/index.php </script>";*/
						 echo "<script type='text/javascript'>window.location.href='../sesion/index.php'</script>";
						 /*echo "<script type='text/javascript'>window.location.href='../sesion/usuario/index.php?name=".$row['nombre']."&log=yes'</script>";*/
						/*exit();*/
						break;
						
					case 'webmaster':
						$_SESSION['log'] = 'yes';
						$_SESSION['id'] = $row['id_usuario'];
						$_SESSION['user'] = $row['nombre'];
						$_SESSION['apellido'] = $row['apellido_p'];
						$_SESSION['perfil'] = $row['perfil'];
						header('location: ../sesion/usuario/index.php');
						break;

					case 'admin':
						$_SESSION['log'] = 'yes';						
						$_SESSION['id'] = $row['id'];
						$_SESSION['nombre'] = $row['nombre'];
						$_SESSION['apellido'] = $row['apellido'];
						$_SESSION['correo'] = $row['correo'];
						$_SESSION['img'] = $row['img'];
						header('location: ../admin/index.html');
						break;
						

					case 'inactivo':
						$_SESSION['log'] = 'yes';
						$_SESSION['id'] = $row['id_usuario'];
						$_SESSION['user'] = $row['nombre'];
						$_SESSION['apellido'] = $row['apellido'];
						header('location: ../sesion/inactivo.php');
						break;		
				}
			}
			else
			{
				//header('location: ../error/error.html');
				echo "<script>alert('Usuario no Registrado, Verifique sus Datos')</script>";
				echo "<script>location.href='../index.html'</script>";
			}

ob_end_flush();
?>
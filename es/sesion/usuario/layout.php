<!DOCTYPE html>
<?php
ob_start();
session_start();
// establecemos el tiempo de espera en segundos
    $inactivo = 30;

    // verificamos que ya exista un valor para timeout
    if (isset($_SESSION["timeout"])) {

        // calculamos el tiempo que lleva la sesión
        $tiempoSession = time() - $_SESSION["timeout"];

        // si se pasó el umbral de inactividad
        if ($tiempoSession > $inactivo) {

            // destruimos la sesión y desconectamos al usuario
            session_destroy();
            echo'<script type="text/javascript">alert("Su sesion ha expirado por inactividad';
   			echo', vuelva a logearse para continuar");window.location.href="../index.html";</script>';
            /*header("Location: ../index.html");*/
        }
    }
    // el usuario interactúa por primera vez
    $_SESSION["timeout"] = time();
?>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<link rel="shortcut icon" href="img/favicon/favicon.png" type="image/png"/>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> <!-- meta:vp -->
		<link rel="stylesheet" href="css/style.css">
		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/flatly/bootstrap.min.css">
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/cosmo/bootstrap.min.css"> -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

		<!-- Fin Bootstrap -->
		<!-- Bootstrap localmente
		<link rel="stylesheet" href="css/bootstrap.min.css">
		FIN Bootstrap localmente -->
		<title>Villalobos & Moore</title>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div id="imgLogo" class="col-md-6 col-md-offset-3">
					<img src="img/Logo.png" class="img-responsive" alt="Logo.png">
				</div>
			</div>
		</div>
		<div class=" cabecera ">
			<div class="">
				<div class=""><!-- <div class="col-md-8 col-md-offset-2"> -->
					<nav class="navbar navbar-default text-center">
					  <div class="container-fluid">
					    <!-- Brand and toggle get grouped for better mobile display -->
					    <div class="navbar-header">
					      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					      </button>
					      <a class="navbar-brand LogoMenu" href="#" class="hidden-lg hidden-md hidden-sm"><img src="img/LogoMenu.png" alt="" class="hidden-lg hidden-md hidden-sm"></a>
					    </div>
				
					    <!-- Collect the nav links, forms, and other content for toggling -->
					    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					      <ul class="nav navbar-nav">
					        <!-- <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li> -->
					        <!-- <li><a href="#">Link</a></li> -->
					        <li class="dropdown">
					          <a href="index.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Inicio<span class="caret"></span></a>
					          <ul class="dropdown-menu" role="menu">
					          	<li role="presentation" class="dropdown-header">General</li>
					          	<li><a href="index.html">Página de Inicio</a></li>
					          	<li role="presentation" class="dropdown-header">Publicaciones</li>
					            <li><a href="inicio/convención-anual-PDAC-2014.html">Convención Anual PDAC 2014</a></li>
					            <li><a href="#">Programa de Desarrollo Minero 2013-2018</a></li>
					          </ul>
					        </li>
					        <li class="dropdown">
					          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-users"></i> Acerca de nosotros<span class="caret"></span></a>
					          <ul class="dropdown-menu" role="menu">
					          	<li role="presentation" class="dropdown-header">Villalobos & Moore</li>
					            <li><a href="#">Perfil de la Firma</a></li>
					            <li><a href="#">Experiencia</a></li>
					            <li class="divider"></li>
					          	<li role="presentation" class="dropdown-header">Profesionales</li>
					            <li><a href="#">Martha Angélica Villalobos Murillo</a></li>
					            <li><a href="#">John B. Moore</a></li>
					            <li><a href="#">Alejandro Parra García</a></li>
					            <li><a href="#">Leobardo Tenorio Malof</a></li>
					            <li><a href="#">Héctor Torres</a></li>
					            <li><a href="#">Alejandro Pedrín</a></li>
					            <li><a href="#">Mauricio Tortolero</a></li>
					            <li><a href="#">Roberto Anaya Moreno</a></li>
					          </ul>
					        </li>
					        <li class="dropdown">
					          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-line-chart"></i> Práctica<span class="caret"></span></a>
					          <ul class="dropdown-menu" role="menu">
					          	<li role="presentation" class="dropdown-header">Áreas de experiencia</li>
					            <li><a href="#">Corporativo</a></li>
					            <li><a href="#">Inmobilario</a></li>
					            <li><a href="#">Laboral</a></li>
					            <li><a href="#">Fiscal</a></li>
					            <li><a href="#">Ambiental</a></li>
					            <li><a href="#">Migratorio</a></li>
					            <li><a href="#">Aduanero y Comercio Exterior</a></li>
					            <li><a href="#">Industria Minera</a></li>
					          </ul>
					        </li>
					        <li class="dropdown">
					          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-envelope-o"></i> Contacto<span class="caret"></span></a>
					          <ul class="dropdown-menu" role="menu">
					          	<li role="presentation" class="dropdown-header">Contactanos</li>
					            <li><a href="#">Forma de contacto</a></li>
					            <li><a href="index.php">index.php</a></li>
					            <li><a href="#">Aviso de privacidad</a></li>
					          </ul>
					        </li>
					        <li class="">
					          <a href="#" ><i class="fa fa-sign-in"></i> Iniciar Sesión</a>
					        </li>
					      </ul>
					    </div><!-- /.navbar-collapse -->
					  </div><!-- /.container-fluid -->
					</nav>
				</div>
			</div>
		</div> <!-- Fin del Menu -->

		<div id = "acceder">
			<?php		
				
				if($_SESSION['log'] == 'yes')
					{
					echo "<h3>Bienvenido!" . $_SESSION['user']. " ".$_SESSION['apellido']. "</h3>";
					}
					else
					{
						header("Location: ../index.html");
						/*echo "<script language=Javascript> location.href=\"../index.html\"; </script>"; */
						exit;
					}
			?>
			<a href="cerrarSesion/cerrarSesion.php"><input class="btn btn-primary" type="button"value="Cerrar Sesión"></a>
		</div>


		<footer class="text-center">
			<div class="container">
				<p>
					VILLALOBOS & MOORE 2015 TODOS LOS DERECHOS RESERVADOS
				</p>
				<p>
					Vía Lombardía 5705 Int 503, Saucito <br>
					Chihuahua, Chihuahua, México
				</p>
				<p>
					+52 (614) 236 8012, +52 (614) 236 8013, +52 (614) 297 0568
				</p>
			</div>
		</footer>



		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<!-- Los JavaScript locales
		<script src="js/bootrap.min.js"></script>
		<script src="js/jquery-1-11-3-min.js"></script>
		FIN Los JavaScript -->
	</body>
</html>
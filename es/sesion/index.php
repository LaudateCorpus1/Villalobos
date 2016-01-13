<?php
session_start();
ob_start();
/*establecemos el tiempo de espera en segundos*/
    $inactivo = 600;

     /*verificamos que ya exista un valor para timeout*/
    if (isset($_SESSION["timeout"])) {

        /* calculamos el tiempo que lleva la sesión*/
        $tiempoSession = time() - $_SESSION["timeout"];

         /*si se pasó el umbral de inactividad*/
        if ($tiempoSession > $inactivo) {

            /*destruimos la sesión y desconectamos al usuario*/
            session_destroy();
            echo'<script type="text/javascript">alert("Su sesion ha expirado por inactividad';
   			echo', vuelva a logearse para continuar");window.location.href="../../index.php";</script>';
           /* header("Location: ../index.html");*/
        }
    }
    /*el usuario interactúa por primera vez*/
    $_SESSION["timeout"] = time();
    ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<link rel="shortcut icon" href="../img/favicon/favicon.png" type="image/png"/>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> <!-- meta:vp -->
		<link rel="stylesheet" href="css/style.css">
		<!-- <link rel="stylesheet" href="../css/style.css"> -->
		
		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/lumen/bootstrap.min.css">
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/cosmo/bootstrap.min.css"> -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<title>Inicio de Sesión</title>
	</head>
	<body>
		<div class="cabecera">
			<div class="container">
				<div class="row">
					<div id="" class="col-md-6 col-md-offset-3">
						<img src="../img/Logo.png" class="img-responsive" alt="Logo.png">
					</div>
				</div>
			</div>
		</div>


		<?php
				include ('../php/conectar.php'); // De aquí sacamos la función para autenticar usuarios
				// Revisamos si el usuario está intentando ingresar con su cuenta
				if ($_POST['usuario']) {
				    $usuario=$_POST['usuario'];
					$pass = crypt($_POST['pass'],"villalobos");

					$resul = mysql_query("SELECT * FROM usuarios WHERE usuario = '$usuario' AND contra = '$pass'");

				    if ($resul) {

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
										echo "<script type='text/javascript'>window.location.href='../sesion/index.php'</script>";
										break;
										
									case 'webmaster':
										$_SESSION['log'] = 'yes';
										$_SESSION['id'] = $row['id_usuario'];
										$_SESSION['user'] = $row['nombre'];
										$_SESSION['apellido'] = $row['apellido_p'];
										$_SESSION['perfil'] = $row['perfil'];
										echo "<script type='text/javascript'>window.location.href='../sesion/index.php'</script>";
										break;

									case 'inactivo':
										$_SESSION['log'] = 'yes';
										$_SESSION['id'] = $row['id_usuario'];
										$_SESSION['user'] = $row['nombre'];
										$_SESSION['apellido'] = $row['apellido_p'];
										$_SESSION['perfil'] = $row['perfil'];
										echo "<script type='text/javascript'>window.location.href='index.php'</script>";
										break;

								}
			}
				        

				    } else {
				        // Si los datos son incorrectos, declaramos un error
				        $login_error = "Usuario o password incorrectos";
				        echo "<script>alert('Usuario o Password incorrectos');</script>";
				    }
				}
				?>


				<?php if(isset($_SESSION['user'])): ?>

				<!-- <h3>Hola!</h3>
				
				 <?php  //var_dump($_SESSION['perfil']); ?> -->

				<?php else: ?>

				<!-- A los usuarios no registrados les mostramos un formulario de ingreso -->
				 <div class="container">
				 	<div class="row">
				 		<div class="col-md-6 col-md-offset-3">
				 			<div class="sesion">
								<div class="row text-center">
									<h4 class="modal-title" id="myModalLabel">Inicio de Sesión</h4>
									<h4><?php if (isset($login_error)) { echo "<p>Usuario y/o Contraseña equivocado</p>"; } ?></h4>
								</div>
		 			            <hr>
		 			            <form action="index.php" method="POST">
					 				<div class="input-group">
	  									<span class="input-group-addon" id="sizing-addon2"></span>
	  									<input type="text"  name="usuario" class="form-control" placeholder="Usuario" aria-describedby="sizing-addon2">
									</div>
									<br>
									<div class="input-group">
	  									<span class="input-group-addon" id="sizing-addon2"></span>
	  									<input type="password"  name="pass" class="form-control" placeholder="Contraseña" aria-describedby="sizing-addon2">
									</div>
									<hr>
									<!-- <div class="input-group"> -->
									<button type="submit" class="btn btn-primary btn-block"><i class="fa fa-sign-in"></i> Iniciar Sesión</button>
									<!-- </div> -->
								</form>



				 			</div>
				 		</div>
				 	</div>
				 </div>
				 	
				 	                <footer class="text-center">
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
				 			</footer>






				<?php endif; ?>
		

			<?PHP

			if($_SESSION['perfil'] == "normal")
			{
            echo "<nav class='navbar navbar-default text-center'>
			<div class='container-fluid'>
			<div class='navbar-header'>
			<button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1'>
			<span class='sr-only'>Toggle navigation</span>
					        <span class='icon-bar'></span>
					        <span class='icon-bar'></span>
					        <span class='icon-bar'></span>
					      </button>
					      <a class='navbar-brand LogoMenu' href='#' class='hidden-lg hidden-md hidden-sm'><img src='img/LogoMenu.png' alt='' class='hidden-lg hidden-md hidden-sm'></a>
					    </div>
				
					    <!-- Collect the nav links, forms, and other content for toggling -->
					    <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
					      <ul class='nav navbar-nav'>
					        <!-- <li class='active'><a href='#'>Link <span class='sr-only'>(current)</span></a></li> -->
					        <!-- <li><a href='#'>Link</a></li> -->
					         <li><a href='usuario/index.php'><i class='fa fa-newspaper-o'></i> Sección de Noticias</a></li>
					         <li><a href='usuario/cuenta.php'><i class='fa fa-cogs'></i> Cuenta</a></li>
					         <li><a>";	


					 if($_SESSION['log'] == 'yes')
					{
					echo "Bienvenido! " . $_SESSION['user']. "";
					}
					else
					{
						header("Location: ../index.html");
						/*echo "<script language=Javascript> location.href=\"../index.html\"; </script>"; */
						exit;
					}

					        	echo "</a>
					        	</li>					        
					        <li><a href='cerrarSesion/cerrarSesion.php'><i class='fa fa-sign-in'></i> Cerrar Sesión</a></li>
					      </ul>
					    </div><!-- /.navbar-collapse -->
					  </div><!-- /.container-fluid -->
					</nav>";


					echo "<div class='container'>
			<div class='col-md-12 col-lg-12'>
				<div class='row'>
					<div id='carousel-example-generic' class='carousel slide' data-ride='carousel'>
						<!-- Indicators -->
						<ol class='carousel-indicators hidden-xs'>
							<li data-target='#carousel-example-generic' data-slide-to='0' class='active'></li>
							<li data-target='#carousel-example-generic' data-slide-to='1'></li>
							<li data-target='#carousel-example-generic' data-slide-to='2'></li>
							<li data-target='#carousel-example-generic' data-slide-to='3'></li>
							<!-- <li data-target='#carousel-example-generic' data-slide-to='4'></li> -->
						</ol>
						
						<!-- Wrapper for slides -->
						<div class='carousel-inner text-century' role='listbox'>
							<div class='item active'>
								<img src='../php/motivacion/motivacion01.jpg' alt='Motivación'>
								<div class='carousel-caption'>
								</div>
							</div>
							<div class='item text-century'>
								<img src='../php/motivacion/motivacion02.jpg' alt='Motivación'>
								<div class='carousel-caption'>
								</div>
							</div>
							<div class='item'>
								<img src='../php/motivacion/motivacion03.jpg' alt='Motivación'>
								<div class='carousel-caption'>
								</div>
							</div>
							<div class='item text-century'>
								<img src='../php/motivacion/motivacion04.jpg' alt='Motivación'>
								<div class='carousel-caption'>
								</div>
							</div>
						</div>
							 	<!-- Controls -->
						<a class='left carousel-control' href='#carousel-example-generic' role='button' data-slide='prev'>
							<span class='glyphicon glyphicon-chevron-left' aria-hidden='true'></span>
							<span class='sr-only'>Previous</span>
						</a>
						<a class='right carousel-control' href='#carousel-example-generic' role='button' data-slide='next'>
							<span class='glyphicon glyphicon-chevron-right' aria-hidden='true'></span>
							<span class='sr-only'>Next</span>
						</a>
					</div>
				</div>
			</div>
		</div>";
			





			echo "<footer class='text-center'>
			<div class='container'>
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
		</footer>";
				}







				elseif ($_SESSION['perfil'] == "webmaster") {
					echo "<nav class='navbar navbar-default text-center'>
			<div class='container-fluid'>
			<div class='navbar-header'>
			<button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1'>
			<span class='sr-only'>Toggle navigation</span>
					        <span class='icon-bar'></span>
					        <span class='icon-bar'></span>
					        <span class='icon-bar'></span>
					      </button>
					      <a class='navbar-brand LogoMenu' href='#' class='hidden-lg hidden-md hidden-sm'><img src='img/LogoMenu.png' alt='' class='hidden-lg hidden-md hidden-sm'></a>
					    </div>
				
					    <!-- Collect the nav links, forms, and other content for toggling -->
					    <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
					      <ul class='nav navbar-nav'>
					        <!-- <li class='active'><a href='#'>Link <span class='sr-only'>(current)</span></a></li> -->
					        <!-- <li><a href='#'>Link</a></li> -->
					         <li><a href='webmaster/index.php'><i class='fa fa-newspaper-o'></i> Sección de Noticias</a></li>
					         <li><a href='webmaster/usuarios.php'><i class='fa fa-users'></i> Usuarios</a></li>
					         <li><a href='webmaster/cuenta.php'><i class='fa fa-cogs'></i> Cuenta</a></li>
					          <li><a>";	
					        	if($_SESSION['log'] == 'yes')
					{
					echo "Bienvenido! " . $_SESSION['user']. "";
					}
					else
					{
						header("Location: ../index.html");
						/*echo "<script language=Javascript> location.href=\"../index.html\"; </script>"; */
						exit;
					}

					        	echo "</a>
					        	</li>					        
					        <li><a href='cerrarSesion/cerrarSesion.php'><i class='fa fa-sign-in'></i> Cerrar Sesión</a></li>
					      </ul>
					    </div><!-- /.navbar-collapse -->
					  </div><!-- /.container-fluid -->
					</nav>";



					echo "<div class='container'>
			<div class='col-md-12 col-lg-12'>
				<div class='row'>
					<div id='carousel-example-generic' class='carousel slide' data-ride='carousel'>
						<!-- Indicators -->
						<ol class='carousel-indicators hidden-xs'>
							<li data-target='#carousel-example-generic' data-slide-to='0' class='active'></li>
							<li data-target='#carousel-example-generic' data-slide-to='1'></li>
							<li data-target='#carousel-example-generic' data-slide-to='2'></li>
							<li data-target='#carousel-example-generic' data-slide-to='3'></li>
							<!-- <li data-target='#carousel-example-generic' data-slide-to='4'></li> -->
						</ol>
						
						<!-- Wrapper for slides -->
						<div class='carousel-inner text-century' role='listbox'>
							<div class='item active'>
								<img src='../php/motivacion/motivacion01.jpg' alt='Motivación'>
								<div class='carousel-caption'>
								</div>
							</div>
							<div class='item text-century'>
								<img src='../php/motivacion/motivacion02.jpg' alt='Motivación'>
								<div class='carousel-caption'>
								</div>
							</div>
							<div class='item'>
								<img src='../php/motivacion/motivacion03.jpg' alt='Motivación'>
								<div class='carousel-caption'>
								</div>
							</div>
							<div class='item text-century'>
								<img src='../php/motivacion/motivacion04.jpg' alt='Motivación'>
								<div class='carousel-caption'>
								</div>
							</div>
						</div>
							 	<!-- Controls -->
						<a class='left carousel-control' href='#carousel-example-generic' role='button' data-slide='prev'>
							<span class='glyphicon glyphicon-chevron-left' aria-hidden='true'></span>
							<span class='sr-only'>Previous</span>
						</a>
						<a class='right carousel-control' href='#carousel-example-generic' role='button' data-slide='next'>
							<span class='glyphicon glyphicon-chevron-right' aria-hidden='true'></span>
							<span class='sr-only'>Next</span>
						</a>
					</div>
				</div>
			</div>
		</div>";
			





			echo "<footer class='text-center'>
			<div class='container'>
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
		</footer>";




				}elseif ($_SESSION['perfil'] == "inactivo") {

					 echo "<script>alert('Comunicate con el Administrador')</script>";
					echo "<nav class='navbar navbar-default text-center'>
			<div class='container-fluid'>
			<div class='navbar-header'>
			<button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1'>
			<span class='sr-only'>Toggle navigation</span>
					        <span class='icon-bar'></span>
					        <span class='icon-bar'></span>
					        <span class='icon-bar'></span>
					      </button>
					      <a class='navbar-brand LogoMenu' href='#' class='hidden-lg hidden-md hidden-sm'><img src='img/LogoMenu.png' alt='' class='hidden-lg hidden-md hidden-sm'></a>
					    </div>
				
					    <!-- Collect the nav links, forms, and other content for toggling -->
					    <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
					      <ul class='nav navbar-nav'>
					        <!-- <li class='active'><a href='#'>Link <span class='sr-only'>(current)</span></a></li> -->
					        <!-- <li><a href='#'>Link</a></li> -->
					          <li><a>";	
					        	if($_SESSION['log'] == 'yes')
					{
					echo "Lo siento  :(   '" . $_SESSION['user']. "'  tu cuenta esta Inactiva!";
					}
					else
					{
						header("Location: ../index.html");
						/*echo "<script language=Javascript> location.href=\"../index.html\"; </script>"; */
						exit;
					}

					        	echo "</a>
					        	</li>					        
					        <li><a href='cerrarSesion/cerrarSesion.php'><i class='fa fa-sign-in'></i> Cerrar Sesión</a></li>
					      </ul>
					    </div><!-- /.navbar-collapse -->
					  </div><!-- /.container-fluid -->
					</nav>";



					echo "<div class='container'>
			<div class='col-md-12 col-lg-12'>
				<div class='row'>
					<div id='carousel-example-generic' class='carousel slide' data-ride='carousel'>
						<!-- Indicators -->
						<ol class='carousel-indicators hidden-xs'>
							<li data-target='#carousel-example-generic' data-slide-to='0' class='active'></li>
							<li data-target='#carousel-example-generic' data-slide-to='1'></li>
							<li data-target='#carousel-example-generic' data-slide-to='2'></li>
							<li data-target='#carousel-example-generic' data-slide-to='3'></li>
							<!-- <li data-target='#carousel-example-generic' data-slide-to='4'></li> -->
						</ol>
						
						<!-- Wrapper for slides -->
						<div class='carousel-inner text-century' role='listbox'>
							<div class='item active'>
								<img src='../php/motivacion/motivacion01.jpg' alt='Motivación'>
								<div class='carousel-caption'>
								</div>
							</div>
							<div class='item text-century'>
								<img src='../php/motivacion/motivacion02.jpg' alt='Motivación'>
								<div class='carousel-caption'>
								</div>
							</div>
							<div class='item'>
								<img src='../php/motivacion/motivacion03.jpg' alt='Motivación'>
								<div class='carousel-caption'>
								</div>
							</div>
							<div class='item text-century'>
								<img src='../php/motivacion/motivacion04.jpg' alt='Motivación'>
								<div class='carousel-caption'>
								</div>
							</div>
						</div>
							 	<!-- Controls -->
						<a class='left carousel-control' href='#carousel-example-generic' role='button' data-slide='prev'>
							<span class='glyphicon glyphicon-chevron-left' aria-hidden='true'></span>
							<span class='sr-only'>Previous</span>
						</a>
						<a class='right carousel-control' href='#carousel-example-generic' role='button' data-slide='next'>
							<span class='glyphicon glyphicon-chevron-right' aria-hidden='true'></span>
							<span class='sr-only'>Next</span>
						</a>
					</div>
				</div>
			</div>
		</div>";
			





			echo "<footer class='text-center'>
			<div class='container'>
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
		</footer>";




				}
				?>

				


		
<!-- <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>-->


		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<!-- Los JavaScript locales
		<script src="js/bootrap.min.js"></script>
		<script src="js/jquery-1-11-3-min.js"></script>
		FIN Los JavaScript -->
	</body>
</html
<?php ob_end_flush(); ?> 
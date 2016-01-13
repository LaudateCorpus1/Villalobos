<?php
session_start();
ob_start();

/*establecemos el tiempo de espera en segundos*/
    $inactivo = 1200;

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
<html  ng-app="myApp" ng-app  lang="es"> <!-- ng-app="myApp" -->
	<head>
		<meta charset="UTF-8">
		<link rel="shortcut icon" href="../../img/favicon/favicon.png" type="image/png"/>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> <!-- meta:vp -->
		<link rel="stylesheet" href="../css/style.css">
		<!-- <link rel="stylesheet" href="../css/style.css"> -->
		
		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/lumen/bootstrap.min.css">
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/cosmo/bootstrap.min.css"> -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

		<!-- Fin Bootstrap -->
		<!-- Bootstrap localmente
		<link rel="stylesheet" href="css/bootstrap.min.css">
		FIN Bootstrap localmente -->
		<title>Inicio</title>
		<style>
			.botones
			{
				border: 1px solid #000;
			}
			.table tbody tr:hover td, .table tbody tr:hover th {
    		background-color: #C0C0C0;
				}
				thead
				{
					background-color: #9A9A9A;
					color: #FFFFFF;
				}
				
				
		</style>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div id="" class="col-md-6 col-md-offset-3">
					<img src="../../img/Logo.png" class="img-responsive" alt="Logo.png">
				</div>
			</div>
		</div>
		<div class=" ">
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
					         <li><a href="../index.php"><i class="fa fa-home"></i> Inicio</a></li>
					         <!-- <li><a href="index.php"><i class="fa fa-bars"></i> Noticias</a></li> -->
					         <!-- <li><a href="nueva.php"><i class="fa fa-newspaper-o"></i> Nueva</a></li> -->
					         <!-- <li><a href="index.html"><i class="fa fa-pencil-square-o"></i> Editar</a></li>
					         <li><a href="index.html"><i class="fa fa-newspaper-o"></i> Eliminar</a></li> -->
					        <li><a>	<?php					        
					      /*  echo "aqui";
					        echo "<br>";*/
					        /*var_dump($_SESSION['log']);*/
					        	if($_SESSION['log'] == 'yes')
					{
					echo "Bienvenido! " . $_SESSION['user']. "";
					}
					else
					{
						/*header("Location: ../../index.html");*/
						/*echo "Si aparece esto quiere decir que la variable la destruye";*/
						echo "<script language=Javascript> location.href=\"../../index.php\"; </script>"; 
						
					}

					        	?></a>
					        	</li>
					        
					        <li><a href="../cerrarSesion/cerrarSesion.php"><i class="fa fa-sign-in"></i> Cerrar Sesión</a></li>
					      </ul>
					    </div><!-- /.navbar-collapse -->
					  </div><!-- /.container-fluid -->
					</nav>
				</div>
			</div>
		</div> <!-- Fin del Menu -->




			<div class="container">
				<h2>Mis datos.</h2>
				<br>
				
					      			<?php  
					      			                       error_reporting(0);
					      			                       $id_usuario = $_SESSION['id'];
					      			                       include("../../php/conectar.php");
					      			                       $resul = mysql_query("SELECT * FROM usuarios WHERE id_usuario='$id_usuario'; ");
					      			
					      			                       while($row = mysql_fetch_array($resul))
					      			                       {

					      			                       $nombre = $row['nombre'];
					      			                       $apellido_p = $row['apellido_p'];
					      			                       $apellido_m = $row['apellido_m'];
					      			                       $calle = $row['calle'];
					      			                       $numero = $row['numero'];
					      			                       $colonia = $row['colonia'];
					      			                       $cp = $row['cp'];
					      			                       $telefono = $row['telefono'];
					      			                       $celular = $row['celular'];
					      			                       $correo = $row['correo'];
					      			                       $usuario = $row['usuario'];
					      			
					      			                       }                 
					      			                       mysql_free_result($resul);
					      			                       mysql_close($link);
					      			                     ?> 
					<div class="row">
						<form action="editarCuenta.php" method="POST">
							<div class="col-md-4 col-md-offset-2">
								<input type="hidden" name="id_usuario" value="<?PHP echo $id_usuario; ?>">
								 <div class="form-group">
				    					<label for="exampleInputName2"><strong>Nombre:</strong></label> <br>
				    					<label><?PHP echo $nombre; ?></label>
			  						</div>
			  						<div class="form-group">
				    					<label for="exampleInputName2"><strong>Apellido Paterno:</strong></label> <br>
				    					<label><?PHP echo $apellido_p; ?></label>
			  						</div>
			  						<div class="form-group">
				    					<label for="exampleInputName2"><strong>Apellido Materno:</strong></label> <br>
				    					<label><?PHP echo $apellido_m; ?></label>
			  						</div>
			  						<div class="form-group">
				    					<label for="exampleInputName2"><strong>Calle:</strong></label> <br>
				    					<label><?PHP echo $calle; ?></label>
			  						</div>
			  						<div class="form-group">
				    					<label for="exampleInputName2"><strong>Número:</strong></label> <br>
				    					<label><?PHP echo $numero; ?></label>
			  						</div>
							</div>
							<div class="col-md-4 col-md-offset-1">
							  						<div class="form-group">
								    					<label for="exampleInputName2"><strong>Colonia:</strong></label> <br>
								    					<label><?PHP echo $colonia; ?></label>
							  						</div>
							  						<div class="form-group">
								    					<label for="exampleInputName2"><strong>Teléfono:</strong></label> <br>
								    					<label><?PHP echo $telefono; ?></label>
							  						</div>
							  						<div class="form-group">
								    					<label for="exampleInputName2"><strong>Celular:</strong></label> <br>
								    					<label><?PHP echo $celular; ?></label>
							  						</div>
							  						<div class="form-group">
								    					<label for="exampleInputName2"><strong>Correo:</strong></label> <br>
								    					<label><?PHP echo $correo; ?></label>
							  						</div>
							  						<div class="form-group">
								    					<label for="exampleInputName2"><strong>Usuario:</strong></label> <br>
								    					<label><?PHP echo $usuario; ?></label>
							  						</div>
							
							</div>
					</div>
					<br><br>
					 <div class="row  text-center ">
					 	<div class="col-md-2 col-md-offset-3">
					 		<button type="summit" class="btn btn-primary">Editar datos</button>
					 	</div>
						</form>
					 	<div class="col-md-2">
					 		<a href="ediCon.php"><button type="button" class="btn btn-success">Cambiar contraseña</button></a>
					 	</div>
					 	<div class="col-md-2">
					 		<a href="../index.php"><button type="button" class="btn btn-danger">Cancelar</button></a>
					 	</div>
					 </div>
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

		<script src="js/angular.min.js"></script>
		<script src="js/ui-bootstrap-tpls-0.10.0.min.js"></script>
		<script src="app/app.js"></script>  


		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	</body>
</html
<?php ob_end_flush(); ?> 
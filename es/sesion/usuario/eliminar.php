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
   			echo', vuelva a logearse para continuar");window.location.href="../../index.html";</script>';
           /* header("Location: ../index.html");*/
        }
    }
    /*el usuario interactúa por primera vez*/
    $_SESSION["timeout"] = time();
?>
<!DOCTYPE html>
<html ng-app="myApp" ng-app lang="es">
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
		<title>Eliminar</title>
		<style>
			#boton
			{
				margin-right: 0.5em;
			}
			.table tbody tr:hover td, .table tbody tr:hover th {
    		background-color: #C0C0C0;
				}
				thead
				{
					background-color: #9A9A9A;
					color: #FFFFFF;
				}
				ul>li, a{cursor: pointer;}
				.encabezado
				{
					/* border: 1px solid #000; */
					height: 110px;
				}
				.titulo
				{
					/* border: 1px solid #000; */
					height: 100px;
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
					         <li><a href="index.php"><i class="fa fa-bars"></i> Noticias</a></li>
					         <li><a href="nueva.php"><i class="fa fa-newspaper-o"></i> Nueva</a></li>
					         <!-- <li><a href="index.html"><i class="fa fa-pencil-square-o"></i> Editar</a></li>
					         <li><a href="index.html"><i class="fa fa-newspaper-o"></i> Eliminar</a></li> -->
					        <li><a>	<?php
					        	if($_SESSION['log'] == 'yes')
					{
					echo "Bienvenido! " . $_SESSION['user']. "";
					}
					else
					{
						header("Location: ../../index.html");
						/*echo "<script language=Javascript> location.href=\"../index.html\"; </script>"; */
						exit;
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
				<h2>Seguro de eliminar la noticia?.</h2>
				<br><br>
	
		      		<div class="row"><?php  
		      			                       error_reporting(0);
		      			                       $id_noticia = $_GET['id'];
		      			                       include("../../php/conectar.php");
		      			                       $resul = mysql_query("SELECT * FROM noticias WHERE id_noticia='$id_noticia';");
		      			
		      			                       while($row = mysql_fetch_array($resul))
		      			                       {

		      			                       	//INSERT INTO noticias (id_noticia, titulo, encabezado, imagen, noticia, autor, fecha, id_usuario) 

		      			                       	$id_noticia = $row['id_noticia'];
		      			                       	$titulo = $row['titulo'];
		      			                       	$encabezado = $row['encabezado'];
		      			                       	$imagen = $row['imagen'];
		      			                       	$noticia = $row['noticia'];
		      			                       	$autor = $row['autor'];
		      			                       	$fecha = $row['fecha'];
		      			                       	$id_usuario = $row['id_usuario'];


		      			                       	echo "<div class='container'>";
		      			                       	echo "<div class='col-sm-6 col-md-4 col-md-offset-2'>";
		      			                       	echo "<div class='thumbnail'>";
		      			                       	echo "<img src='../imagenesNoticias/thumbnail/". $row['imagen'] ."' alt='". $row['imagen'] ."'>";
		      			                       	echo "<div class='caption'>";
		      			
		      			                        echo "<h3 class='titulo'>" . $row['titulo'] . "</h3>";
		      			                        echo "<p class='encabezado'>" . $row['encabezado'] . "</p>";
		      			                        echo "</div>";
		      			                        echo "</div>";
		      			                        echo "</div>";

		      			                        echo "<div class='col-sm-6 col-md-4'>";

			      			                        echo "<form action='php/eliminarnoticia.php' method='POST' enctype='multipart/form-data'>";

			      			                        echo "<input type='hidden' name='id_noticia' value='$id_noticia'/>";
			      			                        echo "<input type='hidden' name='titulo' value='$titulo'/>";
			      			                        echo "<input type='hidden' name='encabezado' value='$encabezado'/>";
			      			                        echo "<input type='hidden' name='imagen' value='$imagen'/>";
			      			                        echo "<input type='hidden' name='noticia' value='$noticia'/>";
			      			                        echo "<input type='hidden' name='autor' value='$autor'/>";
			      			                        echo "<input type='hidden' name='fecha' value='$fecha'/>";
			      			                        echo "<input type='hidden' name='id_usuario' value='$id_usuario'/>";

			      			                        echo "<input type='hidden' name='usuario' value=" .$_SESSION['id']. "/>";


				      			                        echo "<textarea type='text' name='razon' class='form-control' placeholder='Escriba la razón de eliminación...' required></textarea>";
				      									echo "<br>";
				      									echo "<br>";

				      									echo "<div class='text-right'>";
				      			                        echo "<button id='eliminar' type='submit' class='btn btn-primary'>Eliminar</button>";
				      			                        echo "<a href='index.php' type='botton' class='btn btn-danger'>Cancelar</a>";
		      			                        		echo "</div>";

			      			                        echo "</form>";
		      			                        echo "</div>";
		      			                        echo "</div>";
		      			                       /* echo "<td><a href='buscar.php?id=".$row["id_noticia"]."'>detalles</a></td>";*/
		      			
		      			
		      			
		      			                       }                 
		      			                       mysql_free_result($resul);
		      			                       mysql_close($link);
		      			                     ?> </div>

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
<!--<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script> -->

		<script src="js/angular.min.js"></script>
		<script src="js/ui-bootstrap-tpls-0.10.0.min.js"></script>
		<script src="app/app.js"></script>     


		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<!-- Los JavaScript locales
		<script src="js/bootrap.min.js"></script>
		<script src="js/jquery-1-11-3-min.js"></script>
		FIN Los JavaScript -->
	</body>
</html
<?php ob_end_flush(); ?> 
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

           /* destruimos la sesión y desconectamos al usuario*/
            session_destroy();
            echo'<script type="text/javascript">alert("Su sesion ha expirado por inactividad';
        echo', vuelva a logearse para continuar");window.location.href="../../index.html";</script>';
           /* header("Location: ../index.html");*/
        }
    }
    /*el usuario interactúa por primera vez*/
    $_SESSION["timeout"] = time();

   include("../../php/conectar.php");
$id_noticia = $_GET['id'];
$resul = mysql_query("SELECT * FROM noticias WHERE id_noticia='$id_noticia';");
while($row = mysql_fetch_array($resul))
{
  $titulo = $row['titulo'];
  $encabezado = $row['encabezado'];
  $imagen = $row['imagen'];
  $direccion = "http://vmlaw.mx/es/sesion/imagenesNoticias/thumbnail/".$imagen;
  /*$url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];*/
  
}
?>
<!DOCTYPE html>
<html lang="es" ng-app="myNoteApp">
	<head>
		<meta charset="UTF-8">

    <meta property="og:url" content="http://vmlaw.mx/es/noticia/ver.php?id=<?PHP echo $id_noticia ?>" />
<meta property="og:title" content="<?PHP echo $titulo ?>" />
<meta property="og:description" content="<?PHP echo $encabezado ?>" />
<meta property="og:image" content="http://www.vmlaw.mx/es/sesion/imagenesNoticias/thumbnail/<?PHP echo $imagen ?>" />

		<link rel="shortcut icon" href="../../img/favicon/favicon.png" type="image/png"/>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> <!-- meta:vp -->
		<link rel="stylesheet" href="../css/style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/lumen/bootstrap.min.css">
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/cosmo/bootstrap.min.css"> -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

		<!-- Fin Bootstrap -->
		<!-- Bootstrap localmente
		<link rel="stylesheet" href="css/bootstrap.min.css">
		FIN Bootstrap localmente -->
		 <style>
            /* div#img 
            {
            	border: 1px solid #000;
            	padding-top: 1em;
                width: 250px;
                height: 180px;
                text-align: center;
            }
            div#img img
            {
                width: 250px;
            }*/
                       	#img
            {
            				/* border: 1px solid #000; */
            } 
            .col-md-5
            {
            	/* border: 1px solid #000; */
            }
            .col-md-12
            {
            	padding-left: 0px !important;
            }
            .imagen img{
              margin: 0 auto;
            }
            

            .thumb {
                /* height: 150px; */
            /* border: 1px solid #2400FF; */
           margin: 0.5em 0 0 0;
			width: 100%;
          }
         /*  #noticia
         {
         	margin-top: 5em;
         } */
         pre 
         { 
         	font-family: "Arial";
         	border: 0px solid #FFF;
         	border-radius: 0px;
         	background: #fff;
         	white-space: pre-wrap; 
         } 
         


        </style>
		  
		<title><?PHP echo $titulo ?></title>
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
					        <li><a href="../index.php"><i class="fa fa-home"></i> Inicio</a></li>
                   <li><a href="index.php"><i class="fa fa-bars"></i> Noticias</a></li>
					         <li><a href="nueva.php"><i class="fa fa-newspaper-o"></i> Nueva </a></li>
					        <li><a>	<?php
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
			<div class="row">

				      		<?php  
                               error_reporting(0);
                               

                               $id_noticia = $_GET['id'];


                               $resul = mysql_query("SELECT * FROM noticias WHERE id_noticia='$id_noticia';");

                               $usuario = mysql_query("SELECT nombre, apellido_p, apellido_m FROM usuarios WHERE id_usuario IN (SELECT id_usuario FROM noticias WHERE id_noticia='$id_noticia')");
                              
                               while ($row =mysql_fetch_array($usuario)) {
                                 $nombreUsuario = $row['nombre'] . " " . $row['apellido_p'] . " " . $row['apellido_m'];
                               }

                               while($row = mysql_fetch_array($resul))
                               {
                                $titulo = $row['titulo'];
                                $encabezado = $row['encabezado'];
                                $fecha = $row['fecha'];
                                $imagen =$row['imagen'];
                                $autor =$row['autor'];
                                $noticia = nl2br($row['noticia']);

                                $trad = $row['trad'];
                              }

                                ?>
            



      <div class="container">
        <div class="row text-center">
          <a href="editar.php?id=<?PHP echo $id_noticia ?>" id="boton" class="btn btn-success" role="button" data-toggle="tooltip" title="Editar"><i class="fa fa-pencil"> Editar</i></a>
          <a href='eliminar.php?id=<?PHP echo $id_noticia ?>' id='boton' class='btn btn-danger' role='button' data-toggle='tooltip' title='Eliminar'><i class='fa fa-trash'> Eliminar</i></a>
          <?PHP 
          if (!$trad) {
            echo $trad;
            ?>
          <a href="idioma.php?id=<?PHP echo $id_noticia ?>" id="boton" class="btn btn-warning" role="button" data-toggle="tooltip" title="Transcribir"><i class="fa fa-pencil"> Escribir en otro idioma</i></a>
            <?PHP
          }
          ?>
          <br><br>
        </div>
      <div class="row">

        <div class="col-md-6 text-justify ">
          <h1><?PHP echo $titulo ?></h1>
          <p><?PHP echo $encabezado ?></p>
          <small>Publicado por: &nbsp; &nbsp; <?PHP echo $nombreUsuario ?>&nbsp; &nbsp; Fecha: <?PHP echo $fecha ?></small>
          
          
            <div class="col-md-12 text-left">
              <br>
              <br>
              
              <a href='http://www.facebook.com/sharer.php?s=100&p[url]=http://vmlaw.mx/es/noticia/ver.php?id=<?PHP echo $id_noticia ?>&p[title]=<?PHP echo $titulo ?>&p[images][0]=http://www.vmlaw.mx/es/sesion/imagenesNoticias/thumbnail/<?PHP echo $imagen ?>&p[summary]=<?PHP echo $encabezado ?>'><img src='../../noticia/img/facebook.png' alt='Facebook.png'></a>

                                 
              <a href="myModalLabel" data-toggle="modal" data-target=".bs-example-modal-sm"><img src='../../noticia/img/gmail.png' alt='Gmail.png'></a>
            </div>
        </div>
        <div class="col-md-6 imagen">
          <img src="../imagenesNoticias/<?PHP echo $imagen ?>" class='img-responsive' alt="<?PHP echo $imagen ?>">
        </div>
      </div>
      <div class="row text-justify">
        <br>
        <br>
        <br>
        <p>
          <?PHP echo $noticia ?>
        </p>
      </div>
      <div class="row text-right">
        <?PHP 
        if ($autor) {
        ?>
        Autor:&nbsp; <?PHP echo $autor; 
      }
      ?>
      </div>
    </div>



                             <?PHP

                              mysql_free_result($resul);
                               mysql_close($link);

                             ?>
      
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


<!-- Modal -->

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form action='php/compartir.php?id=<?PHP echo $id_noticia ?>' method="POST">
         <div class="modal-body">
          <div class="form-group text-center">
            <h4>Correo del remitente</h4>
              <input name="correo" type="text" class="form-control" placeholder="Correo" aria-describedby="basic-addon1" required>
          </div>
          <!-- <br>
                                 <button type="button" class="btn btn-primary">Inicia con Facebook</button>
          <br> -->
          <!-- <a href="registro/registro.html">No tienes cuenta. Registrate Aquí</a> -->
          </div>
           <div class="modal-footer">
              <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button> -->
              <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-share-square-o"></i> Enviar</button>
           </div>
      </form>
    </div>
  </div>
</div>



		<script src="angular.js"></script>
		<!--<script>
              function archivo(evt) {
                  var files = evt.target.files; // FileList object
             
                  // Obtenemos la imagen del campo "file".
                  for (var i = 0, f; f = files[i]; i++) {
                    //Solo admitimos imágenes.
                    if (!f.type.match('image.*')) {
                        continue;
                    }
             
                    var reader = new FileReader();
             
                    reader.onload = (function(theFile) {
                        return function(e) {
                          // Insertamos la imagen
                         document.getElementById("list").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                        };
                    })(f);
             
                    reader.readAsDataURL(f);
                  }
              }
             
              document.getElementById('files').addEventListener('change', archivo, false);
      </script>-->

		
         
        



		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<!-- Los JavaScript locales
		<script src="js/bootrap.min.js"></script>
		<script src="js/jquery-1-11-3-min.js"></script>
		FIN Los JavaScript -->
	</body>
</html
<?php ob_end_flush(); ?> 
<?php  
error_reporting(0);
 /*$id_usuario = $_SESSION['id'];*/
include("../es/php/conectar.php");
$id_noticia = $_GET['id'];
$resul = mysql_query("SELECT * FROM noticias WHERE id_noticia='$id_noticia';");
while($row = mysql_fetch_array($resul))
{
  $titulo = $row['titulo'];
  $encabezado = $row['encabezado'];
  $imagen = $row['imagen'];
  $direccion = "http://vmlaw.mx/es/sesion/imagenesNoticias/thumbnail/".$imagen;
  $url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];


    $traduccion = mysql_query("SELECT id_noticia, trad FROM noticias WHERE trad=$id_noticia");
   $rowTrad = mysql_fetch_array($traduccion);
   $id_noticiaTrad = $rowTrad['id_noticia'];
   $trad = $rowTrad['trad'];
  
}

?>
<!DOCTYPE html>
<html lang="es" ng-app="myNoteApp">
	<head>

    <meta property="og:url" content="<?PHP echo $url ?>" />
    <meta property="og:title" content="<?PHP echo $titulo ?>" />
    <meta property="og:description" content="<?PHP echo $encabezado ?>" />
    <meta property="og:image" content="http://www.vmlaw.mx/es/sesion/imagenesNoticias/thumbnail/<?PHP echo $imagen ?>" />
    <meta property="og:image" content="<?PHP echo $direccion ?>"/>





		<meta charset="UTF-8">
		<link rel="shortcut icon" href="../img/favicon/favicon.png" type="image/png"/>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> <!-- meta:vp -->
		<link rel="stylesheet" href="../css/style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/flatlyBootstrap.min.css">
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/lumen/bootstrap.min.css"> -->
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/cosmo/bootstrap.min.css"> -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

		<!-- Fin Bootstrap -->
		<!-- Bootstrap localmente
		<link rel="stylesheet" href="css/bootstrap.min.css">
		FIN Bootstrap localmente -->
		<style>
        .col-md-12
    {
      padding-left: 0px !important;
    }
    </style>
		  
		<title><?PHP echo $titulo; ?></title>
	</head>
	<body class="text-century">
		<div class="cabecera"></div>
    <div class="container">
      <div class="row">
        <div id="imgLogo" class="col-md-5">
          <a href="../index.php"><img src="../img/Logo.png" class="img-responsive" alt="Logo.png"></a>
        </div>
        <div id="telefonos" class="col-md-3 col-md-offset-4 text-center hidden-xs hidden-sm ">
          <i class="fa fa-phone"></i> 
          <p> +52 (614) 236 8012 <br>
          +52 (614) 236 8013 <br>
          +52 (614) 297 0568</p>      
          
          <ul class="list-inline social">
              <li><a href="https://twitter.com/VillaMooreMx" target="_blank"><i class="fa fa-twitter"></i></a></li>
              <li><a href="https://www.facebook.com/vmlaw.mx" target="_blank"><i class="fa fa-facebook"></i></a></li>
              <li><a href="https://www.linkedin.com/company/villalobos-&-moore-s-c-?trk=biz-companies-cym" target="_blank"><i class="fa fa-linkedin"></i></a></li>
          </ul>
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
                    <a href="index.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="fa fa-home fa-lg" aria-hidden="true"></span> Home<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <li role="presentation" class="dropdown-header">General</li>
                      <li><a href="../index.php">Home Page</a></li>
                      <!-- <li role="presentation" class="dropdown-header">Publications</li>
                                            <li><a href="inicio/convención-anual-PDAC-2014.html">Annual Convention PDAC 2014</a></li>
                                            <li><a href="inicio/desarrollo-minero.html">Mining Development Program 2013-2018</a></li>-->
                      <li role="presentation" class="dropdown-header">Privacy Notice</li>
                      <li><a href="../home/privacy.html">Privacy Notice</a></li>
                    </ul>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-users"></i> About Us<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <li role="presentation" class="dropdown-header">Villalobos & Moore</li>
                      <li><a href="../about/profile.html">Firm´s Profile</a></li>
                      <li><a href="../about/experience.html">Experience</a></li>
                      <li class="divider"></li>
                      <li role="presentation" class="dropdown-header">Professionals</li>
                      <li><a href="../about/professional/professionals.html">Professionals</a></li>
                    </ul>
                  </li>
                  <li><a href="../practice/practice.html"><i class="fa fa-line-chart"></i> Practice</a></li>
                  <li><a href="../contact/contact.php"><i class="fa fa-envelope-o"></i> Contact</a></li>
                  <li><a href="../news/news.php"><i class="fa fa-newspaper-o"></i> News</a></li>
                  <!-- <li class="">
                    <a data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-sign-in"></i> Iniciar Sesión</a>
                    <a class="page-scroll" href="#iniciarSesion" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-sign-in"></i> Iniciar Sesión</a>
                  </li> -->
                  <li>
                    <?PHP
                    if ($trad) 
                    {
                      ?>
                    <a href="../es/noticia/ver.php?id=<?PHP echo $id_noticiaTrad; ?>"><img src="../img/mexico.png" alt=""></a>
                      <?PHP
                    }else
                    {
                      ?>
                    <a href="../es/noticia/no.html"><img src="../img/mexico.png" alt=""></a>
                      <?PHP
                    }
                    ?>
                  </li>
                  <li>
                    <a href=""><img src="../img/usa.png" alt=""></a>
                  </li>
                </ul>
              </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
          </nav>
        </div>
      </div>
    </div> <!-- Fin del Menu -->


		    <div class="container">

    	<?php  
                                       error_reporting(0);
                                       /*$id_usuario = $_SESSION['id'];*/
                                       include("../es/php/conectar.php");

                               $id_noticia = $_GET['id'];

                               $url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];


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
                               }                 
                             ?> 
                             <br><br>

                             <div class="container">
      <div class="row">
        <div class="col-md-6 text-justify ">
          <h1><?PHP echo $titulo ?></h1>
          <p><?PHP echo $encabezado ?></p>
          <small>Publicado por: &nbsp; &nbsp; <?PHP echo $nombreUsuario ?>&nbsp; &nbsp; Fecha: <?PHP echo $fecha ?></small>
          
          
            <div class="col-md-12 text-left">
              <br>
              <br>
              <a href='http://www.facebook.com/sharer.php?s=100&p[url]=<?PHP echo $url ?>&p[title]=<?PHP echo $titulo ?>&p[images][0]=http://www.vmlaw.mx/es/sesion/imagenesNoticias/thumbnail/<?PHP echo $imagen ?>&p[summary]=<?PHP echo $encabezado ?>'><img src='img/facebook.png' alt='Facebook.png'></a>
            </div>
        </div>
        <div class="col-md-6 imagen">
          <img src="../es/sesion/imagenesNoticias/<?PHP echo $imagen ?>" class='img-responsive' alt="<?PHP echo $imagen ?>">
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


  <div class="" id="alianzaOtro">
      <div class="container">
        <div class="row text-center">
        <div class="col-sm-4 col-sm-offset-2">
            <a href="" Title="Wong Fleming"><img src="../img/alianza/wongFleming2.png" alt="..."></a>
          </div>
          <div class="col-sm-4">
            <a href="" Title="Charness"><img src="../img/alianza/charness.png" alt="..."></a>
          </div>
          <div class="col-sm-4 col-sm-offset-4">
            <small>Of Counsel</small>
          </div>
        </div>
      </div>
    </div>




		

		<footer class="text-center footer">
      <div class="container">
        <p>
          VILLALOBOS & MOORE 2015 ALL RIGHTS RESERVED
        </p>
        <p>
          Vía Lombardía 5705 Int 503, Saucito <br>
          Chihuahua, Chihuahua, México
        </p>
        <p>
          +52 (614) 236 8012, +52 (614) 236 8013, +52 (614) 297 0568
        </p>
        <a href="../home/privacy.html">Privacy Notice</a>
        <br><br>
        <a href="../es/sesion/index.php"></i>Login</a>

        <p>
          <ul class="list-inline social">
              <li><a href="https://twitter.com/VillaMooreMx"><i class="fa fa-twitter"></i></a></li>
              <li><a href="https://www.facebook.com/vmlaw.mx"><i class="fa fa-facebook"></i></a></li>
              <li><a href="https://www.linkedin.com/company/villalobos-&-moore-s-c-?trk=biz-companies-cym"><i class="fa fa-linkedin"></i></a></li>
          </ul>
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
</html
<?php ob_end_flush(); ?> 
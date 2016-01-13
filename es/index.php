<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<link rel="shortcut icon" href="img/favicon/favicon.png" type="image/png"/>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> <!-- meta:vp -->
		<link rel="stylesheet" href="css/style.css">
		<!-- Bootstrap -->
		 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"> 
		<link rel="stylesheet" href="css/flatlyBootstrap.min.css">
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/flatly/bootstrap.min.css"> -->
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/cosmo/bootstrap.min.css"> -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

		<!-- Fin Bootstrap -->
		<!-- Bootstrap localmente
		<link rel="stylesheet" href="css/bootstrap.min.css">
		FIN Bootstrap localmente -->
		<title>Villalobos & Moore S.C.</title>
		<style>
			
			.noticias
			{
				padding: 1em 0em;
				background-color: #ECECEC;
			}
			.encabezado
        {
          /* border: 1px solid #000; */
          height: 130px;
        }
        #boton
        {
        	margin-top: 10px;
        }
         .fecha
       {
       	/* border: 1px solid #000;
       	       padding: 10px 0; */
       } 
        .titulo
        {
          /* border: 1px solid #000; */
          height: 100px;
        }
        .thumbnail:hover
        {
          background-color: #d1e0ee;
        }
		</style>
	</head>
	<body class="text-century">
		<div class="cabecera"></div>
		<div class="container">
			<div class="row">
				<div id="imgLogo" class="col-md-5 ">
					<a href="index.php"><img src="img/Logo.png" class="img-responsive" alt="Logo.png"></a>
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
					          <a href="index.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="fa fa-home fa-lg" aria-hidden="true"></span> Inicio<span class="caret"></span></a>
					          <ul class="dropdown-menu" role="menu">
					          	<li role="presentation" class="dropdown-header">General</li>
					          	<li><a href="index.php">Página de Inicio</a></li>
					          	<!-- <li role="presentation" class="dropdown-header">Publicaciones</li>
					          						            <li><a href="inicio/convención-anual-PDAC-2014.html">Convención Anual PDAC 2014</a></li>
					          						            <li><a href="inicio/desarrollo-minero.html">Programa de Desarrollo Minero 2013-2018</a></li> -->
					            <li role="presentation" class="dropdown-header">Aviso de Privacidad</li>
					            <li><a href="inicio/privacidad.html">Aviso de privacidad</a></li>
					          </ul>
					        </li>
					        <li class="dropdown">
					          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-users"></i> Acerca de nosotros<span class="caret"></span></a>
					          <ul class="dropdown-menu" role="menu">
					          	<li role="presentation" class="dropdown-header">Villalobos & Moore</li>
					            <li><a href="acerca/perfil.html">Perfil de la Firma</a></li>
					            <li><a href="acerca/experiencia.html">Experiencia</a></li>
					            <li class="divider"></li>
					          	<li role="presentation" class="dropdown-header">Profesionales</li>
					          	<li><a href="acerca/profesionales/profesionales.html">Profesionales</a></li>
					          </ul>
					        </li>
					        <li><a href="practica/practica.html"><i class="fa fa-line-chart"></i> Práctica</a></li>
					        <li><a href="contacto/contacto.php"><i class="fa fa-envelope-o"></i> Contacto</a></li>
					        <li><a href="noticia/noticia.php"><i class="fa fa-newspaper-o"></i> Noticias</a></li>
					        <!-- <li class="">
					          <a data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-sign-in"></i> Iniciar Sesión</a>
					          <a class="page-scroll" href="#iniciarSesion" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-sign-in"></i> Iniciar Sesión</a>
					        </li> -->
					        <li>
					        	<a href=""><img src="img/mexico.png" alt=""></a>
					        </li>
					        <li>
					        	<a href="../index.php"><img src="img/usa.png" alt=""></a>
					        </li>
					      </ul>
					    </div><!-- /.navbar-collapse -->
					  </div><!-- /.container-fluid -->
					</nav>
				</div>
			</div>
		</div> <!-- Fin del Menu -->

		<!-- Inicio del Slideshow -->
		<div class="container">
			<div class="col-md-12 col-lg-12"><!-- <div class="col-md-12"> --><!-- <div class="col-md-10 col-md-offset-1"> -->
				<div class="row">
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
						<!-- Indicators -->
						<ol class="carousel-indicators hidden-xs">
							<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
							<li data-target="#carousel-example-generic" data-slide-to="1"></li>
							<li data-target="#carousel-example-generic" data-slide-to="2"></li>
							<li data-target="#carousel-example-generic" data-slide-to="3"></li>
							<!-- <li data-target="#carousel-example-generic" data-slide-to="4"></li> -->
						</ol>
						
						<!-- Wrapper for slides -->
						<div class="carousel-inner text-century" role="listbox">
							<div class="item active">
								<img src="img/slide/slide06.png" alt="slide05.jpg">
								<div class="carousel-caption">
									<div class="d1 hidden-xs text-left">
										<p>Conoce nuestra nueva ubicación</p>
										<h2 class="tituloSlide"><strong>D1 Distrito Uno</strong></h2>
										<p class="hidden-sm">
											El centro de negocios de mayor crecimiento en la ciudad.
										</p> 
									</div>
								</div>
							</div>
							<!-- <div class="item">
								<img src="img/slide/slide02.png" alt="slide02.png">
								<div class="carousel-caption">
									<div class="fondoSlide hidden-xs">
										<h2 class="tituloSlide villalobos"><strong>Villalobos & Moore</strong></h2>
										<p>Abogados de Negocios</p>
									</div>
								</div>
							</div> -->
							<div class="item text-century">
								<img src="img/slide/slide02.png" alt="Integridad.jpg">
								<div class="carousel-caption">
									<div class="prof hidden-xs text-century text-left">
										<h2 class="tituloSlide text-century"><strong>Integridad <br>Profesionalismo <br> Experiencia</strong></h2>
										<p class="hidden-sm">
											Nuestro alto sentido de responsabilidad permite la construccion de relaciones de confianza con nuestros clientes.
										</p>
									</div>
								</div>
							</div>
							<div class="item ">
								<img src="img/slide/slide01.jpg" alt="slide01.png">
								<div class="carousel-caption">
									<div class="fondoSlide hidden-xs text-century text-left">
										<h2 class="tituloSlide text-century"><strong>Firma de Abogados Multicultural</strong></h2>
										<p class="hidden-sm">
											Compartimos una filosofia de trabajo común que consiste en altos estándares éticos y un nivel superior de servicio al cliente.
										</p>
									</div>
								</div>
							</div>
							<div class="item text-century">
								<img src="img/slide/slide04.png" alt="slide04.png">
								<div class="carousel-caption">
									<div class="mineroSlide hidden-xs text-century text-left">
										<h2 class="tituloSlide text-century"><strong>Industria Minera</strong></h2>
										<p class="hidden-sm">
											Nuestra práctica en la industria minera presta asesoría legal especializada a empresas mineras, y a empresas de servicios para empresas mineras haciendo negocios en México.
										</p>
									</div>
								</div>
							</div>
						</div>
							 	<!-- Controls -->
						<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
			</div>
		</div>

		<div class="container binvenidos text-century">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<h1>Bienvenidos</h1>
					<p class="text-primary text-justify ">
						Villalobos & Moore Abogados de Negocios es una firma de abogados multicultural que maneja todo tipo de asuntos corporativos, con un énfasis particular en operaciones internacionales por parte de inversionistas extranjeros haciendo negocios en México.  
					</p>
					<p class="text-primary text-justify ">
						La misión de Villalobos & Moore Abogados de Negocios es prestar servicios legales de la más alta calidad con integridad y profesionalismo. Nos enorgullecemos de nuestro conocimiento del ámbito de los negocios internacionales y de la obtención de resultados excepcionales.
					</p>
				</div>
			</div>
		</div>

		

		<div class="noticias">
			<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<h2>Ultimas Noticias</h2>
				</div>
			</div>
				<div class="row"><?php  
		      			                       error_reporting(0);
		      			                       include("php/conectar.php");
		      			                       $resul = mysql_query("SELECT * FROM noticias where idioma='esp' ORDER BY id_noticia DESC LIMIT 1,2; ");
		      			                       $resul2 = mysql_query("SELECT * FROM noticias where idioma='esp' ORDER BY id_noticia DESC LIMIT 1; ");

		      			                        while($row = mysql_fetch_array($resul2))
		      			                       {
		      			                       	echo "<div class='col-md-4'>";
		      			                       	echo "<div class='thumbnail'>";
		      			                       	echo "<marquee><img src='img/nuevo.png'></marquee>";
		      			                       	echo "<img src='sesion/imagenesNoticias/thumbnail/". $row['imagen'] ."' alt='". $row['imagen'] ."'>";
		      			                       	echo "<div class='caption'>";
		      			
		      			                        echo "<h3 class='titulo'>" . $row['titulo'] . "</h3>";
		      			                        echo "<small class='fecha'>Fecha:&nbsp;" . $row['fecha'] . "</small> <br><br>";
		      			                        echo "<p class='encabezado'>" . $row['encabezado'] . "</p>";
		      			
		      			                        echo "<a href='noticia/ver.php?id=".$row["id_noticia"]."' id='boton' class='btn btn-primary' role='button'> Leer más...</a>";
		      			                       /* echo "<td><a href='buscar.php?id=".$row["id_noticia"]."'>detalles</a></td>";*/
		      			
		      			                        echo "</div>";
		      			                        echo "</div>";
		      			                        echo "</div>";		      			
		      			
		      			                       }     
		      			
		      			                       while($row = mysql_fetch_array($resul))
		      			                       {
		      			                       	echo "<div class='col-md-4'>";
		      			                       	echo "<div class='thumbnail'>";
		      			                       	echo "<marquee></marquee>";
		      			                       	echo "<img src='sesion/imagenesNoticias/thumbnail/". $row['imagen'] ."' alt='". $row['imagen'] ."'>";
		      			                       	echo "<div class='caption'>";
		      			
		      			                        echo "<h3 class='titulo'>" . $row['titulo'] . "</h3>";
		      			                        echo "<small class='fecha'>Fecha:&nbsp;" . $row['fecha'] . "</small> <br><br>";
		      			                        echo "<p class='encabezado'>" . $row['encabezado'] . "</p>";
		      			
		      			                        echo "<a href='noticia/ver.php?id=".$row["id_noticia"]."' id='boton' class='btn btn-primary' role='button'>Leer más...</a>";
		      			                       /* echo "<td><a href='buscar.php?id=".$row["id_noticia"]."'>detalles</a></td>";*/
		      			
		      			                        echo "</div>";
		      			                        echo "</div>";
		      			                        echo "</div>";		      			
		      			
		      			                       }                 
		      			                       mysql_free_result($resul);
		      			                       mysql_close($link);
		      			                     ?> </div>
	        </div>
			</div>

		<div class="" id="alianza">
			<div class="container">
				<div class="row text-center">
					<div class="col-sm-4 col-sm-offset-2">
						<a href="" Title="Wong Fleming"><img src="img/alianza/wongFleming2.png" alt="..."></a>
					</div>
					<div class="col-sm-4">
						<a href="" Title="Charness"><img src="img/alianza/charness.png" alt="..."></a>
					</div>
					<div class="col-sm-4 col-sm-offset-4">
						<small>Of Counsel</small>
					</div>
				</div>
			</div>
		</div>
		
		
		<footer class="text-center footerIndex">
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
				<a href="inicio/privacidad.html">Aviso de Privacidad</a>
				<br><br>
				<a href="sesion/index.php"></i>Inicio de Sesión</a>

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
</html>
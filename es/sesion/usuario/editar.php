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
   			echo', vuelva a logearse para continuar");window.location.href="../index.html";</script>';
           /* header("Location: ../index.html");*/
        }
    }
    /*el usuario interactúa por primera vez*/
    $_SESSION["timeout"] = time()
?>
<!DOCTYPE html>
<html lang="es" ng-app="myNoteApp">
	<head>
		<meta charset="UTF-8">
		<link rel="shortcut icon" href="../../img/favicon/favicon.png" type="image/png"/>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> <!-- meta:vp -->
		<link rel="stylesheet" href="../css/style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/lumen/bootstrap.min.css">
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/cosmo/bootstrap.min.css"> -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

		
		<!-- <link rel="stylesheet" href="materialize/css/materialize.css">
		<script src="angular.min.js"></script>
		<script src="angular-messages.min.js"></script>
		<script src="materialize/js/jquery-latest.js"></script>
		<script src="materialize/js/materialize.min.js"></script>
		<script>
			angular.module('messages', ['ngMessages']);
		</script> -->



		<!-- Fin Bootstrap -->
		<!-- Bootstrap localmente
		<link rel="stylesheet" href="css/bootstrap.min.css">
		FIN Bootstrap localmente -->
		 <style>

		 /* input.ng-invalid.ng-dirty, textarea.ng-invalid.ng-dirty{border-bottom: 1px solid #D25349;}
		 		input.ng-valid.ng-dirty, textarea.ng-valid.ng-dirty{border-bottom: 2px solid #019739;} */



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
            	/* border: 1px solid #FF0000; */
            }
            

            .thumb {
                /* height: 150px; */
            /* border: 1px solid #2400FF; */
           margin: 0.5em 0 0 0;
			width: 100%;
          }
          #imagen
          {
          	margin-top: 5em;
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
         	padding: 0px;
         	margin: 0px;
         } 
         


        </style>
		  
		<title>Editar</title>
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
					         <!-- <li><a href="index.html"><i class="fa fa-pencil-square-o"></i> Editar</a></li>
					         <li><a href="index.html"><i class="fa fa-newspaper-o"></i> Eliminar</a></li> -->
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



		<div class="container" >
			<div class="col-md-8 col-md-offset-2">
		<h1 class="text-primary">Editar noticia </h1>
		<br><br>
				<form action="php/editarNoticia.php" method="POST" enctype="multipart/form-data">
				  	<div class="form-group">
				    	<?php  
	                       error_reporting(0);
	                       $id_noticia = $_GET['id'];
	                       include("../../php/conectar.php");
	                       $resul = mysql_query("SELECT * FROM noticias WHERE id_noticia='$id_noticia';");
	                        while($row = mysql_fetch_array($resul))
		      			    {
		      			    	$titulo = $row['titulo'];
		      			    	$encabezado = $row['encabezado'];
		      			    	$imagen = $row['imagen'];
		      			    	$noticia = $row['noticia'];
		      			    	$autor = $row['autor'];
		      			    	$idioma = $row['idioma'];

		      			   }

		      			?>
				  		<input type="hidden" name="id_noticia" value="<?php echo $id_noticia?>"/>
				    	<label>Título</label>
				    	<input type="text" name="titulo" class="form-control" placeholder="Título" value="<?php echo $titulo?>" autofocus required>
				  	</div>
				  	<div class="form-group">
			    		<label>Encabezado </label>
			    		<textarea class="form-control" name="encabezado" placeholder="Encabezado" required><?php echo $encabezado ?></textarea>
				  	</div>
				  	<div class="form-group ">
				  	<!-- <div class="col-md-6 col-md-offset-3">    -->     
					    <output class="col-md-6 col-md-offset-3" id="list"></output>
					    <output class="col-md-3 "></output>       
					<!-- </div> -->
				  	</div>
				  	<div class="form-group">
				  		<div class="text-center">
				  			<img id="old" src="../imagenesNoticias/thumbnail/<?php echo $imagen ?>" alt="">
				  		<input type="hidden" name="imgOld" value="<?php echo $imagen?>"/>
				  		</div>
				  	</div>

		    		<div class="form-group" id="imagen">
		    			<small>&nbsp; &nbsp;</small>
		    			<!-- <br>
		    			<label>Imagen</label> -->
		    						    	<!-- 	<input name="imagen" type="file" id="files" value="../imagenesNoticias/1437694846.jpg" > -->
		    			<input name="imagen" type="file" id="files" onchange="processFiles(this.files)" ></input>
		    		</div>
				  	<div class="form-group">
			    		<label>Noticia <span ng-bind="left()"></span></label>
			    		<textarea class="form-control" name="noticia" rows="10"  placeholder="Escribe la noticia aquí..." required><?php echo $noticia ?></textarea>
				  	</div>
				  	<div class="form-group">
				    	<label>Autor</label>
				    	<input type="text" name="autor" class="form-control" value="<?php echo $autor ?>" placeholder="Autor" required>
				  	</div>
				  	<div class="form-group">
				  		<label>Seleccione el Idioma</label>
				  		<select name="idioma" class="form-control" title="Idioma" required >
			                <option value="">Idioma</option>
			                <option value="esp">Español</option>
			                <option value="ing">Inglés</option>
			            </select>
				  	</div>
				  	<div class="text-right">
				  		<button type="submit" class="btn btn-primary">Editar</button>
				  		<a href="index.php" type="botton" class="btn btn-danger">Cancelar</a>
				  	</div>
				</form>
		      			<?php 
		      			?>
			</div>
			<!-- <div class="col-md-5 col-md-offset-1 text-justify">
				<p class="text-center"><em>Vista Previa</em></p>
				<h4>{{titulo}}</h4>
				<br>
				<small><strong>{{encabezado}}</strong></small>
				<br>
				<div class="row">
					<div class="col-md-8 col-md-offset-2">        
								        <output id="list"></output>                   
					                </div>
				</div>
					                <br>
					                <p id="noticia"><pre><small>{{noticia}}</small></pre></p>
					                <br>
			  						<p class="text-right">{{autor}}</p>
			</div> -->
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



		<script src="angular.js"></script>
	<!--<script src="angular2.js"></script>-->
		<script>
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
                         document.getElementById('old').style.display="none";
                        };
                    })(f);
             
                    reader.readAsDataURL(f);
                  }
              }
             
              document.getElementById('files').addEventListener('change', archivo, false);
      </script>

		
         
        



		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<!-- Los JavaScript locales
		<script src="js/bootrap.min.js"></script>
		<script src="js/jquery-1-11-3-min.js"></script>
		FIN Los JavaScript -->
	</body>
</html
<?php ob_end_flush(); ?> 
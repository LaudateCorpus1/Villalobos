<meta charset="UTF-8">
<?php

 include("../../../php/conectar.php");

$id_noticia = $_GET['id'];
$destinatario = $_POST['correo'];

$resul = mysql_query("SELECT * FROM noticias WHERE id_noticia='$id_noticia';");
while($row = mysql_fetch_array($resul))
{
  $titulo = $row['titulo'];
  $encabezado = $row['encabezado'];
  $imagen = $row['imagen'];
  $autor = $row['autor'];
  $noticia = nl2br($row['noticia']);
  $direccion = "http://vmlaw.mx/Pruebas/sesion/imagenesNoticias/thumbnail/".$imagen;
  $url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
}
	
$cuerpo = "
<!DOCTYPE html>
<html lang='es'>
	<head>
		<meta charset='UTF-8'>
		<meta name='author' content='Nelson ALejandro Soto Durán' />
		<title>".$titulo."</title>
	</head>
	<body>


  	<div style='margin: 0;padding: 1.5em 0;text-align: center;background-color: #EFEFEF;'>
	  	<h4>Boletín de Informativo </h4>
	  	<p>Si no puede ver este correo electrónico correctamente, haga <a href='http://vmlaw.mx/Pruebas/noticia/ver.php?id=".$id_noticia."'>clic aquí</a> para ver la versión en línea.</p>
	  	<p>Para asegurar la entrega de nuestros boletines, por favor agregue contact@vmlaw.mx a su lista de remitentes seguros.</p>

	  	<h4>Informative Newsletter </h4>
	  	<p>If you cannot see this e-mail properly, <a href='http://vmlaw.mx/Pruebas/noticia/ver.php?id=".$id_noticia."'>click here</a> . </p>
	  	<p>To ensure delivery of our newsletters, please add contact@vmlaw.mx to your safe senders list.</p>
  </div>

          <a href='http://vmlaw.mx'><img src='http://vmlaw.mx/img/Logo.png' alt='Logo.png'></a>

          <div style='background-color: #2C3E50;height: 50px;'></div>

    <div style='margin-top: 1%;width: 50%;display: inline-block;vertical-align: top;'>
    	<img style='margin: 0 auto;width: 100%;' src='http://vmlaw.mx/sesion/imagenesNoticias/thumbnail/".$imagen."' alt='".$imagen."''>
    </div>

	<div style='text-align: justify;margin-top: 6%;margin-left: 30px;width: 45%;left: 40%;display: inline-block;vertical-align: top;'>
			<h3>".$titulo."</h3>
			
			<p>".$encabezado."</p>
	</div>


      <div style='text-align: justify;width: 99%;margin: 2em auto;'>
      	<p>".$noticia."</p>
      	<p style='text-align: right;'>Autor: ".$autor."</p>
      </div>
    

  <footer style='background-color: #2C3E50;padding: 3em 0em;text-align: center;color: #FFF;'>
				<p>
					VILLALOBOS & MOORE 2014 TODOS LOS DERECHOS RESERVADOS
				</p>
				<p>
					Avenida San Felipe 205B, San Felipe
					Chihuahua, Chihuahua, México
				</p>
				<p>
					(614) 236 8012, (614) 236 8013, (614) 297 0568
				</p>
		</footer>

		
	</body>
</html>";


//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

//dirección del remitente 
$headers .= "From:".$encabezado." <wevbsitecontact@vmlaw.mx>\r\n"; 

//dirección de respuesta, si queremos que sea distinta que la del remitente 
/*$headers .= "Reply-To: nelson@treesoft.com.mx\r\n"; */

//ruta del mensaje desde origen a destino 
/*$headers .= "Return-path: holahola@desarrolloweb.com\r\n"; */

//direcciones que recibián copia 
/*$headers .= "Cc: nelson@treesoft.com.mx\r\n"; */

//direcciones que recibirán copia oculta 
/*$headers .= "Bcc: pepe@pepe.com,juan@juan.com\r\n"; */

if (mail($destinatario,$titulo,$cuerpo,$headers)) 
	{
 		echo "<script>alert('Correo enviado con exito')</script>";
		echo "<script>location.href='../index.php'</script>";
	} else 
		{
		    echo "<script>alert('Ocurrio un Error, Intentelo de nuevo')</script>";
			echo "<script>location.href='../noticia.php'</script>";
		}



?>
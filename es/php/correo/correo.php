<meta charset="UTF-8">
<?php
	
	
	$comp = $_POST['company'];
	$email = $_POST['email'];
	$tel = $_POST['tel'];
	$cel = $_POST['movil'];
	$mens = $_POST['message'];
	


		$destinatario = "noslen_soto@hotmail.com, nelson@treesoft.com.mx, websitecontact@vmlaw.mx"; 
		$asunto = $_POST['name'];
		$cuerpo = " 
				<!DOCTYPE html>
<html lang='es'>
<head>
	<meta charset='UTF-8'>
	<meta name='author' content='Nelson ALejandro Soto Durán' />
</head>
<body>

	<div class='cabecera'>
		<a href='http://vmlaw.mx'><img style='margin: 0px auto;' src='http://vmlaw.mx/es/img/Logo.png' alt='Logo.png'></a>
	</div>

	<div style='background-color: #2C3E50;height: 50px;'></div>

	<p> 
		Mi nombre es: <b>".$asunto."</b>. Me pongo en contacto con ustedes por lo siguiente: 
	</p> 
	<p> ".$mens." </p>
	<p>Mi compañia es: </p>
	<p> ".$comp." </p>
	<p>Me pueden responder a mi correo</p>
	<p>".$email."</p>
	<p>Me pueden contactar en los siguientes telefonos:</p>
	<ul>
		<li>Télefono: ".$tel."</li>
		<li>Celular: ".$cel."</li>
	</ul>
	
	<footer style='background-color: #2C3E50;padding: 3em 0em;text-align: center;color: #FFF;'>
				<p>
					VILLALOBOS & MOORE 2014 TODOS LOS DERECHOS RESERVADOS
				</p>
				<p>
					Vía Lombardía 5705 Int 503, Saucito <br>
					Chihuahua, Chihuahua, México
				</p>
				<p>
					(614) 236 8012, (614) 236 8013, (614) 297 0568
				</p>
		</footer>

</body>
</html>
				"; 


//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

//dirección del remitente 
$headers .= "From: ".$asunto." <".$email.">\r\n"; 

//dirección de respuesta, si queremos que sea distinta que la del remitente 
/*$headers .= "Reply-To: nelson@treesoft.com.mx\r\n"; */

//ruta del mensaje desde origen a destino 
/*$headers .= "Return-path: holahola@desarrolloweb.com\r\n"; */

//direcciones que recibián copia 
/*$headers .= "Cc: nelson@treesoft.com.mx\r\n"; */

//direcciones que recibirán copia oculta 
/*$headers .= "Bcc: pepe@pepe.com,juan@juan.com\r\n"; */

if (mail($destinatario,$asunto,$cuerpo,$headers)) 
	{
 		echo "<script>alert('Correo enviado con exito')</script>";
		echo "<script>location.href='../../index.php'</script>";
	} else 
		{
		    echo "<script>alert('Ocurrio un Error, Intentelo de nuevo')</script>";
			echo "<script>location.href='../../contacto/contacto.php'</script>";
		}



?>
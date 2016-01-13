<meta charset="UTF-8"/>
<?PHP
	require("../../../php/conectar.php");

	$titulo = addslashes($_POST['titulo']);
	$encabezado = addslashes($_POST['encabezado']);
	$noticia = addslashes($_POST['noticia']);
	$autor = addslashes($_POST['autor']);
	$id_usuario = $_POST['id'];
	$avatar = $_POST['img'];

	$idioma = $_POST['idioma'];

	$nombre_imagen = mktime() . '.jpg';
	$posicion = 0;
	
	$fecha = date("Y-m-d");


	$insert = mysql_query("INSERT INTO noticias (id_noticia, titulo, encabezado, imagen, noticia, autor, fecha, id_usuario, idioma) VALUES ('', '".$titulo."', '".$encabezado."', '".$nombre_imagen."', '".$noticia."', '".$autor."', '".$fecha."', '".$id_usuario."', '".$idioma."');") or die(mysql_error());


	if ($insert) {
		$origen = $_FILES['imagen']['tmp_name'];
	    $destino = "../../imagenesNoticias/$nombre_imagen";
	    move_uploaded_file ($origen, $destino);

//--------------------------------------------------------------------------------------//
$ruta_imagen = "../../imagenesNoticias/$nombre_imagen";

$miniatura_ancho_maximo = 350;
$miniatura_alto_maximo = 263;

$info_imagen = getimagesize($ruta_imagen);
$imagen_ancho = $info_imagen[0];
$imagen_alto = $info_imagen[1];
$imagen_tipo = $info_imagen['mime'];


$proporcion_imagen = $imagen_ancho / $imagen_alto;
$proporcion_miniatura = $miniatura_ancho_maximo / $miniatura_alto_maximo;

if ( $proporcion_imagen > $proporcion_miniatura ){
	$miniatura_ancho = $miniatura_alto_maximo * $proporcion_imagen;
	$miniatura_alto = $miniatura_alto_maximo;
} else if ( $proporcion_imagen < $proporcion_miniatura ){
	$miniatura_ancho = $miniatura_ancho_maximo;
	$miniatura_alto = $miniatura_ancho_maximo / $proporcion_imagen;
} else {
	$miniatura_ancho = $miniatura_ancho_maximo;
	$miniatura_alto = $miniatura_alto_maximo;
}

$x = ( $miniatura_ancho - $miniatura_ancho_maximo ) / 2;
$y = ( $miniatura_alto - $miniatura_alto_maximo ) / 2;

switch ( $imagen_tipo ){
	case "image/jpg":
	case "image/jpeg":
		$imagen = imagecreatefromjpeg( $ruta_imagen );
		break;
	case "image/png":
		$imagen = imagecreatefrompng( $ruta_imagen );
		break;
	case "image/gif":
		$imagen = imagecreatefromgif( $ruta_imagen );
		break;
}

$lienzo = imagecreatetruecolor( $miniatura_ancho_maximo, $miniatura_alto_maximo );
$lienzo_temporal = imagecreatetruecolor( $miniatura_ancho, $miniatura_alto );

imagecopyresampled($lienzo_temporal, $imagen, 0, 0, 0, 0, $miniatura_ancho, $miniatura_alto, $imagen_ancho, $imagen_alto);
imagecopy($lienzo, $lienzo_temporal, 0,0, $x, $y, $miniatura_ancho_maximo, $miniatura_alto_maximo);

imagejpeg($lienzo, "../../imagenesNoticias/thumbnail/$nombre_imagen", 80);

//--------------------------------------------------------------------------------------//

	    echo "<script>alert('Noticia dada de Alta')</script>";
		echo "<script>location.href='../index.php'</script>";
	}else
		{
			echo "<script>alert('Ocurrio un error, Vuelva a intentarlo')</script>";
			echo "<script>location.href='../nueva.php'</script>";
		}


?>
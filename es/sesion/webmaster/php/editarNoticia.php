<meta charset="UTF-8">
<?PHP

require("../../../php/conectar.php");

$id_noticia = $_POST['id_noticia'];
$titulo = addslashes($_POST['titulo']);
$encabezado = addslashes($_POST['encabezado']);
$imgOld = $_POST['imgOld'];
$noticia = addslashes($_POST['noticia']);
$autor = addslashes($_POST['autor']);

$idioma = $_POST['idioma'];


$nombre_imagen = mktime() . '.jpg';

$origen = $_FILES['imagen']['tmp_name'];


if($origen)
{
	$up = mysql_query("UPDATE noticias SET titulo='$titulo', encabezado='$encabezado', imagen='$nombre_imagen', noticia='$noticia', autor='$autor', idioma='$idioma' WHERE id_noticia='$id_noticia' ");

	if ($up) 
		{
			/*$origen = $_FILES['imagen']['tmp_name'];*/
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

		  		echo "<script>alert('Noticia editada con exito!')</script>";
				echo "<script>location.href='../index.php'</script>";

			}
			else
				{
					echo "<script>alert('Error al editar la noticia')</script>";
					echo "<script>location.href='../index.php'</script>";
				}




	
}else
{
	$up = mysql_query("UPDATE noticias SET titulo='$titulo', encabezado='$encabezado', imagen='$imgOld', noticia='$noticia', autor='$autor' WHERE id_noticia='$id_noticia' ");
	if($up)
	{				
		echo "<script>alert('Noticia editada con exito!')</script>";
		echo "<script>location.href='../index.php'</script>";
	}
		else
		{
			echo "<script>alert('Error al editar la noticia')</script>";
			echo "<script>location.href='../index.php'</script>";
		}
}
?>
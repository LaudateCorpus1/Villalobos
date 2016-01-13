<meta charset="UTF-8">
<?PHP

require("../../../php/conectar.php");

$trad = $_POST['id_noticia'];
$id_usuario = $_POST['id_usuario'];
$titulo = addslashes($_POST['titulo']);
$encabezado = addslashes($_POST['encabezado']);
$imgOld = $_POST['imgOld'];
$noticia = addslashes($_POST['noticia']);
$autor = addslashes($_POST['autor']);

/*$trad = 135;*/

$idioma = $_POST['idioma'];

$fecha = date("Y-m-d");


$nombre_imagen = mktime() . '.jpg';

$origen = $_FILES['imagen']['tmp_name'];


if($origen)
{
	$up = mysql_query("INSERT INTO noticias (id_noticia, titulo, encabezado, imagen, noticia, autor, fecha, id_usuario, idioma, trad) VALUES ('', '".$titulo."', '".$encabezado."', '".$nombre_imagen."', '".$noticia."', '".$autor."', '".$fecha."', '".$id_usuario."', '".$idioma."', '".$trad."');") or die(mysql_error());

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

			$notTra = mysql_query("SELECT id_noticia FROM noticias WHERE trad=$trad;");
			$row = mysql_fetch_array($notTra);

			$id_noticia = $row['id_noticia'];

			$actu = mysql_query("UPDATE noticias SET trad=$id_noticia WHERE id_noticia=$trad;");

		  		echo "<script>alert('Noticia agregada con exito!')</script>";
				echo "<script>location.href='../index.php'</script>";
				/*echo "<script>location.href='trad.php?trad=$trad'</script>";*/

			}
			else
				{
					echo "<script>alert('Error al agregar la noticia')</script>";
					echo "<script>location.href='../index.php'</script>";
				}




	
}else
{
	$up = mysql_query("INSERT INTO noticias (id_noticia, titulo, encabezado, imagen, noticia, autor, fecha, id_usuario, idioma, trad) VALUES ('', '".$titulo."', '".$encabezado."', '".$imgOld."', '".$noticia."', '".$autor."', '".$fecha."', '".$id_usuario."', '".$idioma."', '".$trad."');") or die(mysql_error());
	if($up)
	{	
		$notTra = mysql_query("SELECT id_noticia FROM noticias WHERE trad=$trad;");
			$row = mysql_fetch_array($notTra);

			$id_noticia = $row['id_noticia'];

			$actu = mysql_query("UPDATE noticias SET trad=$id_noticia WHERE id_noticia=$trad;");
			
		echo "<script>alert('Noticia agregada con exito!')</script>";
		echo "<script>location.href='../index.php'</script>";
	}
		else
		{
			echo "<script>alert('Error al agregar la noticia')</script>";
			echo "<script>location.href='../index.php'</script>";
		}
}
?>
<meta charset="UTF-8"/>
<?PHP

require("../../../php/conectar.php");

$id_noticia = $_POST['id_noticia'];
$titulo = $_POST['titulo'];
$encabezado = $_POST['encabezado'];
$imagen = $_POST['imagen'];
$noticia = $_POST['noticia'];
$autor = $_POST['autor'];
$fecha = $_POST['fecha'];
$id_usuario = $_POST['id_usuario'];

$usuario = $_POST['usuario'];
$razon = $_POST['razon'];


$insert = mysql_query("INSERT INTO bitacoranoticias (id, usuario, razon, id_noticia, titulo, encabezado, imagen, noticia, autor, fecha, id_usuario) 
	VALUES ('','". $id_usuario."','". $razon."','". $id_noticia."','". $titulo."','". $encabezado."','". $imagen."','". $noticia."','". $autor."','". $fecha."','". $id_usuario."' );");


	$resul = mysql_query("DELETE FROM noticias WHERE id_noticia = '$id_noticia'");


	if ($insert && $resul) 
	{
		echo "<script>alert('Noticia eliminada con Exito!')</script>";
		echo "<script>location.href='../index.php'</script>";
	}
		else
		{
			echo "<script>alert('Ocurrio un error, intentelo de nuevo')</script>";
			echo "<script>location.href='../index.php'</script>";
		}

?>
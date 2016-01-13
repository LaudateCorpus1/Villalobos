<?PHP
require("../../../php/conectar.php");

$trad = $_GET['trad'];

$notTra = mysql_query("SELECT id_noticia FROM noticias WHERE trad=$trad;");
$row = mysql_fetch_array($notTra);

$id_noticia = $row['id_noticia'];

$actu = mysql_query("UPDATE noticias SET trad=$id_noticia WHERE id_noticia=$trad;")


/*
		    echo $notTra;
		    echo "Hola";

		    $row = mysql_fetch_array($notTra);

		    $id_not = $row['id_noticia'];

			mysql_query("UPDATE noticias SET trad=$id_not WHERE id_noticia=$id_not");*/

?>
<?php

include('../includes/config.php');

/*$query="select distinct c.customerName, c.addressLine1, c.city, c.state, c.postalCode, c.country, c.creditLimit from customers c order by c.customerNumber";*/
/*$query="select distinct n.id_noticia, n.titulo, n.encabezado, n.imagen, n.noticia, n.fecha from noticias n order by n.id_noticia";*/
$query="select id_noticia, titulo, encabezado, fecha from noticias ORDER BY id_noticia DESC";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$arr = array();
if($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$arr[] = $row;	
	}
}
# JSON-encode the response
$json_response = json_encode($arr);

// # Return the response
echo $json_response;
?>

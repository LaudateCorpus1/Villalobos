<?php require_once('conexion.php');
$cn=  Conectarse();
$listado=  mysql_query("select * from usuarios",$cn);
?>

 <script type="text/javascript" language="javascript" src="js/jslistadopaises.js"></script>



            <table cellpadding="0" cellspacing="0" border="0" class="display" id="tabla_lista_paises">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>nombre</th>
                        <th>apellido_p</th>
                        <!-- <th>apellido_m</th> -->
                       <!--  <th>calle</th>
                       <th>numero</th>
                       <th>colonia</th>
                       <th>cp</th> -->
                        <th>usuario</th>
                        <!-- <th>contra</th> -->
                        <!-- <th>r_contra</th> -->
                        <th>telefono</th>
                        <th>celular</th>
                        <th>correo</th>
                      <!--   <th>fecha</th> -->
                        <th>perfil</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                       
                     
                    </tr>
                </tfoot>
                  <tbody>
                    <?php

     
                   while($reg=  mysql_fetch_array($listado))
                   {
                               echo "<tr>";
                               echo '<td>'.mb_convert_encoding($reg['id_usuario'], "UTF-8").'</td>';
                               echo "<td> <a href='datosUsuario.php?id=".$reg["id_usuario"]."'>".mb_convert_encoding($reg['nombre'], 'UTF-8')."<a></td>";
                               echo '<td>'.mb_convert_encoding($reg['apellido_p'], "UTF-8").'</td>';
                              /* echo '<td>'.mb_convert_encoding($reg['apellido_m'], "UTF-8").'</td>';*/
                               /*echo '<td>'.mb_convert_encoding($reg['calle'], "UTF-8").'</td>';
                               echo '<td>'.mb_convert_encoding($reg['numero'], "UTF-8").'</td>';
                               echo '<td>'.mb_convert_encoding($reg['colonia'], "UTF-8").'</td>';
                               echo '<td>'.mb_convert_encoding($reg['cp'], "UTF-8").'</td>';*/
                               echo '<td>'.mb_convert_encoding($reg['usuario'], "UTF-8").'</td>';
                               /*echo '<td>'.mb_convert_encoding($reg['contra'], "UTF-8").'</td>';
                               echo '<td>'.mb_convert_encoding($reg['r_contra'], "UTF-8").'</td>';*/
                               echo '<td>'.mb_convert_encoding($reg['telefono'], "UTF-8").'</td>';
                               echo '<td>'.mb_convert_encoding($reg['celular'], "UTF-8").'</td>';
                               echo '<td>'.mb_convert_encoding($reg['correo'], "UTF-8").'</td>';
                               /*echo '<td>'.mb_convert_encoding($reg['fecha'], "UTF-8").'</td>';*/
                               echo '<td>'.mb_convert_encoding($reg['perfil'], "UTF-8").'</td>';
                               echo '</tr>';
                     
                        }
                    ?>
                <tbody>
            </table>

<?php
	session_start();
	session_destroy();
    //Y redirecciona
    /*header('location: ../../index.php');*/
    echo "<script language=Javascript> location.href=\"../../index.php\"; </script>";
 ?>
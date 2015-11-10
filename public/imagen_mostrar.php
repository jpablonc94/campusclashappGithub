<?php
session_start();

$server="localhost";
$database = "campusclash";
$db_pass = 'T7tmn892AB3';
$db_user = 'root';
   
mysql_connect($server, $db_user, $db_pass) or die ("error1".mysql_error());
mysql_select_db($database) or die ("error2".mysql_error());

if ($_GET['id'] > 0)
{
    
    if($_SESSION['session_rol']=="vendedor"){
        $consulta = mysql_query("SELECT `imagen`, `tipo_imagen` FROM `productos` WHERE `id`={$_GET['id']}");
    } else if($_SESSION['session_rol']=="profesor"){
        $consulta = mysql_query("SELECT `imagen`, `tipo_imagen` FROM `premios` WHERE `id`={$_GET['id']}");
    } else {
        $consulta = mysql_query("SELECT `imagen`, `tipo_imagen` FROM `usertbl` WHERE `id`={$_GET['id']}");
    }

    $numrows=mysql_num_rows($consulta) or die(mysql_error());
    
    if($numrows!=0){
        $datos = mysql_fetch_assoc($consulta);
 
        $imagen = $datos['imagen']; // Datos binarios de la imagen.
        $tipo = $datos['tipo_imagen'];  // Mime Type de la imagen.
        // Mandamos las cabeceras al navegador indicando el tipo de datos que vamos a enviar.
        header("Content-type: $tipo");
        // A continuación enviamos el contenido binario de la imagen.
        echo $imagen;
    }
}
?>
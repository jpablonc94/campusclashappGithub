<?php
session_start();

require_once 'connection.php';

if ($_GET['id'] > 0)
{    
    
    $consulta = mysql_query("SELECT `imagen`, `tipo_imagen` FROM `premios` WHERE `id`={$_GET['id']}");
    

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
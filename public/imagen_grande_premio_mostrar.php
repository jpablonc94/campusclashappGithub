<?php
require_once 'connection.php';

if ($_GET['id'] > 0)
{
        
    $consulta = mysql_query("SELECT `imagen_grande`, `tipo_imagen_grande` FROM `premios` WHERE `id`={$_GET['id']}");    

    $numrows=mysql_num_rows($consulta) or die(mysql_error());
    
    if($numrows!=0){
        $datos = mysql_fetch_assoc($consulta);
 
        $imagen = $datos['imagen_grande']; // Datos binarios de la imagen.
        $tipo = $datos['tipo_imagen_grande'];  // Mime Type de la imagen.
        // Mandamos las cabeceras al navegador indicando el tipo de datos que vamos a enviar.
        header("Content-type: $tipo");
        // A continuación enviamos el contenido binario de la imagen.
        echo $imagen;
    }
}
?>
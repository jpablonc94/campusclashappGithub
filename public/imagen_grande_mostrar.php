<?php
require_once 'connection.php';

if ($_GET['id'] > 0)
{
    // Consulta de búsqueda de la imagen.
    $consulta = "SELECT `imagen_grande`, `tipo_imagen_grande` FROM `productos` WHERE `id`={$_GET['id']}";
    $resultado = @mysql_query($consulta) or die(mysql_error());
    $datos = mysql_fetch_assoc($resultado);
 
    $imagen = $datos['imagen_grande']; // Datos binarios de la imagen.
    $tipo = $datos['tipo_imagen_grande'];  // Mime Type de la imagen.
    // Mandamos las cabeceras al navegador indicando el tipo de datos que vamos a enviar.
    header("Content-type: $tipo");
    // A continuación enviamos el contenido binario de la imagen.
    echo $imagen;
}
?>
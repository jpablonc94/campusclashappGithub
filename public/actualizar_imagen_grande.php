<?php
session_start();
// Conexion a la base de datos
$_SESSION['session_image_loaded_try'] = true;

$id = $_SESSION['session_producto_id'];

$server="localhost";
$database = "campusclash";
$db_pass = 'T7tmn892AB3';
$db_user = 'root';
    
mysql_connect($server, $db_user, $db_pass) or die ("error1".mysql_error());
mysql_select_db($database) or die ("error2".mysql_error());
 
// Comprobamos si ha ocurrido un error.
if (!isset($_FILES["imagen_grande"]) || $_FILES["imagen_grande"]["error"] > 0)
{
    $_SESSION['session_image_loaded'] = "Ha ocurrido un error.";
}
else
{
    // Verificamos si el tipo de archivo es un tipo de imagen permitido.
    // y que el tamaño del archivo no exceda los 16MB
    $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
    $limite_kb = 16384;
 
    if (in_array($_FILES['imagen_grande']['type'], $permitidos) && $_FILES['imagen_grande']['size'] <= $limite_kb * 1024)
    {
 
        // Archivo temporal
        $imagen_temporal = $_FILES['imagen_grande']['tmp_name'];
 
        // Tipo de archivo
        $tipo = $_FILES['imagen_grande']['type'];
        // Leemos el contenido del archivo temporal en binario.
        $fp = fopen($imagen_temporal, 'r+b');
        $data = fread($fp, filesize($imagen_temporal));
        fclose($fp);
 
        //Podríamos utilizar también la siguiente instrucción en lugar de las 3 anteriores.
        // $data=file_get_contents($imagen_temporal);
 
        // Escapamos los caracteres para que se puedan almacenar en la base de datos correctamente.
        $data = mysql_escape_string($data);

        // Insertamos en la base de datos.
        if($_SESSION['session_rol']=="vendedor"){
            $resultado = mysql_query("UPDATE `productos` SET `imagen_grande`= '$data',`tipo_imagen_grande`= '$tipo' WHERE `id`= '$id'");
        } else{
            $resultado = mysql_query("UPDATE `premios` SET `imagen_grande`= '$data',`tipo_imagen_grande`= '$tipo' WHERE `id`= '$id'");
        }

        if ($resultado)
        {
            $_SESSION['session_image_loaded']="La imagen ha sido reemplazada exitosamente.";
        }
        else
        {
            $_SESSION['session_image_loaded']="Ocurrió algun error durante el reemplazo del archivo.";
        }
    }
    else
    {
        $_SESSION['session_image_loaded']="Formato de archivo no permitido o excede el tamaño límite de $limite_kb Kbytes.";
    }
}
if($_SESSION['session_rol']=="vendedor"){
    header("location:modificar_producto.php?id=$id");
} else{
    header("location:modificar_premio.php?id=$id");
}
?>
<?php
session_start();
require_once 'lib.php';
// Conexion a la base de datos
$_SESSION['session_upload_product_try'] = true;

require_once 'connection.php';
 
// Comprobamos si ha ocurrido un error.
if (!isset($_FILES["imagen"]) || $_FILES["imagen"]["error"] > 0)
{
    echo "Ha ocurrido un error.";
}
else
{
    // Verificamos si el tipo de archivo es un tipo de imagen permitido.
    // y que el tamaño del archivo no exceda los 16MB
    $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
    $limite_kb = 16384;
 
    if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024)
    {
 
        //IMAGEN
        // Archivo temporal
        $imagen_temporal = $_FILES['imagen']['tmp_name'];

        if (is_dir('img/productos') && is_uploaded_file($imagen_temporal))
        {
 
            // Tipo de archivo
            $tipo = $_FILES['imagen']['type'];
            // Leemos el contenido del archivo temporal en binario.
            $fp = fopen($imagen_temporal, 'r+b');
            $data = fread($fp, filesize($imagen_temporal));
            fclose($fp);
 
            //Podríamos utilizar también la siguiente instrucción en lugar de las 3 anteriores.
            // $data=file_get_contents($imagen_temporal);
 
            // Escapamos los caracteres para que se puedan almacenar en la base de datos correctamente.
            $data = mysql_escape_string($data);

            //IMAGEN GRANDE
            // Archivo temporal
            $imagen_grande_temporal = $_FILES['imagen_grande']['tmp_name'];
            
            if (is_uploaded_file($imagen_grande_temporal))
            {
                // Tipo de archivo
                $tipo_imagen_grande = $_FILES['imagen_grande']['type'];
                // Leemos el contenido del archivo temporal en binario.
                $fp_imagen_grande = fopen($imagen_grande_temporal, 'r+b');
                $data_imagen_grande = fread($fp_imagen_grande, filesize($imagen_grande_temporal));
                fclose($fp_imagen_grande);
 
                //Podríamos utilizar también la siguiente instrucción en lugar de las 3 anteriores.
                // $data=file_get_contents($imagen_temporal);
 
                // Escapamos los caracteres para que se puedan almacenar en la base de datos correctamente.
                $data_imagen_grande = mysql_escape_string($data_imagen_grande);
            }

            $negocio = $_POST["negocio"];
            $producto = $_POST["name"];
            $short_description = $_POST["short_description"];
            $description = $_POST["description"];
            $precio = $_POST["precio"];
            $vendedor = $_SESSION["session_username"];

            $query = mysql_query("SELECT * FROM `productos` WHERE `vendedor`= '$vendedor' AND `nombre`='$producto'");
            $numrows = mysql_num_rows($query);
            if($numrows!=0){
                $_SESSION['session_upload_message']="Error, ya tienes un producto con este nombre, pruebe con otro nombre";
                header("location:vendedor.php");
            }

            $resultado = mysql_query ("INSERT INTO `productos`(`vendedor`, `nombre`, `comercio`, `description`, `long_description`, `precio`, `imagen`, `tipo_imagen`, `imagen_grande`, `tipo_imagen_grande`) VALUES ('$vendedor', '$producto', '$negocio', '$short_description', '$description', '$precio', '$data', '$tipo', '$data_imagen_grande', '$tipo_imagen_grande')");
        
            $consulta = mysql_query("SELECT * FROM `productos` WHERE `vendedor`= '$vendedor' AND `nombre`='$producto'");
            $row=mysql_fetch_assoc($consulta);
            $id = $row['id'];
            $img_file = "$id.jpg";

            if ($resultado){
                if (move_uploaded_file($imagen_temporal, 'img/productos' . '/' . $img_file)){
                        estrechar_producto($id);
                        $_SESSION['session_upload_message']="Producto registrado correctamente.";
                } else {
                    $_SESSION['session_upload_message']="Producto registrado correctamente aunque ha habido un problema al subir la imagen.";
                }
            } else {
                $_SESSION['session_upload_message']="ERROR";
            }   
        } else {
                $_SESSION['session_upload_message']="Ha habido algún problema con la imagen, pruebe con otra o procure que el formato sea jpg.";
        } 
    }
    else
    {
        $_SESSION['session_upload_message']="Formato de IMAGEN no permitido o excede el tamaño límite de $limite_kb Kbytes.";
    }
}
header("location:vendedor.php");
?>
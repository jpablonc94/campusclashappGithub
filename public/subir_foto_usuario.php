<?php
session_start();
require_once 'lib.php';
// Conexion a la base de datos
$_SESSION['session_image_loaded_try'] = true;

$server="localhost";
$database = "campusclash";
$db_pass = 'T7tmn892AB3';
$db_user = 'root';
    
mysql_connect($server, $db_user, $db_pass) or die ("error1".mysql_error());
mysql_select_db($database) or die ("error2".mysql_error());
 
// Comprobamos si ha ocurrido un error.
if (!isset($_FILES["imagen"]) || $_FILES["imagen"]["error"] > 0)
{
     $_SESSION['session_image_loaded'] = "Ha ocurrido un error al principio del todo.";
}
else
{
    // Verificamos si el tipo de archivo es un tipo de imagen permitido.
    // y que el tamaño del archivo no exceda los 16MB
    $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
    $limite_kb = 16384;
 


    if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024)
    {
        $imagen_temporal = $_FILES['imagen']['tmp_name'];

        if (is_dir('img/usuarios') && is_uploaded_file($imagen_temporal))
        {
            $tipo = $_FILES['imagen']['type'];
            
            // Si se trata de una imagen   
            if (((strpos($tipo, "gif") || strpos($tipo, "jpeg") ||
                strpos($tipo, "jpg")) || strpos($tipo, "png")))
            {
                //¿Tenemos permisos para subir la imágen?            
                $username = $_SESSION['session_username'];
                $img_file = "$username.jpg";
                // Leemos el contenido del archivo temporal en binario.
                $fp = fopen($imagen_temporal, 'r+b');
                $data = fread($fp, filesize($imagen_temporal));
                fclose($fp);
 
                //Podríamos utilizar también la siguiente instrucción en lugar de las 3 anteriores.
                // $data=file_get_contents($imagen_temporal);
    
                // Escapamos los caracteres para que se puedan almacenar en la base de datos correctamente.
                $data = mysql_escape_string($data);

                if($_SESSION['session_rol']=="alumno"){
                    $resultado = mysql_query("UPDATE `usertbl` SET `imagen`= '$data',`tipo_imagen`= '$tipo' WHERE `username`= '$username'");
                } else if($_SESSION['session_rol']=="profesor"){
                    $resultado = mysql_query("UPDATE `profesores` SET `imagen`= '$data',`tipo_imagen`= '$tipo' WHERE `username`= '$username'");
                } else {
                    $resultado = mysql_query("UPDATE `vendedores` SET `imagen`= '$data',`tipo_imagen`= '$tipo' WHERE `username`= '$username'");
                }

                if ($resultado){
                    if (move_uploaded_file($imagen_temporal, 'img/usuarios' . '/' . $img_file))
                    {
                        estrechar($username);
                        $_SESSION['session_image_loaded']="La imagen ha sido reemplazada exitosamente.";
                    } else {
                        $_SESSION['session_image_loaded']="Ocurrió algun error en el último if.";
                    }
                } else {
                    $_SESSION['session_image_loaded']="Ocurrió algun error durante el reemplazo del archivo.";
                }
            } else {
                $_SESSION['session_image_loaded']="Formato incorrecto.";
            }
        } else {
            $_SESSION['session_image_loaded']="Error del dichoso if.";
        }       
    } else {
        $_SESSION['session_image_loaded']="Formato de archivo no permitido o excede el tamaño límite de $limite_kb Kbytes.";
    }
}
header("location:settings.php");
?>
<?php
 
/**
 * subir_fichero()
 *
 * Sube una imagen al servidor  al directorio especificado teniendo el Atributo 'Name' del campo archivo.
 *
 * @param string $directorio_destino Directorio de destino dónde queremos dejar el archivo
 * @param string $nombre_fichero Atributo 'Name' del campo archivo
 * @return boolean
 */
function subir_fichero($directorio_destino, $nombre_fichero)
{
    $tmp_name = $_FILES[$nombre_fichero]['tmp_name'];
    //si hemos enviado un directorio que existe realmente y hemos subido el archivo    
    if (is_dir($directorio_destino) && is_uploaded_file($tmp_name))
    {
        $img_file = $_FILES[$nombre_fichero]['name'];
        $img_type = $_FILES[$nombre_fichero]['type'];
        echo 1;
        // Si se trata de una imagen   
        if (((strpos($img_type, "gif") || strpos($img_type, "jpeg") ||
 strpos($img_type, "jpg")) || strpos($img_type, "png")))
        {
            //¿Tenemos permisos para subir la imágen?
            echo 2;
            if (move_uploaded_file($tmp_name, $directorio_destino . '/' . $img_file))
            {
                return true;
            }
        }
    }
    //Si llegamos hasta aquí es que algo ha fallado
    return false;
}

function obtener_datos_from_db($username){
    // Conexion a la base de datos
    $server="localhost";
    $database = "campusclash";
    $db_pass = 'T7tmn892AB3';
    $db_user = 'root';
   
    mysql_connect($server, $db_user, $db_pass) or die ("error1".mysql_error());
    mysql_select_db($database) or die ("error2".mysql_error());

    // Consulta de búsqueda de la imagen.
    $query =mysql_query("SELECT * FROM usertbl WHERE username='".$username."'");
 
    $numrows=mysql_num_rows($query);

    if($numrows!=0){
        while($row=mysql_fetch_assoc($query)){
            $dbusername=$row['username'];
            $dbemail=$row['email'];
            $dbfullname=$row['full_name'];
            $dbpoints=$row['points'];
            $dbposition=$row['position'];
        }    

        return array(
                "username" => $dbusername,
                "email" => $dbemail,
                "fullname" => $dbfullname,
                "points" => $dbpoints,
                "position" => $dbposition
               );
    } else {
        return array(
                "username" => "NO encotrado",
                "email" => "NO encotrado",
                "fullname" => "NO encotrado",
                "points" => "NO encotrado",
                "position" => "NO encotrado"
               );
    }
}

function cambiar_fullname($fullname, $newfullname, $username){
    $server="localhost";
    $database = "campusclash";
    $db_pass = 'T7tmn892AB3';
    $db_user = 'root';
    
    mysql_connect($server, $db_user, $db_pass) or die ("error1".mysql_error());
    mysql_select_db($database) or die ("error2".mysql_error());

    $resultado = mysql_query("UPDATE `usertbl` SET `full_name`= '$newfullname' WHERE `username`= '$username'");
    if($resultado){
        return "Nombre cambiado correctamente.";
    } else {
        return "Ha ocurrido algún error, pruebe otra vez en unos minutos.";
    }
}

function cambiar_password($password, $newpassword, $username){
    $server="localhost";
    $database = "campusclash";
    $db_pass = 'T7tmn892AB3';
    $db_user = 'root';
    
    mysql_connect($server, $db_user, $db_pass) or die ("error1".mysql_error());
    mysql_select_db($database) or die ("error2".mysql_error());

    $query = mysql_query("SELECT * FROM `usertbl` WHERE `username`= '$username'");
    $numrows=mysql_num_rows($query);
    if($numrows!=0){
        $row=mysql_fetch_assoc($query);
        $dbpassword = $row['password'];
        if($dbpassword == $password){
            $resultado = mysql_query("UPDATE `usertbl` SET `password`= '$newpassword' WHERE `username`= '$username'");
            if($resultado){
                return "Contraseña cambiada correctamente.";
            } else {
                return "Ha ocurrido algún error, pruebe otra vez en unos minutos.";
            }
        } else {
            return "Contraseña antigua incorrecta, inténtelo de nuevo.";
        }
    } else {
        return "Ha ocurrido algún error, pruebe otra vez en unos minutos.";
    }   
}

function cambiar_email($email, $newemail){
        $nuevo_email=mysql_query("SELECT `email` FROM `usertbl` WHERE `email`='$newemail'");
        if(mysql_num_rows($nuevo_email)>0) {
            return "Email ya existente, pruebe otro.";
        } else {
            $server="localhost";
            $database = "campusclash";
            $db_pass = 'T7tmn892AB3';
            $db_user = 'root';
    
            mysql_connect($server, $db_user, $db_pass) or die ("error1".mysql_error());
            mysql_select_db($database) or die ("error2".mysql_error());

            $resultado = mysql_query("UPDATE `usertbl` SET `email`= '$newemail' WHERE `email`= '$email'");
            if($resultado){
                return "Email cambiado correctamente.";
            } else {
                return "Ha ocurrido algún error, pruebe otra vez en unos minutos.";
            }
        }
}

function cambiar_username($username, $newusername){
    $nuevo_usuario=mysql_query("SELECT `username` FROM `usertbl` WHERE `username`='$newusername'");
    if(mysql_num_rows($nuevo_usuario)>0){
        return "Nombre de usuario ya existente, pruebe otro.";
    } else {
        $server="localhost";
        $database = "campusclash";
        $db_pass = 'T7tmn892AB3';
        $db_user = 'root';
    
        mysql_connect($server, $db_user, $db_pass) or die ("error1".mysql_error());
        mysql_select_db($database) or die ("error2".mysql_error());

        $resultado = mysql_query("UPDATE `usertbl` SET `username`= '$newusername' WHERE `username`= '$username'");
        if($resultado){
            $_SESSION["session_username"] = $newusername;
            return "Nombre de usuario cambiado correctamente.";
        } else {
            return "Ha ocurrido algún error, pruebe otra vez en unos minutos.";
        }
    }
}

function generar_datos_ordenados($username){
    $class = "col-lg-5 col-lg-offset-0";
    $style = "t01";
    $blue = "color:blue;";

    $server="localhost";
    $database = "campusclash";
    $db_pass = 'T7tmn892AB3';
    $db_user = 'root';
   
    mysql_connect($server, $db_user, $db_pass) or die ("error1".mysql_error());
    mysql_select_db($database) or die ("error2".mysql_error());

    // Consulta de búsqueda de la imagen.
    $query =mysql_query("SELECT * FROM usertbl ORDER BY points DESC");

    $numrows=mysql_num_rows($query);
    $n = 1;
    $resultado = "No hay nadie matriculado";
    if($numrows!=0){
        $resultado = "  <div class='$class'>
                            <table id='$style'>
                                <tr>
                                    <th>Posición</td>
                                    <th>Nombre y apellidos</td>
                                    <th>Nombre de usuario</td>
                                    <th>Puntos</td>
                                </tr>";

        while($row=mysql_fetch_assoc($query)){
            $dbusername=$row['username'];
            $dbfullname=$row['full_name'];
            $dbpoints=$row['points'];
            if($dbusername==$username){
                $individuo = "  <tr>
                                    <td><b>$n</b></td>
                                    <td><b>$dbfullname</b></td>
                                    <td><b>$dbusername</b></td>
                                    <td><b>$dbpoints</b></td>
                                </tr>";
                $resultado .= " <tr style='$blue'>
                                    <td><b>$n</b></td>
                                    <td><b>$dbfullname</b></td>
                                    <td><b>$dbusername</b></td>
                                    <td><b>$dbpoints</b></td>
                                </tr>";
            } else {
                $resultado .= " <tr>
                                    <td>$n</td>
                                    <td>$dbfullname</td>
                                    <td>$dbusername</td>
                                    <td>$dbpoints</td>
                                </tr>";
            }            

            $sql = mysql_query("UPDATE `usertbl` SET `position`= '$n' WHERE `username`= '$dbusername'");
            if($sql){
                $n++;
            } else {
                return "Ha ocurrido algún error.";
            }
        } 

        $resultado .= "     </table>
                        </div>";
    }
    return $resultado;
}

?>
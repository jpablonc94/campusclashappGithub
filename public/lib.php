<?php

function estrechar($username){
    $ruta_imagen = "img/usuarios/$username.jpg";

    $miniatura_ancho_maximo = 20;
    $miniatura_alto_maximo = 20;
    $info_imagen = getimagesize($ruta_imagen);
    $imagen_ancho = $info_imagen[0];
    $imagen_alto = $info_imagen[1];
    $imagen_tipo = $info_imagen['mime'];



    //MÉTODO ESTRECHAR
    $lienzo = imagecreatetruecolor( $miniatura_ancho_maximo, $miniatura_alto_maximo );

    switch ( $imagen_tipo ){
        case "image/jpg":
        case "image/jpeg":
            $imagen = imagecreatefromjpeg( $ruta_imagen );
            break;
        case "image/png":
            $imagen = imagecreatefrompng( $ruta_imagen );
            break;
        case "image/gif":
            $imagen = imagecreatefromgif( $ruta_imagen );
            break;
    }

    imagecopyresampled($lienzo, $imagen, 0, 0, 0, 0, $miniatura_ancho_maximo, $miniatura_alto_maximo, $imagen_ancho, $imagen_alto);

    imagejpeg($lienzo, "img/miniaturas/$username.jpg", 80);

    //foto de perfil
    $miniatura_ancho_maximo = 250;
    $miniatura_alto_maximo = 250;
    $info_imagen = getimagesize($ruta_imagen);
    $imagen_ancho = $info_imagen[0];
    $imagen_alto = $info_imagen[1];
    $imagen_tipo = $info_imagen['mime'];



    //MÉTODO ESTRECHAR
    $lienzo = imagecreatetruecolor( $miniatura_ancho_maximo, $miniatura_alto_maximo );

    switch ( $imagen_tipo ){
        case "image/jpg":
        case "image/jpeg":
            $imagen = imagecreatefromjpeg( $ruta_imagen );
            break;
        case "image/png":
            $imagen = imagecreatefrompng( $ruta_imagen );
            break;
        case "image/gif":
            $imagen = imagecreatefromgif( $ruta_imagen );
            break;
    }

    imagecopyresampled($lienzo, $imagen, 0, 0, 0, 0, $miniatura_ancho_maximo, $miniatura_alto_maximo, $imagen_ancho, $imagen_alto);

    imagejpeg($lienzo, "img/perfiles/$username.jpg", 80);
}
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

function obtener_datos_from_usertbl($username){
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
            $dbid=$row['id'];
            $dbusername=$row['username'];
            $dbemail= $row['email'];
            $dbfullname= $row['full_name'];
            $dbpoints= $row['points'];
            $dbposition= $row['position'];
            $dbmonedas = $row['monedas'];
            $dbnivel = $row['nivel'];
            $dbexp = $row['experiencia'];
            $dbnext = $row['next_lvl'];
            $dbimagen = $row['imagen'];
        }    

        return array(
                "id" => $dbid,
                "username" => $dbusername,
                "email" => $dbemail,
                "fullname" => $dbfullname,
                "points" => $dbpoints,
                "position" => $dbposition,
                "monedas" => $dbmonedas,
                "nivel" => $dbnivel,
                "experiencia" => $dbexp,
                "next_lvl" => $dbnext,
                "imagen" => $dbimagen
               );
    } else {
        return array(
                "id" => "NO encotrado",
                "username" => "NO encotrado",
                "email" => "NO encotrado",
                "fullname" => "NO encotrado",
                "points" => "NO encotrado",
                "position" => "NO encotrado",
                "monedas" => "NO encotrado",
                "nivel" => "NO encotrado",
                "experiencia" => "NO encotrado",
                "next_lvl" => "NO encotrado",
                "imagen" => "NO encotrado"
               );
    }
}

function obtener_datos_from_profesores($username){
    // Conexion a la base de datos
    $server="localhost";
    $database = "campusclash";
    $db_pass = 'T7tmn892AB3';
    $db_user = 'root';
   
    mysql_connect($server, $db_user, $db_pass) or die ("error1".mysql_error());
    mysql_select_db($database) or die ("error2".mysql_error());

    // Consulta de búsqueda de la imagen.
    $query =mysql_query("SELECT * FROM profesores WHERE username='".$username."'");
 
    $numrows=mysql_num_rows($query);

    if($numrows!=0){
        while($row=mysql_fetch_assoc($query)){
            $dbid=$row['id'];
            $dbusername=$row['username'];
            $dbemail= $row['email'];
            $dbfullname= $row['full_name'];
            $dbimagen = $row['imagen'];
            $dbmoodleid = $row['moodle_id'];
        }    

        return array(
                "id" => $dbid,
                "moodleid" => $dbmoodleid,
                "username" => $dbusername,
                "email" => $dbemail,
                "fullname" => $dbfullname,
                "imagen" => $dbimagen
               );
    } else {
        return array(
                "id" => "NO encotrado",
                "moodleid" => "NO encotrado",
                "username" => "NO encotrado",
                "email" => "NO encotrado",
                "fullname" => "NO encotrado",
                "imagen" => "NO encotrado"
               );
    }
}

function obtener_datos_from_vendedores($username){
    // Conexion a la base de datos
    $server="localhost";
    $database = "campusclash";
    $db_pass = 'T7tmn892AB3';
    $db_user = 'root';
   
    mysql_connect($server, $db_user, $db_pass) or die ("error1".mysql_error());
    mysql_select_db($database) or die ("error2".mysql_error());

    // Consulta de búsqueda de la imagen.
    $query =mysql_query("SELECT * FROM vendedores WHERE username='".$username."'");
 
    $numrows=mysql_num_rows($query);

    if($numrows!=0){
        while($row=mysql_fetch_assoc($query)){
            $dbid=$row['id'];
            $dbusername=$row['username'];
            $dbemail= $row['email'];
            $dbfullname= $row['full_name'];
            $dbimagen = $row['imagen'];
        }    

        return array(
                "id" => $dbid,
                "username" => $dbusername,
                "email" => $dbemail,
                "fullname" => $dbfullname,
                "imagen" => $dbimagen
               );
    } else {
        return array(
                "id" => "NO encotrado",
                "username" => "NO encotrado",
                "email" => "NO encotrado",
                "fullname" => "NO encotrado",
                "imagen" => "NO encotrado"
               );
    }
}

function obtener_datos_from_usertbl_por_id($id){
    // Conexion a la base de datos
    $server="localhost";
    $database = "campusclash";
    $db_pass = 'T7tmn892AB3';
    $db_user = 'root';
   
    mysql_connect($server, $db_user, $db_pass) or die ("error1".mysql_error());
    mysql_select_db($database) or die ("error2".mysql_error());

    // Consulta de búsqueda de la imagen.
    $query =mysql_query("SELECT * FROM usertbl WHERE id='".$id."'");
 
    $numrows=mysql_num_rows($query);

    if($numrows!=0){
        while($row=mysql_fetch_assoc($query)){
            $dbid=$row['id'];
            $dbusername=$row['username'];
            $dbemail= $row['email'];
            $dbfullname= $row['full_name'];
            $dbpoints= $row['points'];
            $dbposition= $row['position'];
            $dbmonedas = $row['monedas'];
            $dbnivel = $row['nivel'];
            $dbexp = $row['experiencia'];
            $dbnext = $row['next_lvl'];
            $dbimagen = $row['imagen'];
        }    

        return array(
                "id" => $dbid,
                "username" => $dbusername,
                "email" => $dbemail,
                "fullname" => $dbfullname,
                "points" => $dbpoints,
                "position" => $dbposition,
                "monedas" => $dbmonedas,
                "nivel" => $dbnivel,
                "experiencia" => $dbexp,
                "next_lvl" => $dbnext,
                "imagen" => $dbimagen
               );
    } else {
        return array(
                "id" => "NO encotrado",
                "username" => "NO encotrado",
                "email" => "NO encotrado",
                "fullname" => "NO encotrado",
                "points" => "NO encotrado",
                "position" => "NO encotrado",
                "monedas" => "NO encotrado",
                "nivel" => "NO encotrado",
                "experiencia" => "NO encotrado",
                "next_lvl" => "NO encotrado",
                "imagen" => "NO encotrado"
               );
    }
}

function obtener_datos_from_profesores_por_id($id){
    // Conexion a la base de datos
    $server="localhost";
    $database = "campusclash";
    $db_pass = 'T7tmn892AB3';
    $db_user = 'root';
   
    mysql_connect($server, $db_user, $db_pass) or die ("error1".mysql_error());
    mysql_select_db($database) or die ("error2".mysql_error());

    // Consulta de búsqueda de la imagen.
    $query =mysql_query("SELECT * FROM profesores WHERE id='".$id."'");
 
    $numrows=mysql_num_rows($query);

    if($numrows!=0){
        while($row=mysql_fetch_assoc($query)){
            $dbid=$row['id'];
            $dbusername=$row['username'];
            $dbemail= $row['email'];
            $dbfullname= $row['full_name'];
            $dbimagen = $row['imagen'];
            $dbmoodleid = $row['moodle_id'];
        }    

        return array(
                "id" => $dbid,
                "moodleid" => $dbmoodleid,
                "username" => $dbusername,
                "email" => $dbemail,
                "fullname" => $dbfullname,
                "imagen" => $dbimagen
               );
    } else {
        return array(
                "id" => "NO encotrado",
                "moodleid" => "NO encotrado",
                "username" => "NO encotrado",
                "email" => "NO encotrado",
                "fullname" => "NO encotrado",
                "imagen" => "NO encotrado"
               );
    }
}

function obtener_datos_from_vendedores_por_id($id){
    // Conexion a la base de datos
    $server="localhost";
    $database = "campusclash";
    $db_pass = 'T7tmn892AB3';
    $db_user = 'root';
   
    mysql_connect($server, $db_user, $db_pass) or die ("error1".mysql_error());
    mysql_select_db($database) or die ("error2".mysql_error());

    // Consulta de búsqueda de la imagen.
    $query =mysql_query("SELECT * FROM vendedores WHERE id='".$id."'");
 
    $numrows=mysql_num_rows($query);

    if($numrows!=0){
        while($row=mysql_fetch_assoc($query)){
            $dbid=$row['id'];
            $dbusername=$row['username'];
            $dbemail= $row['email'];
            $dbfullname= $row['full_name'];
            $dbimagen = $row['imagen'];
        }    

        return array(
                "id" => $dbid,
                "username" => $dbusername,
                "email" => $dbemail,
                "fullname" => $dbfullname,
                "imagen" => $dbimagen
               );
    } else {
        return array(
                "id" => "NO encotrado",
                "username" => "NO encotrado",
                "email" => "NO encotrado",
                "fullname" => "NO encotrado",
                "imagen" => "NO encotrado"
               );
    }
}

function obtener_datos_producto_from_db($id){
    // Conexion a la base de datos
    $server="localhost";
    $database = "campusclash";
    $db_pass = 'T7tmn892AB3';
    $db_user = 'root';
   
    mysql_connect($server, $db_user, $db_pass) or die ("error1".mysql_error());
    mysql_select_db($database) or die ("error2".mysql_error());

    // Consulta de búsqueda de la imagen.
    $query =mysql_query("SELECT * FROM productos WHERE id='$id'");
 
    $numrows=mysql_num_rows($query);

    if($numrows!=0){
        while($row=mysql_fetch_assoc($query)){
            $dbnombre=$row['nombre'];
        }    

        return array(
                "productname" => $dbnombre                
               );
    } else {
        return array(
                "productname" => "NO encotrado"                
               );
    }
}

function obtener_datos_asignatura_from_db($id){
    // Conexion a la base de datos
    $server="localhost";
    $database = "campusclash";
    $db_pass = 'T7tmn892AB3';
    $db_user = 'root';
   
    mysql_connect($server, $db_user, $db_pass) or die ("error1".mysql_error());
    mysql_select_db($database) or die ("error2".mysql_error());

    // Consulta de búsqueda de la imagen.
    $query =mysql_query("SELECT * FROM asignaturas WHERE course_id='$id'");
 
    $numrows=mysql_num_rows($query);

    if($numrows!=0){
        while($row=mysql_fetch_assoc($query)){
            $dbnombre=$row['nombre_asignatura'];
        }    

        return array(
                "nombre_asignatura" => $dbnombre                
               );
    } else {
        return array(
                "nombre_asignatura" => "NO encotrado"                
               );
    }
}


function es_producto_de_usuario($id,$username){
    // Conexion a la base de datos
    $server="localhost";
    $database = "campusclash";
    $db_pass = 'T7tmn892AB3';
    $db_user = 'root';
   
    mysql_connect($server, $db_user, $db_pass) or die ("error1".mysql_error());
    mysql_select_db($database) or die ("error2".mysql_error());

    // Consulta de búsqueda de la imagen.
    $query =mysql_query("SELECT * FROM productos WHERE id='$id'");

    $numrows=mysql_num_rows($query);

    if($numrows!=0){
        while($row=mysql_fetch_assoc($query)){
            $dbusername=$row['vendedor'];
        }
        if($dbusername==$username) return true;
        else return false;
    } else return false;
}

function es_premio_de_usuario($id,$username){
        // Conexion a la base de datos
    $server="localhost";
    $database = "campusclash";
    $db_pass = 'T7tmn892AB3';
    $db_user = 'root';
   
    mysql_connect($server, $db_user, $db_pass) or die ("error1".mysql_error());
    mysql_select_db($database) or die ("error2".mysql_error());

    // Consulta de búsqueda de la imagen.
    $query =mysql_query("SELECT * FROM premios WHERE id='$id'");

    $numrows=mysql_num_rows($query);

    if($numrows!=0){
        while($row=mysql_fetch_assoc($query)){
            $dbusername=$row['profesor'];
        }
        if($dbusername==$username) return true;
        else return false;
    } else return false;
}

function cambiar_fullname($fullname, $newfullname, $username, $rol){
    $server="localhost";
    $database = "campusclash";
    $db_pass = 'T7tmn892AB3';
    $db_user = 'root';
    
    mysql_connect($server, $db_user, $db_pass) or die ("error1".mysql_error());
    mysql_select_db($database) or die ("error2".mysql_error());

    if($rol == "alumno"){
        $resultado = mysql_query("UPDATE `usertbl` SET `full_name`= '$newfullname' WHERE `username`= '$username'");
    } else if($rol == "profesor"){
        $resultado = mysql_query("UPDATE `profesores` SET `full_name`= '$newfullname' WHERE `username`= '$username'");
    } else {
        $resultado = mysql_query("UPDATE `vendedores` SET `full_name`= '$newfullname' WHERE `username`= '$username'");
    }

    if($resultado){
        return "Nombre cambiado correctamente.";
    } else {
        return "Ha ocurrido algún error, pruebe otra vez en unos minutos.";
    }
}

function cambiar_password($password, $newpassword, $username, $rol){
    $server="localhost";
    $database = "campusclash";
    $db_pass = 'T7tmn892AB3';
    $db_user = 'root';
    
    mysql_connect($server, $db_user, $db_pass) or die ("error1".mysql_error());
    mysql_select_db($database) or die ("error2".mysql_error());

    if($rol == "alumno"){
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
    } else if($rol == "profesor"){
        $query = mysql_query("SELECT * FROM `profesores` WHERE `username`= '$username'");
        $numrows=mysql_num_rows($query);
        if($numrows!=0){
            $row=mysql_fetch_assoc($query);
            $dbpassword = $row['password'];
            if($dbpassword == $password){
                $resultado = mysql_query("UPDATE `profesores` SET `password`= '$newpassword' WHERE `username`= '$username'");
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
    } else {
        $query = mysql_query("SELECT * FROM `vendedores` WHERE `username`= '$username'");
        $numrows=mysql_num_rows($query);
        if($numrows!=0){
            $row=mysql_fetch_assoc($query);
            $dbpassword = $row['password'];
            if($dbpassword == $password){
                $resultado = mysql_query("UPDATE `vendedores` SET `password`= '$newpassword' WHERE `username`= '$username'");
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
}

function cambiar_email($email, $newemail, $rol){
    
    $nuevo_email1=mysql_query("SELECT `email` FROM `usertbl` WHERE `email`='$newemail'");
    
    $nuevo_email2=mysql_query("SELECT `email` FROM `profesores` WHERE `email`='$newemail'");
    
    $nuevo_email3=mysql_query("SELECT `email` FROM `vendedores` WHERE `email`='$newemail'");
    
    if(mysql_num_rows($nuevo_email1)>0 || mysql_num_rows($nuevo_email2)>0 || mysql_num_rows($nuevo_email3)>0) {
        return "Email ya existente, pruebe otro.";
    } else {
        $server="localhost";
        $database = "campusclash";
        $db_pass = 'T7tmn892AB3';
        $db_user = 'root';
    
        mysql_connect($server, $db_user, $db_pass) or die ("error1".mysql_error());
        mysql_select_db($database) or die ("error2".mysql_error());

        if($rol == "alumno"){
            $resultado = mysql_query("UPDATE `usertbl` SET `email`= '$newemail' WHERE `email`= '$email'");
        } else if($rol == "profesor"){
            $resultado = mysql_query("UPDATE `profesores` SET `email`= '$newemail' WHERE `email`= '$email'");
        } else {
            $resultado = mysql_query("UPDATE `vendedores` SET `email`= '$newemail' WHERE `email`= '$email'");
        }
    
        if($resultado){
            return "Email cambiado correctamente.";
        } else {
            return "Ha ocurrido algún error, pruebe otra vez en unos minutos.";
        }
    }
}

function cambiar_username($username, $newusername, $rol){
    
    $nuevo_usuario1=mysql_query("SELECT `username` FROM `usertbl` WHERE `username`='$newusername'");
    
    $nuevo_usuario2=mysql_query("SELECT `username` FROM `profesores` WHERE `username`='$newusername'");
    
    $nuevo_usuario3=mysql_query("SELECT `username` FROM `vendedores` WHERE `username`='$newusername'");
    

    if(mysql_num_rows($nuevo_usuario1)>0 || mysql_num_rows($nuevo_usuario2)>0 || mysql_num_rows($nuevo_usuario3)>0){
        return "Nombre de usuario ya existente, pruebe otro.";
    } else {
        $server="localhost";
        $database = "campusclash";
        $db_pass = 'T7tmn892AB3';
        $db_user = 'root';
    
        mysql_connect($server, $db_user, $db_pass) or die ("error1".mysql_error());
        mysql_select_db($database) or die ("error2".mysql_error());

        if($rol == "alumno"){
            $resultado = mysql_query("UPDATE `usertbl` SET `username`= '$newusername' WHERE `username`= '$username'");
        } else if($rol == "profesor"){
            $resultado = mysql_query("UPDATE `profesores` SET `username`= '$newusername' WHERE `username`= '$username'");
        } else {
            $resultado = mysql_query("UPDATE `vendedores` SET `username`= '$newusername' WHERE `username`= '$username'");
        }

        if($resultado){
            $_SESSION["session_username"] = $newusername;
            return "Nombre de usuario cambiado correctamente.";
        } else {
            return "Ha ocurrido algún error, pruebe otra vez en unos minutos.";
        }
    }
}

function cambiar_negocio($negocio, $id){
    
    $server="localhost";
    $database = "campusclash";
    $db_pass = 'T7tmn892AB3';
    $db_user = 'root';
    
    mysql_connect($server, $db_user, $db_pass) or die ("error1".mysql_error());
    mysql_select_db($database) or die ("error2".mysql_error());

    $resultado = mysql_query("UPDATE `productos` SET `comercio`= '$negocio' WHERE `id`= '$id'");
    if($resultado){
        return "Nombre del negocio cambiado correctamente.";
    } else {
        return "Ha ocurrido algún error, pruebe otra vez en unos minutos.";
    }
}

function cambiar_nombre_producto($nombre, $id, $rol){
    
    $server="localhost";
    $database = "campusclash";
    $db_pass = 'T7tmn892AB3';
    $db_user = 'root';
    
    mysql_connect($server, $db_user, $db_pass) or die ("error1".mysql_error());
    mysql_select_db($database) or die ("error2".mysql_error());

    if($rol == "vendedor"){
        $resultado = mysql_query("UPDATE `productos` SET `nombre`= '$nombre' WHERE `id`= '$id'");
    } else{
        $resultado = mysql_query("UPDATE `premios` SET `nombre`= '$nombre' WHERE `id`= '$id'");
    }

    
    if($resultado){
        return "Nombre del producto cambiado correctamente.";
    } else {
        return "Ha ocurrido algún error, pruebe otra vez en unos minutos.";
    }
}

function cambiar_short_description($short, $id, $rol){
    
    $server="localhost";
    $database = "campusclash";
    $db_pass = 'T7tmn892AB3';
    $db_user = 'root';
    
    mysql_connect($server, $db_user, $db_pass) or die ("error1".mysql_error());
    mysql_select_db($database) or die ("error2".mysql_error());

    if($rol == "vendedor"){
        $resultado = mysql_query("UPDATE `productos` SET `description`= '$short' WHERE `id`= '$id'");
    } else{
        $resultado = mysql_query("UPDATE `premios` SET `description`= '$short' WHERE `id`= '$id'");
    }

    if($resultado){
        return "Descripción cambiada correctamente.";
    } else {
        return "Ha ocurrido algún error, pruebe otra vez en unos minutos.";
    }
}

function cambiar_description($description, $id, $rol){
    
    $server="localhost";
    $database = "campusclash";
    $db_pass = 'T7tmn892AB3';
    $db_user = 'root';
    
    mysql_connect($server, $db_user, $db_pass) or die ("error1".mysql_error());
    mysql_select_db($database) or die ("error2".mysql_error());

    if($rol == "vendedor"){
        $resultado = mysql_query("UPDATE `productos` SET `long_description`= '$description' WHERE `id`= '$id'");
    } else{
        $resultado = mysql_query("UPDATE `premios` SET `long_description`= '$description' WHERE `id`= '$id'");
    }
    if($resultado){
        return "Descripción cambiada correctamente.";
    } else {
        return "Ha ocurrido algún error, pruebe otra vez en unos minutos.";
    }
}

function cambiar_precio($precio, $id, $rol){
    
    $server="localhost";
    $database = "campusclash";
    $db_pass = 'T7tmn892AB3';
    $db_user = 'root';
    
    mysql_connect($server, $db_user, $db_pass) or die ("error1".mysql_error());
    mysql_select_db($database) or die ("error2".mysql_error());

    if($rol == "vendedor"){
        $resultado = mysql_query("UPDATE `productos` SET `precio`= '$precio' WHERE `id`= '$id'");
    } else{
        $resultado = mysql_query("UPDATE `premios` SET `precio`= '$precio' WHERE `id`= '$id'");
    }

    if($resultado){
        return "Precio del producto cambiado correctamente.";
    } else {
        return "Ha ocurrido algún error, pruebe otra vez en unos minutos.";
    }
}

function cambiar_asignatura($asignatura, $id){
    
    $server="localhost";
    $database = "campusclash";
    $db_pass = 'T7tmn892AB3';
    $db_user = 'root';
    
    mysql_connect($server, $db_user, $db_pass) or die ("error1".mysql_error());
    mysql_select_db($database) or die ("error2".mysql_error());

    
    $resultado = mysql_query("UPDATE `premios` SET `course_id`= '$asignatura' WHERE `id`= '$id'");
    

    if($resultado){
        return "Asignatura cambiada correctamente.";
    } else {
        return "Ha ocurrido algún error, pruebe otra vez en unos minutos.";
    }
}

function generar_ranking_ordenado($username){
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
                                    <th colspan='2'>Posición</th>
                                    <th>Nombre y apellidos</th>
                                    <th>Nombre de usuario</th>
                                    <th>Puntos</th>
                                </tr>";

        while($row=mysql_fetch_assoc($query)){
            $dbusername=$row['username'];
            $dbfullname=$row['full_name'];
            $dbpoints=$row['points'];
            $dbid=$row['id'];

            $href1="profile.php";
            $style="color:blue; text-decoration: none;";
            $href2="perfil_alumno.php?id=$dbid";
            $style2="text-decoration: none;";
            $class1 = "img-responsive";
            $src = "img/miniaturas/$dbusername.jpg";

            if(empty($row['imagen'])){
                $src = "img/miniaturas/imagenpordefectocampusclash.jpg";
            }

            if($dbusername==$username){
                $resultado .= " 
                                <tr style='$blue'>                                
                                    <td><b>$n</b></td> 
                                    <td><img class='$class1' src='$src'></td>                                    
                                    <td><a href='$href1' style='$style'><b>$dbfullname</b></a></td>
                                    <td><a href='$href1' style='$style'><b>$dbusername</b></a></td>
                                    <td><b>$dbpoints</b></td>                                    
                                </tr>";
                                
            } else {
                $resultado .= " <tr>
                                    <td><b>$n</b></td> 
                                    <td><img class='$class1' src='$src'></td>   
                                    <td><a href='$href2' style='$style2'>$dbfullname</a></td>
                                    <td><a href='$href2' style='$style2'>$dbusername</a></td>
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

function generar_productos_ordenados(){

    $server="localhost";
    $database = "campusclash";
    $db_pass = 'T7tmn892AB3';
    $db_user = 'root';

   
    mysql_connect($server, $db_user, $db_pass) or die ("error1".mysql_error());
    mysql_select_db($database) or die ("error2".mysql_error());

    // Consulta de búsqueda de la imagen.
    $query =mysql_query("SELECT * FROM `productos`");

    $numrows=mysql_num_rows($query);
    $n = 1;
    $resultado = "No hay productos";
    if($numrows!=0){
        $resultado = "";
        $contador = 1;
        while($row=mysql_fetch_assoc($query)){
            //Base de datos
            $id=$row['id'];
            $nombre=$row['nombre'];
            $description=$row['description'];
            $imagen=$row['imagen'];
            $tipoimagen=$row['tipo_imagen'];
            $criterio=$row['criterio'];
            $preferencia=$row['preferencia'];
            $precio = $row['precio'];
            $reviews = $row['reviews'];
            
            //EStilo
            $class1 = "col-md-4 col-sm-6 portfolio-item";
            $style = "  height: 500px;";
            $style2 = "height: 300px;";
            $href1 = "#portfolioModal$id";
            $class2 = "portfolio-link";
            $modal = "modal";
            $class3 = "portfolio-hover";
            $class4 = "portfolio-hover-content";
            $class5 = "fa fa-plus fa-3x";
            $src1 = "imagen_mostrar.php?id=$id";
            $class6 = "img-responsive";
            $class7 = "portfolio-caption";
            $class8 = "pull-right points-jp";
            $href2 = "#";
            $class9 = "ratings";
            $class10 = "pull-right points-jp";
            $class11 = "glyphicon glyphicon-star";
            $class12 = "glyphicon glyphicon-star-empty";
            $vacio = "";


            // Lo que se va a mostrar

            $resultado .= "     <div class='$class1' style='$style'>
                                    <a href='$href1' class='$class2' data-toggle='$modal'>
                                        <div class='$class3'>
                                            <div class='$class4'>
                                                <i class='$class5'></i>
                                            </div>
                                        </div>
                                        <div style='$style2'> 
                                            <img src='$src1' class='$class6' alt='$vacio'>
                                        </div>
                                    </a>
                                    <div class='$class7' >
                                        <h4 class='$class8'>$precio monedas</h4>
                                        <h4 ><a href='$href2'>$nombre</a></h4>
                                        <p>$description</p>
                                    </div>
                                    <div class='$class9'>
                                        <p class='$class10'>46 reviews</p>
                                        <p>
                                            <span class='$class11'></span>
                                            <span class='$class11'></span>
                                            <span class='$class11'></span>
                                            <span class='$class11'></span>
                                            <span class='$class12'></span>
                                        </p>
                                    </div>
                                </div>                                
                                ";
        } 
    }
    return $resultado;
}

function generar_productos_de_usuario($username){

    $server="localhost";
    $database = "campusclash";
    $db_pass = 'T7tmn892AB3';
    $db_user = 'root';

   
    mysql_connect($server, $db_user, $db_pass) or die ("error1".mysql_error());
    mysql_select_db($database) or die ("error2".mysql_error());

    // Consulta de búsqueda de la imagen.
    $query =mysql_query("SELECT * FROM `productos` WHERE `vendedor`='$username'");

    $numrows=mysql_num_rows($query);
    $resultado = "No hay productos";
    if($numrows!=0){
        $resultado = "";
        $contador = 1;
        while($row=mysql_fetch_assoc($query)){
            //Base de datos
            $id=$row['id'];
            $nombre=$row['nombre'];
            $description=$row['description'];
            $imagen=$row['imagen'];
            $tipoimagen=$row['tipo_imagen'];
            $criterio=$row['criterio'];
            $preferencia=$row['preferencia'];
            $precio = $row['precio'];
            $reviews = $row['reviews'];
            
            //EStilo
            $class1 = "col-md-4 col-sm-6 portfolio-item";
            $style = "height: 500px; color:white;";
            $style2 = "height: 300px;";
            $href1 = "#portfolioModal$id";
            $class2 = "portfolio-link";
            $modal = "modal";
            $class3 = "portfolio-hover";
            $class4 = "portfolio-hover-content";
            $class5 = "fa fa-plus fa-3x";
            $src1 = "imagen_mostrar.php?id=$id";
            $class6 = "img-responsive";
            $class7 = "portfolio-caption";
            $class8 = "pull-right points-jp";
            $href2 = "#";
            $class9 = "ratings";
            $class10 = "pull-right points-jp";
            $class11 = "glyphicon glyphicon-star";
            $class12 = "glyphicon glyphicon-star-empty";
            $vacio = "";
            $href3 = "modificar_producto.php?id=$id";
            $style3 = "margin:0px 100px; color:blue";


            // Lo que se va a mostrar

            $resultado .= "     <div class='$class1' style='$style'>
                                    <div style='$style2'> 
                                        <img src='$src1' class='$class6' alt='$vacio'>
                                    </div>
                                    
                                    <div class='$class7' >
                                        <h4 class='$class8'>$precio monedas</h4>
                                        <h4 >$nombre</h4>
                                        <p>$description</p>
                                    </div>
                                    <div class='$class9'>
                                        <p class='$class10'>46 reviews</p>
                                        <p>
                                            <span class='$class11'></span>
                                            <span class='$class11'></span>
                                            <span class='$class11'></span>
                                            <span class='$class11'></span>
                                            <span class='$class12'></span>
                                        </p>
                                    </div>
                                    <a href='$href3'>
                                        <button style='$style3'><b>Modificar Producto</b></button>
                                    </a>
                                </div>                                
                                ";
        } 
    }
    return $resultado;
}

function generar_lista_de_asignaturas($moodle_id){

    $server="localhost";
    $database = "campusclash";
    $db_pass = 'T7tmn892AB3';
    $db_user = 'root';

   
    mysql_connect($server, $db_user, $db_pass) or die ("error1".mysql_error());
    mysql_select_db($database) or die ("error2".mysql_error());

    // Consulta de búsqueda de la imagen.
    $query =mysql_query("SELECT * FROM `asignaturas` WHERE `profesor_id`='$moodle_id'");

    $numrows=mysql_num_rows($query);
    $resultado = "No hay asignaturas";
    if($numrows!=0){
        $n=1;
        $style1 = "color:white; width:900px; margin:30px 0px";

        $resultado = "
            <table style='$style1'>
                <tr>
                    <td>   </td>
                    <td><b>Universidad</b></td>
                    <td><b>Grado</b></td>
                    <td><b>Asignatura</b></td>
                    <td>    </td>
                </tr>
        ";
        while($row=mysql_fetch_assoc($query)){
            $id = $row['course_id'];
            $moodleid = $row['profesor_id'];
            $universidad = $row['universidad'];
            $grado = $row['grado'];
            $asignatura = $row['nombre_asignatura']; 

            //Estilo 
            $href1 = "mostrar_premios.php?id=$id";
            $href2 = "eliminar_asignatura.php?id=$id";
            $style2 = "font-size: 16px;";
            $style3 = "margin:0px 0px; color:blue;";


            $resultado .= "
                    <tr style='$style2'>
                        <td>$n</td>
                        <td>$universidad</td>
                        <td>$grado</td>
                        <td>$asignatura</td>
                        <td>
                            <a href='$href1'>
                                <button style='$style3'><b>Ver premios</b></button>
                            </a>
                        </td>
                        <td>
                            <a href='$href2'>
                                <button style='$style3'><b>Eliminar</b></button>
                            </a>
                        </td>
                    </tr>
            ";
            $n++;
        }
        $resultado .= "</table>"; 
    }
    return $resultado;
}

function opciones_de_asignaturas($moodle_id){
    $server="localhost";
    $database = "campusclash";
    $db_pass = 'T7tmn892AB3';
    $db_user = 'root';

   
    mysql_connect($server, $db_user, $db_pass) or die ("error1".mysql_error());
    mysql_select_db($database) or die ("error2".mysql_error());

    // Consulta de búsqueda de la imagen.
    $query =mysql_query("SELECT * FROM `asignaturas` WHERE `profesor_id`='$moodle_id'");

    $numrows=mysql_num_rows($query);
    $resultado = "";
    if($numrows!=0){
        $name = "asignatura";
        $class = "form-control";
        $id = "asignatura";
        $resultado = "
            <select name='$name' size='1' class='$class' id='$id' required>
        ";
        while($row=mysql_fetch_assoc($query)){
            $asignatura = $row['nombre_asignatura']; 
            $courseid = $row['course_id'];

            $resultado .= "
                    <option value='$courseid'>$asignatura</option>
            ";
            
        } 
        $resultado .= "</select>";
    }
    return $resultado;
}


function generar_pags_individuales(){

    $server="localhost";
    $database = "campusclash";
    $db_pass = 'T7tmn892AB3';
    $db_user = 'root';

   
    mysql_connect($server, $db_user, $db_pass) or die ("error1".mysql_error());
    mysql_select_db($database) or die ("error2".mysql_error());

    // Consulta de búsqueda de la imagen.
    $query =mysql_query("SELECT * FROM `productos`");

    $numrows=mysql_num_rows($query);
    $n = 1;
    $resultado = "No hay productos";
    if($numrows!=0){
        $resultado = "";
        $contador = 1;
        while($row=mysql_fetch_assoc($query)){
            //Base de datos
            $id=$row['id'];
            $nombre=$row['nombre'];
            $description=$row['long_description'];
            $shortdescription=$row['description'];
            $imagen=$row['imagen'];
            $tipoimagen=$row['tipo_imagen'];
            $criterio=$row['criterio'];
            $preferencia=$row['preferencia'];
            $precio = $row['precio'];
            $reviews = $row['reviews'];
            
            //EStilo
            $class1="portfolio-modal modal fade";
            $id1 = "portfolioModal$id";
            $tabindex = "-1";
            $role = "dialog";
            $true = "true";
            $class2 = "modal-content";
            $class3 = "close-modal";
            $modal = "modal";
            $class4 = "lr";
            $class5 = "rl";
            $class6 = "container";
            $class7 = "row";
            $class8 = "col-lg-8 col-lg-offset-2";
            $class9 = "modal-body";
            $class10 = "item-intro text-muted";
            $class11 = "img-responsive img-centered";
            $src1 = "imagen_grande_mostrar.php?id=$id";
            $vacio = "";
            $type = "button";
            $class12 = "btn btn-primary";
            $class13 = "fa fa-times";

            // Lo que se va a mostrar
            $resultado .= " <div class='$class1' id='$id1' tabindex='$tabindex' role='$role' aria-hidden='$true'>
                                <div class='$class2'>
                                    <div class='$class3' data-dismiss='$modal'>
                                        <div class='$class4'>
                                            <div class='$class5'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='$class6'>
                                        <div class='$class7'>
                                            <div class='$class8'>
                                                <div class='$class9'>
                                                <!-- Project Details Go Here -->
                                                    <h2>$nombre</h2>
                                                    <p class='$class10'>$shortdescription</p>
                                                    <img class='$class11' src='$src1' alt='$vacio'>
                                                    <p>$description</p>
                                                    <button type='$type' class='$class12' data-dismiss='$modal'><i class='$class13'></i> Close Product</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                                    
                                ";
        } 
    }
    return $resultado;
}

function generar_premios_de_asignatura($id,$username){

    $server="localhost";
    $database = "campusclash";
    $db_pass = 'T7tmn892AB3';
    $db_user = 'root';

   
    mysql_connect($server, $db_user, $db_pass) or die ("error1".mysql_error());
    mysql_select_db($database) or die ("error2".mysql_error());

    // Consulta de búsqueda de la imagen.
    $query = mysql_query("SELECT * FROM `premios` WHERE `course_id`='$id' AND `profesor`='$username'");

    $numrows=mysql_num_rows($query) or die(mysql_error());
    $resultado = "No hay premios";
    if($numrows!=0){
        $resultado = "";
        $contador = 1;
        while($row=mysql_fetch_assoc($query)){
            //Base de datos
            $id=$row['id'];
            $nombre=$row['nombre'];
            $description=$row['description'];
            $imagen=$row['imagen'];
            $tipoimagen=$row['tipo_imagen'];
            $precio = $row['precio'];
            
            //EStilo
            $class1 = "col-md-4 col-sm-6 portfolio-item";
            $style = "height: 500px; color:white;";
            $style2 = "height: 300px;";
            $href1 = "#portfolioModal$id";
            $class2 = "portfolio-link";
            $modal = "modal";
            $class3 = "portfolio-hover";
            $class4 = "portfolio-hover-content";
            $class5 = "fa fa-plus fa-3x";
            $src1 = "imagen_mostrar.php?id=$id";
            $class6 = "img-responsive";
            $class7 = "portfolio-caption";
            $class8 = "pull-right points-jp";
            $href2 = "#";
            $class9 = "ratings";
            $class10 = "pull-right points-jp";
            $class11 = "glyphicon glyphicon-star";
            $class12 = "glyphicon glyphicon-star-empty";
            $vacio = "";
            $href3 = "modificar_premio.php?id=$id";
            $style3 = "margin:0px 100px; color:blue";


            // Lo que se va a mostrar

            $resultado .= "     <div class='$class1' style='$style'>
                                    <div style='$style2'> 
                                        <img src='$src1' class='$class6' alt='$vacio'>
                                    </div>
                                    
                                    <div class='$class7' >
                                        <h4 class='$class8'>$precio monedas</h4>
                                        <h4 >$nombre</h4>
                                        <p>$description</p>
                                    </div>
                                    <div class='$class9'>
                                        <p class='$class10'>46 reviews</p>
                                        <p>
                                            <span class='$class11'></span>
                                            <span class='$class11'></span>
                                            <span class='$class11'></span>
                                            <span class='$class11'></span>
                                            <span class='$class12'></span>
                                        </p>
                                    </div>
                                    <a href='$href3'>
                                        <button style='$style3'><b>Modificar Producto</b></button>
                                    </a>
                                </div>                                
                                ";
        } 
    }
    return $resultado;
}

?>
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
            $dbemail= $row['email'];
            $dbfullname= $row['full_name'];
            $dbpoints= $row['points'];
            $dbposition= $row['position'];
            $dbmonedas = $row['monedas'];
            $dbnivel = $row['nivel'];
            $dbexp = $row['experiencia'];
            $dbnext = $row['next_lvl'];
        }    

        return array(
                "username" => $dbusername,
                "email" => $dbemail,
                "fullname" => $dbfullname,
                "points" => $dbpoints,
                "position" => $dbposition,
                "monedas" => $dbmonedas,
                "nivel" => $dbnivel,
                "experiencia" => $dbexp,
                "next_lvl" => $dbnext
               );
    } else {
        return array(
                "username" => "NO encotrado",
                "email" => "NO encotrado",
                "fullname" => "NO encotrado",
                "points" => "NO encotrado",
                "position" => "NO encotrado",
                "monedas" => "NO encotrado",
                "nivel" => "NO encotrado",
                "experiencia" => "NO encotrado",
                "next_lvl" => "NO encotrado"
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
                                        <img src='$src1' class='$class6' alt=$vacio>
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
            $imagen=$row['imagen'];
            $tipoimagen=$row['tipo_imagen'];
            $criterio=$row['criterio'];
            $preferencia=$row['preferencia'];
            $precio = $row['precio'];
            $reviews = $row['reviews'];
            
            //EStilo


            // Lo que se va a mostrar

            /*$resultado .= " <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-content">
                                    <div class="close-modal" data-dismiss="modal">
                                        <div class="lr">
                                            <div class="rl">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-8 col-lg-offset-2">
                                                <div class="modal-body">
                                                <!-- Project Details Go Here -->
                                                    <h2>Project Name</h2>
                                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                                    <img class="img-responsive img-centered" src="img/portfolio/roundicons-free.png" alt="">
                                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                                    
                                ";*/
        } 
    }
    return $resultado;
}

?>
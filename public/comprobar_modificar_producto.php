<?php
	$server="localhost";
    $database = "campusclash";
    $db_pass = 'T7tmn892AB3';
    $db_user = 'root';
   
    mysql_connect($server, $db_user, $db_pass) or die ("error1".mysql_error());
    mysql_select_db($database) or die ("error2".mysql_error());

    if(isset($_GET['id'])){
        if ($_GET['id'] > 0)
        {
            $_SESSION['session_producto_id'] = $_GET['id'];
            $consulta = "SELECT * FROM `productos` WHERE `id`={$_GET['id']}";
            $resultado = @mysql_query($consulta) or die(mysql_error());
            $row = mysql_fetch_assoc($resultado);
            $nombre=$row['nombre'];
            $description=$row['description'];
            $imagen=$row['imagen'];
            $tipoimagen=$row['tipo_imagen'];
            $criterio=$row['criterio'];
            $preferencia=$row['preferencia'];
            $precio = $row['precio'];
            $reviews = $row['reviews'];       
        }
    }

    $id = $_SESSION['session_producto_id'];
    

    $row = obtener_datos_from_db($_SESSION['session_username']);
    $row2 = obtener_datos_producto_from_db($id);

    if(!es_producto_de_usuario($id,$_SESSION['session_username'])){
        header("location:productos.php");
    }

    $username = $_SESSION["session_username"];
    $message1 = "";
    $message2 = "";
    $message3 = "";
    $message4 = ""; 
    $message5 = "";
    $message6 = "";
    
    if($_SESSION['session_image_loaded_try']){
        $message1 = $_SESSION['session_image_loaded'];
        $_SESSION['session_image_loaded_try']=false;
    }

    if(isset($_POST["cambiar"])){ 
        if(!empty($_POST["negocio"])) {
            $message2 = cambiar_negocio ($_POST["negocio"], $id);
        } else {
            if(!empty($_POST["name"])) {
                $message3 = cambiar_nombre_producto ($_POST["name"], $id);
            } else {
                if(!empty($_POST["short_description"])) {
                    $message4 = cambiar_short_description ($_POST["short_description"], $id);
                } else {
                    if(!empty($_POST["description"])){
                        $message5 = cambiar_description ($_POST["description"], $id);
                    } else {
                        if(!empty($_POST["precio"])){
                            $message6 = cambiar_precio ($_POST["precio"], $id);
                        }
                    }
                }
            }       
        }          
    }
?>
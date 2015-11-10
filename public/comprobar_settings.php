<?php
    if($_SESSION['session_rol']=="alumno"){
        $row = obtener_datos_from_usertbl($_SESSION['session_username']);
    } else if($_SESSION['session_rol']=="profesor"){
        $row = obtener_datos_from_profesores($_SESSION['session_username']);
    } else {
        $row = obtener_datos_from_vendedores($_SESSION['session_username']);
    }
    $username = $_SESSION["session_username"];
    $message1 = "";
    $message2 = "";
    $message3 = "";
    $message4 = ""; 
    $message5 = "";
    
    if($_SESSION['session_image_loaded_try']){
        $message1 = $_SESSION['session_image_loaded'];
        $_SESSION['session_image_loaded_try']=false;
    }

    if(isset($_POST["cambiar"])){ 
        if(!empty($_POST["fullname"])) {
            $message2 = cambiar_fullname ($row['fullname'], $_POST["fullname"], $username, $_SESSION['session_rol']);
        } else {
            if(!empty($_POST["email"])) {
                $message3 = cambiar_email ($row['email'], $_POST["email"], $_SESSION['session_rol']);
            } else {
                if(!empty($_POST["username"])) {
                    $message4 = cambiar_username ($row['username'], $_POST["username"], $_SESSION['session_rol']);
                } else {
                    if(!empty($_POST["password"]) && !empty($_POST["newpassword"])){
                        $message5 = cambiar_password ($_POST["password"], $_POST["newpassword"], $username, $_SESSION['session_rol']);
                    }
                }
            }       
        }          
    }

?>
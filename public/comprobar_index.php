<?php
 
if(isset($_SESSION["session_username"])){
    //echo "<br><br><h1> Session is set </h1>"; // for testing purposes
    header("Location: welcome.php");
} 

$message2 = "";
$message = "";

if(isset($_POST["registro"])){ 
    if(!empty($_POST['password']) && !empty($_POST['password2']) &&  !empty($_POST['email']) && !empty($_POST['username'])  && !empty($_POST['fullname'])) {
        require_once 'connection.php';

        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $timecreated = time();

        $nuevo_usuario = mysql_query("SELECT `username` FROM `usertbl` WHERE `username`='$username'");
        $nuevo_profesor = mysql_query("SELECT `username` FROM `profesores` WHERE `username`='$username'");
        $nuevo_vendedor = mysql_query("SELECT `username` FROM `vendedores` WHERE `username`='$username'");
    
        if(mysql_num_rows($nuevo_usuario)>0 || mysql_num_rows($nuevo_profesor)>0 || mysql_num_rows($nuevo_vendedor)>0){
            
            $message2 = "Nombre de usuario ya existente en la Base de Datos";
        
        } else {
            // ------------ Si no esta registrado el usuario continua el script
            // ==============================================
            // Comprobamos si el email esta registrado
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){

                $nuevo_email=mysql_query("SELECT `email` FROM `usertbl` WHERE `email`='$email'");
                $nuevo_email2=mysql_query("SELECT `email` FROM `profesores` WHERE `email`='$email'");
                $nuevo_email3=mysql_query("SELECT `email` FROM `vendedores` WHERE `email`='$email'");

                if(mysql_num_rows($nuevo_email)>0 || mysql_num_rows($nuevo_email2)>0 || mysql_num_rows($nuevo_email3)>0) {
                   
                   $message2 = "Email ya existente en la Base de Datos";
                
                } else { // ------------ Si no esta registrado el e-mail continua el script
                    if($_POST['password']!=$_POST['password2']){

                        $message2 = "Las contraseñas no coinciden";

                    } else {

                        mysql_query ("INSERT INTO `vendedores`(`full_name`, `email`, `username`, `password`, `timecreated`) 
                            VALUES ('".$fullname."', '".$email."', '".$username."', '".$password."', '".$timecreated."')");
                        
                        $_SESSION['session_username']=$username;                   
                        $_SESSION['session_image_loaded_try'] = false;
                        $_SESSION['session_image_loaded'] = "";
                        $_SESSION['session_upload_product_try'] = false;
                        $_SESSION['session_upload_message'] = "";
                        $_SESSION['session_compra_error_message'] = "";
                        $_SESSION['session_rol'] = "vendedor";
 
                        /* Redirect browser */
                        header("Location: welcome.php");
                    }
                    
                }
            } else {
                $message2 = "No el formato del correo no es correcto";
            }
        } 
    } else {
        $message2 = "Todos los campos son requeridos!";
    }
} else {
    $message2 = "";
}


if(isset($_POST["login"])){ 
    if(!empty($_POST['password']) && !empty($_POST['email'])) {
        $password=$_POST['password'];
        $email=$_POST['email'];

        if(filter_var($email, FILTER_VALIDATE_EMAIL)){

            require_once 'connection.php';
 
            $query1 =mysql_query("SELECT * FROM usertbl WHERE email='".$email."' AND password='".$password."'");
 
            $numrows1=mysql_num_rows($query1);

            $query2 =mysql_query("SELECT * FROM profesores WHERE email='".$email."' AND password='".$password."'");
 
            $numrows2=mysql_num_rows($query2);

            $query3 =mysql_query("SELECT * FROM vendedores WHERE email='".$email."' AND password='".$password."'");
 
            $numrows3=mysql_num_rows($query3);

            if($numrows1!=0){
                while($row=mysql_fetch_assoc($query1)){
                    $dbusername=$row['username'];
                    $dbemail=$row['email'];
                    $dbpassword=$row['password'];
                    $dbfullname=$row['full_name'];
                    $dbpoints=$row['points'];
                }
 
                if($password == $dbpassword && $email == $dbemail){ 
                    $_SESSION['session_username']=$dbusername;                   
                    $_SESSION['session_image_loaded_try'] = false;
                    $_SESSION['session_image_loaded'] = "";
                    $_SESSION['session_upload_product_try'] = false;
                    $_SESSION['session_upload_message'] = "";
                    $_SESSION['session_compra_error_message'] = "";
                    $_SESSION['session_rol'] = "alumno";                    
 
                    /* Redirect browser */
                    header("Location: welcome.php");
                }
                $message = "A ocurrido algún error en la base de datos";

            } else if($numrows2!=0) {
                while($row=mysql_fetch_assoc($query2)){
                    $dbusername=$row['username'];
                    $dbemail=$row['email'];
                    $dbpassword=$row['password'];
                    $dbfullname=$row['full_name'];
                }
 
                if($password == $dbpassword && $email == $dbemail){ 
                    $_SESSION['session_username']=$dbusername;                   
                    $_SESSION['session_image_loaded_try'] = false;
                    $_SESSION['session_image_loaded'] = "";
                    $_SESSION['session_upload_product_try'] = false;
                    $_SESSION['session_upload_message'] = "";
                    $_SESSION['session_compra_error_message'] = "";
                    $_SESSION['session_rol'] = "profesor";
 
                    /* Redirect browser */
                    header("Location: welcome.php");
                }          
                $message = "A ocurrido algún error en la base de datos"; 

            } else if($numrows3!=0) {
                while($row=mysql_fetch_assoc($query3)){
                    $dbusername=$row['username'];
                    $dbemail=$row['email'];
                    $dbpassword=$row['password'];
                    $dbfullname=$row['full_name'];
                }
 
                if($password == $dbpassword && $email == $dbemail){ 
                    $_SESSION['session_username']=$dbusername;                   
                    $_SESSION['session_image_loaded_try'] = false;
                    $_SESSION['session_image_loaded'] = "";
                    $_SESSION['session_upload_product_try'] = false;
                    $_SESSION['session_upload_message'] = "";
                    $_SESSION['session_compra_error_message'] = "";
                    $_SESSION['session_rol'] = "vendedor";
 
                    /* Redirect browser */
                    header("Location: welcome.php");
                }          
                $message = "A ocurrido algún error en la base de datos";      
            
            } else {
                $message = "Nombre de usuario ó contraseña invalida!";
            }            
        } else {
            $message = "El primer campo debe ser uny correo";
        }
    } else {
        $message = "Todos los campos son requeridos!";
    }
} else {
    $message = "";
}
?>
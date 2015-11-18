<?php
 
if(isset($_SESSION["session_username"])){
    //echo "<br><br><h1> Session is set </h1>"; // for testing purposes
    header("Location: welcome.php");
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
                    $_SESSION['session_rol'] = "profesor";
 
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
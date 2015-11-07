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

            $server="localhost";
            $database = "campusclash";
            $db_pass = 'T7tmn892AB3';
            $db_user = 'root';
    
            mysql_connect($server, $db_user, $db_pass) or die ("error1".mysql_error());
            mysql_select_db($database) or die ("error2".mysql_error());
 
            $query =mysql_query("SELECT * FROM usertbl WHERE email='".$email."' AND password='".$password."'");
 
            $numrows=mysql_num_rows($query);

            if($numrows!=0){
                while($row=mysql_fetch_assoc($query)){
                    $dbusername=$row['username'];
                    $dbpassword=$row['password'];
                    $dbemail=$row['email'];
                    $dbfullname=$row['full_name'];
                    $dbpoints=$row['points'];
                }
 
                if($password == $dbpassword && $email == $dbemail){ 
                    $_SESSION['session_username']=$dbusername;                   
                    $_SESSION['session_image_loaded_try'] = false;
                    $_SESSION['session_image_loaded'] = "";
                    $_SESSION['session_upload_product_try'] = false;
                    $_SESSION['session_upload_message'] = "";
                    
 
                    /* Redirect browser */
                    header("Location: welcome.php");
                }

            } else { 
                $message = "Nombre de usuario ó contraseña invalida!";
            }            
        }
    } else {
        $message = "Todos los campos son requeridos!";
    }
} else {
    $message = "";
}
?>
<?php     
       session_start();
       if(!isset($_SESSION["session_username"]))
       {
           header("Location: index.php");       
       }
       else
       { 
         $username = $_SESSION["session_username"];

         require_once 'connection.php';
         
        if($_SESSION['session_rol'] == "alumno"){
            $query = mysql_query("DELETE FROM `usertbl` WHERE `username`='$username'");
        } else if($_SESSION['session_rol'] == "profesor"){
            $query = mysql_query("DELETE FROM `profesores` WHERE `username`='$username'");
            $query = mysql_query("DELETE FROM `asignaturas` WHERE `username`='$username'");
            $query = mysql_query("DELETE FROM `premios` WHERE `profesor`='$username'");
        } else {
            $query = mysql_query("DELETE FROM `vendedores` WHERE `username`='$username'");
            $query = mysql_query("DELETE FROM `productos` WHERE `vendedor`='$username'");
        }
         session_destroy();
         header("Location: index.php");          
       }       
    ?>
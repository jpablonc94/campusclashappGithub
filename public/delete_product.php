<?php     
       session_start();
       if(!isset($_SESSION["session_username"]))
       {
           header("Location: index.php");       
       }
       else
       {          
         require_once 'connection.php';

         if($_SESSION['session_rol']=="profesor"){
           $id = $_SESSION['session_premio_id'];
           $query = mysql_query("DELETE FROM `premios` WHERE `id`='$id'");
           header("Location: mis_asignaturas.php"); 
         } else if($_SESSION['session_rol']=="vendedor"){
           $id = $_SESSION['session_producto_id'];
           $query = mysql_query("DELETE FROM `productos` WHERE `id`='$id'");
           header("Location: productos.php"); 
         }
                  
       }       
    ?>
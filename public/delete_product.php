<?php     
       session_start();
       if(!isset($_SESSION["session_username"]))
       {
           header("Location: index.php");       
       }
       else
       {          
         $server="localhost";
         $database = "campusclash";
         $db_pass = 'T7tmn892AB3';
         $db_user = 'root';
    
         mysql_connect($server, $db_user, $db_pass) or die ("error1".mysql_error());
         mysql_select_db($database) or die ("error2".mysql_error());

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
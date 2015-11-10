<?php     
       session_start();
       if(!isset($_SESSION["session_username"]))
       {
           header("Location: index.php");       
       }
       else
       { 
         $id = $_SESSION['session_asignatura_id'];
         $server="localhost";
         $database = "campusclash";
         $db_pass = 'T7tmn892AB3';
         $db_user = 'root';
    
         mysql_connect($server, $db_user, $db_pass) or die ("error1".mysql_error());
         mysql_select_db($database) or die ("error2".mysql_error());

         $query = mysql_query("DELETE FROM `asignaturas` WHERE `course_id`='$id'");
         $query = mysql_query("DELETE FROM `premios` WHERE `course_id`='$id'");

         header("Location: mis_asignaturas.php");          
       }       
    ?>
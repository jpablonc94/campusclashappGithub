<?php     
       session_start();
       if(!isset($_SESSION["session_username"]))
       {
           header("Location: index.php");       
       }
       else
       { 
         $id = $_SESSION['session_asignatura_id'];

         require_once 'connection.php';

         $query = mysql_query("DELETE FROM `asignaturas` WHERE `course_id`='$id'");
         $query = mysql_query("DELETE FROM `premios` WHERE `course_id`='$id'");

         header("Location: mis_asignaturas.php");          
       }       
    ?>
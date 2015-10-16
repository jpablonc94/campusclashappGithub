    <?php     
       session_start();
       if(!isset($_SESSION["session_username"]))
       {
           header("Location: index.php");       
       }
       else
       { 
         session_destroy();
         header("Location: index.php");          
       }       
    ?>
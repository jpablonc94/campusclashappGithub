    <?php     
       session_start();
       if(!isset($_SESSION["session_username"]))
       {
           header("Location: login.php");       
       }
       else
       { 
         session_destroy();
         header("Location: login.php");          
       }       
    ?>
<?php
session_start();
?>
<?php
if(!isset($_SESSION["session_username"])) {
 
    header("location:index.php");

} else {
    session_destroy();
    header("location:index.php");
}
?>
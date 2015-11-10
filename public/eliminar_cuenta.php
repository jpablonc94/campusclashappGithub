<?php
session_start();
require_once 'lib.php';
?>
<?php
if(!isset($_SESSION["session_username"])) { 
    header("location:index.php");
} else {   
    if($_SESSION['session_rol']=="alumno"){
        $row = obtener_datos_from_usertbl($_SESSION['session_username']);
    } else if($_SESSION['session_rol']=="profesor"){
        $row = obtener_datos_from_profesores($_SESSION['session_username']);
    } else {
        $row = obtener_datos_from_vendedores($_SESSION['session_username']);
    }

?>
<!DOCTYPE html>
<html lang="es">

<?php include 'head2.php' ?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include 'navbar_usuario.php'; ?>
        <br>
        <div id="page-wrapper" style="margin: 0px 0px 20px 0px; border: 10px #A5A5A5; border-style: double none double double;">

            <div class="container-fluid">
                <h1>¿Estás seguro de que quiere borrar su cuenta de usuario? </h1>
                <h2>Perderá todos sus puntos y regalos....</h2> 
            </div>

            <table style="width:100%; margin:0px;">
                <tr>
                    <td>
                    <a href="delete.php">
                        <button class="btn btn-xl" style="font-size:40px;">Si <i class="fa fa-fw fa-2x fa-meh-o"></i></button>
                    </a>
                    </td>
                    <td>
                    <a href="settings.php">
                        <button class="btn btn-xl" style="font-size:40px;">No <i class="fa fa-fw fa-2x fa-smile-o"></i></button>
                    </a>
                    </td>
                </tr>   
            </table>                
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
<?php
}
?>

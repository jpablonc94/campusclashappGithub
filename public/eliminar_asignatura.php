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
    
    if(isset($_GET['id'])){
        if ($_GET['id'] > 0){
            $_SESSION['session_asignatura_id'] = $_GET['id'];
        }
    }
    $id = $_SESSION['session_asignatura_id'];

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
                <h1>¿Estás seguro de que quiere borrar esta asignatura? </h1>
                <h3>Se borrarán todos los premios que haya creado en ella </h3>
            </div>

            <table style="width:100%; margin:0px 100px;">
                <tr>
                    <td>
                    <a href="delete_asignatura.php">
                        <button class="btn btn-xl" style="font-size:40px;">Si</button>
                    </a>
                    </td>
                    <td>
                    <a href="mis_asignaturas.php?id=$id">
                        <button class="btn btn-xl" style="font-size:40px;">No </button>
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

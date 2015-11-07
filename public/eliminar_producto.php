<?php
session_start();
require_once 'lib.php';
?>
<?php
if(!isset($_SESSION["session_username"])) { 
    header("location:index.php");
} else {   
    $row = obtener_datos_from_db($_SESSION['session_username']);
    $id = $_SESSION['session_producto_id'];

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
                <h1>¿Estás seguro de que quiere borrar este producto? </h1>
            </div>

            <table style="width:100%; margin:0px 100px;">
                <tr>
                    <td>
                    <a href="delete_product.php">
                        <button class="btn btn-xl" style="font-size:40px;">Si</button>
                    </a>
                    </td>
                    <td>
                    <a href="modificar_producto.php?id=$id">
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

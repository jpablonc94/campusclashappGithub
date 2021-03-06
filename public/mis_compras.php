<?php
session_start();
require_once 'lib.php';
?>
<?php
if(!isset($_SESSION["session_username"])) { 
    header("location:index.php");
} else {   
    if($_SESSION['session_rol']!="alumno"){
        header("location:welcome.php");
    }
    if($_SESSION['session_rol']=="alumno"){
        $row = obtener_datos_from_usertbl($_SESSION['session_username']);
    } else if($_SESSION['session_rol']=="profesor"){
        $row = obtener_datos_from_profesores($_SESSION['session_username']);
    } else {
        $row = obtener_datos_from_vendedores($_SESSION['session_username']);
    } 

    if($_SESSION['session_compra_error_message']!="") {
        $message = $_SESSION['session_compra_error_message'];
        $_SESSION['session_compra_error_message'] = "";
    } else {
        $message = $_SESSION['session_compra_error_message'];
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
        <div id="page-wrapper" style="margin: 0px 0px 0px 0px; border: 10px #A5A5A5; border-style: double none double double;">

        
            <div class="container-fluid">    
                <div class="row">
                    <div class="col-lg-12">
                        <h1>
                            Mis asignaturas
                        </h1> 

                    </div>
                </div>        
                <div class="row">
                    <?php
                        echo $message; 
                        $producto = generar_compras_de_usuario($row['username']);
                        echo $producto;
                    ?>
                </div>
            </div>
        </div>
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
<?php
session_start();
require_once 'lib.php';
?>
<?php
if(!isset($_SESSION["session_username"])) { 
    header("location:index.php");
} else {   
    $username = $_SESSION["session_username"];
    if($_SESSION['session_rol']!="profesor"){
            header("location:welcome.php");
    }

    if(isset($_GET['id'])){
        if ($_GET['id'] > 0)
        {
            $_SESSION['session_asignatura_id'] = $_GET['id'];      
        }
    }

    $id = $_SESSION['session_asignatura_id'];

    $row = obtener_datos_from_profesores($username);

    $row2 = obtener_datos_asignatura_from_db($id);

?>
<!DOCTYPE html>
<html lang="es">

<?php include 'head2.php' ?>


<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include 'navbar_usuario.php'; ?>
        <br>
        
            <div class="container">            
                <div class="row">
                    <div class="col-lg-12"> 
                        <h2 style="text-align:center; color:gray;">
                            ----------
                            <div style="color:white;">
                            <?php
                                echo $row2["nombre_asignatura"];
                            ?>
                            </div>
                            ----------
                        </h2>
                        
                    </div>
                </div>
                <div class="row">
                    <?php
                        $producto = generar_premios_de_asignatura($id,$username);
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


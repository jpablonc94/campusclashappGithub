<?php
session_start();
require_once 'lib.php';
?>
<?php
if(!isset($_SESSION["session_username"])) { 
    header("location:index.php");
} else {   
    if($_SESSION['session_rol']!="profesor"){
        header("location:welcome.php");
    }
    
    $row = obtener_datos_from_profesores($_SESSION['session_username']);    
?>
<!DOCTYPE html>
<html lang="es">

<?php include 'head2.php' ?>


<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include 'navbar_usuario.php'; ?>
        <br>
        <section id="portfolio" class="bg-light-gray">
            <div class="container">    
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header" style="color:white; margin:20px 0px;">
                            Mis asignaturas
                        </h1> 

                    </div>
                </div>        
                <div class="row">
                    <?php
                        $asignaturas = generar_lista_de_asignaturas($row['moodleid']);
                        echo $asignaturas;
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

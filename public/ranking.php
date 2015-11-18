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

<?php include 'head1.php'; ?>

<body id="page-top">
    <!-- Navigation -->
    <?php include 'navbar_normal.php'; ?>
    
    <header class="intro-header" style="background-image: url('img/fondo-ranking.jpg'); margin: 0px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="page-heading">
                        <h1>Clasificación</h1>
                        <hr class="small">
                        <span class="subheading">Compite para ser el mejor!</span>
                        <a href="#ranking" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div style="border: 80px solid black; ">  
    <section id="ranking" class="bg-light-gray">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading" style="margin:0px;">Ranking de CampusClash</h2>
            </div>
        </div>
        <div class="row">
            <h1 style="text-align:center;">Ranking Global</h1>
            <?php 
                $ranking = generar_ranking_ordenado($_SESSION['session_username']);
                echo $ranking;
            ?>
        </div>
        <div class="row" style="margin:80px 0px 0px 40px;">
                <div class="col-lg-12">
                    <p>Copyright &copy; CampusCLASH</p>
                </div>
        </div>
    </section>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>

    <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/agency.js"></script>

</body>

</html>
<?php
}
?>
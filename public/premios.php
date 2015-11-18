<?php
session_start();
require_once 'lib.php';
?>
<?php
if(!isset($_SESSION["session_username"])) { 
    header("location:index.php");
} else {   
    $username = $_SESSION["session_username"];

    if(isset($_GET['id'])){
        if ($_GET['id'] > 0)
        {
            $_SESSION['session_asignatura_id'] = $_GET['id'];      
        }
    }

    $id = $_SESSION['session_asignatura_id'];

    $row = obtener_datos_from_usertbl($username);

    $row2 = obtener_datos_asignatura_from_db($id);

?>
<!DOCTYPE html>
<html lang="es">

<?php include 'head1.php'; ?>


<body id="page-top" class="index">

    <?php include 'navbar_normal.php'; ?>

    <!-- Header -->
    <header class="intro-header" style="background-image: url('img/contact-bg.jpg'); margin: 0px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="page-heading">
                        <hr class="small">
                        <h1>                            
                            <?php
                                echo $row2["nombre_asignatura"];
                            ?>
                        </h1>
                        <hr class="small">
                        <span class="subheading">Encuentra aquí las ofertas que buscabas!</span>
                        <a href="#premios" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <hr>
    
    <section id="premios" class="bg-light-gray">
            <div class="container">            
                <div class="row">
                    <?php
                        $producto = generar_premios_de_asignatura_para_alumno($id);
                        echo $producto;
                    ?>
                </div>
            </div>
    </section>



    <footer style="margin: 300px 0px 0px 40px">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; Your Website 2014</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Privacy Policy</a>
                        </li>
                        <li><a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    
    <?php
        $producto = generar_pags_premios_individuales($id);
        echo $producto;
    ?>

    <!-- Portfolio Modals -->
    <!-- Use the modals below to showcase details about your portfolio projects! -->

    <!-- Portfolio Modal 1 -->
    
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>

    <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/grayscale.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/agency.js"></script>

</body>

</html>

<?php
}
?>


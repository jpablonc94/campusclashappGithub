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

    $username = $row['username'];
           
?>

<!DOCTYPE html>
<html lang="es">

<?php include 'head1.php'; ?>


<body id="page-top" class="index">

    <?php include 'navbar_normal.php'; ?>

    <!-- Header -->
    <header class="intro-header" style="background-image: url('img/buscador_bg.jpg')">
        <div class="container">
            <div class="row">
                <div>
                    <div class="page-heading">
                        <br>
                        <br>
                        <h1>Consulta tus asignaturas</h1>
                        <hr class="small">
                        <span class="subheading">Puede que encuentres alguna sorpresa</span>
                        <br>
                        <br>
                        <a href="#buscador" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <hr>
    
    <section id="buscador">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Asignaturas CampusClash</h2> 
                </div>
            </div>           
            <div class="row" >
                <?php
                    $asignaturas = mostrar_asignaturas_de_alumno($username);
                    echo $asignaturas;
                ?>

                <!--<form name="buscador" id="contactForm" action="asignaturas_alumno" method="post">

                    <div class="input-group input-group-sm" style="margin: 30px 40px 10px 20px;">
                        <span class="input-group-addon">Universidad</span>
                        <select name='universidad' size='1' class="form-control" id='universidad' required>
                            <option value='Universidad Politécnica de Cartagena'>Universidad Politécnica de Cartagena</option>
                        </select>
                    </div>
 
                    <div class="input-group" style="margin: 20px 40px 10px 42px;">
                        <span class="input-group-addon">Grado</span>
                        <select name='grado' size='1' class="form-control" id='grado' required>
                            <option value='Grado en Ingeniería Telemática'>Grado en Ingeniería Telemática</option>
                            <option value='Grado en Ingeniería de Sistemas de Telecomunicaciones'>Grado en Ingeniería de Sistemas de Telecomunicaciones</option>
                        </select>
                    </div>

                    <button name="submit" type="submit" class="btn btn-xl" style="margin:40px 400px;">Mostrar Asignaturas</button>                 

                </form>-->
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
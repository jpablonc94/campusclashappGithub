<?php
session_start();
require_once 'lib.php';
?>
<?php
if(!isset($_SESSION["session_username"])) {
 header("location:index.php");
} else {
    $row = obtener_datos_from_db($_SESSION['session_username']);
?>

<!DOCTYPE html>
<html lang="es">

<?php include 'head1.php'; ?>

<body id="page-top">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="welcome.php#page-top">CampusCLASH</a>
            </div> 
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="welcome.php#page-top">Home</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Secciones <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="tienda.php">Tienda</a></li>
                            <li><a href="#">Tablón de anuncios</a></li>
                            <li><a href="ranking.php">Clasificación</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="page-scroll" href="welcome.php#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="welcome.php#contact">Contact</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"></i>
                            <?php 
                                echo $row['username']; 
                            ?>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="profile.php"><i class="fa fa-fw fa-user"></i>Profile</a>
                            </li>
                            <li>
                                <a href="settings.php"><i class="fa fa-fw fa-gear"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>                       
                    <!-- </div> -->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    
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
    <section id="ranking"></section> 
    <div style="border: 80px solid black; ">  
    <section class="bg-light-gray" style="margin:80px 0px 10px 0px;">
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
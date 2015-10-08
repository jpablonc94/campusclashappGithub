<?php
session_start();
if(!isset($_SESSION["session_username"])) {
 header("location:index.php");
} else {
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CampusClash - Talentum Startup</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/clean-blog.min.css" rel="stylesheet">
    <link href="css/myStyles.css" rel="stylesheet">
    <link href="css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
</head>

<body id="page-top" class="index">

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
                <a class="navbar-brand page-scroll" href="#page-top">CampusCLASH</a>
            </div> 
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right ocultar-opciones">
                    <li>
                        <a class="page-scroll" href="#page-top">Home</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Secciones</a>
                        <ul>
                            <li><a href="tienda.php">Tienda</a></li>
                            <li><a href="#">Panel de anuncios</a></li>
                            <li><a href="#">Gestión de apuntes</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                    <li>
                        <a href="logout.php" id="logout-jp">Log Out</a>
                    </li>                          
                    <!-- </div> -->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Header -->
    <header class="intro-header" style="background-image: url('img/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="page-heading">
                        <h1>Welcome!!</h1>
                        <hr class="small">
                        <span class="subheading">Nice to see you!</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Services Section -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Secciones</h2>
                    <h3 class="section-subheading text-muted"> Estos son los distintos servicios que ofrece CampusClash</h3>
                </div>
            </div>
            <br>
            <br>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <a href="tienda.php">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
                        </a>
                    </span>
                    <h4 class="service-heading">Tienda Online</h4>
                    <p class="text-muted">Aquí podréis canjear los puntos conseguidos en el aula virtual!</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <a href="">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-comment fa-stack-1x fa-inverse"></i>
                        </a>
                    </span>
                    <h4 class="service-heading">Tablón de anuncios</h4>
                    <p class="text-muted"> Si quieres encontrar o colgar algún anuncio, este es el lugar!</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <a href="">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-laptop fa-stack-1x fa-inverse"></i>
                    </a>
                    </span>
                    <h4 class="service-heading">Apuntes</h4>
                    <p class="text-muted"> Si con lo aprendido en clase no es suficiente, deberías echarle un vistazo a este último apartado</p>
                </div>
            </div>
        </div>
    </section>

    
    <!-- About Section -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">About</h2>
                    <h3 class="section-subheading text-muted">Sobre CampusClash</h3>
                </div>               
            </div>
        </div>
    <div class="content-section-a">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-6" style="margin:0px 0px 0px 100px;">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Creador: J.P.N.C</h2>
                    <p class="lead">Mi nombre es Juan Pablo Navarro Castillo y soy estudiante de Teleco (ETSIT) en la Universidad Politécnica de Cartagena.</p>
                    <p class="lead">Actualmente trabajo como becario para Telefónica y como alumno interno dentro del Departamento de Electrónica, Tecnología de Computadores y Proyectos de mi escuela.</p>
                </div>
                <div class="col-lg-3 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="img/yo.jpg" style="margin:80px 0px 0px 50px;">
                </div>
            </div>

        </div>
        <!-- /.container -->
    </div>
    <!-- /.content-section-a -->

    <div class="content-section-b">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6" style="margin:0px 40px 0px 0px;">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Talentum Startup</h2>
                    <p class="lead">Este proyecto ha sido llevado cabo gracias a la <a href="http://www.talentumstartups.com/" style="color:blue;text-decoration:none;">Red de Cátedras Talentum</a>, de la compañía Telefónica. Una iniciativa que promueve el espiritu emprendedor entre los estudiantes que quieren desarrollar una empresa propia.</p>
                </div>
                <div class="col-lg-6 col-sm-pull-6  col-sm-6">
                    <img class="img-responsive" src="img/talentum.png" style="margin:30px 0px 0px 20px;">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-b -->

    <div class="content-section-a">

        <div class="container">

            <div class="row">
                <div class="col-lg-4 col-sm-6" style="margin:0px 0px 0px 80px;">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Qué es CampusClash?</h2>
                    <p class="lead">La empresa pretende hacer el día a día del Aula Virtual, más interactivo. Motivando a los alumnos a participar y hacer un correcto uso de la plataforma Moodle</p>
                    <p class="lead">Si estás en esta página es porque ya te has registrado en el aula virtual. Como habrás podido observar, en el bloque CampusClash dentro de tus asignaturas, se te ha asignado una puntuación. Esta puntuación irá incrementando conforme participes en las distintas tareas dentro del aula. Dichas tareas serán entregables, prácticas, tests, foros...</p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="img/phones.png" style="margin:250px 0px 0px 0px;">
                </div>
            </div>

        </div>
        <!-- /.container -->
    </div>

    <div class="content-section-b">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6" style="margin:0px 40px 0px 0px;">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Qué hacer con esos puntos?</h2>
                    <p class="lead">El objetivo principal de esta página es que el alumno pueda canjear los puntos obtenidos en el aula virtual por premios, como pueden ser descuentos y ofertas exclusivas.</p>
                </div>
                <div class="col-lg-4 col-sm-pull-6  col-sm-6">
                    <img class="img-responsive" src="img/dog.png" style="margin:80px 0px 0px 100px;">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-b -->
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Contact Us</h2>
                    <h3 class="section-subheading text-muted">Si tienes alguna otra duda puedes enviarme un correo. Escribe aquí tu mensaje</h3>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm" action="welcome.php">
                        <div class="row">
                            <div class="col-md-8" style="margin: 10px 0px 10px 200px;">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl" style="border:2px outset">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer>
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
    >
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/agency.js"></script>

</body>

</html>
<?php
}
?>
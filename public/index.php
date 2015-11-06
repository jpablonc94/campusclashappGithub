<?php
session_start();
?>
 
<?php
 
if(isset($_SESSION["session_username"])){
    //echo "<br><br><h1> Session is set </h1>"; // for testing purposes
    header("Location: welcome.php");
} 

if(isset($_POST["login"])){ 
    if(!empty($_POST['password']) && !empty($_POST['email'])) {
        $password=$_POST['password'];
        $email=$_POST['email'];

        if(filter_var($email, FILTER_VALIDATE_EMAIL)){

            $server="localhost";
            $database = "campusclash";
            $db_pass = 'T7tmn892AB3';
            $db_user = 'root';
    
            mysql_connect($server, $db_user, $db_pass) or die ("error1".mysql_error());
            mysql_select_db($database) or die ("error2".mysql_error());
 
            $query =mysql_query("SELECT * FROM usertbl WHERE email='".$email."' AND password='".$password."'");
 
            $numrows=mysql_num_rows($query);

            if($numrows!=0){
                while($row=mysql_fetch_assoc($query)){
                    $dbusername=$row['username'];
                    $dbpassword=$row['password'];
                    $dbemail=$row['email'];
                    $dbfullname=$row['full_name'];
                    $dbpoints=$row['points'];
                }
 
                if($password == $dbpassword && $email == $dbemail){ 
                    $_SESSION['session_username']=$dbusername;                   
                    $_SESSION['session_image_loaded_try'] = false;
                    $_SESSION['session_image_loaded'] = "";
                    $_SESSION['session_upload_product_try'] = false;
                    $_SESSION['session_upload_message'] = "";
                    
 
                    /* Redirect browser */
                    header("Location: welcome.php");
                }

            } else { 
                $message = "Nombre de usuario ó contraseña invalida!";
            }            
        }
    } else {
        $message = "Todos los campos son requeridos!";
    }
} else {
    $message = "";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CampusClash - Talentum Startup</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->    
    <link href="css/clean-blog.min.css" rel="stylesheet">
    <link href="css/grayscale.css" rel="stylesheet">
    <link href="css/myStyles.css" rel="stylesheet">
    <link href="css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

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
                <ul class="nav navbar-nav navbar-right">
                  <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#login">Log In</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>                          
                    <!-- </div> -->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="brand-heading">CampusClash</h1>
                        <p class="intro-text">Participa, Esfuérzate, Gana</p>
                        <a href="#about" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>About CampusClash</h2>
                <p>La idea es hacer más lúdico un entorno meramente educativo, en este caso, el aula virtual de la Universidad Politécnica de Cartagena.</p>
                <p>A este proceso se le llama gamificación y su principal objetivo es motivar a los usuarios a que participen dentro del curso.</p>
                <p>Esta plataforma hará posible este objetivo, proporcionando un sitema de canjeo de puntos, obtenidos en el aula virtual, por descuentos y otros premios.</p>
            </div>
        </div>
        <a href="#login" class="btn btn-circle page-scroll">
            <i class="fa fa-angle-double-down animated"></i>
        </a>
    </section>

    <!-- Login Section -->
    <section id="login" class="content-section text-center">
        <div class="login-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <h2 style="color:black">LOG IN</h2>
                    <p style="color:hsl(240, 100%, 70%);">Deberás haberte registrado previamente a través del aula virtual</p>
                    <form name="login" id="contactForm" action="index.php" method="post">                       
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Email</label>
                                <input name="email" type="email" id="email" class="form-control" placeholder="Email" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Password</label>
                                <input <input name="password" type="password" id="password" class="form-control" placeholder="Password" required data-validation-required-message="Please enter your password.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <p style="color:black; margin:10px;"><?php echo "$message"; ?> </p>                      
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" name="login" class="btn btn-default">Entrar</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
                <a href="#contact" class="row btn btn-circle page-scroll" style="margin:0px;">
                    <i class="fa fa-angle-double-down animated" style="color:black;"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Contact</h2>
                <p>Si quieres saber más sobre CampusClash, no dudes en enviar un email a la siguiente dirección:</p>
                <p><a href="mailto:feedback@startbootstrap.com">juan.pablo.nc@campusclash.com</a>
                </p>
                <ul class="list-inline banner-social-buttons">
                    <li>
                        <a href="https://twitter.com/SBootstrap" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                    </li>
                    <li>
                        <a href="https://github.com/IronSummitMedia/startbootstrap" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                    </li>
                    <li>
                        <a href="https://plus.google.com/+Startbootstrap/posts" class="btn btn-default btn-lg"><i class="fa fa-google-plus fa-fw"></i> <span class="network-name">Google+</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p style="float:left">Copyright &copy; CampusClash</p>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>

    <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/grayscale.js"></script>

</body>

</html>

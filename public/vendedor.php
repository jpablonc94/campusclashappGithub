<?php
session_start();
require_once 'lib.php';
?>
<?php
if(!isset($_SESSION["session_username"])) { 
    header("location:index.php");
} else {   

    $row = obtener_datos_from_db($_SESSION['session_username']);    
    $usuario = $row['username'];
    $message1 = "";
    if($_SESSION['session_upload_product_try']){
        $message1 = $_SESSION['session_upload_message'];
        $_SESSION['session_upload_product_try']=false;
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
    <link href="css/clean-blog.min.css" rel="stylesheet">
    <link href="css/myStyles.css" rel="stylesheet">
    <link href="css/landing-page.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">

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

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
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
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <br>
                    <li>
                        <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                    </li>
                    <li>
                        <a href="settings.php"><i class="fa fa-fw fa-gear"></i> Settings</a>
                    </li> 
                    <li>
                        <a href="vendedor.php"><i class="fa fa-fw fa-shopping-cart"></i> Subir Producto</a>
                    </li>                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        <br>
        <div id="page-wrapper" style="margin: 0px 0px 20px 0px; border: 10px #A5A5A5; border-style: double none double double;">

            <div class="container-fluid">
                                               
                    
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header" style="margin:20px 0px;">
                            Sube tu producto
                        </h1> 

                    </div>
                </div>
                <p style="color:blue; font-size:15px; margin:0px;"><?php echo "$message1"; ?></p>
                <!-- /.row --> 
                <div class="row">
                    <div class="col-lg-12" style="margin:0px;">                        
                        <form name="cambiarimg" enctype="multipart/form-data" action="registrar_producto.php" method="post" >
                            <label>Nombre del negocio</label>
                            <input name="negocio" type="text" class="form-control" placeholder="Nombre de tu negocio" id="negocio" required data-validation-required-message="Por favor, introduzca el nombre de su negocio.">   
                            <hr>
                            <label>Nombre del producto</label>
                            <input name="name" type="text" class="form-control" placeholder="Nombre de tu producto" id="name" required data-validation-required-message="Por favor, introduzca el nombre de su producto.">   
                            <hr>       
                            <label>Descripción corta</label>
                            <input name="short_description" type="text" class="form-control" placeholder="Descripción corta de tu producto" id="short_description" required data-validation-required-message="Por favor, introduzca una descripción corta de su producto.">
                            <hr> 
                            <label>Descripción</label>
                            <textarea rows="10" name="description" class="form-control" placeholder="Descripción larga de tu producto" id="description" required data-validation-required-message="Por favor, introduzca una descripción más detallada de su producto."></textarea>
                            <hr> 
                            <label>Precio</label>
                            <input type="number" name="precio" min="1" max="1000" class="form-control" placeholder="Precio en monedas" id="precio" required data-validation-required-message="Por favor, introduzca precio en monedas de su producto.">
                            <hr> 
                            <label>Imagen pequeña</label>
                            <input id="imagen" type="file" name="imagen">
                            <hr> 
                            <label>Imagen grande</label>
                            <input id="imagen_grande" type="file" name="imagen_grande">
                            <br>     
                            <input id="username" type="hidden" name="username" value="<?php $usuario;?>">

                            <button name="submit" type="submit" class="btn btn-xl" style="margin:40px 400px;">Subir Producto</button>                 
                        </form> 

                    </div>
                </div>
                        
            </div>
            <!-- /.container-fluid -->

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

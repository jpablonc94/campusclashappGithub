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
                <!--<div class="navbar-brand" style="color:gray; margin:0px 0px 0px 40px; border: 2px outset gray; padding: 4px 6px; font-size:15px">
                    Puntos: 
                    <a href="ranking.php" id="usuario-jp">
                        <?php 
                            echo $row['points']; 
                        ?>
                    </a>
                    <br>
                    Posición: 
                    <a href="ranking.php" id="usuario-jp">
                        <?php 
                            echo $row['position']; 
                        ?>
                    </a>
                </div>                
                <p class="navbar-brand" style="color:gray; margin:0px 0px 0px 10px; border: 2px outset gray; padding: 13px 10px; font-size:18px;">
                    Monedas: 
                    <a href="tienda.php" id="usuario-jp">
                        <?php 
                            echo $row['monedas']; 
                        ?>
                    </a>
                </p>
                <div class="navbar-brand" style="color:gray; margin:0px 0px 0px 10px; border-style: outset none outset outset; border-width:2px; padding: 4px 6px; font-size:15px">
                    Ptos Exp: 
                    <a href="profile.php" id="usuario-jp">
                        <?php 
                            echo $row['experiencia']; 
                        ?>
                    </a>
                    <br>
                    Next lvl: 
                    <a href="profile.php" id="usuario-jp">
                        <?php 
                            echo $row['next_lvl']; 
                        ?>
                    </a>
                </div>
                <p class="navbar-brand" style="color:gray; margin:0px 0px 0px 0px; border-style: outset outset outset none; border-width:2px; padding: 13px 5px; font-size:18px;"> 
                    <a href="profile.php" id="usuario-jp" style="border-style: none none none double ;border-color:gray; padding: 5px 10px">
                        Lvl:
                        <?php 
                            echo $row['nivel']; 
                        ?>
                    </a>
                </p>-->
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
                </ul>
            </div> 
            <!-- /.navbar-collapse -->
        </nav>
        <br>
        <br>
        <div id="page-wrapper" style="border: 10px #A5A5A5; border-style: double none double double;">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header" style="margin:20px 0px;">
                            Perfil de usuario
                            <b href="" style="text-decoration:none; font-size: 30px; margin: 0px 20px 0px 450px; color:#252570;"> Nivel <?php echo $row['nivel'];?></b>
                        </h1> 

                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3" style="margin:0px 0px 60px 30px;">
                        <img class="img-responsive" src="obtenerfotografia.php" style="margin:0px;">                  
                    </div>
                    <div class="col-lg-5 col-lg-offset-0">
                         <table style="width:150%; margin:0px">
                            <tr>
                                <td>Nombre y apellidos: </td>
                                <td><b><?php echo $row['fullname'];?></b></td>
                            </tr>
                            <tr>
                                <td>Nombre de usuario: </td>
                                <td><b><?php echo $row['username'];?></b></td>
                            </tr>
                            <tr>
                                <td>Email: </td>
                                <td><b><?php echo $row['email'];?></b></td>
                            </tr>
                            <tr>
                                <td>Puntos: </td>
                                <td><b><?php echo $row['points'];?></b></td>
                            </tr>
                            <tr>
                                <td>Monedas: </td>
                                <td><b><?php echo $row['monedas'];?></b></td>
                            </tr>
                            <tr>
                                <td>Ptos de experiencia: </td>
                                <td><b><?php echo $row['experiencia'];?></b></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.row -->

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

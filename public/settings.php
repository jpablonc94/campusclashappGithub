<?php
session_start();
require_once 'lib.php';
?>
<?php
if(!isset($_SESSION["session_username"])) { 
    header("location:index.php");
} else {   
/*Comprobación de que es una imagen correcta
    if(!empty($_POST)) {
        if (subir_fichero('userimg','imagen')){
            $message = cambiar_imagen();            
        } else {
            $message = 'Archivo no aceptado';
        }
    } else {
        $message = '';
    } 
*/
    $row = obtener_datos_from_db($_SESSION['session_username']);
    $username = $_SESSION["session_username"];
    $message1 = "";
    $message2 = "";
    $message3 = "";
    $message4 = ""; 
    $message5 = "";
    
    if($_SESSION['session_image_loaded_try']){
        $message1 = $_SESSION['session_image_loaded'];
        $_SESSION['session_image_loaded_try']=false;
    }

    if(isset($_POST["cambiar"])){ 
        if(!empty($_POST["fullname"])) {
            $message2 = cambiar_fullname ($row['fullname'], $_POST["fullname"], $username);
        } else {
            if(!empty($_POST["email"])) {
                $message3 = cambiar_email ($row['email'], $_POST["email"]);
            } else {
                if(!empty($_POST["username"])) {
                    $message4 = cambiar_username ($row['username'], $_POST["username"]);
                } else {
                    if(!empty($_POST["password"]) && !empty($_POST["newpassword"])){
                        $message5 = cambiar_password ($_POST["password"], $_POST["newpassword"], $username);
                    }
                }
            }       
        }          
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
                <div class="navbar-brand" style="color:gray; margin:0px 0px 0px 40px; border: 2px outset gray; padding: 4px 6px; font-size:15px">
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
                <p class="navbar-brand" style="color:gray; margin:0px 0px 0px 0px; border-style: outset outset outset none; border-width:2px; padding: 13px 10px; font-size:18px;">
                    Lvl: 
                    <a href="profile.php" id="usuario-jp">
                        <?php 
                            echo $row['nivel']; 
                        ?>
                    </a>
                </p>
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
        <div id="page-wrapper" style="margin: 0px 0px 20px 0px; border: 10px #A5A5A5; border-style: double none double double;">

            <div class="container-fluid">
                                               
                    
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header" style="margin:20px 0px;">
                            Ajustes
                        </h1> 

                    </div>
                </div>
                <!-- /.row --> 
                <div class="row">
                    <div class="col-lg-3" style="margin:0px;">                        
                        <form name="cambiarimg" enctype="multipart/form-data" action="almacenar_imagen.php" method="post">
                            <h4 style="margin: 0px;">Cambiar Imagen:</h4>
                            <table style="width:100%; margin:0px;">
                                <tr>
                                    <td><input id="imagen" type="file" name="imagen"></td>
                                    <td><button name="cambiarimg" type="submit" class="btn btn-xl">Cambiar</button></td>
                                    <td><p style="color:black; margin:10px;"></p></td>
                                </tr>   
                            </table>                           
                        </form>                     
                    </div>
                    <p style="color:blue; font-size:15px; margin:0px;"><?php echo "$message1"; ?></p>
                </div>
                 
                <div class="row">
                    <div class="col-lg-12" style="margin:0px;">                        
                        <form name="cambiar" action="settings.php" method="post">
                            <h4 style="margin: 0px;">Cambiar nombre completo:</h4>
                            <p style="color:blue; font-size:15px; margin:0px;"><?php echo "$message2"; ?></p>                            
                            <table style="width:100%; margin:0px;">
                                <tr>
                                    <td><input name="fullname" type="text" class="form-control" placeholder="Actualmente: <?php echo $row['fullname'];?> *" id="fullname" required data-validation-required-message="Please enter your fullname."></td>
                                    <td><button name="cambiar" type="submit" class="btn btn-xl">Cambiar</button></td>
                                    <td><p style="color:black; margin:10px;"></p></td>
                                </tr>   
                            </table>                            
                        </form>                    
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12" style="margin:0px;">                        
                        <form name="cambiar" action="settings.php" method="post">
                            <h4 style="margin: 0px;">Cambiar email:</h4>
                            <p style="color:blue; font-size:15px; margin:0px;"><?php echo "$message3"; ?></p>
                            <table style="width:100%; margin:0px;">
                                <tr>
                                    <td><input name="email" type="email" class="form-control" placeholder="Actualmente: <?php echo $row['email'];?> *" id="email" required data-validation-required-message="Please enter your email address."></td>
                                    <td><button name="cambiar" type="submit" class="btn btn-xl">Cambiar</button></td>
                                    <td><p style="color:black; margin:10px;"></p></td>
                                </tr>   
                            </table>                               
                        </form>                    
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12" style="margin:0px;">                        
                        <form name="cambiar" action="settings.php" method="post">
                            <h4 style="margin: 0px;">Cambiar nombre de usuario:</h4>
                            <p style="color:blue; font-size:15px; margin:0px;"><?php echo "$message4"; ?></p>
                            <table style="width:100%; margin:0px;">
                                <tr>
                                    <td><input name="username" type="text" class="form-control" placeholder="Actualmente: <?php echo $row['username'];?> *" id="username" required data-validation-required-message="Please enter your username."></td>
                                    <td><button name="cambiar" type="submit" class="btn btn-xl">Cambiar</button></td>
                                    <td><p style="color:black; margin:10px;"></p></td>
                                </tr>   
                            </table>                            
                        </form>                    
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-lg-12" style="margin:0px;">                        
                        <form name="cambiar" action="settings.php" method="post">
                            <h4 style="margin: 0px;">Cambiar contraseña de usuario:</h4>
                            <p style="color:blue; font-size:15px; margin:0px;"><?php echo "$message5"; ?></p>
                            <table style="width:100%; margin:0px;">
                                <tr>
                                    <td><input name="password" type="password" class="form-control" placeholder="Antigua contraseña" id="password" required data-validation-required-message="Please enter your old password."></td>
                                    <td><input name="newpassword" type="password" class="form-control" placeholder="Nueva contraseña" id="newpassword" required data-validation-required-message="Please enter your new password."></td>
                                    <td><button name="cambiar" type="submit" class="btn btn-xl">Cambiar</button></td>
                                </tr>
                            </table>
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

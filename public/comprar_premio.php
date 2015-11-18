<?php
session_start();
require_once 'lib.php';
?>
<?php
if(!isset($_SESSION["session_username"])) { 
    header("location:index.php");
} else {   
    if($_SESSION['session_rol']!="alumno"){
        header("location:welcome.php");
    }
    $username = $_SESSION["session_username"];    

    if(isset($_GET['id'])){
        if ($_GET['id'] > 0)
        {
            $id = $_GET['id'];

            $row2 = obtener_datos_premio_from_db($id);

            $nombre=$row2['productname'];
            $short_description=$row2['description'];
            $description=$row2['long_description'];
            $precio = $row2['precio'];
            $profesor_username = $row2['profesor'];
            $course_id = $row2['course_id'];
            $imagen_grande = $row2['imagen_grande'];
            $imagen = $row2['imagen'];

            $mostrar_imagen = "imagen_premio_mostrar.php?id=$id";
            $mostrar_asignatura = "premios.php?id=$course_id";

            $row3 = obtener_datos_asignatura_from_db($course_id);

            $nombre_asignatura = $row3['nombre_asignatura'];
            $saldo = $row3['saldo'];
            $universidad = $row3['universidad'];
            $grado = $row3['grado'];

            $row4 = obtener_datos_from_profesores($profesor_username);

            $profesor_id = $row4['id'];
            $profesor_fullname = $row4['fullname'];
            $profesor_moodle_id = $row4['moodleid'];

            $mostrar_perfil_profesor = "perfil_profesor.php?id=$profesor_id";


            /*if (!es_alumno_de_asignatura($username,$course_id)){
                header("location:welcome.php");
            } */

        }
    }  

    $row = obtener_datos_from_usertbl($_SESSION['session_username']);
    $moodle_id = $row['moodleid'];
    $monedas = $row['monedas'];
   
    
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'head1.php'; ?>

<body>

    <?php 
        include 'navbar_normal.php';
        if($imagen_grande!=null){

    ?>

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('imagen_grande_premio_mostrar.php?id=$id')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="page-heading">
                        <h1><?php echo $nombre; ?></h1>
                        <hr class="small">
                        <span class="subheading"><?php echo $short_description; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <?php 
        } else {
    ?>

    <header class="intro-header" style="background-image: url('img/header-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="page-heading">
                        <h1><?php echo $nombre; ?></h1>
                        <hr class="small">
                        <span class="subheading"><?php echo $short_description; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <?php 
        } 
    ?>


            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-lg-offset-1">
                        <div class="modal-body">
                            <table style="width:82%; margin:30px 0px;">
                            <tr>
                                <td style="padding:15px 0px;"> <b><?php echo $universidad;?></b></td>
                            </tr>
                            <tr>
                                <td style="text-align:right; padding:15px 0px;"><b><?php echo $grado;?></b></td>
                            </tr>
                            <tr>
                                <td style="padding:15px 0px;">Asignatura: <a href='<?php echo $mostrar_asignatura; ?>' style="text-decoration: none;"><b><?php echo $nombre_asignatura;?></b></a></td>
                            </tr>
                            <tr>
                                <td style="text-align:right; padding:15px 0px;">Profesor responsable: <a href='<?php echo $mostrar_perfil_profesor; ?>' style="text-decoration: none;"><b><?php echo $profesor_fullname;?></b></a></td>
                            </tr>
                        </table>
                            <br>
                            <p class="col-lg-10" style="font-size: 20px; text-align:justify; margin: 10px 0px 60px 0px;"><?php echo $description ?></p>
                            <div class="row">
                                <img class="img-responsive img-centered col-md-5" src='<?php echo $mostrar_imagen; ?>' style="margin: 40px 200px;">
                            </div>
                            <div class="row text-center" style="margin:40px 150px;">
                                <div class="col-md-4">
                                    <h4 class="service-heading">Tu saldo</h4>
                                    <span class="fa-stack fa-4x">
                                        <a href="#">
                                            <i class="fa fa-circle fa-stack-2x text-primary"></i>   
                                            <i class="fa fa-stack-1x" style="color:black; font-size:23px;"><?php echo $saldo ?></i>                                         
                                        </a>
                                    </span>
                                    <p class="text-muted">En esta asignatura</p>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="service-heading">Precio</h4>
                                    <span class="fa-stack fa-4x">
                                        <a href="buscador_asignaturas.php">
                                            <i class="fa fa-circle fa-stack-2x text-primary" style="color:LightSteelBlue "></i>
                                            <i class="fa fa-stack-1x" style="color:black; font-size:23px;"><?php echo $precio ?></i>  
                                        </a>
                                    </span>                                    
                                    <p class="text-muted">Lo que te va a costar</p>
                                </div>
                            </div>
                            
                            <form name="cambiarimg" enctype="multipart/form-data" action="canjear_premio.php" method="post" >
                                <input type="hidden" name="course_id" id="course_id" value="<?php echo $course_id; ?>"> 
                                <input type="hidden" name="profesor_id" id="profesor_id" value="<?php echo $profesor_moodle_id; ?>"> 
                                <input type="hidden" name="premio_id" id="premio_id" value="<?php echo $id; ?>"> 
                                <input type="hidden" name="nombre_del_premio" id="nombre_del_premio" value="<?php echo $nombre; ?>"> 
                                <input type="hidden" name="username" id="username" value="<?php echo $username; ?>"> 
                                <input type="hidden" name="user_id" id="user_id" value="<?php echo $moodle_id; ?>">
                                <input type="hidden" name="precio" id="precio" value="<?php echo $precio; ?>">
                                <input type="hidden" name="saldo" id="saldo" value="<?php echo $saldo; ?>">
                                <input type="hidden" name="monedas" id="monedas" value="<?php echo $monedas; ?>">

                                <button name="submit" type="submit" class="btn btn-xl" style="margin:40px 400px;">Canjear Premio</button>                 
                            </form> 
                       
                    
                            

                        </div>
                    </div>
                </div>
            </div>
    

    <hr>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="list-inline text-center">
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-muted">Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>


</body>

</html>
<?php
}
?>
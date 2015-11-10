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
      $id = $row['id'];
      $username = $row['username'];
      $picture = $row['username'];
      if(empty($row['imagen'])){
        $picture = "imagenpordefectocampusclash";
      }
?>
<!DOCTYPE html>
<html lang="es">

<?php include 'head2.php' ?>


<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include 'navbar_usuario.php'; ?>
        <br>
        <br>
        <div id="page-wrapper" style="border: 10px #A5A5A5; border-style: double none double double;">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header" style="margin:20px 0px;">
                            Perfil de usuario
                            <b href="" style="text-decoration:none; font-size: 30px; margin: 0px 20px 0px 450px; color:#252570;"> 
                                <?php
                                if($_SESSION['session_rol']=="alumno"){
                                    $nivel = $row['nivel'];
                                    $mostrar_nivel = "Nivel $nivel"; 
                                    echo $mostrar_nivel;
                                }
                                ?>
                            </b>
                        </h1> 

                    </div>
                </div>
                <!-- /.row -->
                
                <div class="row">
                    <div class="col-lg-3" style="margin:0px 0px 60px 30px;">
                        <img class="img-responsive" src="img/perfiles/<?php echo $picture;?>.jpg" style="margin:60px 10px;">                  
                    </div>
                    <div class="col-lg-5 col-lg-offset-0">
                         <table style="width:150%; margin:60px 0px;">
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
                            <?php 
                                if($_SESSION['session_rol']=="alumno"){
                                    $puntos = $row['points'];
                                    $monedas =  $row['monedas'];
                                    $experiencia = $row['experiencia'];
                                    $puntuaciones="
                                    <tr>
                                        <td>Puntos: </td>
                                        <td><b>$puntos</b></td>
                                    </tr>
                                    <tr>
                                        <td>Monedas: </td>
                                        <td><b>$monedas</b></td>
                                    </tr>
                                    <tr>
                                        <td>Ptos de experiencia:</td>
                                        <td><b>$experiencia</b></td>
                                    </tr>
                                    <tr>
                                        <td>Rol: </td>
                                        <td><b>Alumno</b></td>
                                    </tr>";
                                    echo $puntuaciones;
                                } else if($_SESSION['session_rol']=="profesor"){
                                    $puntuaciones="
                                    <tr>
                                        <td>Rol: </td>
                                        <td><b>Profesor</b></td>
                                    </tr>";
                                    echo $puntuaciones;
                                } else {
                                    $puntuaciones="
                                    <tr>
                                        <td>Rol: </td>
                                        <td><b>Vendedor</b></td>
                                    </tr>";
                                    echo $puntuaciones;
                                }
                            ?>
                            
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

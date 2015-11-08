<?php
session_start();
require_once 'lib.php';
?>
<?php
if(!isset($_SESSION["session_username"])) { 
    header("location:index.php");
} else {   
    $row = obtener_datos_from_db($_SESSION['session_username']);

    if(isset($_GET['id'])){
        if ($_GET['id'] > 0)
        {
            $_SESSION['session_other_user_id'] = $_GET['id'];
        }
    } 
    $id = $_SESSION['session_other_user_id'];
    $row2 = obtener_datos_from_db_por_id($id);
    $picture = $row2['username'];
    if(empty($row2['imagen'])){
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
                            <b href="" style="text-decoration:none; font-size: 30px; margin: 0px 20px 0px 450px; color:#252570;"> Nivel <?php echo $row2['nivel'];?></b>
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
                                <td><b><?php echo $row2['fullname'];?></b></td>
                            </tr>
                            <tr>
                                <td>Nombre de usuario: </td>
                                <td><b><?php echo $row2['username'];?></b></td>
                            </tr>
                            <tr>
                                <td>Email: </td>
                                <td><b><?php echo $row2['email'];?></b></td>
                            </tr>
                            <tr>
                                <td>Puntos: </td>
                                <td><b><?php echo $row2['points'];?></b></td>
                            </tr>
                            <tr>
                                <td>Monedas: </td>
                                <td><b><?php echo $row2['monedas'];?></b></td>
                            </tr>
                            <tr>
                                <td>Ptos de experiencia: </td>
                                <td><b><?php echo $row2['experiencia'];?></b></td>
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

<?php
session_start();
require_once 'lib.php';
?>
<?php
if(!isset($_SESSION["session_username"])) { 
    header("location:index.php");
} else {   
    include 'comprobar_settings.php';
?>
<!DOCTYPE html>
<html lang="es">
<?php include 'head2.php' ?>


<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include 'navbar_usuario.php'; ?>
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
                        <form name="cambiarimg" enctype="multipart/form-data" action="subir_foto_usuario.php" method="post">
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
                <div class="row">
                    <div class="col-lg-12" style="margin:0px;">                        
                        <h4 style="margin: 0px;">Eliminar tu cuenta de usuario</h4>
                        <br>
                        <a href="eliminar_cuenta.php"><button>Eliminar cuenta</button></a>
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

<?php
session_start();
require_once 'lib.php';
?>
<?php
if(!isset($_SESSION["session_username"])) { 
    header("location:index.php");
} else {   
    include 'comprobar_modificar_producto.php';
    
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
                            Ajustes del producto
                        </h1> 
                        <h2 style="text-align:center; color:gray;">
                            ----------
                            <div style="color:black;">
                            <?php
                                echo $row2["productname"];
                            ?>
                            </div>
                            ----------
                        </h2>
                        <hr>
                    </div>
                </div>
                <!-- /.row --> 
                <div class="row">
                    <div class="col-lg-12" style="margin:0px;">                        
                        <form name="cambiar" action="modificar_producto.php" method="post">
                            <h4 style="margin: 0px;">Cambiar nombre de la empresa:</h4>
                            <p style="color:blue; font-size:15px; margin:0px;"><?php echo "$message2"; ?></p>                            
                            <table style="width:100%; margin:0px;">
                                <tr>
                                    <td><input name="negocio" type="text" class="form-control" placeholder="Nombre de tu negocio" id="negocio" required data-validation-required-message="Por favor, introduzca el nombre de su negocio."></td>
                                    <td><button name="cambiar" type="submit" class="btn btn-xl">Cambiar</button></td>
                                    <td><p style="color:black; margin:10px;"></p></td>
                                </tr>   
                            </table>                            
                        </form>                    
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12" style="margin:0px;">                        
                        <form name="cambiar" action="modificar_producto.php" method="post">
                            <h4 style="margin: 0px;">Cambiar nombre del producto:</h4>
                            <p style="color:blue; font-size:15px; margin:0px;"><?php echo "$message3"; ?></p>
                            <table style="width:100%; margin:0px;">
                                <tr>
                                    <td><input name="name" type="text" class="form-control" placeholder="Nombre de tu producto" id="name" required data-validation-required-message="Por favor, introduzca el nombre de su producto."></td>
                                    <td><button name="cambiar" type="submit" class="btn btn-xl">Cambiar</button></td>
                                    <td><p style="color:black; margin:10px;"></p></td>
                                </tr>   
                            </table>                               
                        </form>                    
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12" style="margin:0px;">                        
                        <form name="cambiar" action="modificar_producto.php" method="post">
                            <h4 style="margin: 0px;">Cambiar descripción corta:</h4>
                            <p style="color:blue; font-size:15px; margin:0px;"><?php echo "$message4"; ?></p>
                            <table style="width:100%; margin:0px;">
                                <tr>
                                    <td><input name="short_description" type="text" class="form-control" placeholder="Descripción corta de tu producto" id="short_description" required data-validation-required-message="Por favor, introduzca una descripción corta de su producto."></td>
                                    <td><button name="cambiar" type="submit" class="btn btn-xl">Cambiar</button></td>
                                    <td><p style="color:black; margin:10px;"></p></td>
                                </tr>   
                            </table>                            
                        </form>                    
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-lg-12" style="margin:0px;">                        
                        <form name="cambiar" action="modificar_producto.php" method="post">
                            <h4 style="margin: 0px;">Cambiar descripción larga</h4>
                            <p style="color:blue; font-size:15px; margin:0px;"><?php echo "$message5"; ?></p>
                            <table style="width:100%; margin:0px;">
                                <tr>
                                    <td><textarea rows="10" name="description" class="form-control" placeholder="Descripción larga de tu producto" id="description" required data-validation-required-message="Por favor, introduzca una descripción más detallada de su producto."></textarea></td>
                                    <td><button name="cambiar" type="submit" class="btn btn-xl">Cambiar</button></td>
                                </tr>
                            </table>
                        </form>                    
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12" style="margin:0px;">                        
                        <form name="cambiar" action="modificar_producto.php" method="post">
                            <h4 style="margin: 0px;">Cambiar precio:</h4>
                            <p style="color:blue; font-size:15px; margin:0px;"><?php echo "$message6"; ?></p>                            
                            <table style="width:100%; margin:0px;">
                                <tr>
                                    <td><input type="number" name="precio" min="1" max="1000" class="form-control" placeholder="Precio en monedas" id="precio" required data-validation-required-message="Por favor, introduzca precio en monedas de su producto."></td>
                                    <td><button name="cambiar" type="submit" class="btn btn-xl">Cambiar</button></td>
                                    <td><p style="color:black; margin:10px;"></p></td>
                                </tr>   
                            </table>                            
                        </form>                    
                    </div>                    
                </div> 

                <div class="row">
                    <div class="col-lg-3" style="margin:0px;">                        
                        <form name="cambiarimg" enctype="multipart/form-data" action="actualizar_imagen_pequeña.php" method="post">
                            <h4 style="margin: 0px;">Cambiar Imagen Pequeña:</h4>
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
                    <div class="col-lg-3" style="margin:0px;">                        
                        <form name="cambiarimg" enctype="multipart/form-data" action="actualizar_imagen_grande.php" method="post">
                            <h4 style="margin: 0px;">Cambiar Imagen Grande:</h4>
                            <table style="width:100%; margin:0px;">
                                <tr>
                                    <td><input id="imagen_grande" type="file" name="imagen_grande"></td>
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
                        <h4 style="margin: 0px;">Eliminar Producto de la base de datos</h4>
                        <br>
                        <a href="eliminar_producto.php"><button>Eliminar Producto</button></a>
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

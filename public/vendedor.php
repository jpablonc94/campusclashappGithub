<?php
session_start();
require_once 'lib.php';
?>
<?php
if(!isset($_SESSION["session_username"])) { 
    header("location:index.php");
} else {   
    if($_SESSION['session_rol']!="vendedor"){
        header("location:welcome.php");
    }
    if($_SESSION['session_rol']=="alumno"){
        $row = obtener_datos_from_usertbl($_SESSION['session_username']);
    } else if($_SESSION['session_rol']=="profesor"){
        $row = obtener_datos_from_profesores($_SESSION['session_username']);
    } else {
        $row = obtener_datos_from_vendedores($_SESSION['session_username']);
    }    
    $usuario = $row['username'];
    $message1 = "";
    if($_SESSION['session_upload_product_try']){
        $message1 = $_SESSION['session_upload_message'];
        $_SESSION['session_upload_product_try']=false;
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
                            <input id="imagen" type="file" name="imagen" required data-validation-required-message="Por favor, introduzca una imagen de su producto.">
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

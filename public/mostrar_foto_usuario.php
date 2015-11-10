<?php
session_start();
// Conexion a la base de datos
$server="localhost";
$database = "campusclash";
$db_pass = 'T7tmn892AB3';
$db_user = 'root';
   
mysql_connect($server, $db_user, $db_pass) or die ("error1".mysql_error());
mysql_select_db($database) or die ("error2".mysql_error());

if ($_GET['id'] > 0)
{
	// Consulta de búsqueda de la imagen.
    if($_SESSION['session_rol'] == "alumno"){
        $query =mysql_query("SELECT * FROM `usertbl` WHERE `id`={$_GET['id']}");   
    } else if($_SESSION['session_rol'] == "profesor"){
        $query =mysql_query("SELECT * FROM `profesores` WHERE `id`={$_GET['id']}");
    } else {
        $query =mysql_query("SELECT * FROM `vendedores` WHERE `id`={$_GET['id']}");
    }
 
	$numrows=mysql_num_rows($query);

	if($numrows!=0){
    	while($row=mysql_fetch_assoc($query)){
        	$imagen=$row['imagen'];
        	$tipo=$row['tipo_imagen'];
    	}    
    	// Mandamos las cabeceras al navegador indicando el tipo de datos que vamos a enviar.
    	header("Content-type: '$tipo'");
    	// A continuación enviamos el contenido binario de la imagen.
    	echo $imagen;
	}
}
?>
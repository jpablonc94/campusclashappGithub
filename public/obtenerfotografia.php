<?php
session_start();
// Conexion a la base de datos
$server="localhost";
$database = "campusclash";
$db_pass = 'T7tmn892AB3';
$db_user = 'root';
   
mysql_connect($server, $db_user, $db_pass) or die ("error1".mysql_error());
mysql_select_db($database) or die ("error2".mysql_error());

$username = $_SESSION['session_username'];

// Consulta de búsqueda de la imagen.
$query =mysql_query("SELECT * FROM usertbl WHERE username='".$username."'");
 
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
?>
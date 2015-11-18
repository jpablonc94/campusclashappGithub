<?php
session_start();
require_once 'connection.php';

$username = $_POST['username'];
$course_id = $_POST['course_id'];
$premio_id = $_POST['premio_id'];
$nombre_del_premio = $_POST['nombre_del_premio'];
$user_id = $_POST['user_id'];
$profesor_id = $_POST['profesor_id'];
$precio = $_POST['precio'];
$saldo = $_POST['saldo'];
$monedas_totales = $_POST['monedas'];

//Resta de monedas dentro de la asignatura
$resta_asignatura = $saldo - $precio;

//Resta de monedas totales
$resta_total = $monedas_totales - $precio;

$time = date('Y/m/d H:i');

if($resta_asignatura<0 || $resta_total<0){
	$_SESSION['session_compra_error_message'] = "No tienes suficientes monedas dentro de la asignatura";
	header("location:mis_compras.php");
} else {
	$resultado3 = mysql_query ("SELECT * FROM `compras_premios` WHERE `username`='$username' AND `premio_id`='$premio_id'");
	$numrows=mysql_num_rows($resultado3);
		if($numrows==0){

			$resultado = mysql_query("UPDATE `usertbl` SET `monedas`= '$resta_total' WHERE `username`= '$username'");

			if(!$resultado){
				$_SESSION['session_compra_error_message'] = "Se ha producido algún error en la base de datos";
				header("location:mis_compras.php");
			} else {
				$resultado = mysql_query("UPDATE `puntos_curso` SET `monedas`= '$resta_asignatura' WHERE `username`= '$username' AND `course_id`= '$course_id'");

				if(!$resultado){
					$_SESSION['session_compra_error_message'] = "Se ha producido algún error en la base de datos";
					header("location:mis_compras.php");
				} else {
			
					$resultado2 = mysql_query ("INSERT INTO `compras_premios`(`course_id`, `profesor_id`, `premio_id`, `nombre_premio`, `username`, `user_id`, `precio`, `timecreated`) VALUES ('$course_id', '$profesor_id', '$premio_id', '$nombre_del_premio', '$username', '$user_id', '$precio', '$time')");

					if ($resultado2){
    					$_SESSION['session_compra_error_message']="Compra realizada correctamente";
    					header("location:mis_compras.php");
					} else {
    					$_SESSION['session_compra_error_message']="ERROR al hacer la compra, vuelva a intentarlo en unos minutos";
    					header("location:mis_compras.php");
					}			
				}
			}
		} else {
			$_SESSION['session_compra_error_message']="Ya has adquirido este producto.";
    		header("location:mis_compras.php");
		}
}


?>


<?php
require_once('session.php'); 
date_default_timezone_set('America/El_Salvador');
////// Informacion enviada por el formulario /////
$mesp = $_POST['mesp'];
$idcliente = $_POST['idcliente'];
$ordenes=$_POST['ordenes'];
$fecha=date('Y-m-d');
$fecha2=date('Y-m-d H:i:s');
$idu=$_SESSION['idusuario'];


////// Fin informacion enviada por el formulario ///
require_once('config/conexion.php');
////////////// Actualizar la tabla /////////

$consulta = "insert into orden(idexamen,idcliente,fechaventa,fechaventa2,idusuario,idcontorden) 
values
(:mesp,:idcliente,:fecha,:fecha2,:idu,:ordenes)";

$sql = $pdo->prepare($consulta);

$sql->bindParam(':mesp', $mesp, PDO::PARAM_STR);
$sql->bindParam(':idcliente', $idcliente, PDO::PARAM_STR);
$sql->bindParam(':fecha', $fecha, PDO::PARAM_STR);
$sql->bindParam(':fecha2', $fecha2, PDO::PARAM_STR);
$sql->bindParam(':idu', $idu, PDO::PARAM_STR);
$sql->bindParam(':ordenes', $ordenes, PDO::PARAM_STR);

$sql->execute();


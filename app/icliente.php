<?php
session_start();
 date_default_timezone_set('America/El_Salvador');
////// Informacion enviada por el formulario /////
$nombre=$_POST['nombre'];
$fnacimiento=$_POST['fnacimiento'];
$tel=$_POST['tel'];
$correo=$_POST['correo'];
$obs=$_POST['obs'];
$edades = $_POST['edades'];
$fecha=date('Y-m-d');
$fecha2 = date('Y-m-d H:i:s');
////// Fin informacion enviada por el formulario ///
require_once('config/conexion.php');
////////////// Actualizar la tabla /////////

$consulta = "insert into cliente(nombrecliente,fechanacimiento,edadcliente,telefonocliente,correocliente,obscliente) 
values
(:nombre,:fnacimiento,:edades,:tel,:correo,:obs)";

$statement = $pdo->prepare("SELECT * FROM cliente order by idcliente DESC limit 0,1 ");
$statement->execute();
while ($resulte = $statement->fetch()) {
 $cli=$resulte->idcliente+1;
}

$consulta2 = "insert into contorden(idcliente,fechacontorden,fechacontorden2) 
values
(:cli,:fecha,:fecha2)";


$sql = $pdo->prepare($consulta);
$sql2 = $pdo->prepare($consulta2);

$sql->bindParam(':nombre',$nombre,PDO::PARAM_STR);
$sql->bindParam(':fnacimiento', $fnacimiento,PDO::PARAM_STR);
$sql->bindParam(':edades', $edades,PDO::PARAM_STR);
$sql->bindParam(':tel', $tel,PDO::PARAM_STR);
$sql->bindParam(':correo', $correo,PDO::PARAM_STR);
$sql->bindParam(':obs', $obs,PDO::PARAM_STR);

$sql2->bindParam(':cli', $cli, PDO::PARAM_STR);
$sql2->bindParam(':fecha', $fecha, PDO::PARAM_STR);
$sql2->bindParam(':fecha2', $fecha2, PDO::PARAM_STR);
 
$sql->execute();
$sql2->execute();
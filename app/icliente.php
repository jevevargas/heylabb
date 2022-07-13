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


////// Fin informacion enviada por el formulario ///
require_once('config/conexion.php');
////////////// Actualizar la tabla /////////

$consulta = "insert into cliente(nombrecliente,fechanacimiento,edadcliente,telefonocliente,correocliente,obscliente) 
values
(:nombre,:fnacimiento,:edades,:tel,:correo,:obs)";


$sql = $pdo->prepare($consulta);


$sql->bindParam(':nombre',$nombre,PDO::PARAM_STR);
$sql->bindParam(':fnacimiento', $fnacimiento,PDO::PARAM_STR);
$sql->bindParam(':edades', $edades,PDO::PARAM_STR);
$sql->bindParam(':tel', $tel,PDO::PARAM_STR);
$sql->bindParam(':correo', $correo,PDO::PARAM_STR);
$sql->bindParam(':obs', $obs,PDO::PARAM_STR);

 
$sql->execute();

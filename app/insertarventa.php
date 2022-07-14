<?php
session_start();
date_default_timezone_set('America/El_Salvador');
////// Informacion enviada por el formulario /////
$mesp = $_POST['mesp'];
$idcliente = $_POST['idcliente'];



////// Fin informacion enviada por el formulario ///
require_once('config/conexion.php');
////////////// Actualizar la tabla /////////

$consulta = "insert into orden(idexamen,idcliente) 
values
(:mesp,:idcliente)";

$sql = $pdo->prepare($consulta);

$sql->bindParam(':mesp', $mesp, PDO::PARAM_STR);
$sql->bindParam(':idcliente', $idcliente, PDO::PARAM_STR);

$sql->execute();


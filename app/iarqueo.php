<?php
error_reporting(0);
session_start();
 date_default_timezone_set('America/El_Salvador');
////// Informacion enviada por el formulario /////
$ctv=$_POST['ctv'];
$cincoctv=$_POST['cincoctv'];
$diesctv=$_POST['diesctv'];
$coractv=$_POST['coractv'];
$dolarctv=$_POST['dolarctv'];
$dolarbillete=$_POST['dolarbillete'];
$cincobillete=$_POST['cincobillete'];
$diesbillete=$_POST['diesbillete'];
$veitebillete=$_POST['veitebillete'];
$cincuentabillete=$_POST['cincuentabillete'];
$cienbillete=$_POST['cienbillete'];
$cheque=$_POST['cheque'];
$boucher=$_POST['boucher'];
$gastos=$_POST['gastos'];
$cuenta=$_POST['cuenta'];
$diabueno=date('Y-m-d');
$idu=$_POST['idusuario'];
$ventadia = $_POST['ventadia'];
$resultadoarqueo = $_POST['resultadoarqueo'];
$anio=date('Y');
$dia=date('d');

$total=$ventadia-$gastos;

$ctvr=$ctv*0.01;
$cincoctvr = $cincoctv * 0.05;
$diesctvr = $diesctv * 0.10;
$coractvr = $coractv * 0.25;
$dolarctvr = $dolarctv * 1.00;
$dolarbilleter = $dolarbillete * 1.00;
$cincobilleter = $cincobillete * 5.00;
$diesbilleter = $diesbillete * 10.00;
$veitebilleter = $veitebillete * 20.00;
$cincuentabilleter = $cincuentabillete * 50.00;
$cienbilleter = $cienbillete * 100.00;

$caja=($ctvr + $cincoctvr + $diesctvr + $coractvr + $dolarctvr + $dolarbilleter + $cincobilleter + $diesbilleter + $veitebilleter + $cincuentabilleter + $cienbilleter + $cheque + $boucher + $cuenta ) - $gastos;




////// Fin informacion enviada por el formulario ///
require('config/conexion.php');
////////////// Actualizar la tabla /////////

if($resultadoarqueo==$total){
    $consulta = "insert into arqueo(unctv,cincoctv,diesctv,veinticincoctv,dolarctv,dolarbillete,cincobillete,diesbillete,veintebillete,cincuentabillete,cienbillete,fechaarqueo,idusuario, cheques,depocito,boucher,gastos)
values
(:ctv,:cincoctv,:diesctv,:coractv,:dolarctv,:dolarbillete,:cincobillete,:diesbillete,:veitebillete,:cincuentabillete,:cienbillete,:diabueno,:idu,:cheque,:cuenta,:boucher,:gastos)";




    $sql = $pdo->prepare($consulta);


    $sql->bindParam(':ctv', $ctv, PDO::PARAM_STR);
    $sql->bindParam(':cincoctv', $cincoctv, PDO::PARAM_STR);
    $sql->bindParam(':diesctv', $diesctv, PDO::PARAM_STR);
    $sql->bindParam(':coractv', $coractv, PDO::PARAM_STR);
    $sql->bindParam(':dolarctv', $dolarctv, PDO::PARAM_STR);
    $sql->bindParam(':dolarbillete', $dolarbillete, PDO::PARAM_STR);
    $sql->bindParam(':cincobillete', $cincobillete, PDO::PARAM_STR);
    $sql->bindParam(':diesbillete', $diesbillete, PDO::PARAM_STR);
    $sql->bindParam(':veitebillete', $veitebillete, PDO::PARAM_STR);
    $sql->bindParam(':cincuentabillete', $cincuentabillete, PDO::PARAM_STR);
    $sql->bindParam(':cienbillete', $cienbillete, PDO::PARAM_STR);
    $sql->bindParam(':diabueno', $diabueno, PDO::PARAM_STR);
    $sql->bindParam(':idu', $idu, PDO::PARAM_INT);
    $sql->bindParam(':cheque', $cheque, PDO::PARAM_STR);
    $sql->bindParam(':cuenta', $cuenta, PDO::PARAM_STR);
    $sql->bindParam(':boucher', $boucher, PDO::PARAM_STR);
    $sql->bindParam(':gastos', $gastos, PDO::PARAM_STR);

    $sql->execute(); 
    echo 1;
}else{
    echo 0;
}

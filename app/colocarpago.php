  <?php
    date_default_timezone_set('America/El_Salvador');
    ////// Informacion enviada por el formulario /////
    $tipopago = $_POST['tipopago'];
    $clien = $_POST['clien'];

    ////// Fin informacion enviada por el formulario ///
    require_once('session.php');
    require_once('header.php');
    ////////////// Actualizar la tabla /////////
    $consulta = "UPDATE contorden
SET idmetodopago= :tipopago WHERE idcliente = :clien";


    $sql = $pdo->prepare($consulta);
    $sql->bindParam(':clien', $clien, PDO::PARAM_INT);
    $sql->bindParam(':tipopago', $tipopago, PDO::PARAM_STR);


    $sql->execute();


    ?>
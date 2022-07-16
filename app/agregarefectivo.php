  <?php
    date_default_timezone_set('America/El_Salvador');
    ////// Informacion enviada por el formulario /////
    $clien = $_POST['clien'];
    $rec = $_POST['rec'];
    $com = $_POST['com'];
    $totali = $_POST['totali'];

    ////// Fin informacion enviada por el formulario ///
    require_once('session.php');
    require_once('header.php');
    ////////////// Actualizar la tabla /////////
    $consulta = "UPDATE contorden
SET totalorden= :com, efectivo=:rec, cambio=:totali WHERE idcliente = :clien";


    $sql = $pdo->prepare($consulta);
    $sql->bindParam(':com', $com, PDO::PARAM_STR);
    $sql->bindParam(':rec', $rec, PDO::PARAM_STR);
    $sql->bindParam(':totali', $totali, PDO::PARAM_STR);
    $sql->bindParam(':clien', $clien, PDO::PARAM_STR);


    $sql->execute();


    ?>
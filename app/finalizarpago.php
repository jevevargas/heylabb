  <?php
    date_default_timezone_set('America/El_Salvador');
    ////// Informacion enviada por el formulario /////
    $terminarorden = $_POST['terminarorden'];
    $clien = $_POST['clien'];
    $estados='2';

    ////// Fin informacion enviada por el formulario ///
    require_once('session.php');
    require_once('header.php');
    ////////////// Actualizar la tabla /////////
    $consulta = "UPDATE contorden
    SET estadocontorden= :estados,idusuario=:idusuario WHERE idcontorden = :terminarorden";

    $consulta2 = "UPDATE orden
    SET procesado= :estados WHERE idcontorden = :terminarorden";

    $consulta3 = "UPDATE cliente
    SET atendido= :estados WHERE idcliente = :clien";



    $sql = $pdo->prepare($consulta);
    $sql2 = $pdo->prepare($consulta2);
    $sql3 = $pdo->prepare($consulta3);

    $sql->bindParam(':estados', $estados, PDO::PARAM_INT);
    $sql->bindParam(':terminarorden', $terminarorden, PDO::PARAM_STR);
    $sql->bindParam(':idusuario', $idusuario, PDO::PARAM_STR);

    $sql2->bindParam(':estados', $estados, PDO::PARAM_INT);
    $sql2->bindParam(':terminarorden', $terminarorden, PDO::PARAM_STR);

    $sql3->bindParam(':estados', $estados, PDO::PARAM_INT);
    $sql3->bindParam(':clien', $clien, PDO::PARAM_STR);


    $sql->execute();
    $sql2->execute();
    $sql3->execute();


    ?>
v <?php
    date_default_timezone_set('America/El_Salvador');
    ////// Informacion enviada por el formulario /////
    $idusuario = $_POST['idusuario'];
    $fechainicial = $_POST['fechainicial'];
    $fechafinal = $_POST['fechafinal'];
    $estado='1';
    ////// Fin informacion enviada por el formulario ///
    require_once('session.php');
    require_once('header.php');
    ////////////// Actualizar la tabla /////////
    $consulta = "UPDATE caja SET fechainicio= :fechainicial, fechafinal=:fechafinal, estadocaja=:estado WHERE idusuario = :idusuario";


    $sql = $pdo->prepare($consulta);
    $sql->bindParam(':fechainicial', $fechainicial, PDO::PARAM_STR);
    $sql->bindParam(':fechafinal', $fechafinal, PDO::PARAM_STR);
    $sql->bindParam(':estado', $estado, PDO::PARAM_STR);
    $sql->bindParam(':idusuario', $idusuario, PDO::PARAM_STR);

    $sql->execute();


    ?>
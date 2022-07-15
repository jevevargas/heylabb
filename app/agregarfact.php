  <?php
    date_default_timezone_set('America/El_Salvador');
    ////// Informacion enviada por el formulario /////
    $mesp = $_POST['mesp'];
    $clien = $_POST['clien'];

    ////// Fin informacion enviada por el formulario ///
    require_once('session.php');
    require_once('header.php');
    ////////////// Actualizar la tabla /////////
    $consulta = "UPDATE contorden
SET tipofact= :mesp WHERE idcliente = :clien";


    $sql = $pdo->prepare($consulta);
    $sql->bindParam(':clien', $clien, PDO::PARAM_INT);
    $sql->bindParam(':mesp', $mesp, PDO::PARAM_STR);
  

    $sql->execute();
   

    ?>
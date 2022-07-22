 <?php 

    $statement = $pdo->prepare("SELECT * FROM caja where idusuario='$idusuario' ");
    $statement->execute();
    while ($resultfecha = $statement->fetch()) {
      $inicio=$resultfecha->fechainicio;
        $final = $resultfecha->fechafinal;
        $estadocaja = $resultfecha->estadocaja;
        $caja = $resultfecha->caja;
    }
?>
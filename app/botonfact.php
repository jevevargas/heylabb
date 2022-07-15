 <?php $idcliente = $_REQUEST['idcliente']; //echo $idcliente;
    require_once('session.php');
    require_once('header.php');
    $statement = $pdo->prepare("SELECT * FROM  contorden where idcliente='$idcliente' AND estadocontorden='1' ");
    $statement->execute();
    while ($resulte = $statement->fetch()) {
        $orden = $resulte->tipofact;
    }

    if ($orden == 1) {
    ?>
     <a href="" class="btn btn-secondary"><i class='bx bx-printer' style='font-size:20px;'></i> Emitir factura</a>
 <?php
    } elseif ($orden == 2) {
    ?><a href="" class="btn btn-secondary"><i class='bx bx-receipt' style='font-size:20px;'></i> Emitir Ticket</a><?php
                                                                                                                } elseif ($orden == 3) {
                                                                                                                    ?><a href="" class="btn btn-secondary"><i class='bx bx-printer' style='font-size:20px;'></i> Enitir Credito fiscal</a>
 <?php
                                                                                                                } elseif ($orden == 4) {
    ?><a href="" class="btn btn-secondary"><i class='bx bx-printer' style='font-size:20px;'></i> Emitir Consumidor</a>
 <?php
                                                                                                                }
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once('session.php'); ?>
    <?php require_once('header.php'); ?>
    <title>Registrar Exámenes</title>
</head>

<body>
    <nav><?php require_once('menu.php');  ?></nav>
    <div class="col-12 ">
        <?php require_once('comercio.php');  ?>
    </div>


    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8 addcita m-2 p-4">
                <div class="col-md-12 border-bottom">
                    <p><b> <i class="bx bx-calculator" style='color:rgba(24,119,242,1); font-size:20px;'></i> Caja</b>

                    </p>
                </div>

                <div class="col-md-12  table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <td style="font-size:11px;"><b>#Orden</b></td>
                                <td style="font-size:11px;"><b>Cliente</b></td>
                                <td style="font-size:11px;"><b>Fecha</b></td>
                                <td style="font-size:11px;"><b>Metodo de pago</b></td>
                                <td style="font-size:11px;"><b>Tipo factura</b></td>
                                <td style="font-size:11px;"><b>Total</b></td>
                                <td style="font-size:11px;"><b>Efectivo</b></td>
                                <td style="font-size:11px;"><b>Cambio</b></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $tip = 0;
                            $statement = $pdo->prepare("SELECT * FROM contorden left join cliente on contorden.idcliente=cliente.idcliente left join metodopago on contorden.idmetodopago =metodopago.idmetodopago ");
                            $statement->execute();
                            while ($resulte = $statement->fetch()) {
                                $tipofact = $resulte->tipofact;
                                if ($tipofact == 1) {
                                    $tip = 'Factura';
                                } elseif ($tipofact == 2) {
                                    $tip = 'Recibo';
                                } elseif ($tipofact == 3) {
                                    $tip = 'Credito fiscal';
                                } elseif ($tipofact == 4) {
                                    $tip = 'Consumidor';
                                } elseif ($tipofact == '') {
                                    $tip = 'Sin especificar';
                                }
                            ?>
                                <tr>
                                    <td style="font-size:12px;">#<?php echo $resulte->idcontorden;  ?></td>
                                    <td style="font-size:12px;"><?php echo $resulte->nombrecliente;  ?></td>
                                    <td style="font-size:12px;"><?php echo $resulte->fechacontorden;  ?></td>
                                    <td style="font-size:12px;"><?php echo $resulte->metodo;  ?></td>
                                    <td style="font-size:12px;"><?php echo $tip;  ?></td>
                                    <td style="font-size:12px;"><i class='bx bx-dollar'></i><?php echo $resulte->totalorden;  ?></td>
                                    <td style="font-size:12px;"><i class='bx bx-dollar'></i><?php echo $resulte->efectivo;  ?></td>
                                    <td style="font-size:12px;"><i class='bx bx-dollar'></i><?php echo $resulte->cambio;  ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>




                </div>

            </div>

            <div class="col-md-3 addclient m-2 p-4">

            </div>
        </div>
    </div>










</body>
<?php require_once('foot.php'); ?>
<script src="js/examen.js"></script>

</html>
<?php
require_once('session.php');
require_once('header.php');
require_once('foot.php');
require_once('./consulta/fecha.php');

if ($estadocaja == 0) {
?>
<div class="col-md-12 mt-5 version">
    <center>
        <p class=""><b> Código de usuario <?php echo $idusuario; ?></b></p>
    </center>
</div>
<div class="col-md-12 mt-5">
    <center><img src="../img/caja.png" alt="" style="width:150px;"></center>
</div>
<div class="col-md-12">
    <h1 class="text-center"><span class="badge rounded-pill bg-danger"><i class="bi bi-exclamation-circle-fill"></i>
            Caja cerrada</span></h1>
</div>

<div class="col-md-12">
    <div class="row">
        <input type="text" value="<?php echo $idusuario;  ?>" id="idusuario" style="display:none">
        <div class="mt-4 col-4">
            <label for=""><b>Fecha de inicio de caja</b></label>
            <input type="datetime-local" class="form-control" id="fechainicial">
        </div>
        <div class="mt-4 col-4">
            <label for=""><b>Fecha de fin de caja</b> </label>
            <input type="datetime-local" class="form-control" id="fechafinal">
        </div>
        <div class="mt-4 col-4 pt-4">
            <button class="btn btn-primary" onclick="aperturar()">Aperturar caja</button>
        </div>
    </div>
</div>
<?php
} elseif ($estadocaja == 1) {
?>
<div class="col-md-12 border-bottom mb-2">
    <div class="row">
        <div class="col-md-4 pt-2">
            <p><b><i class="bi bi-check-circle-fill" style="color: #85B200;"></i> <?php echo $inicio; ?></b></p>
        </div>
        <div class="col-md-4 pt-2">
            <p><b><i class="bi bi-check-circle-fill" style="color: #D90000;"></i> <?php echo $final; ?></b></p>
        </div>
    </div>
</div>

<div class=" col-md-12 table-responsive">


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
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php
                $tip = 0;
                $total=0;

                $statement = $pdo->prepare("SELECT * FROM contorden left join cliente on contorden.idcliente=cliente.idcliente left join metodopago on contorden.idmetodopago =metodopago.idmetodopago where fechacontorden2  BETWEEN  '$inicio' AND '$final' ");
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

                    $estado = $resulte->estadocontorden;
                $total =+ $resulte->totalorden;
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
                <td style="font-size:12px;">
                    <?php
                      if ($estado == 1) {
                            ?><a href="examenes?id=<?php echo $resulte->idcliente; ?>" class="btn btn-danger btn-sm">$pagar</a><?php
                       } elseif ($estado == 2) {
                    ?><b> $ Pagado</b><?php
                       }
                    ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>




</div>
<?php
}
?>
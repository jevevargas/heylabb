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

    <?php require_once('./consulta/fecha.php');  ?>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8 addcita m-2 p-4">
                <div class="col-md-12 border-bottom">
                    <p><b> <i class="bx bx-calculator" style='color:rgba(24,119,242,1); font-size:20px;'></i> Caja (<?php echo $caja;  ?>)</b>
                    </p>
                </div>

                <div class="col-md-12" id="detallecaja"></div>
            </div>

            <div class="col-md-3 addclient m-2 p-4">
                <?php
                $tip = 0;
                $total = 0;

                $statement = $pdo->prepare("SELECT * FROM contorden left join cliente on contorden.idcliente=cliente.idcliente left join metodopago on contorden.idmetodopago =metodopago.idmetodopago where fechacontorden2  BETWEEN  '$inicio' AND '$final' AND idusuario='$idusuario' ");
                $statement->execute();
                while ($resulte = $statement->fetch()) {
                    $total = +$resulte->totalorden;
                }
                ?>
                <div class="col-md-12 bg-warning p-4">
                    <h1 class="text-center">$<?php echo number_format((float) $total, 2, '.', ''); ?></h1>
                </div>

                <input type="text" value="<?php echo $idusuario; ?>" style="display:none" id="idu">
                <input type="text" value="<?php echo number_format((float) $total, 2, '.', ''); ?>" style="display:none" id="total">
                <div class="col-md-12" id="detallearqueo">

                </div>



                <div class="col-md-12 mt-2"><button class="btn btn-danger w-100"><i class='bx bx-money-withdraw' style='font-size:20px;'></i> (-) Egresos de caja</button></div>

            </div>
        </div>
    </div>









</body>
<?php require_once('foot.php'); ?>
<script src="js/examen.js"></script>


</html>
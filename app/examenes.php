<?php $id = $_GET['id']; //echo $id; 
?>
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

    <?php
    $statement = $pdo->prepare("SELECT * FROM cliente where idcliente='$id'");
    $statement->execute();
    while ($result = $statement->fetch()) {
        $nombre = $result->nombrecliente;
        $idcliente = $result->idcliente;
    }
    ?>

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-7 addclient m-2 p-4">
                <div class="col-md-12 border-bottom">
                    <p><b> <i class="bi bi-plus-circle-fill" style="color:rgba(24,119,242,1)"></i> Agregar exámen</b>
                    </p>
                </div>

                <div class="col-md-12 exam border-bottom">
                    <!-- <form id="idform"> -->
                    <div class="row">

                        <input type="text" value="<?php echo $id; ?>" id="idcliente" style="display:none">

                        <?php

                        $statement = $pdo->prepare("SELECT * FROM contorden WHERE idcliente='$id'  ");
                        $statement->execute();
                        while ($resultor = $statement->fetch()) {
                            $ordenes = $resultor->idcontorden;
                        }

                        $statement = $pdo->prepare("SELECT * FROM examen where tipoexamen='1' ");
                        $statement->execute();
                        while ($resulte = $statement->fetch()) {
                        ?>
                            <input type="text" value="<?php echo $ordenes; ?>" id="ordenes" style="display:none">

                            <div class="col-md-3 p-2">
                                <div class="form-check">
                                    <input class="form-check-input get_value" type="checkbox" value="<?php echo $resulte->idexamen; ?>" id="asis" name="asis[]">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        <?php echo $resulte->examen; ?>
                                        <i class="bi bi-currency-dollar"></i><?php echo $resulte->costoexamen; ?></label>
                                    <span id="mesp<?php echo $resulte->idexamen; ?>" style="display:none"><?php echo $resulte->idexamen; ?></span>
                                </div>
                            </div>

                        <?php } ?>

                    </div>



                </div>
                <div class="col-md-12 exam">
                    <div class="col-md-12 mt-2">
                        <p><b><i class='bx bxs-bong' style='font-size:25px;color:rgba(24,119,242,1);'></i> Paquetes</b>
                        </p>
                    </div>
                    <div class="col-md-12">
                        <div class="row">

                            <input type="text" value="<?php echo $id; ?>" id="idcliente" style="display:none">
                            <?php
                            $statement = $pdo->prepare("SELECT * FROM examen where tipoexamen='2' ");
                            $statement->execute();
                            while ($resulte = $statement->fetch()) {
                            ?>

                                <div class="col-md-3 p-2">
                                    <div class="form-check">
                                        <input class="form-check-input get_value" type="checkbox" value="<?php echo $resulte->idexamen; ?>" id="asis" name="asis[]">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            <b><?php echo $resulte->examen; ?></b>
                                        </label>
                                        <span id="mesp<?php echo $resulte->idexamen; ?>" style="display:none"><?php echo $resulte->idexamen; ?></span>
                                    </div>
                                </div>

                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 addclient m-2 p-4">
                <div class="col-md-12 border-bottom">
                    <h5><i class='bx bx-user-check' style='font-size:25px;'></i> <?php echo $nombre; ?> - Cod
                        <?php echo $idcliente; ?></h5>
                </div>
                <div class="col-md-12 p-2" id="tablaventa"></div>
            </div>
        </div>
    </div>










</body>
<?php require_once('foot.php'); ?>
<script src="js/examen.js"></script>

</html>
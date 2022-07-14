<div class="col-md-12 crollcaja   border-bottom p-2">
    <?php
    $idcliente = $_REQUEST['idcliente'];
    require_once('session.php');
    require_once('header.php');
    $orden = 0;
    $statement = $pdo->prepare("SELECT * FROM orden left join examen on orden.idexamen=examen.idexamen where idcliente='$idcliente' ");
    $statement->execute();
    while ($resulte = $statement->fetch()) {

    ?>

        <div class="card w1-100 mt-2 borderl">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mt-2"><b><?php echo $resulte->examen; ?></b></div>
                    <div class="col-md-3 mt-2"><i class="bi bi-currency-dollar"></i><?php echo $resulte->costoexamen; ?>
                    </div>
                    <div class="col-md-3"><button class="btn btndelete"><i class="bi bi-x-circle-fill"></i></button></div>
                </div>
            </div>
        </div>

    <?php
        $orden += $resulte->costoexamen;
    }
    ?>
</div>

<div class="col-md-12">
    <div class="row">
        <div class="col-md-6 mt-4  bg-warning text-dark pt-3">
            <h1 class="text-center"><i class="bi bi-currency-dollar"></i><?php
                echo number_format((float)$orden, 2, '.', '');
                ?>
            </h1>
        </div>
        <div class="col-md-6 mt-4">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#terminar">Finalizar facturacion</button>
            <button class="btn btn-danger mt-1">Declinar facturacion</button>
        </div>
    </div>
</div>
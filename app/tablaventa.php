<div class="col-md-12 crollcaja   border-bottom p-2">
    <?php
    $idcliente = $_REQUEST['idcliente'];
    require_once('session.php');
    require_once('header.php');
    $orden = 0;
    $statement = $pdo->prepare("SELECT * FROM orden left join examen on orden.idexamen=examen.idexamen where idcliente='$idcliente' AND estadoorden='1' ");
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
            <h1 class="text-center"><i class="bi bi-currency-dollar"></i>
                <?php echo number_format((float)$orden, 2, '.', ''); ?>
            </h1>
        </div>
        <div class="col-md-6 mt-4 d-grid gap-2">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#terminar">Proceso de pago</button>
            <button class="btn btn-danger mt-1">Declinar facturacion</button>
        </div>
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="terminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Terminar el proceso de pago</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="text" value="<?php echo $idcliente; ?>" id="clien" style="display:none">
                    <div class="col-md-8 border-end">
                        <div class="col-md-12 p-2">
                            <p><b><i class="bi bi-check-circle-fill  text-primary"></i> Tipo de facturación (Paso 2)</b></p>
                        </div>
                        <div class="col-md-12">
                            <div class="row">

                                <div class="form-check col-3">
                                    <input class="form-check-input fact" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Recibo
                                    </label>
                                </div>
                                <div class="form-check col-3">
                                    <input class="form-check-input fact" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="2">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Ticket
                                    </label>
                                </div>
                                <div class="form-check col-3">
                                    <input class="form-check-input fact" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="3">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Fiscal
                                    </label>
                                </div>
                                <div class="form-check col-3">
                                    <input class="form-check-input fact" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="4">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Consumidor
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-12 mt-4 border-top p-2">
                            <p><b> <i class="bi bi-check-circle-fill text-primary"></i> Método de pago Paso(3)</b></p>
                        </div>
                        <div class="col-md-6">

                            <select name="tipopago" id="tipopago" class="form-control" onchange="getval(this);">
                                <?php
                                $statement = $pdo->prepare("SELECT * FROM metodopago ");
                                $statement->execute();
                                while ($resumetodo = $statement->fetch()) {
                                ?>
                                    <option value="<?php echo $resumetodo->idmetodo ?>"><?php echo $resumetodo->metodo ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-12 mt-4 " id="botonfact"></div>


                    </div>

                    <div class="col-md-4">
                        <p><b>Paso (1)</b></p>
                        <div class="input-group col-md-12">
                            <input type="text" value="<?php echo number_format((float)$orden, 2, '.', ''); ?>" class="form-control border-primary" readonly id="total">
                        </div>
                        <div class="col-md-12 mt-3">
                            <label for="">Cantidad recibida</label>
                            <input type="text" class="form-control" id="efectivo" autofocus="autofocus">
                        </div>
                        <div class="col-md-12 mt-3">
                            <label for="">Cambio</label>
                            <input type="text" class="form-control" id="cambio" autofocus="autofocus">
                        </div>
                        <div class="col-md-12 mt-3">
                            <center><button class="btn btn-primary">Finalizar facturación</button></center>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<script class="js/examen.js"></script>
<script>
    $(document).ready(function() {
        $("#efectivo").on("keyup change", function() {
            var rec = $("#efectivo").val();
            var com = $("#total").val();
            var clien = $("#clien").val();

            console.log(clien);

            if (rec > 0) {
                //var totalprp = com * 0.1;
                var total = rec - com;
                //var fin = sum + totalprp;
                var totali = parseFloat(parseFloat(total).toFixed(2));
                $("#cambio").val(totali);
            } else {
                $("#cambio").val(0);
            }

            $.ajax({
                url: "agregarefectivo.php", // Es importante que la ruta sea correcta si no, no se va a ejecutar
                method: "POST",
                data: {
                    clien: clien,
                    rec: rec,
                    com: com,
                    totali: totali


                },
                beforeSend: function() {},
                success: function() {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true,
                        onOpen: toast => {
                            toast.addEventListener("mouseenter", Swal.stopTimer);
                            toast.addEventListener("mouseleave", Swal.resumeTimer);
                        },
                    });

                    Toast.fire({
                        icon: "success",
                        title: "Tipo de pago agregado",
                    });
                },
            });


        });
    });
</script>
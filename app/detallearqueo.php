    <?php
    require_once('header.php');

    $idusuario = $_REQUEST['idu']; //echo $idusuario;

    $statement = $pdo->prepare("SELECT * FROM arqueo WHERE idusuario='$idusuario' order by idarqueo DESC limit 0,1 ");
    $statement->execute();
    while ($resulte = $statement->fetch()) {
        $estado = $resulte->estadoarqueo;  //echo $estado;
    }

    if ($estado == 0) {
    ?>
        <div class="col-md-12">
            <button type="button" class="btn btn-primary w-100 mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="bi bi-cash-coin"></i> Ingresar arqueo
            </button>
        </div>
    <?php
    }elseif($estado == 1){
       ?> 
       <div class="col-md-12 mt-2">
        <button class="btn btn-success w-100">Imprimir corte</button>
       </div>
       <?php
    }
    ?>



    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Arqueos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 border-end">
                            <div class="col-md-12">
                                <h5 class="text-center"><i class="bi bi-coin"></i> MONEDAS</h5>
                            </div>
                            <hr>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6 form-group"><input type="text" class="form-control amt" id="ctv" placeholder="$0.01"></div>
                                    <div class="col-md-6 form-group"><input type="text" class="form-control amt" id="cincoctv" placeholder="$0.05"></div>
                                    <div class="col-md-6 form-group mt-2"><input type="text" class="form-control amt" id="diesctv" placeholder="$0.10"></div>
                                    <div class="col-md-6 form-group mt-2"><input type="text" class="form-control amt" id="coractv" placeholder="$0.25"></div>
                                    <div class="col-md-6 form-group mt-2"><input type="text" class="form-control amt" id="dolarctv" placeholder="$1.00"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="col-md-12">
                                <h5 class="text-center"><i class="bi bi-cash-stack"></i> BILLETE</h5>
                            </div>
                            <hr>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6 form-group"><input type="text" class="form-control amt" id="dolarbillete" placeholder="$1.00"></div>
                                    <div class="col-md-6 form-group"><input type="text" class="form-control amt" id="cincobillete" placeholder="$5.00"></div>
                                    <div class="col-md-6 form-group mt-2"><input type="text" class="form-control amt" id="diesbillete" placeholder="$10.00"></div>
                                    <div class="col-md-6 form-group mt-2"><input type="text" class="form-control amt" id="veitebillete" placeholder="$20.00"></div>
                                    <div class="col-md-6 form-group mt-2"><input type="text" class="form-control amt" id="cincuentabillete" placeholder="$50.00"></div>
                                    <div class="col-md-6 form-group mt-2"><input type="text" class="form-control amt" id="cienbillete" placeholder="$100.00"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mt-2">
                            <div class="row">

                                <hr>
                                <div class="col-md-12">
                                    <h5 class="text-center">OTROS</h5>
                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3 form-group"><input type="text" class="form-control amt" id="cheque" placeholder="CHEQUE"></div>
                                        <div class="col-md-3 form-group"><input type="text" class="form-control amt" id="cuenta" placeholder="DEPOSITO A CUENTA"></div>
                                        <div class="col-md-4 form-group"><input type="text" class="form-control amt" id="boucher" placeholder="BOUCHER PAGO TARJETA"></div>
                                        <div class="col-md-2 form-group"><input type="text" class="form-control amt" id="gastos" placeholder="GASTOS"></div>
                                        <input type="text" id="idusuario" value="<?php $idusuario = $_REQUEST['idu'];
                                                                                    echo $idusuario; ?>" style="display:none">
                                    </div>
                                </div>
                            </div>
                        </div>



                        <input type="text" value="<?php $total = $_REQUEST['total'];
                                                    echo number_format((float) $total, 2, '.', ''); ?>" id="ventadia" style="display:none">
                        <center>
                            <div class="form-group col-md-4 mt-3 p-2">
                                <input type="text" id="resultadoarqueo" class="form-control bg-primary text-wrap" readonly style="color: #e3f2fd;">

                            </div>
                        </center>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="guardararqueo()"><i class='bx bxs-save' style='font-size:20px;'></i> Guardar</button>
                </div>
            </div>
        </div>
    </div>



    <script src="js/caja.js"></script>
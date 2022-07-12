<?php require_once('session.php');  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once('header.php');  ?>
    <title>Bienvenido</title>
</head>
<body>
    <nav><?php require_once('menu.php');  ?></nav>

  <div class="col-12">
    <div class="row">

        <div class="col-md-1 p-2">
          <button class="btn btn-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i class='bx bx-menu'></i> Menú</button>
        </div>
        <div class="col-md-6 p-3"><h5>HeyLab! (<?php echo $nombrecompleto; ?>)</h5></div>


    </div>
  </div>
    <?php 
    if($idtipousuario=='1')
    {
        ?>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-8 addclient m-2 p-4">
                    <div class="row">

                        <div class="col-12 border-bottom">
                           <h5><i class="bi bi-plus-circle-fill" style="color:rgba(24,119,242,1)"></i> Agregar el registro del cliente</h5>
                        </div>

                        <div class="col-4 mt-4">
                            <label for="">Nombre completo</label>
                            <input type="text" class="form-control" id="nombre">
                        </div>
                        <div class="col-3 mt-4">
                            <label for="">Fecha de nacimiento</label>
                            <input type="date" class="form-control" id="fnacimiento">
                        </div>
                        <div class="col-2 mt-4">
                            <label for="">Edad</label>
                            <input type="number" class="form-control" id="edad">
                        </div>
                        <div class="col-3 mt-4">
                            <label for="">Teléfono</label>
                            <input type="number" class="form-control" id="tel" >
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">Correo</label>
                            <input type="text" class="form-control" id="correo" >
                        </div>
                        <div class="col-6 mt-3">
                            <label for="">Observación</label>
                            <input type="text" class="form-control" id="correo" >
                        </div>
                        <div class="col-12 mt-3">
                            <center><button class="btn btn-primary" onclick="addclient()">Registrar cliente</button></center>
                        </div>

                    </div>

                    <div class="col-md-12 addclient mt-5">
                        <div class="col-12 border-bottom">
                           <h5> Exámenes <span class="badge rounded-pill bg-warning text-dark"><i class="bi bi-check-circle-fill" style="color:#000;"></i> listos</span></h5>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                        <div class="col-12 border-bottom">
                           <h5> </h5>
                        </div>
                </div>


            </div>

        </div>

        
    <?php
    }
    ?>
   


    
</body>
<?php require_once('foot.php');  ?>
<script src="js/addclient.js"></script>
</html>
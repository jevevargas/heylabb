<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app/css/bootstrap.css">
    <link rel="stylesheet" href="app/css/style.css">
    <title>Bienvenidos a HEYCLINIC!</title>
</head>
<body class="m-0 vh-100 row justify-content-center align-items-center">

<div class="carga" id="carga"  style="display:none">
    <img src="img/cargando.gif" alt="">
</div>

    <div class="col-md-6 ingresar">
        <div class="row">
            <div class="col-6 col-xs-12">
              <img src="img/login.jpg" alt="Imagen login" style="width:100%">
            </div>

            <div class="col-6 col-xs-12 p-4">
              <div class="col-12"><h1 class="text-center tt">HEYLAB!</h1></div>

              <div class="col-12 mt-4">
                <input type="text" class="form-control" placeholder="Usuario" id="usuario" autofocus>
              </div>

              <div class="col-12 mt-3">
                <input type="password" class="form-control" placeholder="Clave" id="clave">
              </div>

              <div class="col-12 mt-3 d-grid"><button class="btn btn-primary btn-block" onclick="entrar()">Ingresar</button></div>

              <div class="alert alert-danger alert-dismissible fade show col-md-12 mt-3" role="alert" id="alertlogin2" style="display:none">
                La clave o usuario es incorrecto
              </div>

              <div class="col mt-4 version"><p class="text-center"><b>Version 1.0</b></p></div>
            </div>


        </div>
    </div>
</body>

<script src="app/css/boostrap.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="app/js/login.js"></script>
</html>
<?php  $id=$_GET['id']; //echo $id; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php  require_once('session.php'); ?>
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
        <div class="col-md-7 addclient m-2 p-4">
           <div class="col-md-12 border-bottom"><p><b> <i class="bi bi-plus-circle-fill"  style="color:rgba(24,119,242,1)"></i> Agregar exámen</b></p></div>
        </div>

        <div class="col-md-5">

        </div>
    </div>
</div>



</body>
<?php   require_once('foot.php'); ?>
</html>
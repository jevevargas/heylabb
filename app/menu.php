<?php require_once('session.php'); ?>


<div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Menu de navegacion</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <a href="index" class="btn btn-warning w-100"><i class="bi bi-house"></i> Inicio</a>
    <?php

    date_default_timezone_set('America/El_Salvador');
    $estado = $pdo->prepare(" SELECT * FROM  detallemenu LEFT JOIN menu ON detallemenu.idmenu = menu.idmenu WHERE idusuario='$idusuario' ");
    $estado->execute();
    while ($resultestado = $estado->fetch()) {


    ?>
      <a href="<?php echo $resultestado->link;  ?>" class="btn btn-light w-100 mt-2"><?php echo $resultestado->icono;  ?><b> <?php echo $resultestado->menu;  ?></b></a>
    <?php  } ?>


    <hr>
    <a href="salir" class="btn btn-danger w-100 p-6"><i class="bi bi-power"></i> Salir del sistema</a>
  </div>
</div>
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasWithBackdrop" aria-labelledby="offcanvasWithBackdropLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasWithBackdropLabel">Offcanvas with backdrop</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>

</div>
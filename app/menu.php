
<?php require_once('session.php'); ?>

<?php
if($idusuario==1){
?>
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Menu de navegacion</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      
      <a href="index" class="btn btn-primary" ><i class="bi bi-house"></i> Inicio</a>
      <a href="salir" class="btn btn-primary" ><i class="bi bi-toggle-off"></i> Salir del sistema</a>
    </div>
  </div>
  <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasWithBackdrop" aria-labelledby="offcanvasWithBackdropLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasWithBackdropLabel">Offcanvas with backdrop</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    
  </div>
<?php
}
?>


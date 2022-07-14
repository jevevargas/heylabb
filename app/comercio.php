<?php
 require_once('session.php');
 require_once('header.php');
?>
<div class="row">

        <div class="col-md-1 p-2">
          <button class="btn btn-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i class='bx bx-menu'></i> Menú</button>
        </div>
        <div class="col-md-6 p-3"><h5>HeyLab! (<?php echo $nombrecompleto; ?>)</h5></div>
        <?php
        $statement = $pdo->prepare("SELECT * FROM usuario left join comercio on usuario.idcomercio=comercio.idcomercio WHERE usuario.idcomercio='$idcomercio' AND usuario.idusuario='$idusuario'  ");
        $statement->execute();
        while ($resulte = $statement->fetch()) {
        ?>
            <div class="col-md-5 d-flex flex-row-reverse bd-highlight p-3"><span class="badge rounded-pill bg-warning text-dark pt-2" ><i class='bx bxs-flask'></i>Comercio <?php echo $resulte->comercio;  ?></span></div>
        <?php } ?>
    </div>


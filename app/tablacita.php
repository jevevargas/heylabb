<?php
 require_once('session.php');
 require_once('header.php');
$statement = $pdo->prepare("SELECT * FROM cliente  ");
$statement->execute();
while ($resulte = $statement->fetch()) {
?>
<div class="card w-100 mt-2" >
  <div class="card-body">
    <div class="row">
        <div class="col-md-3 p-1 circulo border-end"><h3 class="text-center"> <?php echo $letra=(substr($resulte->nombrecliente,0,1));  ?></h3></div>
        <div class="col-md-9 p-2"><a href="examenes?id=<?php  echo $resulte->idcliente; ?>" class="btn"><b><?php echo $resulte->nombrecliente  ?></b></a></div>
    </div> 
  </div>
</div>
<?php } ?>
<?php
require_once('config/conexion.php');
$statement = $pdo->prepare("SELECT * FROM orden left join cliente on orden.idcliente=cliente.idcliente left join examen on orden.idexamen=examen.idexamen where procesado ='2' ");
$statement->execute();
while ($resumetodo = $statement->fetch()) {
    $estado = $resumetodo->procesado;
    if ($estado == 1) {
        $msj = '<i class="bi bi-circle-fill" style="color:#D93600;"></i>';
    }
?>
    <tr>
        <td style="font-size:12px;"><?php echo $resumetodo->idorden;  ?></td>
        <td style="font-size:12px;"><?php echo $resumetodo->nombrecliente;  ?></td>
        <td style="font-size:12px;"><?php echo $resumetodo->examen;  ?></td>
        <td style="font-size:12px;">
            <center><?php echo $msj;  ?></center>
        </td>
        <td style="font-size:12px;"></td>

    </tr>
<?php } ?>
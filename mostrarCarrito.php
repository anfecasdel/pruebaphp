<?php
include "global/conexion.php";
include "templates/cabecera.php";

?>

<br>
<h3>Lista de Carrito</h3>
<?php $consulta =$enlace->query("SELECT * FROM carro");
$resultado = $consulta->num_rows;
 if($resultado > 0){?>
<table class="table table-bordered">
    <tbody>
        <tr>
            <th width="40%">Nombre</th>
            <th width="15%" class="text-center">Cantidad</th>
            <th width="20%" class="text-center">Precio</th>
            <th width="20%" class="text-center">Total</th>
            <th width="5%">--</th>
        </tr>

        <?php 
        $total=0;
            $consulta = "SELECT * FROM carro";
            $resultado = mysqli_query($enlace, $consulta);
            while ($rows = mysqli_fetch_assoc($resultado)) {?>
        <tr>
            <td width="40%"><?php echo $rows['nombre']?></th>
            <td width="15%" class="text-center"><?php echo $rows['cantidad'];?></th>
            <td width="20%" class="text-center">$<?php echo $rows['precio'];?></th>
            <td width="20%" class="text-center">$<?php echo number_format($rows['cantidad']*$rows['precio']);?></th>
            <td width="5%">
            <form action="carrito.php" method="post">
            <input type="hidden" name="idcarro" id="id" value="<?php echo $rows['id']?>">
                <button class="btn btn-danger" type="submit" name="btnAccion" value=Eliminar>Eliminar</button></td>
            </form>
        </tr>
        <?php
        $total=$total+($rows['cantidad']*$rows['precio']);
         }?>
        <tr>
            <td colspan="3" align="right"><h3>Total</h3></td>
            <td align="right"><h3>$<?php echo number_format($total,2);?></h3></td>
            <td></td>
        </tr> 
    </tbody>
</table>
<?php }else {?>

    <div class="alert alert-success" role="alert">
        No hay productos en el carrito
    </div>
<?php }?>
<?php
include "templates/pie.php"
?>
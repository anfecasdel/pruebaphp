<?php
include "global/conexion.php";
include "templates/cabecera.php";
?>

    <div class="container">

        <div class="row">
        <?php
            $consulta = "SELECT * FROM productos";
            $resultado = mysqli_query($enlace, $consulta);
            while ($rows = mysqli_fetch_assoc($resultado)) {
    ?>
            <div class="col-3">
                <div class="card">
                    <img
                    src="<?php echo $rows['imagen']; ?>"
                    alt="<?php echo $rows['nombre']; ?>"
                    title="<?php echo $rows['nombre']; ?>"
                    class="card-img-top"
                    data-toggle="popover"
                    data-trigger="hover"
                    data-content="<?php echo $rows['descripcion'];?>"
                    height="300px">
                    <div class="card-body">
                        <span><?php echo $rows['nombre']; ?></span>
                        <h5 class="card-title"><?php echo $rows['precio']; ?></h5>

                        <form action="carrito.php" method="post">
                        <input type="text" name="id" id="id" value="<?php echo $rows['id'];?>">
                        <input type="text" name="nombre" id="nombre" value="<?php echo $rows['nombre'];?>">
                        <input type="number" name="cantidad" id="cantidad" placeholder="Cantidad">
                        <input type="text" name="precio" id="precio" value="<?php echo $rows['precio'];?>">
                        
                        <button class="btn btn-primary" type="submit" name="btnAccion" value="Agregar">Agregar al carrito</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php }
?>
        </div>
    </div>
<script>
$(function () {
  $('[data-toggle="popover"]').popover()
})
</script>
<?php
include "templates/pie.php"
?>
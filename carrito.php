<?php

include "global/conexion.php";

if (isset($_POST['btnAccion'])) {

    switch ($_POST['btnAccion']) {

        case 'Agregar':

            
            $ID = $_POST['id'];
            $NOMBRE = $_POST['nombre'];
            $CANTIDAD = $_POST['cantidad'];
            $PRECIO = $_POST['precio'];
            $sqlproyecto = $enlace->query("insert into carro values('','$ID','$NOMBRE','$CANTIDAD','$PRECIO')") || die("Error carro");

            ?>
			<script>
			alert('Se elimino correctamente');
			window.location.href='mostrarCarrito.php';
			</script>
            <?php
            
            break;

        case 'Eliminar':

            $ID = $_POST['idcarro'];

            $consulta = $enlace->query("DELETE FROM carro WHERE id = '$ID';");

            ?>
			<script>
			alert('Se elimino correctamente');
			window.location.href='mostrarCarrito.php';
			</script>
            <?php
            break;
    }
}

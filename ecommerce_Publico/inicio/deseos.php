<?php 
include '../extend/header.php';

// Verifica si la sesión contiene el valor de 'correo_user' antes de utilizarlo
if (isset($_SESSION['correo_user'])) {
    $correo = $_SESSION['correo_user'];
    
    // Preparar y ejecutar la consulta de los deseos
    $sel_des = $con->prepare("SELECT * FROM deseos WHERE correo = ? ORDER BY id DESC ");
    $sel_des->execute(array($correo));

    ?>
    <div class="container" style="margin-top: 3%;">
        <h2>Lista de deseos</h2>
        <div class="row">
            <?php 
            // Prepara la consulta para obtener datos del inventario
            $sel = $con->prepare("SELECT foto, precio, producto, clave FROM inventario WHERE clave = ? ");

            // Itera sobre los resultados de deseos y ejecuta la consulta del inventario
            while ($f_des = $sel_des->fetch()) {
                $clave_producto = $f_des['clave_producto'];
                $sel->execute(array($clave_producto));

                if ($f = $sel->fetch()) { ?>
                    <div class="col-md-6 col-sm-12 col-lg-3">
                        <div class="card" style="margin-top: 1%;">
                            <img class="card-img-top" src="/ecommerce2/ecommerce_fase1/admin/<?php echo $f['foto'] ?>" width="200" height="200">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo htmlspecialchars($f['producto']) ?></h4>
                                <p class="card-text"><?php echo "$". number_format($f['precio'], 2) ?></p>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal_mas" value="<?php echo htmlspecialchars($f['clave']) ?>" onclick="modal(this.value)">Ver más...</button>
                                <button class="btn btn-danger text-white float-right" onclick="enviar(this.value)" value="<?php echo htmlspecialchars($f['clave']) ?>"><i class="fa fa-heart"></i></button>
                            </div>
                        </div>
                    </div>
                <?php }
            }

            // Cierra las consultas y conexiones
            $sel_des = null;
            $sel = null;
            $con = null;
            ?>
        </div>
    </div>
    <?php
} else {
    // Redirige al usuario o muestra un mensaje si no está definido 'correo_user'
    echo "<p>Error: No se ha iniciado sesión. Por favor, inicia sesión para ver tu lista de deseos.</p>";
}

include '../extend/footer.php';
?>
</body>
</html>

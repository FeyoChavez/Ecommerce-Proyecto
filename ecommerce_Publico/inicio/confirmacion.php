<?php 
include '../extend/header.php';
include '../extend/alertas.php';

$correo = $_SESSION['correo_user'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($_POST as $campo => $valor) {
        // Escapa los valores enviados y crea las variables dinámicamente
        $variable = "$" . $campo . "='" . htmlentities($valor, ENT_QUOTES, 'UTF-8') . "';";
        eval($variable);
    }

    // Verifica que todas las variables necesarias estén definidas
    if (isset($calle, $colonia, $cp, $estado, $pais, $nombre)) {
        // Construye la dirección
        $direccion = $calle . ' ' . $colonia . ' ' . $cp . ' ' . $estado . ', ' . $pais;

        // Prepara y ejecuta la consulta para actualizar la dirección
        $up = $con->prepare("UPDATE compras SET direccion = :direccion, nombre = :nombre WHERE correo_usuario = :correo AND estatus_compra = 'AGREGADO'");
        $up->bindparam(':direccion', $direccion);
        $up->bindparam(':nombre', $nombre);
        $up->bindparam(':correo', $correo);

        if ($up->execute()) {
            echo alerta('La dirección de envío ha sido actualizada', 'carrito.php');
        } else {
            echo alerta('La dirección de envío no pudo ser actualizada', 'carrito.php');
        }

        $up = null;
        $con = null;
    } else {
        echo alerta('Faltan datos obligatorios para completar la actualización', 'carrito.php');
    }
} else {
    echo alerta('Utiliza el formulario', 'carrito.php');
}
?>

<div class="container" style="margin-top: 1%;">
    <div class="card text-white bg-secondary">
        <div class="card-header">
            <h4 class="card-title">Total de compra <?php echo "$" . number_format($total, 2); ?></h4>
        </div>
        <div class="card-body">
            <form action="../comprar_paypal.php" method="post">
                <input type="hidden" name="total" value="<?php echo $total; ?>">
                <input type="submit" class="btn btn-primary" value="Pagar">
            </form>
        </div>
    </div>
</div>

<?php include '../extend/footer.php'; ?>
</body>
</html>

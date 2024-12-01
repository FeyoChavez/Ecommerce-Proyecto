<?php 
include '../conexion/conexion.php';
$correo = $_SESSION['correo_user'];

use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;

require __DIR__ . '/../bootstrap.php';

if (isset($_GET['aprobado']) && $_GET['aprobado'] == 'true') {
    if (isset($_GET['paymentId'], $_GET['PayerID'])) {
        $paymentId = $_GET['paymentId'];
        $payerId = $_GET['PayerID'];
    } else {
        header("Location:../mensajes/cancelado.php");
        exit();
    }

    try {
        $payment = Payment::get($paymentId, $apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);
        $payment->execute($execution, $apiContext);
    } catch (Exception $e) {
        error_log("Error ejecutando el pago: " . $e->getMessage());
        header("Location:../mensajes/cancelado.php");
        exit();
    }

    $sel_inv = $con->prepare("SELECT cantidad FROM inventario WHERE clave = ? ");
    $up_inv = $con->prepare("UPDATE inventario SET cantidad = :resta WHERE clave = :clave_producto ");
    $sel = $con->prepare("SELECT clave_producto, cantidad FROM compras WHERE correo_usuario = ? AND estatus_compra = 'AGREGADO' ");
    $sel->execute(array($correo));

    while ($f = $sel->fetch()) { 
        $clave_producto = $f['clave_producto'];
        $cantidad = $f['cantidad'];

        $sel_inv->execute(array($clave_producto));
        if ($f_inv = $sel_inv->fetch()) {
            $resta = $f_inv['cantidad'] - $cantidad;
        }

        if ($resta >= 0) {
            $up_inv->bindparam(':resta', $resta);
            $up_inv->bindparam(':clave_producto', $clave_producto);
            $up_inv->execute();
        } else {
            error_log("Error: Inventario insuficiente para el producto $clave_producto.");
        }
    }

    $fecha = date('Y-m-d');
    $up = $con->prepare("UPDATE compras SET estatus_envio = 'POR ENVIAR', estatus_compra = 'COMPRADO', fecha = :fecha WHERE correo_usuario = :correo AND estatus_compra = 'AGREGADO'");
    $up->bindparam(':fecha', $fecha);
    $up->bindparam(':correo', $correo);
    
    if ($up->execute()) {
        header("Location:../inicio/compras.php");
        exit();
    }
} else {
    header("Location:../mensajes/cancelado.php");
    exit();
}
?>

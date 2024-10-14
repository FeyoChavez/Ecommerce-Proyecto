<?php 
include '../extend/headerphp.php';
include '../extend/alertas.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $clave = htmlentities($_POST['clave']);
    $producto = htmlentities($_POST['producto']);
    $cantidad = htmlentities($_POST['cantidad']);
    $precio = htmlentities($_POST['precio']);
    $categoria = htmlentities($_POST['categoria']);
    $descripcion = htmlentities($_POST['descripcion']);

    // Redimensionar y validar imagen
    $ruta = $_FILES['imagen']['tmp_name'];
    $imagen = $_FILES['imagen']['name'];

    if ($ruta != '') {
        $ancho = 500;
        $alto = 400;
        $info = pathinfo($imagen);
        $tamano = getimagesize($ruta);
        $width = $tamano[0];
        $height = $tamano[1];

        if ($info['extension'] == 'jpg' || $info['extension'] == 'JPG' || $info['extension'] == 'jpeg' || $info['extension'] == 'JPEG') {
            $imagenvieja = imagecreatefromjpeg($ruta);
            $nueva = imagecreatetruecolor($ancho, $alto);
            imagecopyresampled($nueva, $imagenvieja, 0, 0, 0, 0, $ancho, $alto, $width, $height);
            $copia = "foto_producto/".$clave.".jpg";
            imagejpeg($nueva, $copia);
        } elseif ($info['extension'] == 'png' || $info['extension'] == 'PNG') {
            $imagenvieja = imagecreatefrompng($ruta);
            $nueva = imagecreatetruecolor($ancho, $alto);
            imagecopyresampled($nueva, $imagenvieja, 0, 0, 0, 0, $ancho, $alto, $width, $height);
            $copia = "foto_producto/".$clave.".png";
            imagepng($nueva, $copia);
        } else {
            echo alerta('El formato no es aceptado', 'inventario.php');
            exit;
        }
    } else {
        $copia = htmlentities($_POST['anterior']);
    }

    // Preparar la consulta de actualización
    $up = $con->prepare("UPDATE inventario SET producto = :producto, cantidad = :cantidad, precio = :precio, categoria = :categoria, foto = :foto, descripcion = :descripcion WHERE clave = :clave");
    $up->bindParam(':clave', $clave);
    $up->bindParam(':producto', $producto);
    $up->bindParam(':cantidad', $cantidad);
    $up->bindParam(':precio', $precio);
    $up->bindParam(':categoria', $categoria);
    $up->bindParam(':descripcion', $descripcion);
    $up->bindParam(':foto', $copia);

    // Ejecutar la consulta
    if ($up->execute()) {
        echo alerta('El producto ha sido actualizado', 'editar_producto.php?clave='.$clave);
        $up = null;
        $con = null;
    } else {
        echo alerta('El producto no ha podido ser actualizado', 'editar_producto.php?clave='.$clave);
    }

} else {
    echo alerta('Utiliza el formulario', 'editar_producto.php?clave='.$clave);
}
?> 
</body>
</html>

<?php 
include '../extend/headerphp.php';
include '../extend/alertas.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $clave_producto = htmlentities($_POST['clave']);
    $cont = 0;

    // Verificar que se hayan subido imágenes
    if (isset($_FILES['imagen']) && !empty($_FILES['imagen']['tmp_name'][0])) {

        foreach ($_FILES['imagen']['tmp_name'] as $key => $value) {
            $ruta = $_FILES['imagen']['tmp_name'][$key];
            $imagen = $_FILES['imagen']['name'][$key];

            $ancho = 500;
            $alto = 400;
            $info = pathinfo($imagen);
            $extension = strtolower($info['extension']);
            $tamano = getimagesize($ruta);
            $width = $tamano[0];
            $height = $tamano[1];
            $clave = sha1(rand(0000,9999).rand(00,99));

            // Procesar imagen según la extensión
            if ($extension == 'jpg' || $extension == 'jpeg') {
                $imagenvieja = imagecreatefromjpeg($ruta);
            } elseif ($extension == 'png') {
                $imagenvieja = imagecreatefrompng($ruta);
            } else {
                echo alerta('El formato no es aceptado','agregar_imagenes.php?clave='.$clave_producto);
                exit;
            }

            // Redimensionar imagen
            $nueva = imagecreatetruecolor($ancho, $alto);
            imagecopyresampled($nueva, $imagenvieja, 0, 0, 0, 0, $ancho, $alto, $width, $height);
            $cont++;
            $rand = rand(000,999);
            $renombrar = $clave . $rand . $cont;
            $copia = "fotos/" . $renombrar . "." . $extension;

            // Guardar imagen en el servidor
            if ($extension == 'jpg' || $extension == 'jpeg') {
                imagejpeg($nueva, $copia);
            } elseif ($extension == 'png') {
                imagepng($nueva, $copia);
            }

            // Liberar recursos
            imagedestroy($nueva);
            imagedestroy($imagenvieja);

            // Guardar la ruta en la base de datos
            if (isset($con)) {
                $ins = $con->prepare("INSERT INTO imagenes VALUES (DEFAULT, :clave, :clave_producto, :ruta)");
                $ins->bindParam(':clave', $clave);
                $ins->bindParam(':clave_producto', $clave_producto);
                $ins->bindParam(':ruta', $copia);
                $ins->execute();
            }
        } // Termina foreach

        // Mensaje de éxito
        if (isset($ins) && $ins) {
            echo alerta('Imágenes guardadas correctamente', 'agregar_imagenes.php?clave=' . $clave_producto);
        } else {
            echo alerta('Las imágenes no pudieron ser guardadas', 'agregar_imagenes.php?clave=' . $clave_producto);
        }

        $ins = null;
        $con = null;
    } else {
        echo alerta('No se seleccionaron imágenes', 'agregar_imagenes.php?clave=' . $clave_producto);
    }

} else {
    echo alerta('Utiliza el formulario', 'agregar_imagenes.php?clave=' . $clave_producto);
}

?>
</body>
</html>

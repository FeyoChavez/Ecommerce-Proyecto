<?php 
include '../extend/header.php'; 
$clave = htmlentities($_GET['clave']);
$sel = $con->prepare("SELECT * FROM inventario WHERE clave = ?");
$sel->execute(array($clave));
$f = $sel->fetch(); // Trae el registro, puede ser falso si no encuentra nada
$sel = null;
?>

<div class="container" style="margin-top: 1%;">
    <div class="card text-white bg-secondary">
        <div class="card-header"><h4 class="card-title">Editar producto</h4> </div>
        <div class="card-body">
            <?php if ($f): ?>
            <form action="up_inventario.php" method="post" autocomplete="off" enctype="multipart/form-data">
                <input type="hidden" name="clave" value="<?php echo $clave ?>">
                <div class="form-group">
                    <input type="text" name="producto" required placeholder="Producto" class="form-control" value="<?php echo $f['producto'] ?>"> 
                </div>
                <div class="form-group">
                    <input type="text" name="cantidad" required placeholder="Cantidad" class="form-control" value="<?php echo $f['cantidad'] ?>">
                </div>
                <div class="form-group">
                    <input type="number" step="0.01" required name="precio" placeholder="Precio" class="form-control" value="<?php echo $f['precio'] ?>">
                </div>
                <div class="form-group">
                    <select name="categoria" required class="form-control">
                        <option value="<?php echo $f['categoria'] ?>"><?php echo $f['categoria'] ?></option>
                        <option value="MODA">MODA</option>
                        <option value="ELECTRONICA">ELECTRONICA</option>
                        <option value="JOYERIA">JOYERIA</option>
                        <option value="RELOJES">RELOJES</option>
                        <option value="HOGAR">HOGAR</option>
                        <option value="ZAPATOS">ZAPATOS</option>
                    </select>
                </div>
                <div class="form-group">
                    <img src="<?php echo $f['foto'] ?>" width="200">
                </div>
                <div class="form-group">
                    <input type="file" name="imagen" class="form-control">
                </div>
                <input type="hidden" name="anterior" value="<?php echo $f['foto'] ?>">
                <div class="form-group">
                    <textarea name="descripcion" required cols="30" rows="10" class="form-control"><?php echo $f['descripcion'] ?></textarea>
                </div>
                <button type="submit" class="btn btn-info">Editar</button>
            </form>
            <?php else: ?>
                <p>No se encontró el producto con la clave proporcionada.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include '../extend/footer.php'; ?>
</body>
</html>

<?php
// Importamos los archivos con las clases
require_once 'Negocio/categorias.php';
require_once 'Negocio/productos.php';

$categorias = new Categorias();
$productos = new Productos();

// Obtenemos el registro del producto
foreach ($productos->get_producto($_GET['id']) as $producto) {
?>

<div class="card m-auto mt-5 p-3" style="width: 600px;">
    <h3>Editar producto</h3>
    <form method="post" action="">
        <div class="row">
            <div class="col-3">
                <button type="button" onClick="location.replace('index.php?mod=&form=li');" class="btn btn-danger">Cancelar</button>
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-5">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" name="name" value="<?= $producto['name']; ?>">
            </div>
            <div class="col-5">
                <label for="categorie">Categoría:</label>
                <select class="form-control" name="categorie">
                    <?php
                    foreach ($categorias->list_categories() as $categoria) {
                    ?>
                        <option value="<?= $categoria['id']; ?>" <?= ($categoria['id'] == $producto['id_categorie']) ? 'selected' : ''; ?>>
                            <?= $categoria['name']; ?>
                        </option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-10">
                <label for="description">Descripción:</label>
                <textarea class="form-control" name="description"><?= $producto['description']; ?></textarea>
            </div>
        </div>
        <div class="row mt-3 ms-5 mb-3">
            <div class="col-3">
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </div>
    </form>
</div>

<?php
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productos->name = $_POST["name"];
    $productos->description = $_POST["description"];
    $productos->categorie = $_POST["categorie"];

    // Ejecutamos el mantenimiento de actualización
    if ($productos->update($_GET['id'])) {
        echo "<script>location.replace('index.php?mod=&form=li');</script>";
    } else {
        echo "Error en la actualización";
    }
}
?>

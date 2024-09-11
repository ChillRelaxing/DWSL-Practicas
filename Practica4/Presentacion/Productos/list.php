<?php

require_once 'Negocio/categorias.php';
require_once 'Negocio/productos.php';

$productos = new Productos();
$categorias = new Categorias();

?>

<div class="card m-auto mt-5 p-3" style="width: 800px;">
    <h3>
        <button type="button" class="btn btn-success" onClick="location.replace('index.php?mod=&form=ad')">
            <i class="bi bi-plus-circle me-1"></i>Agregar
        </button>
    </h3>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Producto</th>
                <th scope="col">Descripción</th>
                <th scope="col">Categoría</th>
                <th scope="col">Controles</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos->list_products() as $prod) {
                $categoriasList = $categorias->get_categoria($prod['id_categorie']);
                $categoriaName = !empty($categoriasList) ? $categoriasList[0]['nombre'] : 'Desconocida';
            ?>
                <tr>
                    <td><?= $prod['nombre']; ?></td>
                    <td><?= $prod['descripcion']; ?></td>
                    <td><?= $categoriaName; ?></td>
                    <td>
                        <button type="button" onclick="editar(<?= $prod['id']; ?>);" class="btn btn-info">
                            <i class="bi bi-pencil"></i>
                        </button>
                        <button type="button" onclick="eliminar(<?= $prod['id']; ?>);" class="btn btn-danger">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script>
    function editar(id) {
        document.location.replace('index.php?mod=&form=up&id=' + id);
    }

    function eliminar(id) {
        document.location.replace('index.php?mod=&form=del&id=' + id);
    }
</script>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card m-auto mt-5 p-4">
            <h2>Lista de Productos</h2>
            <div class="row">
                <div class="col-md-3">
                    <a href="index.php?action=create" type="button" class="btn btn-success">Agregar</a>
                </div>
            </div>
            <div class="row mt-3">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($productos as $producto) : ?>
                            <tr>
                                <td><?= htmlspecialchars($producto['nombre']); ?></td>
                                <td><?= htmlspecialchars($producto['descripcion']); ?></td>
                                <td><?= htmlspecialchars($producto['categoria']); ?></td>
                                <td>
                                    <a href="index.php?action=edit&id=<?= $producto['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                                    <a href="index.php?action=delete&id=<?= $producto['id']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

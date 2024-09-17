<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="" method="post" name="frmCreate">
            <div class="row mt-5">
                <div class="col-md-3">
                    <label for="">Nombre :</label>
                    <input type="text" name="nombre" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="">Categoria :</label>
                    <input type="text" name="categoria" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="">Descripcion :</label>
                    <textarea name="descripcion" id="" class="form-control"></textarea>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <a href="index.php" class="btn btn-danger">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
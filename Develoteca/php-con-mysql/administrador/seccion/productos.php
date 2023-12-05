<?php include("../template/cabecera.php"); ?>
<?php


$txtId=(isset($_POST['txtId']))?$_POST['txtId']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$imagen=(isset($_FILES['imagen']['name']))?$_FILES['imagen']['name']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

echo $txtId."<br>";
echo $txtNombre."<br>";
echo $imagen."<br>";
echo $accion."<br>";


?>

<div class="col-md-5">

    <div class="card">
        <div class="card-header">
            Datos del Libro
        </div>

        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="txtId">ID</label>
                    <input type="text" class="form-control" name="txtId" id="txtId" placeholder="Id">

                </div>
                <div class="form-group">
                    <label for="txtNombre">Nombre</label>
                    <input type="text" class="form-control" name="txtNombre" id="txttxtNombreID" placeholder="Nombre del libro">
                </div>

                <div class="form-group">
                    <label for="imagen">Imagen</label>
                    <input type="file" class="form-control" name="imagen" id="imagen" placeholder="imagen">
                </div>

                <div class="btn-group" role="group" aria-label="">
                    <button type="submit" name="accion" value="Agregar" class="btn btn-success">Agregar</button>
                    <button type="submit" name="accion" value="Modificar" class="btn btn-warning">Modificar</button>
                    <button type="submit" name="accion" value="Cancelar" class="btn btn-info">Cancelar</button>
                </div>
            </form>
        </div>


    </div>

</div>
<div class="col-md-7">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>2</td>
                <td>Aprende PHP</td>
                <td>imagen.jpg</td>
                <td>Seleccionar | Borrar</td>
            </tr>
        </tbody>
    </table>

</div>

<?php include("../template/pie.php"); ?>
<?php
include("./header.php");
include_once("./funciones.php");
function alerta($tipo, $mensaje)
{
    echo "
    <div class='alert $tipo alert-dismissible fade show' role='alert'>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        <strong>$mensaje</strong>
    </div>
    ";
};
?>
<div class="container mt-1">
    <div class="row justify-content-center">
        <?php
        if (isset($_REQUEST['mensaje'])) {
            switch ($_REQUEST['mensaje']) {
                case 'invalido':
                    alerta("alert-danger", "Operacion no permitida");
                    break;
                case 'faltanDatos':
                    alerta("alert-danger", "Debe rellenar todos los campos");
                    break;
                case 'insertError':
                    alerta("alert-danger", "Error al insertar el articulo");
                    break;
                case 'insertExito':
                    alerta("alert-success", "Articulo insertado correctamente");
                    break;
                case 'deleteExito':
                    alerta("alert-success", "Articulo eliminado correctamente");
                    break;
                case 'deleteError':
                    alerta("alert-danger", "No se ha podido eliminar el articulo");
                    break;
            }
        }
        ?>
    </div>
</div>
<main class="container-fluid mt-1">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-secondary">Productos a la venta</h2>
                </div>
                <div>
                    <table class="table table-striped table-secondary align-middle">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Proveedor</th>
                                <th scope="col" class="text-center">Precio</th>
                                <th scope="col" colspan="2" class="text-center">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $articulos = obtenerArticulos();
                            foreach ($articulos as $articulo) {
                            ?>
                                <tr>
                                    <td scope='row'><?php echo $articulo['idArticulo']; ?></td>
                                    <td><?php echo $articulo['nombre']; ?></td>
                                    <td><?php echo $articulo['categoria']; ?></td>
                                    <td><?php echo $articulo['proveedor']; ?></td>
                                    <td class='text-end text-nowrap'><?php echo $articulo['precio']; ?> €</td>
                                    <td class='text-end'>
                                        <a href="./editar.php?id=<?php echo $articulo['idArticulo']; ?>">
                                            <i class='bi bi-pencil-square text-success'></i>
                                        </a>
                                        <a href="./eliminar.php?id=<?php echo $articulo['idArticulo']; ?>">
                                            <i class='bi bi-trash text-danger'></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-secondary">Nuevo Articulo</h2>
                </div>
                <form class="p-4" action="./insertar.php" method="post">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label for="categoria" class="form-label">Categoria</label>
                        <select name="categoria" id="categoria" class="form-control">
                            <?php
                            $categorias = nombresCategorias();
                            foreach ($categorias as $categoria) {
                                echo "<option>$categoria</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="proveedor" class="form-label">Proveedor</label>
                        <select name="proveedor" id="proveedor" class="form-control">
                            <?php
                            $proveedores = nombresProveedores();
                            foreach ($proveedores as $proveedor) {
                                echo "<option>$proveedor</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="number" name="precio" id="precio" min="0.00" step="0.01" autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="cantidadPorUnidad" class="form-label">Cantidad por unidad</label>
                        <input type="text" name="cantidadPorUnidad" id="cantidadPorUnidad" class="form-control" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label for="unidadesEnStock" class="form-label">Unidades en Stock</label>
                        <input type="number" name="unidadesEnStock" id="unidadesEnStock" min="0.00" step="0.01" autofocus>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" value="Guardar" class="btn btn-success" name="btnInsertar">
                    </div>
                </form>
            </div>
        </div>
    </div>

</main>

<?php
include("./footer.php");
?>
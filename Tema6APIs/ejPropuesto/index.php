<?php
require_once("./php/funciones.php");

$datos = obtenerTodosPersonajes();
$familias = obtenerFamilias();

if (isset($_REQUEST['buscarPersonaje'])) {
    $nombre = $_REQUEST['nombre'];
    $apellido = $_REQUEST['apellido'];
    $titulo = $_REQUEST['titulo'];
    $familia = $_REQUEST['familia'];
    $datos = obtenerDatos($nombre, $apellido, $titulo, $familia);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Game of Thrones</title>
</head>

<body>
    <div class="container text-center">
        <h1 class="display-5 fw-bold">Game of Thrones!</h1>
    </div>
    <div class="container">
        <form action="" method="post">
            <div class="mb-3">
                <label for="nombre" class="form-label">Search by firstname</label>
                <input type="text" name="nombre" class="form-control">
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Search by surname</label>
                <input type="text" name="apellido" class="form-control">
            </div>
            <div class="mb-3">
                <label for="titulo" class="form-label">Search by title</label>
                <input type="text" name="titulo" class="form-control">
            </div>
            <div class="mb-3">
                <label for="familia" class="form-label">Search by family</label>
                <select name="familia" class="form-select">
                    <option selected value="">Cualquiera</option>
                    <?php
                    foreach ($familias as $familia) {
                        echo "<option>$familia</option>";
                    }
                    ?>
                </select>
            </div>
            <hr>
            <button type="submit" class="btn btn-primary" name="buscarPersonaje">Search</button>
        </form>
        <hr>
        <table class="table table-striped text-center align-middle">
            <thead>
                <tr>
                    <th scope="col">Firstname</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Title</th>
                    <th scope="col">Family</th>
                    <th scope="col">Image</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($datos as $personaje) {
                    echo "<tr>";
                    echo "<td>{$personaje['nombre']}</td>";
                    echo "<td>{$personaje['apellido']}</td>";
                    echo "<td>{$personaje['titulo']}</td>";
                    echo "<td>{$personaje['familia']}</td>";
                    echo "<td><img src='{$personaje['imagenURL']}' alt='{$personaje['nombre']}' height='100px'></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
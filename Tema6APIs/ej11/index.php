<?php
require_once("./php/functions.php");
$periodicoAnterior = "Todas";
if (isset($_REQUEST['periodico'])) {
    $periodico = $_REQUEST['periodico'];
    switch ($periodico) {
        case 'El Pais':
            $noticias = getElPaisXML();
            $periodicoAnterior = "El Pais";
            break;
        case 'El Mundo':
            $noticias = getElMundoXML();
            $periodicoAnterior = "El Mundo";
            break;
        case 'Diario de Leon':
            $noticias = getDiarioDeLeonXML();
            $periodicoAnterior = "Diario de Leon";
            break;
        default:
            break;
    }
} else {
    $noticias = getTodasNoticias();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Ejercicio 11</title>
</head>

<body>
    <h1>Ultimas noticias</h1>
    <form action="" method="post">
        <select class="form-select" aria-label="Default select example" onchange="this.form.submit()" name="periodico">
            <option <?php $periodicoAnterior == "Todas" ? "selected" : "" ?>>Todas</option>
            <option <?php $periodicoAnterior == "El Pais" ? "selected" : "" ?>>El Pais</option>
            <option <?php $periodicoAnterior == "El Mundo" ? "selected" : "" ?>>El Mundo</option>
            <option <?php $periodicoAnterior == "Diario de Leon" ? "selected" : "" ?>>Diario de Leon</option>
        </select>
    </form>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>Fuente</th>
                <th>Titular</th>
                <th>Descripción</th>
                <th>Enlace</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($noticias as $noticia) {
                echo "<tr>";
                echo "<td>{$noticia['fuente']}</td>";
                echo "<td>{$noticia['titular']}</td>";
                echo "<td>{$noticia['descripcion']}</td>";
                echo "<td><a href='{$noticia['enlace']}' target='_blank'>Enlace</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</html>
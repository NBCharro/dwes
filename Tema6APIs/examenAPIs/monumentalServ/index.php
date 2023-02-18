<?php
require_once("./php/funciones.php");
$datosTabla = obtenerTodosDatos();
$clases = obtenerClases();
$periodos = obtenerPeriodos();
$provincias = obtenerProvincias();
?>
<?php ?>
<?php
if (isset($_REQUEST['clase']) || isset($_REQUEST['periodo']) || isset($_REQUEST['provincia'])) {
    $claseFormulario = $_REQUEST['clase'];
    $periodoFormulario = $_REQUEST['periodo'];
    $provinciaFormulario = $_REQUEST['provincia'];
    $datosTabla = obtenerDatosFiltrados($claseFormulario, $periodoFormulario, $provinciaFormulario);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monumental CyL</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }

        table {
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <header>
        <h1>Monumental CyL</h1>
    </header>
    <main>
        <form action="#" method="post">
            <h2>Buscar Monumentos</h2>
            <label for="clase">Clase</label>
            <select name="clase" onchange="this.form.submit()">
                <option selected>Todos</option>
                <?php
                foreach ($clases as $clase) {
                    $selected = $claseFormulario == $clase ? "selected" : "";
                    echo "<option $selected>$clase</option>";
                }
                ?>
            </select><br>
            <label for="periodo">Periodo</label>
            <select name="periodo" onchange="this.form.submit()">
                <option selected>Todos</option>
                <?php
                foreach ($periodos as $periodo) {
                    $selected = $periodoFormulario == $periodo ? "selected" : "";
                    echo "<option $selected>$periodo</option>";
                }
                ?>
            </select><br>
            <label for="provincia">Provincia</label>
            <select name="provincia" onchange="this.form.submit()">
                <option selected>Todos</option>
                <?php
                foreach ($provincias as $provincia) {
                    $selected = $provinciaFormulario == $provincia ? "selected" : "";
                    echo "<option $selected>$provincia</option>";
                }
                ?>
            </select>
        </form>
        <table>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Clase</th>
                <th>Tipo Monumento</th>
                <th>Tipo Construccion</th>
                <th>Periodo</th>
                <th>Provincia</th>
                <th>Localidad</th>
            </tr>
            <?php
            if (is_array($datosTabla) && count($datosTabla) > 0) {
                foreach ($datosTabla as $dato) {
                    echo "<tr>";
                    echo "<th>{$dato['id']}</th>";
                    echo "<td>{$dato['nombre']}</td>";
                    echo "<td>{$dato['clase']}</td>";
                    echo "<td>{$dato['tipoMonumento']}</td>";
                    echo "<td>{$dato['tipoConstruccion']}</td>";
                    echo "<td>{$dato['periodo']}</td>";
                    echo "<td>{$dato['provincia']}</td>";
                    echo "<td>{$dato['localidad']}</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr>";
                echo "<th colspan='8'>No existen datos</th>";
                echo "</tr>";
            }
            ?>
        </table>
    </main>
    <footer>Nelson Blanco Charro</footer>
</body>

</html>
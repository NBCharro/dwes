<?php
function mostrar($alumnos)
{
    if (is_array($alumnos) && count($alumnos) > 0) {
        echo "
        <table class='table'>
            <thead>
                <tr>
                <th scope='col'>id_alumno</th>
                <th scope='col'>Nombre</th>
                <th scope='col'>Apellidos</th>
                <th scope='col'>FechaNac</th>
                <th scope='col'>Ciudad</th>
                <th scope='col'>Telefono</th>
                <th scope='col'>Curso</th>
                </tr>
            </thead>
            <tbody>";
        foreach ($alumnos as $datos) {
            echo "<tr>";
            foreach ($datos as $dato) {
                echo "<td>{$dato}</td>";
            }
            echo "</tr>";
        };
        echo "
            </tbody>
        </table>
        ";
    } else {
        echo "<h2>Informacion no disponible</h2>";
    }
}


function mostrarProfesores($profesores)
{
    if (is_array($profesores) && count($profesores) > 0) {
        echo "
        <table class='table'>
            <thead>
                <tr>
                <th scope='col'>id_profesor</th>
                <th scope='col'>Usuario</th>
                <th scope='col'>Pass</th>
                <th scope='col'>Tipo</th>
                <th scope='col'>Nombre</th>
                <th scope='col'>Apellidos</th>
                <th scope='col'>Tutoria</th>
                </tr>
            </thead>
            <tbody>";
        foreach ($profesores as $datos) {
            echo "<tr>";
            foreach ($datos as $dato) {
                echo "<td>{$dato}</td>";
            }
            echo "</tr>";
        };
        echo "
            </tbody>
        </table>
        ";
    } else {
        echo "<h2>Informacion no disponible</h2>";
    }
}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 34</title>
</head>

<body>
    <form action="./php/formulario.php" method="post">
        <table>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Curso</th>
                <th>Edad</th>
                <th>Localidad</th>
            </tr>
            <?php
            for ($i = 0; $i < 10; $i++) {
                echo "<tr>";
                echo "<td><input type='text' name='nombre[$i]'></td>";
                echo "<td><input type='text' name='apellidos[$i]'></td>";
                echo "<td><input type='text' name='curso[$i]'></td>";
                echo "<td><input type='number' name='edad[$i]'></td>";
                echo "<td><input type='text' name='localidad[$i]'></td>";
                echo "</tr>";
            }
            ?>
        </table>
        <input type="submit" value="Enviar" name="enviar">
    </form>
</body>

</html>
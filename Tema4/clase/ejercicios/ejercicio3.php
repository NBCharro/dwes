<?php
require_once("./funcionesEj3.php");
$clientes = mostrarClientes();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
    <style>
        table,
        td,
        th {
            border: 1px solid black;
        }

        table {
            border-collapse: collapse;
        }

        .agregado {
            background-color: greenyellow;
            text-align: center;
            font-size: 1.1rem;
        }

        .error {
            background-color: red;
            text-align: center;
            font-size: 1.1rem;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_REQUEST['agregado'])) {
        if ($_REQUEST['agregado'] == 10) {
            echo "<p class='agregado'>El cliente se ha agregado correctamente.</p>";
        } else {
            echo "<p class='error'>No se ha podido agregar el cliente</p>";
        }
    }

    if (isset($_REQUEST['guardar'])) {
        $company = $_REQUEST['company'];
        if ($company == "") {
            header("Location: ejercicio3.php");
            die();
        }
        $nuevoCustomer = [
            "CustomerID" => $_REQUEST['customerID'],
            "CompanyName" => $_REQUEST['company'],
            "ContactName" => $_REQUEST['contacto'],
            "ContactTitle" => $_REQUEST['tituloContacto'],
            "Address" => $_REQUEST['direccion'],
            "City" => $_REQUEST['ciudad'],
            "Region" => "NULL",
            "PostalCode" => $_REQUEST['codigoPostal'],
            "Country" => $_REQUEST['pais'],
            "Phone" => $_REQUEST['telefono'],
            "Fax" => $_REQUEST['fax']
        ];
        $agregarCliente = guardarCliente($nuevoCustomer);
        if ($agregarCliente) {
            header("Location: ./ejercicio3.php?agregado=10");
            die();
        } else {
            header("Location: ./ejercicio3.php?agregado=20");
            die();
        }
    }
    ?>


    <h2>Nuevo cliente</h2>
    <form action="ejercicio3.php" method="post">
        <label for="customerID">ID</label>
        <input type="text" name="customerID" id="customerID"><br>
        <label for="company">Compañia</label>
        <input type="text" name="company" id="company"><br>
        <label for="contacto">Contacto</label>
        <input type="text" name="contacto" id="contacto"><br>
        <label for="tituloContacto">Titulo contacto</label>
        <input type="text" name="tituloContacto" id="tituloContacto"><br>
        <label for="direccion">Direccion</label>
        <input type="text" name="direccion" id="direccion"><br>
        <label for="ciudad">Ciudad</label>
        <input type="text" name="ciudad" id="ciudad"><br>
        <label for="codigoPostal">Codigo postal</label>
        <input type="text" name="codigoPostal" id="codigoPostal"><br>
        <label for="pais">Pais</label>
        <input type="text" name="pais" id="pais"><br>
        <label for="telefono">Telefono</label>
        <input type="tel" name="telefono" id="telefono"><br>
        <label for="fax">Fax</label>
        <input type="tel" name="fax" id="fax"><br>
        <input type="submit" value="Guardar" name="guardar">
    </form>
    <h2>Clientes</h2>
    <table>
        <tr>
            <th>Compañia</th>
            <th>Contacto</th>
            <th>Titulo contacto</th>
            <th>Direccion</th>
            <th>Ciudad</th>
            <th>Codigo postal</th>
            <th>Pais</th>
            <th>Telefono</th>
            <th>Fax</th>
        </tr>
        <?php
        foreach ($clientes as $cliente) {
            echo "<tr>";
            echo "<td>{$cliente['CompanyName']}</td>";
            echo "<td>{$cliente['ContactName']}</td>";
            echo "<td>{$cliente['ContactTitle']}</td>";
            echo "<td>{$cliente['Address']}</td>";
            echo "<td>{$cliente['City']}</td>";
            echo "<td>{$cliente['PostalCode']}</td>";
            echo "<td>{$cliente['Region']}</td>";
            echo "<td>{$cliente['Phone']}</td>";
            echo "<td>{$cliente['Fax']}</td>";
            echo "</tr>";
        }
        ?>
    </table>

</body>

</html>
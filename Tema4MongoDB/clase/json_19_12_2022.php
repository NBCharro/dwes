<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dia 19_12_2022</title>
</head>

<body>
    <h1>Escribir archivos JSON: json_encode</h1>
    <?php
    $nuevoCustomer = [
        "CustomerID" => "CARLE",
        "CompanyName" => "IES San Andres",
        "ContactName" => "Jose Luis",
        "ContactTitle" => "Profesor",
        "Address" => "Calle Grande, 123",
        "City" => "Villabalter",
        "Region" => "NULL",
        "PostalCode" => "24191",
        "Country" => "Spain",
        "Phone" => "034-111222333",
        "Fax" => "034-999888777"
    ];
    $fileCustomers = file_get_contents("./data/customers.json"); // abre el archivo, guarda en string y ciera el archivo
    if ($fileCustomers) {
        // Tenemos que guardar el JSON completo en una variable. OJO! SIEMPRE en array asociativo
        $customersJSON = json_decode($fileCustomers, true);
        // Añadimos el nuevo dato al array anterior, modifico uno ya existente o borrar alguno.
        $customersJSON[] = $nuevoCustomer;
        // Crea un string con el formato JSON completo
        $customersJSON = json_encode($customersJSON);
        // Sobreescribimos el archivo JSON, no hay otra forma que sobreescribiendo
        if (file_put_contents("./data/customers.json", $customersJSON)) {
            echo "<p>Guardado correctamente.</p>";
        } else {
            echo "<p>No se ha podido guardar el dato nuevo.</p>";
        }
    }
    ?>
    <h1>Leer archivos JSON: json_decode</h1>
    <?php
    // Leer archivos JSON
    $fileCustomers = file_get_contents("./data/customers.json"); // abre el archivo, guarda en string y ciera el archivo
    if ($fileCustomers) {
        // El archivo y luego true para que nos de un array asociativo
        $customersJSON = json_decode($fileCustomers, true);
        echo '<pre>';
        print_r($customersJSON);
        echo '</pre>';
        // foreach ($customersJSON as $customer) {
        //     echo "<p>{$customer['CompanyName']}</p>";
        // }
    } else {
        echo "<p>No se ha podido acceder al archivo.</p>";
    }
    ?>
</body>

</html>
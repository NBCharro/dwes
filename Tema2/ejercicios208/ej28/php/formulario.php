<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Distancia</title>
</head>

<body>
    <?php
    $Barcelona = array("Barcelona" => 0, "Coruña" => 1188, "Madrid" => 621, "Sevilla" => 1046);
    $Coruña = array("Barcelona" => 1188, "Coruña" => 0, "Madrid" => 609, "Sevilla" => 947);
    $Madrid = array("Barcelona" => 621, "Coruña" => 609, "Madrid" => 0, "Sevilla" => 538);
    $Sevilla = array("Barcelona" => 1046, "Coruña" => 947, "Madrid" => 538, "Sevilla" => 0);
    $ciudades = array("Barcelona" => $Barcelona, "Coruña" => $Coruña, "Madrid" => $Madrid, "Sevilla" => $Sevilla);
    if (isset($_REQUEST['enviar'])) {
        $ciudad1 = $_REQUEST['ciudad1'];
        $ciudad2 = $_REQUEST['ciudad2'];
        foreach ($ciudades as $key => $value) {
            if ($key == $ciudad1) {
                foreach ($value as $ciudad => $distancia) {
                    if ($ciudad == $ciudad2) {
                        $resultado = $distancia;
                    }
                }
            }
        }
    ?>
        <h2>La distancia entre <?php echo "$ciudad1" ?> y <?php echo "$ciudad2" ?> es de <?php echo "$resultado" ?> Km.</h2>
        <h2><a href="../index.html">Volver</a></h2>
    <?php
    } else {
        header("Location: ../index.html");
    }
    ?>
</body>

</html>
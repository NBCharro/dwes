<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <?php
    if (isset($_REQUEST['enviar'])) {
        $texto = $_REQUEST['textoGrande'];
        $tamaño = intval($_REQUEST['tamaño']);
        $estilo = $_REQUEST['estilo'];
        $color = $_REQUEST['color'];
        if ($tamaño < 0) {
            $tamaño = 0;
        }
        if ($tamaño > 10) {
            $tamaño = 10;
        }
    } else {
        $texto = "No hay texto";
    }
    ?>
    <style>
        p {
            border-style: <?php echo "$estilo" ?>;
            border-color: <?php echo "$color" ?>;
            border-width: <?php echo "$tamaño" ?>px;
        }

        <?php ?>
    </style>
</head>

<body>
    <h2>Formatos en Texto</h2>
    <p><?php echo "$texto" ?></p>
</body>

</html>
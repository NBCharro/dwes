<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 46</title>
</head>

<body>
    <?php
    if (!isset($_REQUEST['enviar'])) {
    ?>
        <form action="" method="post">
            <label for="texto">Texto:</label><br>
            <textarea name="texto" id="texto" cols="30" rows="10"></textarea><br>
            <input type="submit" value="Enviar" name="enviar">
        </form>
    <?php
    } else {
        $texto = $_REQUEST['texto'];
        $patron = array(
            "#[0-9]{7,8}[a-zA-Z]#",
            "#((0[1-9])|([1-2][0-9])|3(0-1))\-((0[1-9])|(1[0-2]))\-((19[0-9]{2})|(2[0-9]{3}))#",
            "#[6-9][0-9]{8}#",
            "#[a-zA-Z][a-zA-Z0-9\.]{0,}@[a-zA-Z][a-zA-Z0-9\.]{0,}\.((com)|(org)|(es))#"
        );
        $sustituciones = array(
            "&lt;&lt;DNI&gt;&gt;",
            "&lt;&lt;FECHA&gt;&gt;",
            "&lt;&lt;TELEFONO&gt;&gt;",
            "&lt;&lt;EMAIL&gt;&gt;"
        );
        $textoCensurado = preg_replace($patron, $sustituciones, $texto);
    ?>
        <p><?php echo "$texto"; ?></p>
        <p><?php echo "$textoCensurado"; ?></p>
        <h2><a href="">Volver</a></h2>
    <?php
    }
    ?>
</body>

</html>
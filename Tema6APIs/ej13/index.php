<?php
if (!isset($_GET['code'])) {
    header('Location: auth/auth.php');
    die();
}
require_once("./php/funciones.php");

$codigoSpotify = $_GET['code'];

if (isset($_REQUEST['buscarArtista'])) {
    $artistaBuscado = $_REQUEST['artistaBuscado'];
    $discografia = obtenerDiscografia('0k17h0D3J5VfsdmQ1iZtE9', $codigoSpotify);
    echo '<pre>';
    print_r($discografia);
    echo '</pre>';


    // $datosArtista = buscarArtista($artistaBuscado, $codigoSpotify);
    // echo '<pre>';
    // print_r($datosArtista);
    // echo '</pre>';
    // $discografia = obtenerDiscografia($datosArtista['id'], $codigoSpotify);
    // echo '<pre>';
    // print_r($discografia);
    // echo '</pre>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3">
    <link rel="stylesheet" type="text/css " href="css/estilos.css" />
    <title>Buscar Artistas Spotify</title>
</head>

<body>
    <div class="container">
        <h2>Buscar artistas</h2>
        <form action="" method="post">
            <div class="mb-3">
                <label for="artistaBuscado" class="form-label">Buscar Artista</label>
                <input type="text" class="form-control" name="artistaBuscado" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit" name="buscarArtista">Buscar Artista</button>
            </div>
        </form>
    </div>
    <hr>
    <div class="container">
        <h2>Informacion del artista</h2>
        <div class="container text-center">
            <div class="row align-items-center">
                <div class="col">
                    <img src="<?php echo $datosArtista['imagen'] ?>" alt="" width="200px">
                </div>
                <div class="col">
                    <h3><?php echo $datosArtista['nombre'] ?></h3>
                    <p>Seguidores: <?php echo $datosArtista['seguidores'] ?></p>
                    <input type="range" max="3000000" value="<?php echo $datosArtista['seguidores'] ?>" class="form-label">
                    <p>Popularidad: <?php echo $datosArtista['popularidad'] ?></p>
                    <input type="range" max="100" value="<?php echo $datosArtista['popularidad'] ?>" class="form-label">
                    <br><a href="<?php echo $datosArtista['url'] ?>" target="_blank" rel="noopener noreferrer">Enlace</a>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <h2>Discografia</h2>
    </div>
</body>

</html>
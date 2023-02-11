<?php
if (!isset($_GET['code'])) {
    header('Location: auth/auth.php');
    die();
}
require_once("./php/funciones.php");
require_once("./auth/sesion.php");


if (isset($_REQUEST['artistaBuscado'])) {
    $artistaBuscado = $_REQUEST['artistaBuscado'];

    $api = new SpotifyWebAPI\SpotifyWebAPI();
    $session->requestAccessToken($_GET['code']);
    $api->setAccessToken($session->getAccessToken());

    $datosArtista = buscarArtista($api, $artistaBuscado);

    $discografia = obtenerDiscografia($api, $datosArtista['id']);
    echo '<pre>';
    print_r($discografia);
    echo '</pre>';
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
        <form action="#" method="post">
            <div class="mb-3">
                <label for="artistaBuscado" class="form-label">Buscar Artista</label>
                <input type="text" class="form-control" name="artistaBuscado" aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </form>
    </div>
    <hr>
    <?php
    if (isset($_REQUEST['artistaBuscado'])) {
    ?>
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
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Tipo</th>
                        <th>Titulo</th>
                        <th>Lanzamiento</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($discografia as $disco) {
                        echo "<tr>";
                        echo "<td><img src='{$disco['imagen']}' alt='' width='150px'></td>";
                        echo "<td>{$disco['tipo']}</td>";
                        echo "<td>{$disco['titulo']}</td>";
                        echo "<td>{$disco['lanzamiento']}</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    <?php
    } ?>
</body>

</html>
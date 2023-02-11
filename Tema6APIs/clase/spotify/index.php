<?php
require_once 'vendor/autoload.php';
require_once 'auth/sesion.php';

$api = new SpotifyWebAPI\SpotifyWebAPI();
if (isset($_GET['code'])) {
    echo "<h1>Artistas que coinciden con Pink Floyd</h1>";
    $session->requestAccessToken($_GET['code']);
    $api->setAccessToken($session->getAccessToken());
    // Buscar informacion por artista
    $options = array('limit' => 5);
    $results = $api->search('Pink Floyd', 'artist', $options);
    // Devuelve un array con muchas cosas
    // echo '<pre>';
    // print_r($results);
    // echo '</pre>';
    foreach ($results->artists->items as $artist) {
        echo $artist->name, '<br>';
        // echo "<img src='{$artist->images[1]->url}' alt=''>";
        // echo '<br>';
    }
    echo "<hr/>";
    echo "<h1>Datos del artista</h1>";
    // Acceder a la información de un artista mediante su id
    if (count($results->artists->items) > 0) {
        // Me quedo con el primer artista de la busqueda
        $data = $results->artists->items[0];
        // Guardo en un array
        $artista = array(
            'id' => $data->id,
            'name' => $data->name,
            'spotify' => $data->external_urls->spotify,
            'image' => $data->images[0]->url,
            'followers' => $data->followers->total,
            'popularity' => $data->popularity,
        );
        echo "<pre>";
        print_r($artista);
        echo "</pre>";
    }
    echo "<hr/>";
    echo "<h1>Albumes del artista</h1>";
    // Obtener los albumes de un artista
    if (count($results->artists->items) > 0) {
        // Me quedo con el primer artista de la busqueda
        $data = $results->artists->items[0];
        // Guardo su ID
        $id = $data->id;
        // Busco los albumes que tiene mediante su ID
        $albums = $api->getArtistAlbums($id);
        // echo '<pre>';
        // print_r($albums);
        // echo '</pre>';
        foreach ($albums->items as $album) {
            echo $album->name, '<br>';
            if ($album->images[0]->url) {
                echo "<img src='{$album->images[0]->url}' alt=''>";
                echo '<br>';
            }
        }
    }
} else {
    header('Location: auth/auth.php');
    die();
}

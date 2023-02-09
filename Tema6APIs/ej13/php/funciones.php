<?php
require_once './vendor/autoload.php';
require_once './auth/sesion.php';

function buscarArtista($artista, $codigoSpotify)
{
    $artistaBuscado = false;
    $api = new SpotifyWebAPI\SpotifyWebAPI();
    $session = new SpotifyWebAPI\Session(
        '6f13e9fdb16c44ac889c8c76b08d2c5b',
        '0c23ca9cc70c404dbc00ad901673b596',
        'http://localhost/dwes/Tema6APIs/ej13/'
    );
    $session->requestAccessToken($codigoSpotify);
    $api->setAccessToken($session->getAccessToken());
    $options = array('limit' => 5);
    $results = $api->search($artista, 'artist', $options);
    if (count($results->artists->items) > 0) {
        $data = $results->artists->items[0];
        $artistaBuscado = [
            'id' => $data->id,
            'nombre' => $data->name,
            'url' => $data->external_urls->spotify,
            'imagen' => $data->images[0]->url,
            'seguidores' => $data->followers->total,
            'popularidad' => $data->popularity,
        ];
    }
    return $artistaBuscado;
}

function obtenerDiscografia($idArtista, $codigoSpotify)
{
    $discografia = false;
    $api = new SpotifyWebAPI\SpotifyWebAPI();
    $session = new SpotifyWebAPI\Session(
        '6f13e9fdb16c44ac889c8c76b08d2c5b',
        '0c23ca9cc70c404dbc00ad901673b596',
        'http://localhost/dwes/Tema6APIs/ej13/'
    );
    $session->requestAccessToken($codigoSpotify);
    $api->setAccessToken($session->getAccessToken());
    // $options = array();
    // $results = $api->search("Pink Floyd", 'artist', $options);
    // $data = $results->artists->items[0];
    // $id = $data->id;
    // Busco los albumes que tiene mediante su ID
    $albums = $api->getArtistAlbums($idArtista);
    foreach ($albums->items as $album) {
        $discografia[] =[
            "imagen"=>$album->images[0];
            "tipo"=>$album->type;
            "titulo"=>$album->name;
            "lanzamiento"=>$album->release_date;
        ];
    }
    return $discografia;
}

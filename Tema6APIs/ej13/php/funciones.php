<?php
require_once './vendor/autoload.php';

function buscarArtista($api, $artista)
{
    $artistaBuscado = false;

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

function obtenerDiscografia($api, $id)
{
    $discografia = false;

    $albums = $api->getArtistAlbums($id);

    foreach ($albums->items as $album) {
        $discografia[] = [
            "imagen" => $album->images[0]->url,
            "tipo" => $album->type,
            "titulo" => $album->name,
            "lanzamiento" => $album->release_date,
            "url" => $album->artists[0]->external_urls->spotify,
        ];
    }

    return $discografia;
}

<?php
function obtenerTerremotos()
{
    $terremotos = array();
    $fichero = new DOMDocument();
    $fichero->load("https://www.ign.es/ign/RssTools/sismologia.xml")
        or die("No se puede acceder al canal RSS");
    $items = $fichero->getElementsByTagName("item");
    foreach ($items as $item) {
        $terremotos[] = array(
            'nombre' => $item->getElementsByTagName("title")[0]->textContent,
            'lat' => $item->getElementsByTagName("lat")[0]->textContent,
            'lng' => $item->getElementsByTagName("long")[0]->textContent,
        );
    }
    return $terremotos;
}

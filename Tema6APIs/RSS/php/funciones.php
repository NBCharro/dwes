<?php
define('FILE_TERREMOTOS', "http://www.ign.es/ign/RssTools/sismologia.xml");
function getTerremotosXML()
{
    $xml =  simplexml_load_file(FILE_TERREMOTOS);
    if ($xml) {
        // $items = $xml->xpath("/channel/item");
        $items = $xml->xpath("//item");
        $terremotos = array();
        foreach ($items as $item) {
            $terremotos[] = array(
                'nombre' => $item->title->__toString(),
                'lat' => $item->children('geo', TRUE)->lat->__toString(),
                'lng' => $item->children('geo', TRUE)->long->__toString(),
            );
        }
    }
    return $terremotos;
}

function getTerremotosDOM()
{
    $fichero = new DOMDocument();
    if ($fichero->load(FILE_TERREMOTOS)) {
        $items = $fichero->getElementsByTagName("item");
        $terremotos = array();
        foreach ($items as $item) {
            $terremotos[] = array(
                'nombre' => $item->getElementsByTagName("title")[0]->textContent,
                'lat' => $item->getElementsByTagName("lat")[0]->textContent,
                'lng' => $item->getElementsByTagName("long")[0]->textContent,
            );
        }
    }
    return $terremotos;
}




function mostrarTerremotos($terremotos)
{
    if (is_array($terremotos) && count($terremotos) > 0) {
        echo "";
        echo "<table class='table table-striped'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Nombre</th>";
        echo "<th>Latitud</th>";
        echo "<th>Longitud</th>";
        echo "</tr>";
        echo "</thead>";
        foreach ($terremotos as $terremoto) {
            echo "<tr>";
            foreach ($terremoto as $value) {
                echo "<td>$value</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<h2>Informacion no disponible.</h2>";
    }
}

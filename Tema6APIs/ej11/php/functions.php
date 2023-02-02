<?php
define('FILE_EL_PAIS', "https://feeds.elpais.com/mrss-s/pages/ep/site/elpais.com/portada");
define('FILE_EL_MUNDO', "https://e00-elmundo.uecdn.es/elmundo/rss/portada.xml");
define('FILE__DIARIO_DE_LEON', "https://www.diariodeleon.es/rss");

function getTodasNoticias()
{
    $todasNoticias = [...getElPaisXML(), ...getElMundoXML(), ...getDiarioDeLeonXML()];
    return $todasNoticias;
}

function getElPaisXML()
{
    $xml =  simplexml_load_file(FILE_EL_PAIS);
    if ($xml) {
        $items = $xml->xpath("//item");
        $elPais = array();
        foreach ($items as $item) {
            $elPais[] = array(
                'fuente' => "El Pais",
                'titular' => $item->title->__toString(),
                'descripcion' => $item->description->__toString(),
                'enlace' => $item->link->__toString(),
            );
        }
    }
    return $elPais;
}

function getElMundoXML()
{
    $xml =  simplexml_load_file(FILE_EL_PAIS);
    if ($xml) {
        $items = $xml->xpath("//item");
        $elMundo = array();
        foreach ($items as $item) {
            $elMundo[] = array(
                'fuente' => "El Mundo",
                'titular' => $item->title->__toString(),
                'descripcion' => $item->description->__toString(),
                'enlace' => $item->link->__toString(),
            );
        }
    }
    return $elMundo;
}

function getDiarioDeLeonXML()
{
    $xml =  simplexml_load_file(FILE_EL_PAIS);
    if ($xml) {
        $items = $xml->xpath("//item");
        $diarioDeLeon = array();
        foreach ($items as $item) {
            $diarioDeLeon[] = array(
                'fuente' => "Diario de Leon",
                'titular' => $item->title->__toString(),
                'descripcion' => $item->description->__toString(),
                'enlace' => $item->link->__toString(),
            );
        }
    }
    return $diarioDeLeon;
}

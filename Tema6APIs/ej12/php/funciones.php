<?php
define('HOST', 'localhost');
define('USER', 'inmuebles');
define('PASSWORD', 'inmuebles');
define('BD', 'inmuebles');

function obtenerViviendas()
{
    $viviendas = false;
    try {
        $conection = new mysqli(HOST, USER, PASSWORD, BD);
        $consultaViviendas = "SELECT * FROM `viviendas` WHERE 1";
        $viviendasDatos = mysqli_query($conection, $consultaViviendas);
        mysqli_close($conection);
        if (mysqli_num_rows($viviendasDatos) > 0) {
            $viviendas = array();
            while ($vivienda = mysqli_fetch_assoc($viviendasDatos)) {
                $viviendas[] = $vivienda;
            }
        }
    } catch (mysqli_sql_exception $e) {
    }
    return $viviendas;
}


// INSERT INTO 'viviendas' ('id', 'tipo', 'direccion', 'localidad','lat','lon', 'vivienda', 'descripcion') VALUES
// (1, 'venta', 'Calle Frontón, 7', 'León','42.3528934','-3.6723888', 'piso', 'vivienda libre, de 85 m2 útiles 95 construidos, tres dormitorios el principal con empotrados y baño incorporado, baño salón y cocina amueblada.'),
// (2, 'alquiler', 'Avenida Doctor Fleming, 24', 'León','42.597865049999996','-5.5856809484869965', 'piso', 'Apartamento céntrico. Calefacción gasoil. Gastos de comunidad incluidos. Exterior. Soleado. Terraza. '),
// (3, 'venta', 'Calle González de Lama, 2', 'León', '42.6021761','-5.5647438','piso', 'Oportunidad, Apartamento para reformar integralmente con terraza y vistas panorámicas.'),
// (4, 'alquiler', 'Calle Violeta, 4', 'Trobajo del camino', '42.6006657','-5.6112042','piso', 'Piso exterior, magníficas calidades, luminoso, reformado y amueblado íntegramente, zona San Mamés- La Palomera, próximo a la universidad; distribuido en 3 dormitorios con armarios empotrados, dos baños en Silestone (1 con bañera y 1 con plato de ducha), cocina, salón, dos terrazas (una de ellas con superficie de 26 m2)'),
// (5, 'venta', 'Calle de la Margarita, 35', 'Trobajo del camino', '42.600403','-5.6089684','piso', 'Distribuida en cuatro dormitorios con armarios empotrados (principal con vestidor), salón, cocina americana separada del salón por cristalera y dos baños.'),
// (6, 'alquiler', 'Calle Misericordia, 35', 'Trobajo del camino', '42.5975248','-5.6073688','piso', 'La vivienda está lista para entrar a vivir '),
// (7, 'venta', 'Calle San Juan de la Cruz, 18', 'Trobajo del camino', '42.5976446','-5.612014','chalet', 'Además de la utilización del bajo cubierta diáfana con acceso a una magnifica terraza y una planta sótano con garaje y bodega. Dispone de Planta Baja con salida al jardín de 37m2 y estancia polivalente (despacho profesional).'),
// (8, 'alquiler', 'Calle Cervantes, 27', 'Villabalter', '42.6233098','-5.621031','chalet', 'Se alquila piso todo exterior muy soleado de cuatro habitaciones, dos baños, amplio salón, cocina completamente equipada, garaje y trastero, calefacción central con contador, comunidad incluida. '),
// (9, 'venta', 'Calle Real, 31', 'Villabalter', '42.6226501','-5.6168756','piso', '2 habitaciones dobles y una habitación sencilla, un baño, propiedad para entrar a vivir, cocina equipada, carpintería interior de madera, orientación este, gres y parquet, carpintería exterior de pvc / climalit.'),
// (10, 'alquiler', 'Calle Barcaduro, 21', 'Villabalter','42.6218843','-5.6210995', 'chalet', '3 habitaciones, 1 vestidor, 2 baños, 2 terrazas una de ellas cerrada, cocina equipada con electrodomésticos, amueblado, 4 camas, calefacción y agua caliente individual de gas, parquet en habitaciones, puerta de seguridad, trastero.'),
// (11, 'alquiler', 'Calle el Pozo, 5', 'Villabalter', '42.6208569','-5.6221012','piso', 'Coqueto y cuidado apartamento amueblado ubicado cerca (pegando) al Paseo Salamanca.');
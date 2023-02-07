<?php
require_once "php/funciones.php";
$terre = obtenerTerremotos();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Maps API</title>
    <!-- AIzaSyDdPERm4mlw0gXnacOamDfcEqtq_pLjf3U -->
    <link rel="stylesheet" crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3">
    <link rel="stylesheet" type="text/css " href="css/estilos.css" />
</head>

<body>
    <header class="container-fluid bg-primary text-white py-2">
        <h1>Ejemplo Maps</h1>
    </header>
    <!-- Necesitamos un div con id='map' -->
    <div id="map" class="container-fluid">

    </div>
    <footer class="container-fluid bg-primary text-center text-white py-1">
        <p>&copy; Oscar Hernando Tejedor</p>
    </footer>
</body>
<script crossorigin="anonymous" src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p">
</script>
<script>
    function initMap() {
        let map = new google.maps.Map(document.getElementById("map"), {
            center: {
                lat: 40,
                lng: -4
            },
            zoom: 6.5,
        });
    }
</script>
<script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDdPERm4mlw0gXnacOamDfcEqtq_pLjf3U&callback=initMap">
</script>
<script>
    console.log(<?php echo json_encode($terre); ?>);
    function initMap() {
        let map = new google.maps.Map(document.getElementById("map"), {
            center: {
                lat: 40,
                lng: -4
            },
            zoom: 6,
            mapTypeId: 'terrain',
        });
        let points = JSON.parse('<?php echo json_encode($terre); ?>');
        for (var i = 0; i < points.length; i++) {
            let nombre = points[i].nombre;
            let latLng = new google.maps.LatLng(points[i].lat, points[i].lng);
            let marker = new google.maps.Marker({
                position: latLng,
                title: nombre,
                map: map,
            });
        }
    }
</script>

</html>
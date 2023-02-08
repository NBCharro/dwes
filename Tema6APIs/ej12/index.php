<?php
require_once "php/funciones.php";
$localidad = 'Todas';
$tipo = 'Todas';
if (isset($_REQUEST['tipo'])) {
	$tipo = $_REQUEST['tipo'];
}
if (isset($_REQUEST['localidad'])) {
	$localidad = $_REQUEST['localidad'];
}
$viviendas = obtenerViviendas($tipo, $localidad);
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
	<header class="container-fluid py-2">
		<h1>Inmobiliaria</h1>
		<nav class="navbar navbar-expand-lg bg-body-tertiary">
			<div class="container-fluid">
				<div id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="#">Mapa</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="./agregar.php">Formulario</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<form>
		<div class="container text-center">
			<div class="row align-items-center">
				<div class="col">
					<select class="form-select" aria-label="Default select example" name="tipo" onchange="this.form.submit()">
						<option selected>Todas</option>
						<option <?php echo $tipo == 'Alquiler' ? "selected" : "" ?>>Alquiler</option>
						<option <?php echo $tipo == 'Venta' ? "selected" : "" ?>>Venta</option>
					</select>
				</div>
				<div class="col">
					<select class="form-select" aria-label="Default select example" name="localidad" onchange="this.form.submit()">
						<option selected>Todas</option>
						<option <?php echo $localidad == 'León' ? "selected" : "" ?>>León</option>
						<option <?php echo $localidad == 'Trobajo del camino' ? "selected" : "" ?>>Trobajo del camino</option>
						<option <?php echo $localidad == 'Villabalter' ? "selected" : "" ?>>Villabalter</option>
					</select>
				</div>
			</div>
		</div>
	</form>
	<!-- Necesitamos un div con id='map' -->
	<div id="map" class="container-fluid"></div>
	<footer class="container-fluid bg-primary text-center text-white py-1">
		<p>&copy; Nelson Blanco Charro</p>
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
	console.log(<?php echo json_encode($viviendas); ?>);

	function initMap() {
		let map = new google.maps.Map(document.getElementById("map"), {
			center: {
				lat: 42.6,
				lng: -5.6
			},
			zoom: 13.5,
			mapTypeId: 'terrain',
		});
		let points = JSON.parse('<?php echo json_encode($viviendas); ?>');
		for (var i = 0; i < points.length; i++) {
			$icono = "./icons/";
			if (points[i].vivienda == "piso") {
				$icono += "piso";
			} else {
				$icono += "casa";
			}
			if (points[i].tipo == "venta") {
				$icono += "Venta";
			} else {
				$icono += "Alquiler";
			}
			$icono += ".png";
			let nombre = points[i].direccion;
			let latLng = new google.maps.LatLng(points[i].lat, points[i].lon);
			let marker = new google.maps.Marker({
				position: latLng,
				title: nombre,
				map: map,
				icon: $icono,
			});
		}
	}
</script>

</html>
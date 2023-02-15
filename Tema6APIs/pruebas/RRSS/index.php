<?php
$file = "http://feeds.feedburner.com/experiment_podcast";
$xml = simplexml_load_file($file) or die("Archivo no encontrado");
if ($xml) {
	$items = $xml->xpath("//item");
	$datos = array();
	foreach ($items as $item) {
		$datos[] = array(
			'titulo' => $item->title->__toString(),
			'link' => $item->link->__toString(),
			'pubDate' => $item->pubDate->__toString(),
			'description' => $item->children('itunes', TRUE)->title->__toString(),
		);
	}
}
// echo '<pre>';
// print_r($datos);
// echo '</pre>';
$fichero = new DOMDocument();
$fichero->load("http://feeds.feedburner.com/experiment_podcast");
$items = $fichero->getElementsByTagName("item");
$podcast = array();
foreach ($items as $item) {
	$podcast[] = array(
		'titulo' => $item->getElementsByTagName("title")[0]->textContent,
		'link' => $item->getElementsByTagName("link")[0]->textContent,
		'pubDate' => $item->getElementsByTagName("pubDate")[0]->textContent,
	);
}
echo '<pre>';
print_r($podcast);
echo '</pre>';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>RRSS</title>
</head>

<body>

</body>

</html>
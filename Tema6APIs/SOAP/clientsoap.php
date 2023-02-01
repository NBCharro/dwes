<?php
require_once __DIR__ . '/vendor/autoload.php';
$wsdl = "http://localhost/dwes/Tema6APIs/SOAP/serversoap.php?wsdl";
$cliente = new \Zend\Soap\Client($wsdl);
$result = $cliente->hola(['nombre' => 'Pepe']);
echo "<h2>{$result->holaResult}</h2>";
$result = $cliente->alreves(['palabra' => 'hola']);
echo "<h2>{$result->alrevesResult}</h2>";
$result = $cliente->factorial(['numero' => '5']);
echo "<h2>{$result->factorialResult}</h2>";

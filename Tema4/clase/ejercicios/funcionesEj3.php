<?php
function mostrarClientes()
{
    $clientes = false;
    try {
        $fileCustomers = file_get_contents("../data/customers.json");
        if ($fileCustomers) {
            $clientes = json_decode($fileCustomers, true);
        }
    } catch (Exception $e) {
        # code...
    }
    return $clientes;
}

function guardarCliente($clientenuevo)
{
    $agregado = false;
    try {
        $fileCustomers = file_get_contents("../data/customers.json");
        if ($fileCustomers) {
            $customersJSON = json_decode($fileCustomers, true);
            $customersJSON[] = $clientenuevo;
            $customersJSON = json_encode($customersJSON);
            if (file_put_contents("../data/customers.json", $customersJSON)) {
                $agregado = true;
            }
        }
    } catch (Exception $e) {
        # code...
    }
    return $agregado;
}

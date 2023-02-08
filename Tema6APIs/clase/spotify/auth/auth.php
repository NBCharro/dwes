<?php
require_once '../vendor/autoload.php';
require_once './sesion.php';

$state = $session->generateState();
$options = [
    'scope' => [
        'playlist-read-private',
        'user-read-private',
    ],
    'state' => $state,
];
header('Location: ' . $session->getAuthorizeUrl($options));
die();

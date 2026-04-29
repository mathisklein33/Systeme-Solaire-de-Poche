<?php

$host = $_SERVER['HTTP_HOST'];

if ($host === 'localhost') {
    define('BASE_URL', 'http://localhost/Systeme-Solaire-de-Poche/');
} elseif (strpos($host, '.loc') !== false) {
    define('BASE_URL', 'http://' . $host . '/');
} else {
    define('BASE_URL', 'https://' . $host . '/');
}

define('ASSETS_URL', BASE_URL . 'assets/');
define('MODELS_URL', ASSETS_URL . 'models/');

define('DEBUG', true);

if (DEBUG) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

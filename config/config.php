<?php

define('BASE_URL', '#');


define('ASSETS_URL', BASE_URL . 'assets/');
define('MODELS_URL', ASSETS_URL . 'models/');

define('DEBUG', true);

if (DEBUG) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}

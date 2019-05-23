<?php
/**
 * bootstrap.php
 * Load and Set 'Slim\App', 'Middlewares'
 */

# Local
require_once "vendor/autoload.php";

# Servidor 000webhost

// $path = '/storage/ssd2/522/8805522/';
// require_once $path . "vendor/autoload.php";

use app\classes\Middlewares;
use Slim\App;

$config['displayErrorDetails'] = true;
$app = new App(['settings' => $config]);

$middleware = new Middlewares;
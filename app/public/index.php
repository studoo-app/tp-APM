<?php
require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use Apps\Core\Controller\FastRouteCore;

// Gestion des fichiers environnement
$dotenv = Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

// Couche Controller
$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $route) {
    $route->addRoute('GET', '/', 'Apps\Controller\HomeController');
    $route->addRoute('GET', '/dons', 'Apps\Controller\ListePromesseDonsController');
    $route->addRoute(['GET','POST'], '/dons/nouveau', 'Apps\Controller\AjouterPromesseDonController');
    $route->addRoute('GET', '/dons/{id:\d+}', 'Apps\Controller\DetailPromesseDonController');
    $route->addRoute(['GET','POST'], '/dons/{id:\d+}/modifier', 'Apps\Controller\ModifierPromesseDonController');
    $route->addRoute('POST', '/dons/{id:\d+}/supprimer', 'Apps\Controller\SupprimerPromesseDonController');
});
// Dispatcher -> Couche view
echo FastRouteCore::getDispatcher($dispatcher);


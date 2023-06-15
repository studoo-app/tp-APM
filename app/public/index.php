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
//    $route->addRoute('GET', '/lister', 'Apps\Controller\Questionnaire\ListController');
//    $route->addRoute('GET', '/detail/{id:\d+}', 'Apps\Controller\Questionnaire\ViewController');
});
// Dispatcher -> Couche view
echo FastRouteCore::getDispatcher($dispatcher);


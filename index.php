<?php
session_start();

// Inclure la configuration de la base de données
require_once __DIR__ . '/config/database.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Autoloader simple
spl_autoload_register(function ($class) {
    $file = __DIR__ . '/src/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

use Core\Router;
use Core\Middleware\AuthMiddleware;
use Controllers\HomeController;
use Controllers\AuthController;
use Controllers\DashboardController;
use Controllers\OCController;
use Controllers\RaceController;
use Controllers\SettingsController;
use Controllers\DatabaseController;

$router = new Router();

// Routes publiques
$router->get('/', [HomeController::class, 'index']);
$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'authenticate']);
$router->get('/legal', [HomeController::class, 'legal']);

// Routes protégées
$router->group(['middleware' => AuthMiddleware::class], function($router) {
    $router->get('/dashboard', [DashboardController::class, 'index']);
    $router->get('/logout', [AuthController::class, 'logout']);
    
    // Gestion des OC
    $router->get('/ocs', [OCController::class, 'index']);
    $router->get('/ocs/create', [OCController::class, 'create']);
    $router->post('/ocs/store', [OCController::class, 'store']);
    $router->get('/ocs/edit/{id}', [OCController::class, 'edit']);
    $router->post('/ocs/update/{id}', [OCController::class, 'update']);
    $router->post('/ocs/delete/{id}', [OCController::class, 'delete']);
    
    // Gestion des races
    $router->get('/races', [RaceController::class, 'index']);
    $router->get('/races/create', [RaceController::class, 'create']);
    $router->post('/races/store', [RaceController::class, 'store']);
    $router->get('/races/edit/{id}', [RaceController::class, 'edit']);
    $router->post('/races/update/{id}', [RaceController::class, 'update']);
    $router->post('/races/delete/{id}', [RaceController::class, 'delete']);
    
    // Paramètres et import/export
    $router->get('/settings', [SettingsController::class, 'index']);
    $router->get('/settings/custom-fields', [SettingsController::class, 'customFieldsView']);
    $router->get('/settings/database', function() {
        include 'views/settings/database.php';
    });
    $router->post('/settings/export', [SettingsController::class, 'export']);
    $router->post('/settings/import', [SettingsController::class, 'import']);
    $router->post('/settings/custom-fields', [SettingsController::class, 'customFields']);
    
    // API pour la base de données
    $router->post('/api/database/test', [DatabaseController::class, 'testConnection']);
    $router->post('/api/database/info', [DatabaseController::class, 'info']);
    $router->post('/api/database/migrate', [DatabaseController::class, 'migrate']);
    $router->post('/api/database/seed', [DatabaseController::class, 'seed']);
});

try {
    $router->dispatch();
} catch (Exception $e) {
    http_response_code(500);
    include 'views/errors/500.php';
}
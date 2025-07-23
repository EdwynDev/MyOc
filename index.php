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
use Controllers\CommunityController;
use Controllers\CommunityAuthController;

$router = new Router();

// Routes publiques
$router->get('/', [HomeController::class, 'index']);
$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'authenticate']);
$router->get('/legal', [HomeController::class, 'legal']);

// Routes communautaires publiques
$router->get('/community', [CommunityController::class, 'index']);
$router->get('/community/ocs', [CommunityController::class, 'ocs']);
$router->get('/community/races', [CommunityController::class, 'races']);
$router->get('/community/oc/{id}', [CommunityController::class, 'viewOC']);
$router->get('/community/race/{id}', [CommunityController::class, 'viewRace']);
$router->get('/community/profile/{username}', [CommunityController::class, 'profile']);

// Authentification communautaire
$router->get('/community/login', [CommunityAuthController::class, 'login']);
$router->post('/community/login', [CommunityAuthController::class, 'handleLogin']);
$router->get('/community/register', [CommunityAuthController::class, 'register']);
$router->post('/community/register', [CommunityAuthController::class, 'handleRegister']);
$router->get('/community/logout', [CommunityAuthController::class, 'logout']);
$router->get('/community/profile', [CommunityAuthController::class, 'profile']);
$router->post('/community/profile', [CommunityAuthController::class, 'profile']);

// API communautaire
$router->post('/community/like-oc', [CommunityController::class, 'likeOC']);
$router->post('/community/like-race', [CommunityController::class, 'likeRace']);
$router->post('/community/add-comment', [CommunityController::class, 'addComment']);
$router->get('/community/publish-oc', [CommunityController::class, 'publishOC']);
$router->post('/community/publish-oc', [CommunityController::class, 'publishOC']);
$router->get('/community/publish-race', [CommunityController::class, 'publishRace']);
$router->post('/community/publish-race', [CommunityController::class, 'publishRace']);

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
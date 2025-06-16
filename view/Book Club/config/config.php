<?php
// Configurações do site
define('SITE_NAME', 'Book Club');
define('BASE_URL', 'http://localhost/Book%20Club/');

// Configurações do banco de dados
define('DB_HOST', 'localhost');
define('DB_NAME', 'book_club');
define('DB_USER', 'root');
define('DB_PASS', '');

// Carrega as rotas
require_once __DIR__ . '/routes.php';
$routes = require __DIR__ . '/routes.php';

// Carrega as rotas protegidas
require_once __DIR__ . '/auth_routes.php';
$authRoutes = require __DIR__ . '/auth_routes.php';

// Carrega os middlewares
require_once __DIR__ . '/../middleware/auth.php';
require_once __DIR__ . '/../middleware/role.php';
require_once __DIR__ . '/../middleware/session.php';
require_once __DIR__ . '/../middleware/csrf.php';

// Função para gerar links baseados nas rotas
function generateLink($routeName) {
    global $routes;
    
    if (!isset($routes[$routeName])) {
        throw new Exception("Rota não encontrada: {$routeName}");
    }
    
    return BASE_URL . $routes[$routeName];
}

// Função para obter o nome da rota atual
function getCurrentRoute() {
    $currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $currentPath = substr($currentPath, strlen(BASE_URL));
    
    global $routes;
    foreach ($routes as $routeName => $routePath) {
        if ($routePath === $currentPath) {
            return $routeName;
        }
    }
    return null;
}

// Função para verificar se uma rota é protegida
function isProtectedRoute($routeName) {
    global $authRoutes;
    return in_array($routeName, $authRoutes['protected']);
}

// Função para verificar autenticação
function checkAuthentication() {
    $middleware = new \BookClub\Middleware\AuthMiddleware();
    $middleware->handle($_SERVER, $_SESSION, function() {});
}

// Função para verificar role
function checkRole() {
    $middleware = new \BookClub\Middleware\RoleMiddleware();
    $middleware->handle($_SERVER, $_SESSION, function() {});
}

// Função para verificar sessão
function checkSession() {
    $middleware = new \BookClub\Middleware\SessionMiddleware();
    $middleware->handle($_SERVER, $_SESSION, function() {});
}

// Função para verificar CSRF
function checkCsrf() {
    $middleware = new \BookClub\Middleware\CsrfMiddleware();
    $middleware->handle($_SERVER, $_SESSION, function() {});
}

// Inicia sessão
session_start();

// Verifica todas as verificações necessárias
checkSession();
checkAuthentication();
checkRole();
checkCsrf();

// Função para redirecionar
function redirect($path) {
    header('Location: ' . generateLink($path));
    exit();
}
?>
session_start();

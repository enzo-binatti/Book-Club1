<?php
namespace BookClub\Middleware;

class AuthMiddleware
{
    public static function handle($request, $response, $next)
    {
        // Verifica se a rota atual está na lista de rotas protegidas
        $currentRoute = $_GET['route'] ?? null;
        $authRoutes = require __DIR__ . '/../config/auth_routes.php';
        
        if ($currentRoute && in_array($currentRoute, $authRoutes['protected'])) {
            // Verifica se o usuário está logado
            if (!isset($_SESSION['user_id'])) {
                // Se não estiver logado, redireciona para a página de login
                header('Location: ' . generateLink('login'));
                exit();
            }
            
            // Verifica se o usuário tem permissão para acessar esta rota
            $userRole = $_SESSION['user_role'] ?? 'user';
            
            if ($currentRoute === 'Seja um Entregador Book Club' && $userRole !== 'entregador') {
                header('Location: ' . generateLink('home'));
                exit();
            }
        }
        
        // Se tudo estiver ok, continua com a requisição
        return $next($request, $response);
    }
}

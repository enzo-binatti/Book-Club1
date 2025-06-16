<?php
namespace BookClub\Middleware;

class RoleMiddleware
{
    public static function handle($request, $response, $next)
    {
        // Verifica se o usuário está logado
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . generateLink('login'));
            exit();
        }
        
        // Verifica o papel do usuário
        $userRole = $_SESSION['user_role'] ?? 'user';
        $allowedRoles = [
            'user' => ['home', 'carrinho', 'produto', 'Audio-book com IA', 'E-book com IA', 'vender livro usado'],
            'admin' => ['home', 'carrinho', 'produto', 'Audio-book com IA', 'E-book com IA', 'vender livro usado', 'admin_panel'],
            'entregador' => ['home', 'carrinho', 'produto', 'Audio-book com IA', 'E-book com IA', 'vender livro usado', 'entregador_panel']
        ];
        
        // Verifica se a rota atual está na lista de rotas permitidas para o papel do usuário
        $currentRoute = $_GET['route'] ?? null;
        
        if ($currentRoute && !in_array($currentRoute, $allowedRoles[$userRole])) {
            header('Location: ' . generateLink('home'));
            exit();
        }
        
        return $next($request, $response);
    }
}

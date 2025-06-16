<?php
namespace BookClub\Middleware;

class CsrfMiddleware
{
    public static function handle($request, $response, $next)
    {
        // Inicia a sessão
        session_start();
        
        // Gera token CSRF se não existir
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        
        // Verifica se é uma requisição POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Verifica se o token CSRF está presente e é válido
            $token = $_POST['csrf_token'] ?? '';
            
            if (empty($token) || !hash_equals($_SESSION['csrf_token'], $token)) {
                header('HTTP/1.1 403 Forbidden');
                echo 'Token CSRF inválido';
                exit();
            }
        }
        
        // Adiciona o token CSRF ao response
        $response['csrf_token'] = $_SESSION['csrf_token'];
        
        return $next($request, $response);
    }
}

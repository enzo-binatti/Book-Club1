<?php
namespace BookClub\Middleware;

class SessionMiddleware
{
    public static function handle($request, $response, $next)
    {
        // Inicia a sessão
        session_start();
        
        // Verifica se a sessão expirou
        $sessionTimeout = 3600; // 1 hora
        if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $sessionTimeout)) {
            session_destroy();
            header('Location: ' . generateLink('login'));
            exit();
        }
        
        // Atualiza o timestamp da última atividade
        $_SESSION['last_activity'] = time();
        
        return $next($request, $response);
    }
}

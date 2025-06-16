<?php
session_start();
if (isset($_SESSION['mensagem'])) {
    echo "<p class='{$_SESSION['tipo']}'> {$_SESSION['mensagem']} </p>";
    unset($_SESSION['mensagem']);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Senha</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h2>Redefinir Senha</h2>
        <form method="POST" action="../controller/AuthController.php">
            <label for="nova_senha">Nova Senha:</label>
            <input type="password" name="nova_senha" required><br><br>
            
            <label for="confirmar_senha">Confirmar Nova Senha:</label>
            <input type="password" name="confirmar_senha" required><br><br>
            
            <button type="submit" name="trocar_senha">Alterar Senha</button>
        </form>
        <p><a href="login.php">Voltar ao login</a></p>
    </div>
</body>
</html>

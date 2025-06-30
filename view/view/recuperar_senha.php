<?php
session_start(); // Inicia a sessão

// Função para redirecionar com mensagem
function setMessageAndRedirect($message, $messageType, $redirectPage) {
    $_SESSION['message'] = $message;
    $_SESSION['message_type'] = $messageType; // Pode ser 'success' ou 'error'
    header("Location: $redirectPage"); // Redireciona para a mesma página
    exit();
}

// Simulando o banco de dados com um array de usuários
$usuarios = [
    'usuario@example.com' => [
        'nome' => 'Matheus Vieira'
    ]
];

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['recuperar'])) {
    $email = $_POST['email'];

    // Verifica se o e-mail está cadastrado
    if (isset($usuarios[$email])) {
        // Gera um código aleatório
        $codigo_recuperacao = rand(100000, 999999);

        // Simula salvar o código no banco de dados
        $_SESSION['codigo_recuperacao'] = $codigo_recuperacao;
        $_SESSION['email_recuperacao'] = $email;

        // Simula o envio do código para o e-mail (não será realmente enviado, apenas mostrado)
        // Aqui você pode usar a função mail() do PHP para enviar o código real para o e-mail

        // Exibe uma mensagem de sucesso
        setMessageAndRedirect("O código de recuperação foi enviado para seu e-mail.", "success", "recuperar_senha.php");
    } else {
        // Caso o e-mail não esteja cadastrado
        setMessageAndRedirect("Este e-mail não está cadastrado. Verifique e tente novamente.", "error", "recuperar_senha.php");
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperação de Senha</title>
   <link rel="stylesheet" href="../css/styles.css">
    <style>/* Resetando alguns estilos padrão */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* Container do formulário de recuperação */
.recuperar-container {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
    text-align: center;
}

/* Título */
h2 {
    margin-bottom: 20px;
    font-size: 24px;
    color: #333;
}

/* Estilo dos campos de input */
.input-group {
    margin-bottom: 15px;
    text-align: left;
}

.input-group label {
    display: block;
    font-size: 14px;
    margin-bottom: 5px;
    color: #555;
}

.input-group input {
    width: 100%;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: #f9f9f9;
}

.input-group input:focus {
    border-color: #66afe9;
    background-color: #fff;
}

/* Botão de enviar código */
button {
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}

/* Estilo para mensagens */
.message {
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 5px;
}

.message.success {
    background-color: #dff0d8;
    color: #3c763d;
}

.message.error {
    background-color: #f2dede;
    color: #a94442;
}

/* Links */
.links {
    margin-top: 10px;
}

.links a {
    color: #007bff;
    text-decoration: none;
}

.links a:hover {
    text-decoration: underline;
}
</style>
</head>
<body>
    <div class="recuperar-container">
        <h2>Recuperar Senha</h2>

        
        <?php if (isset($_SESSION['message'])): ?>
            <div class="message <?php echo $_SESSION['message_type']; ?>">
                <?php echo $_SESSION['message']; ?>
            </div>
            <?php unset($_SESSION['message'], $_SESSION['message_type']); ?>
        <?php endif; ?>

        <form action="recuperar_senha.php" method="POST">
            <div class="input-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" required placeholder="Digite seu e-mail">
            </div>
            <button type="submit" name="recuperar" href="http://matheusvasilveira@gmail.comlocalhost/phpmyadmin/index.php?route=/sql&pos=0&db=login2&table=pessoa">Enviar Código</button>
        </form>

        <div class="links">
            <a href="login.php">Já tem uma conta? Faça login.</a>
        </div>
    </div>
</body>
</html>

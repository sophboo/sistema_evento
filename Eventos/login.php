<?php
session_start();
require_once "C:/Turma2/xampp/htdocs/eventos/Eventos/DB/DataBase.php";
require_once "C:/Turma2/xampp/htdocs/eventos/Eventos/Controller/ParticipantesController.php";

$ParticipantesController = new ParticipantesController($pdo);
$mensagemErro = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $Participantes = $ParticipantesController->login($email);

    if ($Participantes != null) {
        $_SESSION["participante"] = $Participantes["id"];
        header('Location: index.php');
        exit;
    } else {
        $mensagemErro = "Erro ao logar";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <main class="login-layout">
        <div class="login-box">
            <h2>Login</h2>
            <p class="subtitle">Entre com seu email para acessar a area de eventos.</p>

            <form method="POST">
                <label for="email">E-mail</label>
                <input type="email" name="email" placeholder="Digite seu email" required>
                <button type="submit">Entrar</button>
                <a class="button-link" href="View/Participantes/cadastrar.php">Criar conta</a>
            </form>

            <?php if ($mensagemErro !== ""): ?>
                <div class="message"><?= $mensagemErro; ?></div>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>

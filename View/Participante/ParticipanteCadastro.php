<?php
require_once "C:\Turma2\xampp\htdocs\sistema_evento\DB\DataBase.php";
require_once "C:\Turma2\xampp\htdocs\sistema_evento\Controller\ParticipantesController.php";

$ParticipantesController = new ParticipantesController($pdo);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if ($ParticipantesController->cadastrar($nome, $telefone, $email, $senha) === true) {
        header('Location: ../../index.php');
        exit;
    } else {
        echo "erro ao cadatrar";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuario</title>
    <link rel="stylesheet" href="../../assets/style.css">
</head>
<body>
    <main class="form-layout">
        <div class="form-card">
            <h2>Cadastrar Participante</h2>
            <p class="subtitle">Preencha os dados para entrar no sistema.</p>

            <form method="post">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" required>

                <label for="email">E-mail:</label>
                <input type="text" name="email" required>

                <label for="telefone">Telefone:</label>
                <input type="number" name="telefone" required>

                <label for="senha">Senha:</label>
                <input type="password" name="senha" required>

                <input type="submit" value="Cadastrar">
                <a class="button-link" href="../../login.php">Voltar</a>
            </form>
        </div>
    </main>
</body>
</html>
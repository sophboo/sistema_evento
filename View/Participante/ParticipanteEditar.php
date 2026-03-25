<?php
require_once "C:/Turma2/xampp/htdocs/sistema_evento/DB/DataBase.php";
require_once "C:/Turma2/xampp/htdocs/sistema_evento/Controller/ParticipantesController.php";

$participantesController = new ParticipantesController($pdo);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $participante = $participantesController->buscarParticipante($id);
} else {
    header('Location: listar.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];

    $participantesController->editar($nome, $telefone, $email, $id);
    header('Location: ../../index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Participante</title>
    <link rel="stylesheet" href="../../assets/style.css">
</head>
<body>
    <main class="form-layout">
        <div class="form-card">
            <h2>Editar Participante</h2>
            <p class="subtitle">Atualize as informações do participante.</p>

            <form method="post">
                <label for="nome">Nome completo:</label>
                <input type="text" name="nome" value="<?= $participante['nome']; ?>" required>

                <label for="email">E-mail:</label>
                <input type="email" name="email" value="<?= $participante['email']; ?>" required>

                <label for="telefone">Telefone:</label>
                <input type="tel" name="telefone" value="<?= $participante['telefone']; ?>" required>

                <input type="submit" value="Salvar Alterações">
                <a class="button-link" href="../../index.php">Cancelar</a>
            </form>
        </div>
    </main>
</body>
</html>
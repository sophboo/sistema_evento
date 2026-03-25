<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Eventos</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <main class="page-shell">
        <section class="hero">
            <h1>Painel de Eventos</h1>
            <p>Visual moderno com ações organizadas para eventos, participantes e inscrições.</p>
        </section>

        <?php
        require_once "C:/Turma2/xampp/htdocs/sistema_evento/DB/DataBase.php";
        require_once "C:/Turma2/xampp/htdocs/sistema_evento/Controller/EventoController.php";

        $EventoController = new EventoController($pdo);
        $EventoController->listar();
        ?>

        <?php
        require_once "C:/Turma2/xampp/htdocs/sistema_evento/Controller/ParticipantesController.php";

        $ParticipantesController = new ParticipantesController($pdo);
        $ParticipantesController->listar();
        ?>

        <?php
        require_once "C:/Turma2/xampp/htdocs/sistema_evento/Controller/InscricaoController.php";

        $InscricaoController = new InscricaoController($pdo);
        $InscricaoController->listar();
        ?>
    </main>
</body>
</html>
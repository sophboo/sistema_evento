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
        require_once "C:/Turma2/xampp/htdocs/eventos/Eventos/DB/DataBase.php";
        require_once "C:/Turma2/xampp/htdocs/eventos/Eventos/Controller/EventoController.php";

        $eventosController = new EventosController($pdo);
        $eventosController->listar();
        ?>

        <?php
        require_once "C:/Turma2/xampp/htdocs/eventos/Eventos/Controller/ParticipantesController.php";

        $participantesController = new ParticipantesController($pdo);
        $participantesController->listar();
        ?>

        <?php
        require_once "C:/Turma2/xampp/htdocs/eventos/Eventos/Controller/InscricaoController.php";

        $inscricaoController = new InscricaoController($pdo);
        $inscricaoController->listar();
        ?>
    </main>
</body>
</html>
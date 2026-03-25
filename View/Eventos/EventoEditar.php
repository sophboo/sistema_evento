<?php
require_once "C:/Turma2/xampp/htdocs/sistema_evento/DB/DataBase.php";
require_once "C:/Turma2/xampp/htdocs/sistema_evento/Controller/EventoController.php";

$EventoController = new EventoController($pdo);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $Eventos = $EventoController->buscarEventos($id);
} else {
    header('Location: EventoListar.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $evento = $_POST['evento'];
    $descricao = $_POST['descricao'];
    $data = $_POST['data'];
    $horario = $_POST['horario'];
    $local = $_POST['local'];
    $quantidade_participantes = $_POST['quantidade_participantes'];

    $EventoController->editar($evento, $descricao, $data, $horario, $local, $quantidade_participantes, $id);
    header('Location: ../../index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Evento</title>
    <link rel="stylesheet" href="../../assets/style.css">
</head>
<body>
    <main class="form-layout">
        <div class="form-card">
            <h2>Editar Evento</h2>
            <p class="subtitle">Ajuste os dados do evento selecionado.</p>

            <form method="post">
                <label for="evento">Evento:</label>
                <input type="text" name="evento" value="<?=$Eventos['evento'];?>" required>

                <label for="descricao">Descricao:</label>
                <input type="text" name="descricao" value="<?=$Eventos['descricao'];?>" required>

                <label for="data">Data:</label>
                <input type="date" name="data" value="<?=$Eventos['data'];?>" required>

                <label for="horario">Horario:</label>
                <input type="time" name="horario" value="<?=$Eventos['horario'];?>" required>

                <label for="local">Local:</label>
                <input type="text" name="local" value="<?=$Eventos['local'];?>" required>

                <label for="quantidade_participantes">Maximo de participantes:</label>
                <input type="text" name="quantidade_participantes" value="<?=$Eventos['quantidade_participantes'];?>" required>

                <input type="submit" value="Salvar">
                <a class="button-link" href="../../index.php">Cancelar</a>
            </form>
        </div>
    </main>
</body>
</html>
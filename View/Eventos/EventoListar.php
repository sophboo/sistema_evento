<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once "C:/Turma2/xampp/htdocs/sistema_evento/DB/DataBase.php";
require_once "C:/Turma2/xampp/htdocs/sistema_evento/Controller/ParticipantesController.php";
require_once "C:/Turma2/xampp/htdocs/sistema_evento/Controller/EventoController.php";

global $pdo;
$ParticipantesController = new ParticipantesController($pdo);
$EventoController = new EventoController($pdo);
$mensagem = "";

if (!isset($_SESSION['participante'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_evento = $_POST['id_evento'];
    $id_participante = $_POST['id_participante'];

    $inscrito = $ParticipantesController->verificarInscricao($id_evento, $id_participante);
    $total = $EventoController->contarInscritos($id_evento);
    $limite = $EventoController->buscarLimiteParticipantes($id_evento);

    if ($inscrito > 0) {
        $mensagem = "Voce ja esta inscrito neste evento";
    } elseif ($total >= $limite) {
        $mensagem = "Evento lotado!";
    } else {
        if ($ParticipantesController->inscricao($id_evento, $id_participante) === true) {
            $mensagem = "Inscricao feita com sucesso";
        } else {
            $mensagem = "Erro ao cadastrar";
        }
    }

}

echo "<section class='table-card'>";
echo "<div class='hero'><h2>Eventos</h2><p>Escolha seu proximo evento e acompanhe o limite de participantes.</p></div>";

if (empty($eventos)) {
    echo "<p class='message'>Nenhum evento encontrado!</p>";
    echo "<div class='toolbar'><a class='button-link' href='View/Eventos/EventoCadastrar.php'>Cadastrar</a></div>";
    echo "</section>";
}

if ($mensagem !== "") {
    echo "<div class='message'>{$mensagem}</div>";
}

echo "<div class='toolbar'><a class='button-link' href='View/Eventos/EventoCadastrar.php'>Cadastrar</a></div>";
echo "<table>";
echo "<tr><th>ID</th><th>Evento</th><th>Descricao</th><th>Data</th><th>Horario</th><th>Local</th><th>Maximo</th><th>Acoes</th></tr>";

foreach ($eventos as $evento) {
    $id = $evento['id'];
    $totalInscritos = $EventoController->contarInscritos($id);
    $eventoLotado = $totalInscritos >= $evento['quantidade_participantes'];
    $textoBotao = $eventoLotado ? "Lotado" : "Inscrever";
    $desabilitado = $eventoLotado ? "disabled" : "";

    echo "<tr>";
    echo "<td>{$id}</td>";
    echo "<td>{$evento['evento']}</td>";
    echo "<td>{$evento['descricao']}</td>";
    echo "<td>{$evento['data']}</td>";
    echo "<td>{$evento['horario']}</td>";
    echo "<td>{$evento['local']}</td>";
    echo "<td>{$totalInscritos}/{$evento['quantidade_participantes']}</td>";
    echo "<td><div class='actions'>
                <a class='action-link secondary' href='View/Eventos/EventoEditar.php?id={$id}'>Editar</a>
                <a class='action-link' href='View/Eventos/EventoDeletar.php?id={$id}' onclick=\"return confirm('Tem certeza que deseja excluir este evento?')\">Deletar</a>
                <form class='inline-form' method='post'>
                    <input type='hidden' value='{$id}' name='id_evento'>
                    <input type='hidden' value='{$_SESSION["participante"]}' name='id_participante'>
                    <input type='submit' value='{$textoBotao}' {$desabilitado}>
                </form>
            </div></td>";
    echo "</tr>";
}

echo "</table>";
echo "</section>";
?>
<?php
echo "<section class='table-card'>";
echo "<div class='hero'><h2>Participantes</h2><p>Gerencie os usuarios cadastrados no sistema.</p></div>";

if (empty($Participantes)) {
    echo "<p class='message'>Nenhum participante encontrado!</p>";
    echo "<div class='toolbar'><a class='button-link' href='View/Participante/ParticipanteCadastrar.php'>Cadastrar</a></div>";
    echo "</section>";
    return;
}

echo "<div class='toolbar'><a class='button-link' href='View/Participante/ParticipanteCadastrar.php'>Cadastrar</a></div>";
echo "<table>";
echo "<tr><th>ID</th><th>Nome</th><th>Email</th><th>Telefone</th><th>Acoes</th></tr>";

foreach ($Participantes as $participante) {
    $id = $participante['id'];
    echo "<tr>";
    echo "<td>{$id}</td>";
    echo "<td>{$participante['nome']}</td>";
    echo "<td>{$participante['email']}</td>";
    echo "<td>{$participante['telefone']}</td>";
    echo "<td><div class='actions'>
                <a class='action-link secondary' href='View/Participante/ParticipanteEditar.php?id={$id}'>Editar</a>
                <a class='action-link' href='View/Participante/ParticipanteDeletar.php?id={$id}' onclick=\"return confirm('Tem certeza que deseja excluir este participante?')\">Deletar</a>
            </div></td>";
    echo "</tr>";
}

echo "</table>";
echo "</section>";
<?php
echo "<section class='table-card'>";
echo "<div class='hero'><h2>Inscrições Confirmadas</h2><p>Lista de participantes e seus respectivos eventos.</p></div>";

if (empty($Inscricoes)) {
    echo "<p class='message'>Nenhuma inscrição realizada até o momento.</p>";
} else {
    echo "<table>";
    echo "<tr><th>Participante</th><th>Evento</th><th>Data do Evento</th></tr>";

    foreach ($Inscricoes as $inscricao) {
        echo "<tr>";
        echo "<td>{$inscricao['nome']}</td>";
        echo "<td>{$inscricao['evento']}</td>";
        echo "<td>" . date('d/m/Y', strtotime($inscricao['data'])) . "</td>";
        echo "</tr>";
    }

    echo "</table>";
}

echo "</section>";
?>
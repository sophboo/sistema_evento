<?php
echo "<section class='table-card'>";
echo "<div class='hero'><h2>Inscricoes</h2><p>Resumo das pessoas inscritas em cada evento.</p></div>";

if (empty($inscricoes)) {
    echo "<p class='message'>Nenhuma inscricao encontrada.</p>";
    echo "</section>";
    return;
}

echo "<table>";
echo "<tr><th>ID</th><th>Evento</th><th>Participante</th><th>Email</th></tr>";

foreach ($inscricoes as $i) {
    echo "<tr>";
    echo "<td>{$i['id']}</td>";
    echo "<td>{$i['evento']}</td>";
    echo "<td>{$i['nome']}</td>";
    echo "<td>{$i['email']}</td>";
    echo "</tr>";
}

echo "</table>";
echo "</section>";
<?php

require_once "C:/Turma2/xampp/htdocs/eventos/Eventos/DB/DataBase.php";
require_once "C:/Turma2/xampp/htdocs/eventos/Eventos/Controller/ParticipantesController.php";

$ParticipantesController = new ParticipantesController($pdo);

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $Participantes = $ParticipantesController->deletar($id);
    header('Location: ../../index.php');
} else {
    header('Location: ../../index.php');
}
?>
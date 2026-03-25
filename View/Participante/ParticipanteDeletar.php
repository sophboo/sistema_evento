<?php

require_once "C:\Turma2\xampp\htdocs\sistema_evento\DB\DataBase.php";
require_once "C:\Turma2\xampp\htdocs\sistema_evento\Controller\ParticipantesController.php";

$ParticipantesController = new ParticipantesController($pdo);

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $Participantes = $ParticipantesController->deletar($id);
    header('Location: ../../index.php');
} else {
    header('Location: ../../index.php');
}
?>
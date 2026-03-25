<?php

require_once "C:/Turma2/xampp/htdocs/sistema_evento/DB/DataBase.php";
require_once "C:/Turma2/xampp/htdocs/sistema_evento/Controller/EventoController.php";

$EventoController = new EventoController($pdo);

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $Eventos = $EventoController->deletar($id);
    header('Location: ../../index.php');
} else {
    header('Location: ../../index.php');
}
?>
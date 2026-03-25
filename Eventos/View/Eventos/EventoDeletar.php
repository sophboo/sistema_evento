<?php

require_once "C:/Turma2/xampp/htdocs/eventos/Eventos/DB/DataBase.php";
require_once "C:/Turma2/xampp/htdocs/eventos/Eventos/Controller/EventoController.php";

$EventoController = new EventoController($pdo);

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $Eventos = $EventoController->deletar($id);
    header('Location: ../../index.php');
} else {
    header('Location: ../../index.php');
}
?>
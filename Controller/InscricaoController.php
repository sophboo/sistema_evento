<?php

require_once "C:/Turma2/xampp/htdocs/eventos/Eventos/Model/InscricaoModel.php";

class InscricaoController {

    private $model;
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->model = new InscricaoModel($pdo);
    }

    public function listar() {
        $inscricoes = $this->model->listarInscricoes();

        include_once "C:/Turma2/xampp/htdocs/eventos/Eventos/View/Inscricao/InscricaoListar.php";
    }
}
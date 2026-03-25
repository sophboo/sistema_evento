<?php

require_once "C:/Turma2/xampp/htdocs/sistema_evento/Model/InscricaoModel.php";

class InscricaoController {

    private $model;
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->model = new InscricaoModel($pdo);
    }

   public function listar() {
    $Inscricoes = $this->model->listarInscricoes();
    include_once "C:/Turma2/xampp/htdocs/sistema_evento/View/Inscricao/InscricaoLista.php";
}
}
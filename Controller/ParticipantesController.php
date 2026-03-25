<?php
require_once "C:/Turma2/xampp/htdocs/sistema_evento/Model/ParticipantesModel.php";

class ParticipantesController {
    private $ParticipantesModel;
    private $pdo;
   
    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->ParticipantesModel = new ParticipantesModel($pdo);
    }

    public function listar() {
        $Participantes = $this->ParticipantesModel->buscarTodos();
        include_once "C:/Turma2/xampp/htdocs/sistema_evento/View/Participante/ParticipanteLista.php";
    }

    public function buscarParticipante($id){
        return $this->ParticipantesModel->buscarParticipante($id);
    }

    public function cadastrar($nome, $telefone, $email, $senha){
        $this->ParticipantesModel->cadastrar($nome, $telefone, $email, $senha);
        return true;
    }
    
    public function editar($nome, $telefone, $email, $id){
        $this->ParticipantesModel->editar($nome, $telefone, $email, $id);
    }

    public function deletar($id){
        return $this->ParticipantesModel->deletar($id);
    }

    public function login($email){
        return $this->ParticipantesModel->login($email);
    }

    public function verificarInscricao($id_evento, $id_participante){
        return $this->ParticipantesModel->verificarInscricao($id_evento, $id_participante);
    }

    public function inscricao($id_evento, $id_participante){
        return $this->ParticipantesModel->inscricao($id_evento, $id_participante);
    }

    public function listarInscricoes() {
        $Inscricoes = $this->ParticipantesModel->buscarInscricoes();
        include_once "C:/Turma2/xampp/htdocs/sistema_evento/View/Inscricao/InscricaoLista.php";
    }
}

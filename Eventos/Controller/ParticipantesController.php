<?php
require_once "C:/Turma2/xampp/htdocs/eventos/Eventos/Model/ParticipantesModel.php";

class ParticipanteController {
    private $ParticipanteModel;
    private $pdo;
   
    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->ParticipanteModel = new ParticipanteModel($pdo);
    }

    public function listar() {
        $Participantes = $this->ParticipanteModel->buscarTodos();
        include_once "C:/Turma2/xampp/htdocs/eventos/Eventos/View/Participante/ParticipanteLista.php";
    }

    public function buscarParticipante($id){
        return $this->ParticipanteModel->buscarParticipante($id);
    }

    public function cadastrar($nome, $telefone, $email, $senha){
        $this->ParticipanteModel->cadastrar($nome, $telefone, $email, $senha);
        return true;
    }
    
    public function editar($nome, $telefone, $email, $id){
        $this->ParticipanteModel->editar($nome, $telefone, $email, $id);
    }

    public function deletar($id){
        return $this->ParticipanteModel->deletar($id);
    }

    public function login($email, $senha){
        return $this->ParticipanteModel->login($email, $senha);
    }

    public function verificarInscricao($id_evento, $id_participante){
        return $this->ParticipanteModel->verificarInscricao($id_evento, $id_participante);
    }

    public function inscricao($id_evento, $id_participante){
        return $this->ParticipanteModel->inscricao($id_evento, $id_participante);
    }
}

<?php
require_once "C:/Turma2/xampp/htdocs/sistema_evento/Model/EventoModel.php";

class EventoController {
    private $EventoModel;
    private $pdo;
   
    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->EventoModel = new EventoModel($pdo);
    }

    public function listar() {
        $Eventos = $this->EventoModel->buscarTodos();
        include_once "C:/Turma2/xampp/htdocs/sistema_evento/View/Eventos/EventoListar.php";
    }

    public function buscarEventos($id){
        return $this->EventoModel->buscarEventos($id);
    }

    public function cadastrar($evento, $descricao, $data, $horario, $local, $quantidade_participantes){
        $this->EventoModel->cadastrar($evento, $descricao, $data, $horario, $local, $quantidade_participantes);
        return true;
    }
    
    public function editar($evento, $descricao, $data, $horario, $local, $quantidade_participantes, $id){
        $this->EventoModel->editar($evento, $descricao, $data, $horario, $local, $quantidade_participantes, $id);
    }

    public function deletar($id){
        return $this->EventoModel->deletar($id);
    }

    public function contarInscritos($id_evento){
        $sql = "SELECT COUNT(*) as total 
                FROM evento_participante 
                WHERE evento_id = ?";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_evento]);

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['total'];
    }

    public function buscarLimiteParticipantes($id_evento){
        $sql = "SELECT quantidade_participantes 
                FROM evento 
                WHERE id = ?";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_evento]);

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['quantidade_participantes'];
    }
}
<?php

class EventoModel {
    private $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function buscarTodos(){
        $stmt = $this->pdo->query("SELECT * FROM evento");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function buscarEventos($id){
        $stmt = $this->pdo->prepare("SELECT * FROM evento WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function cadastrar($evento, $descricao, $data, $horario, $local, $quantidade_participantes) {
        $sql = "INSERT INTO evento 
                (evento, descricao, data, horario, local, quantidade_participantes) 
                VALUES (?, ?, ?, ?, ?, ?)";
       
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $evento,
            $descricao,
            $data,
            $horario,
            $local,
            $quantidade_participantes
        ]);
    }

    public function editar($evento, $descricao, $data, $horario, $local, $quantidade_participantes, $id) {
        $sql = "UPDATE evento 
                SET evento=?, descricao=?, data=?, horario=?, local=?, quantidade_participantes=? 
                WHERE id = ?";
        
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $evento,
            $descricao,
            $data,
            $horario,
            $local,
            $quantidade_participantes,
            $id
        ]);
    }

    public function deletar($id) {
        $this->pdo->beginTransaction();

        try {
        
            $sql = "DELETE FROM evento_participante WHERE evento_id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);

            $sql = "DELETE FROM evento WHERE id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);

            $this->pdo->commit();
            return true;

        } catch (PDOException $e) {
            $this->pdo->rollBack();
            throw $e;
        }
    }

    public function verificarLimiteEvento($id_evento){
        $sql = "SELECT quantidade_participantes 
                FROM evento 
                WHERE id = ?";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_evento]);

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['quantidade_participantes'];
    }
}
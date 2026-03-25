<?php

class ParticipantesModel
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function buscarTodos()
    {
        $stmt = $this->pdo->query("SELECT * FROM participante");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarParticipante($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM participante WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function cadastrar($nome, $telefone, $email, $senha)
    {
        $sql = "INSERT INTO participante (nome, telefone, email, senha)
                VALUES (?, ?, ?, ?)";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $nome,
            $telefone,
            $email,
            $senha
        ]);
    }

    public function editar($nome, $telefone, $email, $id)
    {
        $sql = "UPDATE participante 
                SET nome=?, telefone=?, email=? 
                WHERE id = ?";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $nome,
            $telefone,
            $email,
            $id
        ]);
    }

    public function deletar($id)
    {
        $this->pdo->beginTransaction();

        try {
    
            $sql = "DELETE FROM evento_participante WHERE participante_id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);

            $sql = "DELETE FROM participante WHERE id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$id]);

            $this->pdo->commit();
            return true;

        } catch (PDOException $e) {
            $this->pdo->rollBack();
            throw $e;
        }
    }

    public function login($email)
    {
        $sql = "SELECT * FROM participante WHERE email = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function inscricao($id_evento, $id_participante)
    {
        $sql = "INSERT INTO evento_participante (evento_id, participante_id)
                VALUES (?, ?)";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $id_evento,
            $id_participante
        ]);
    }

    public function verificarInscricao($id_evento, $id_participante)
    {
        $sql = "SELECT * FROM evento_participante 
                WHERE evento_id = ? AND participante_id = ?";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_evento, $id_participante]);

        return $stmt->rowCount();
    }
}
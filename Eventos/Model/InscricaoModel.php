<?php

class InscricaoModel {

    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function listarInscricoes()
    {
        $sql = "SELECT 
                    ep.id,
                    e.evento,
                    p.nome,
                    p.email
                FROM evento_participante ep
                JOIN evento e ON ep.evento_id = e.id
                JOIN participante p ON ep.participante_id = p.id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
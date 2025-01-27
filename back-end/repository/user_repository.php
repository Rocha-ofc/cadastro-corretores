<?php

class UserRepository
{
    private $db;
    public function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=projeto';
        $user = 'root';
        $password = '';

        $this->db = new PDO($dsn, $user, $password);
    }

    public function create($user)
    {
        $sql = "INSERT INTO corretores (nome, cpf, creci) VALUES (:nome, :cpf, :creci)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':nome', $user->nome);
        $stmt->bindValue(':cpf', $user->cpf);
        $stmt->bindValue(':creci', $user->creci);
        $stmt->execute();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM corretores";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM corretores WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetchObject();
    }

    public function getByCpf($cpf)
    {
        $sql = "SELECT * FROM corretores WHERE cpf = :cpf";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':cpf', $cpf);
        $stmt->execute();
        return $stmt->fetchObject();
    }

    public function getByCreci($creci)
    {
        $sql = "SELECT * FROM corretores WHERE creci = :creci";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':creci', $creci);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    public function getByUserCpf($cpf, $id)
    {
        $sql = "SELECT * FROM corretores WHERE cpf = :cpf AND id != :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':cpf', $cpf);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetchObject();
    }

    public function getByUserCreci($creci, $id)
    {
        $sql = "SELECT * FROM corretores WHERE creci = :creci AND id != :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':creci', $creci);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    public function update($user)
    {
        $sql = "UPDATE corretores SET nome = :nome, cpf = :cpf, creci = :creci WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $user->id);
        $stmt->bindValue(':nome', $user->nome);
        $stmt->bindValue(':cpf', $user->cpf);
        $stmt->bindValue(':creci', $user->creci);
        $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM corretores WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
}

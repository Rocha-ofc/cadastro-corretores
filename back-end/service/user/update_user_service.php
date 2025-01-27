<?php

require_once('../../repository/user_repository.php');
require_once('../../entity/user_entity.php');

class UpdateUserService

{
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function execute(array $input)
    {
        if (!array_key_exists('nome', $input) || empty($input['nome'])) {
            throw new Exception('O campo nome é obrigatório.');
        }
        if (!array_key_exists('cpf', $input) || empty($input['cpf'])) {
            throw new Exception('O campo cpf é obrigatório.');
        }
        if (!array_key_exists('creci', $input) || empty($input['creci'])) {
            throw new Exception('O campo creci é obrigatório.');
        }
        if (strlen($input["nome"]) < 2) {
            throw new Exception('O campo nome deve ter no mínimo 2 caracteres.');
        }
        if (strlen($input["creci"]) < 2) {
            throw new Exception('O campo creci deve ter no mínimo 2 caracteres.');
        }
        if (strlen($input["cpf"]) != 11) {
            throw new Exception('O campo cpf deve ter 11 caracteres.');
        }
        if (!array_key_exists('id', $input) || empty($input['id'])) {
            throw new Exception('O campo id é obrigatório.');
        }
        if ($this->userRepository->getByUserCpf($input['cpf'], $input['id'])) {
            throw new Exception('Já existe um usuário com esse cpf.');
        }
        if ($this->userRepository->getByUserCreci($input['creci'], $input['id'])) {
            throw new Exception('Já existe um usuário com esse creci.');
        }
        $user = new UserEntity();
        $user->id = $input['id'];
        $user->nome = $input['nome'];
        $user->cpf = $input['cpf'];
        $user->creci = $input['creci'];
        $this->userRepository->update($user);

        return ["message" => "Usuário atualizado com sucesso!"];
    }
}

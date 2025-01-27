<?php

require_once('../../repository/user_repository.php');
require_once('../../entity/user_entity.php');

class GetOneUserService

{
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function execute(array $input)
    {
        if (!array_key_exists('id', $input) || empty($input['id'])) {
            throw new Exception('O campo id é obrigatório.');
        }
    
        $user = $this->userRepository->getById($input['id']);
        if (!$user) {
            throw new Exception('Usuário não encontrado.');
        }
        $entity = new UserEntity();
        $entity->id = $user->id;
        $entity->nome = $user->nome;
        $entity->cpf = $user->cpf;
        $entity->creci = $user->creci;
        return $entity;
    }
}

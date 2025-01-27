<?php

require_once('../../repository/user_repository.php');


class DeleteUserService

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
        $this->userRepository->delete($input['id']);

        return ["message" => "Usuário deletado com sucesso!"];
    }
}

<?php

require_once('../../repository/user_repository.php');


class GetallUserService

{
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function execute(array $input)
    {
        return $this->userRepository->getAll();
    }
}

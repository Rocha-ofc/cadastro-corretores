<?php

class Controller
{
    private $service;
    public function __construct($service)
    {
        $this->service =  $service;
    }

    public function execute()
    {
        try {

            $input = json_decode(file_get_contents("php://input"), true);
            if(!$input){
                $input = [];
            }
            $output = $this->service->execute($input);
            echo json_encode($output);
            exit();
        } catch (\Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
            exit();
        }
    }
}

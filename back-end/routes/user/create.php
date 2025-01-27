<?php

require_once('../../service/user/create_user_service.php');
require_once('../../controller/controller.php');

$service = new CreateUserService();
$controller = new Controller($service);
$controller->execute();

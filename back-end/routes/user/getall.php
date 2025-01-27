<?php

require_once('../../service/user/getall_user_service.php');
require_once('../../controller/controller.php');

$service = new GetallUserService();
$controller = new Controller($service);
$controller->execute();

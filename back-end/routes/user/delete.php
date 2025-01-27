<?php

require_once('../../service/user/delete_user_service.php');
require_once('../../controller/controller.php');

$service = new DeleteUserService();
$controller = new Controller($service);
$controller->execute();

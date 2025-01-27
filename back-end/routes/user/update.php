<?php

require_once('../../service/user/update_user_service.php');
require_once('../../controller/controller.php');

$service = new UpdateUserService();
$controller = new Controller($service);
$controller->execute();

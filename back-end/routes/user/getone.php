<?php

require_once('../../service/user/getone_user_service.php');
require_once('../../controller/controller.php');

$service = new GetoneUserService();
$controller = new Controller($service);
$controller->execute();

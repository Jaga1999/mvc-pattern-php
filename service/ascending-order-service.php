<?php

include("../controller/user-controller.php");

$usercontroller = new UserController();
$users =$usercontroller->getByNameAsc();

?>
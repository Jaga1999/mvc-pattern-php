<?php
include("../controller/user-controller.php");

// check if category id is set and valid
if (isset($_GET['status'])) {
    $status = $_GET['status'];
    $usercontroller = new UserController();
    $users =$usercontroller->getByStatus($status);
} else {
    // category id not set or invalid, redirect to all categories page
    header("Location: ../view/home.php");
    exit();
}

?>
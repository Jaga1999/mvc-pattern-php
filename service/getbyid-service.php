<?php
include("../controller/user-controller.php");

// check if category id is set and valid
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $usercontroller = new UserController();
    $user = $usercontroller->getById($id);
    // check if category exists
    if ($user) {
        // populate form fields with category values
        $name = $user->getName();
        $email = $user->getEmail();
        $mobile = $user->getMobile();
        $status = $user->getStatus();
    } else {
        // category not found, redirect to all categories page
        header("Location: ../view/home.php");
        exit();
    }
} else {
    // category id not set or invalid, redirect to all categories page
    header("Location: ../view/home.php");
    exit();
}

?>
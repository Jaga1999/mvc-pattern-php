<?php
include("../controller/user-controller.php");

// check if category id is set and valid
if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $usercontroller = new UserController();
    $user = $usercontroller->getByEmail($email);
    // check if category exists
    if ($user) {
        // populate form fields with category values
        $users = array($user);
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
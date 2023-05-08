<?php
include("../controller/user-controller.php");
$usercontroller = new UserController();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $user = $usercontroller->getById($id);
    // check if category exists
    if ($user) {
        // populate form fields with category values
        $usercontroller->delete($user);
        header("Location: ../view/home.php?success=delete");
        exit();
    } else {
        // category not found, redirect to all categories page
        header("Location: ../view/home.php");
        exit();
    }
} else {
    // id parameter not provided, redirect to all categories page
    header("Location: home.php");
    exit();
}
?>

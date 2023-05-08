<?php
include("../controller/user-controller.php");
$usercontroller = new UserController();
$error = "";

// check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    // read the values from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $status = $_POST['status'];
    $password = "";
    // create a reference with updated values
    $updateduser = new User($id, $name,$email,$mobile,$password,$status);
    $usercontroller->update($updateduser);
    // redirect to all categories page
    header("Location: ../view/home.php?success=update");
    exit();
} else {
    $error = "Error: the form was not submitted";
}
?>

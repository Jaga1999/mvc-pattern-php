<?php

include("../controller/user-controller.php");

//read the values from the form
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$status = $_POST['status'];
//create a reference
$user = new User(0,$name,$email,$mobile,$password,$status);
$usercontroller = new UserController();
$result =$usercontroller->add($user);
echo "The insert row id is : ". $result;
header("Location: ../view/home.php?success=created");

?>
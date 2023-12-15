<?php
require_once "../../model/User.php";

$userModel = new UserModel();


$users = $userModel->getAllUsers();

include_once "../../view/Ticket/add.php";
?>
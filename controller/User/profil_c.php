<?php

require_once "../../model/User.php";
session_start();
$id_user=$_SESSION['id_user'];
$userModel = new UserModel();
$info_users = $userModel->get_User_by_id($id_user);
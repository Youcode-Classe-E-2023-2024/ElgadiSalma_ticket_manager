<?php

require_once "../model/User.php";

$userModel = new  UserModel();

$email = $_POST['email'];
$password=$_POST['password'];

if($_SERVER["REQUEST_METHOD"] === 'POST'){
    if($userModel->login($email ,$password)){

echo"weeeeeeeeeeeee";

      }else{
        include_once"../view/connect.php?STATUS=probleme de connexion ";      
    }
    }

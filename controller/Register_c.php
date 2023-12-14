<?php

require_once "../model/User.php";

$userModel = new  UserModel();

$username = $_POST['username'];
$email = $_POST['email'];
$password=$_POST['password'];
$photo=$_POST['photo'];
$confirm_password=$_POST['confirm_password'];
$email_err= "";
$confirm_password_err ="";

if($_SERVER["REQUEST_METHOD"] === 'POST'){
if($userModel->findUserByEmail($email) || $password != $confirm_password){
    $email_err="Email deja existant";
    $confirm_password_err="Mots de passe non identiques";
    // echo $email_err;
    // header("location:../view/register.php?error");
    include_once"../view/register.php";
}

else{
        if(empty($email_err) && empty($confirm_password_err)){
        $password = password_hash($password, PASSWORD_DEFAULT);
        if ($userModel->register($username, $email, $password, $photo)) {
        header("location:../view/connect.php?enregistre succecsivement");
        }
        else{
            header("location:../view/register.php?error");
        }
    }

}
}

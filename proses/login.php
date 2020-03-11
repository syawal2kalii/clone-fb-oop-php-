<?php 
    session_start();
    ob_start();
    require '../model/User.php';
    $user = new User();
    if(isset($_POST['login'])){
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        $credentials = $user->selectByCredentialsUser($email,$pass);
        if(isset($credentials)){
            $_SESSION['id']=$credentials['id'];
            $_SESSION['nama_dpn']=$credentials['nama_dpn'];
            $_SESSION['email']=$credentials['email'];
            $_SESSION['status']=$credentials['status'];
            header("Location:../view/admin.php");
        }else{
            header("../index.php");
        }
    }
    ob_end_flush();
?>
<?php
    session_start();
    ob_start();
    if(isset($_SESSION['id'])){
        require '../model/User.php';
        $user = new User();
        $id=$_GET['id_user'];
        if($user->deleteByID($id)){
            header("Location:../view/admin.php");
        }else{
            die(mysqli_error());
        }
    }else{
        header("Location:../index.php");
    }
    ob_end_flush();
?>  
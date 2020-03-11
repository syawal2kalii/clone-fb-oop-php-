<?php
ob_start();
require '../model/User.php';
    if(isset($_POST['submit'])){
        $date = new DateTime($_POST['thn'].'/'.$_POST['bln'].'/'.$_POST['tgl']);
        $user = new User();
        $data = array(
            "nama_dpn"=>$_POST['nama_dpn'],
            "nama_blk"=>$_POST['nama_blk'],
            "jk"=>$_POST['jk'],
            "pass"=>$_POST['pass'],
            "email"=>$_POST['email'],
            "tgl_lahir"=>$date->format('Y-m-d'),
            "status"=>1,
        );
        if($user->insertUser($data)){
            header("Location: ../");
        }else{
            die('gagal');
        }
    }
ob_end_flush();
?>
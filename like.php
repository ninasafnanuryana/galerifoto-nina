<?php

    include "koneksi.php";
    session_start();

    if(!isset($_SESSION['userid'])){
        //Untuk bisa like harus login dulu
        header("location:index.php");
    }else{
        $fotoid=$_GET['fotoid'];
        $userid=$_SESSION['userid'];
        //Cek apakah user sudah pernah like foto ini apa belum

        $sql=mysqli_query($conn,"SELECT `likeid`, `tanggallike` FROM `likefoto` WHERE `fotoid` = '$fotoid' and `userid` = '$userid'");

        if(mysqli_num_rows($sql)==1){
            //User sudah pernah like foto ini
            header("location:index.php");
        }else{
            $sql=mysqli_query($conn, "INSERT INTO `likefoto`(`likeid`, `fotoid`, `userid`, `tanggallike`) VALUES ('','$fotoid','$userid',NOW())");
            header("location:index.php");
        }
        
    }


?>
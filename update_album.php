<?php
    include "koneksi.php";
    session_start();

    $albumid=$_POST['albumid'];
    $namaalbum=$_POST['namaalbum'];
    $deskripsi=$_POST['deskripsi'];

    $sql=mysqli_query($conn, "UPDATE album SET namaalbum='$namaalbum', deskripsi='$deskripsi' WHERE albumid='$albumid'");

    header("location:album.php");
?>
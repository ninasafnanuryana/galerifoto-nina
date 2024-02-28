<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Album</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h1 {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            color: white;
            background-color: blue;
        }

        p {
            text-align: center;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 20px 0;
            background-color: blue;
            overflow: hidden;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        form {
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: blue;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }


        input[type="text"], input[type="submit"] {
            padding: 8px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: green;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }

        table a{
        display: inline-block;
        padding: 8px 16px;
        text-decoration: none;
        background-color: green;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-right: 5px;
    }

        table a.edit {
        background-color: green;
        }

        footer {
        background-color: blue;
        color: white;
        padding: 10px;
        text-align: center;
        border-radius: 0 0 8px 8px;
        position: fixed;
        bottom: 0;
        width: 100%;
    }

    </style>
</head>
<body>
    <h1>Selamat datang <b><?=$_SESSION['namalengkap']?></b></h1>


    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="album.php">Album</a></li>
        <li><a href="foto.php">Foto</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>

    <form action="tambah_album.php" method="post">
        <table>
                <tr>
                    <td>Nama Album</td>
                    <td><input type="text" name="namaalbum"></td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td><input type="text" name="deskripsi"></td>
                </tr>
                    <td></td>
                    <td><input type="submit" value="Tambah"></td>
                </tr>
            </table>
        </form>

        <table border="1" cellpadding=5 cellspacing=0>
        <tr>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Tanggal Dibuat</th>
            <th>Aksi</th>
        </tr>
        <?php
            include "koneksi.php";
            $userid=$_SESSION['userid'];
            $sql=mysqli_query($conn,"SELECT * FROM album WHERE userid='$userid'");
            while($data=mysqli_fetch_array($sql)){
        ?>

            <tr>
                <td><?=$data['namaalbum']?></td>
                <td><?=$data['deskripsi']?></td>
                <td><?=$data['tanggaldibuat']?></td>
                <td>
                    <a href="hapus_album.php?albumid=<?=$data['albumid']?>">Hapus</a>
                    <a href="edit_album.php?albumid=<?=$data['albumid']?>">Edit</a>
                </td>
            </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>

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
    <title>Halaman Foto</title>
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

        P {
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

        li a:hover {
            background-color: #555;
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
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: blue;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        input[type="text"], input[type="submit"], select, input[type="file"] {
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

        img {
            max-width: 100px;
            height: auto;
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

    <form action="tambah_foto.php" method="post" enctype="multipart/form-data">
        <table>
                <tr>
                    <td>Judul</td>
                    <td><input type="text" name="judulfoto"></td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td><input type="text" name="deskripsifoto"></td>
                </tr>
                <tr>
                    <td>Lokasi File</td>
                    <td><input type="file" name="lokasifile"></td>
                </tr>
                <tr>
                    <td>Album</td>
                    <td>
                        <select name="albumid">
                        <?php
                            include "koneksi.php";
                            $userid=$_SESSION['userid'];
                            $sql=mysqli_query($conn, "SELECT * FROM album WHERE userid='$userid'");
                            while($data=mysqli_fetch_array($sql)){
                        ?>
                                <option value="<?=$data['albumid']?>"><?=$data['namaalbum']?></option>
                        <?php
                            }
                        ?>
                        </select>
                        
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Tambah"></td>
                </tr>
            </table>
        </form>

        <table border="1" cellpadding=5 cellspacing=0>
        <tr>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Tanggal Unggah</th>
            <th>Lokasi File</th>
            <th>Album</th>
            <th>Disukai</th>
            <th>Aksi</th>
        </tr>
        <?php
            include "koneksi.php";
            $userid=$_SESSION['userid'];
            $sql=mysqli_query($conn,"SELECT * FROM foto,album WHERE foto.userid='$userid' and foto.albumid=album.albumid");
            while($data=mysqli_fetch_array($sql)){
        ?>

            <tr>
                <td><?=$data['judulfoto']?></td>
                <td><?=$data['deskripsifoto']?></td>
                <td><?=$data['tanggalunggah']?></td>
                <td>
                    <img src="gambar/<?=$data['lokasifile']?>" width="200px">
                </td>
                <td><?=$data['namaalbum']?></td>
                <td>
                    <?php
                        $fotoid=$data['fotoid'];
                        $sql2=mysqli_query($conn, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
                        echo mysqli_num_rows($sql2);
                    ?>
                </td>
                <td>
                    <a href="hapus_foto.php?fotoid=<?=$data['fotoid']?>">Hapus</a>
                    <a href="edit_foto.php?fotoid=<?=$data['fotoid']?>">Edit</a>
                </td>
            </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>

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
    <meta name="viewport" content="width=device-width,
    initial-scale=1.0">
    <title>Halaman Komentar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
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
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            color: white;
            background-color: blue;
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
            background-color: blue;
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

    </style>
</head>
<body>
    <h1>Halaman Komentar</h1>



    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="album.php">Album</a></li>
        <li><a href="foto.php">Foto</a></li>
        <li><a>Selamat datang <b><?=$_SESSION['namalengkap']?></b>
        <li><a href="logout.php">Logout</a></li>
    </ul>

    <form action="tambah_komentar.php" method="post">
        <?php
            include "koneksi.php";
            $fotoid=$_GET['fotoid'];
            $sql=mysqli_query($conn,"SELECT * FROM foto WHERE fotoid='$fotoid'");
            while($data=mysqli_fetch_array($sql)){
        ?>
        <input type="text" name="fotoid" value="<?=$data['fotoid']?>" hidden>
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
                <td>Foto</td>
                <td><img src="gambar/<?=$data['lokasifile']?>" width="200px"></td>
            </tr>
            <tr>
                <td>Komentar</td>
                <td><input type="text" name="isikomentar"></td>
            </tr>
            <td>

                <td></td>
                <td><input type="submit" value="Tambah"></td>
            </tr>
        </table>
        <?php
            }
        ?>
    </form>
</body>
</html>
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
            background-color: plum;
        }
        
        p {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            color: white;
            background-color: plum;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 20px 0;
            background-color: plum;
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
            background-color: plum;
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
            background-color: black;
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
    <h1>Selamat datang <b><?=$_SESSION['namalengkap']?></b></h1>


    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="album.php">Album</a></li>
        <li><a href="foto.php">Foto</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
    <table width="100%" border="1" cellpadding=5 cellspacing=0>
        <tr>
            <th>Nama</th>
            <th>Komentar</th>
            <th>Tanggal</th>
        </tr>
        <?php
            include "koneksi.php";
            $userid=$_SESSION['userid'];
            $fotoid=$_GET['fotoid'];
            $sql=mysqli_query($conn,"SELECT * FROM komentarfoto INNER JOIN user ON komentarfoto.userid=user.userid WHERE komentarfoto.fotoid=$fotoid");
            while($data=mysqli_fetch_array($sql)){
        ?>

            <tr>
                <td><?=$data['namalengkap']?></td>
                <td><?=$data['isikomentar']?></td>
                <td><?=$data['tanggalkomentar']?></td>
            </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>
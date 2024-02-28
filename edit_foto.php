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
    <title>Halaman Edit Foto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
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
            color: #555;
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
            background-color: #111;
        }

        form {
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        input[type="text"], 
        input[type="file"], 
        select {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: green;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: green;
        }
    </style>
</head>
<body>
    <h1>Halaman Edit Foto</h1>


    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="album.php">Album</a></li>
        <li><a href="foto.php">Foto</a></li>
        <li><a>Selamat datang <b><?=$_SESSION['namalengkap']?></b>
        <li><a href="logout.php">Logout</a></li>
    </ul>
    <form action="update_foto.php" method="post" enctype="multipart/form-data">
        <?php
            include "koneksi.php";
            $fotoid=$_GET['fotoid'];
            $sql=mysqli_query($conn,"SELECT * FROM foto WHERE fotoid='$fotoid'");
            while($data=mysqli_fetch_array($sql)){
                ?>
                <table>
                    <tr>
                        <td>Judul</td>
                        <td><input type="text" name="judulfoto" value="<?=$data['judulfoto']?>"></td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td><input type="text" name="deskripsifoto" value="<?=$data['deskripsifoto']?>"></td>
                    </tr>
                    <tr>
                        <td>Album</td>
                    <td>
                    <select name="albumid">
                    <?php
                        $userid=$_SESSION['userid'];
                        $sql2=mysqli_query($conn, "SELECT * FROM album WHERE userid='$userid'");
                        while($data2=mysqli_fetch_array($sql2)){
                    ?>
                            <option value="<?=$data2['albumid']?>"
                            <?php if($data2['albumid']==$data['albumid']){echo'selected';}?>>
                            <?=$data2['namaalbum']?></option>
                        <?php
                            }
                        ?>
                        </select>
                        
                    </td>
                </tr>
                <td></td>
                <td><input type="submit" value="Ubah"></td>
            </tr>
        </table>
        <?php
            }
        ?>
    </form>


</body>
</html>
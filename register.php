<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .container {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            color: black;
            border-radius: 8px 8px 0 0;
        }

        .card-body {
            padding: 20px;
        }

        .message {
           margin-bottom: 20px;
           text-align: center;
        }

        h1 {
            color: black;
            border-radius: 8px 8px 0 0;
        }

        form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }
        
        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: black;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: black;
        }


    </style>
</head>
<body class="bg-dark">
    <div class="container">
        <div class="row">
            <div class="card card-login mx-auto mt-5 col-md-6">
                <div class="card-header"><i class="fa fa-user"></i>  Please Sign Up</div>
                <div class="card-body">
                    <div class="message">
<body>
    <form action="proses_register.php" method="post">
        <table>
            <h1>Halaman Register</h1>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password"></td>
                </tr>
                    <td>Email</td>
                    <td><input type="email" name="email"></td>
                </tr>
                <tr>
                    <td>Nama Lengkap</td>
                    <td><input type="text" name="namalengkap"></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" name="alamat"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="Register"></td>
                </tr>
        </table>
    </form>
</body>
</html>
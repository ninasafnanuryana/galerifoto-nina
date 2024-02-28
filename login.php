<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="" >
    <title>Halaman Login</title>
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
            text-align: center;
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }
        
        input[type="text"],
        input[type="password"] {
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
                <div class="card-header"><i class="fa fa-user"></i>  Please Sign In</div>
                <div class="card-body">
                    <div class="message">
<body>
<h1>Halaman Login</h1>
    <form action="proses_login.php" method="post">
        <table>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password"></td>
                </tr>
                    <td></td>
                    <td><input type="submit" value="Login"></td>
                </tr>
        </table>
    </form>
    <p style="text-align: center;">Don't have an account? 
    <a href="register.php">Create Account</a></p>
</body>
</html>
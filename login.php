<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: beranda.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-success bg-success">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                    <a class="nav-link" href="selamat.php">Kembali</a>
                    </li>
                    
                </ul>
            </div>
    </nav>
<div class="container container-light bg-light">
    <br>
    <h4><center> Login Admin</center></h4>
    <div class="container1">
        <?php
        include "koneksi.php";

        if (isset($_POST["login"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];
            require_once "koneksi.php";
            $sql = "SELECT * FROM admin WHERE email = '$email'";
        
            $result = mysqli_query($kon, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    header("Location: beranda.php");
                    echo "<div class='alert alert-danger'>Berhasil Login</div>";
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Password Salah</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Email Salah</div>";
            }
        }
        ?>
        <center>
    <form action="login.php" method="post">
    
     <div class="form-group col-md-10">
            <input type="email" placeholder="Masukan Email:" name="email" class="form-control">
        </div>
        <div class="form-group col-md-10">
            <input type="password" placeholder="Masukan Password:" name="password" class="form-control">
        </div>
        <div class="form-btn">
            <input type="submit" value="Masuk" name="login" class="btn btn-primary">
        </div>
    
    </form>
    </center>
    </div>
    <p>NB : LOGIN HANYA ADMIN</p>
</body>
</html>
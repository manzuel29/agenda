<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
</head>
<title>
    Agenda Pembatalan</title>
<body>
<nav class="navbar navbar-expand-lg navbar-success bg-success">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="beranda.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                      <a class="nav-link" href="index.php">Informasi Data Haji</a>
                    </li>
                    <li class="nav-item active">
                      <a class="nav-link" href="create.php">Tambah Data Haji</a>
                    </li>
                </ul>
                <a href="logout.php" class="btn btn-light">Logout</a>
            </div>
    </nav>
    </nav>
    <div class="container container-warning bg-warning">
    
    <center>
        <h1 class="judul">Kantor Kementrian Agama Kabupaten Pemalang</h1>
        <h1 class="judul">(Agenda Pembatalan Haji)</h1>
        <p class="deskripsi">Jl. Mochtar No.11, Kebondalem, Kec. Pemalang, Kabupaten Pemalang</p>
    </center>
    <img src="img/Logo-kemenag.png" style="display:block; margin:auto;"width="400px" >
    </nav>
    </div>

    <div class="container container-warning bg-warning">
    <nav class="navbar  bg-warning  bg-warning">
      <center>
        <p>“Kementerian Agama yang profesional dan handal dalam membangun masyarakat yang saleh, moderat, cerdas dan unggul untuk mewujudkan Indonesia maju yang berdaulat, mandiri, dan berkepribadian berdasarkan gotong royong”.</p>
      </center>
    </nav>

    </body>
</html>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
</head>
<title>
    informasi Pembatalan</title>
<body>
<nav class="navbar navbar-expand-lg navbar-success bg-success">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                    <a class="nav-link" href="selamat.php">Home</a>
                    </li>
                    <li class="nav-item active">
                    <a class="nav-link" href="info.php">Informasi Haji</a>
                    </li>
                    <li class="nav-item active">
                    <a class="nav-link" href="visimisi.php">Visi Misi</a>
                    </li>
                    <li class="nav-item active">
                    <a class="nav-link" href="about.php">Struktur</a>
                    </li>
                    
                </ul> 
               
                <a href="login.php" class="btn btn-light">Admin</a>
              </div>    
    </nav>
<div class="container container-light bg-light">
    <br>
    <h4><center>Berikut Informasi Data Pembatalan Haji </center></h4>


<?php

include "koneksi.php";
//Cek apakah ada kiriman form dari method post
    if (isset($_GET['no_pembatalan'])) {
        $no_pembatalan=htmlspecialchars($_GET["no_pembatalan"]);

        $sql="delete from agenda_pembatalan where no_pembatalan='$no_pembatalan' ";
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:index.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>
<tr class="table-danger">
            <br>
        <thead>
        <tr>
        <table class="my-3 table table-bordered">
            <tr class="table-success"> 

            <th>No pembatalan</th>
            <th>No Surat</th>
            <th>Tanggal Surat</th>
            <th>No Porsi</th>
            <th>Nama </th>
            <th>Alamat</th>
            <th>Status Pembatalan</th>
           
        </tr>
        </thead>

        <?php
        include "koneksi.php";
        $sql="select * from agenda_pembatalan order by no_pembatalan desc";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["nosurat"];   ?></td>
                <td><?php echo $data["tanggal_surat"]; ?></td>
                <td><?php echo $data["no_porsi"];   ?></td>
                <td><?php echo $data["nama"];   ?></td>
                <td><?php echo $data["alamat"];   ?></td>
                <td><?php echo $data["status"];   ?></td>
                <td>
                
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <div class="Text-center">
        <button onclick="window.print()"class"btn btn-primary">Print</button>
    </div>  
</div>
</body>
<div class="container container-light bg-light">
    <footer>
  <p>Edit By : Manzuelz</p>
  <p><a href="mnashwa315:@gmail.com">mnashwa315:@gmail.com</a></p>
</footer>
</div>
</html>

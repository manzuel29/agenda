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

<div class="container container-light bg-light">
    <br>
    <h4><center>Agenda Pembatalan </center></h4>
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
            <th>Status</th>
            <th colspan='2'>Aksi</th>

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
                    <a href="update.php?no_pembatalan=<?php echo htmlspecialchars($data['no_pembatalan']); ?>" class="btn btn-warning" role="button">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?no_pembatalan=<?php echo $data['no_pembatalan']; ?>" class="btn btn-danger" role="button">Delete</a>
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
</html>
<script>

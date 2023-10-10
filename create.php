<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Create</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
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
                    <a class="nav-link" href="beranda.php">Home </a>
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
<div class="container">
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nosurat=input($_POST["nosurat"]);
        $tanggal_surat=input($_POST["tanggal_surat"]);
        $no_porsi=input($_POST["no_porsi"]);
        $nama=input($_POST["nama"]);
        $alamat=input($_POST["alamat"]);
        $status=input($_POST["status"]);

        //Query input menginput data kedalam tabel agenda_pembatalan
        $sql="insert into agenda_pembatalan (nosurat,tanggal_surat,no_porsi,nama,alamat,status) values
		('$nosurat','$tanggal_surat','$no_porsi','$nama','$alamat','$status')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
            echo "<div class='alert alert-danger'> Data Tersimpan.</div>";
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal Disimpan.</div>";

        }

    }
    ?>
    <h2>Input Data</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>No Surat:</label>
            <input type="text" name="nosurat" class="form-control" placeholder="Masukan No Porsi" required/>
        </div>    
        <div class="form-group">
            <label>Tanggal Surat:</label>
            <input type="Date" name="tanggal_surat" class="form-control" placeholder="Tanggal surat" required />
        </div>
        <div class="form-group">
            <label>No Porsi:</label>
            <input type="text" name="no_porsi" class="form-control" placeholder="Masukan No Porsi" required/>
        </div>
        <div class="form-group">
            <label>Nama Lengkap :</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Lengkap" required/>
        </div>
        <div class="form-group">
            <label>Alamat:</label>
            <input type="text" name="alamat" class="form-control" placeholder="Masukan Alamat" required/>
        </div>
        <div class="form-group">
            <label>Status:</label>
            <textarea name="status" class="form-control" placeholder="Masukan Status" required></textarea>
        </div>       

        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
</duv>
</body>
</html>
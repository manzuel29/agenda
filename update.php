<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
}
?>

<html>
<head>
    <title>Form Update</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>
<body>
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
    //Cek apakah ada nilai yang dikirim menggunakan methos GET 
    if (isset($_GET['no_pembatalan'])) {
        $no_pembatalan=isset($_GET["no_pembatalan"]);
        $sql="SELECT * from agenda_pembatalan where no_pembatalan=$no_pembatalan"; 
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_assoc($hasil);

    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $no_pembatalan=htmlspecialchars($_POST["no_pembatalan"]);
        $nosurat=input($_POST["nosurat"]);
        $tanggal_surat=input($_POST["tanggal_surat"]);
        $no_porsi=input($_POST["no_porsi"]);
        $nama=input($_POST["nama"]);
        $alamat=input($_POST["alamat"]);
        $status=input($_POST["status"]);

        //Query update data pada tabel agenda
        $sql="UPDATE agenda_pembatalan set
            nosurat='$nosurat',
			tanggal_surat='$tanggal_surat',
            no_porsi='$no_porsi',
			nama='$nama',
			alamat='$alamat',
			status='$status'
            WHERE no_pembatalan=$no_pembatalan";

        //Mengeksekusi atau menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }

    ?>
    <h2>Update Data</h2>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label>No Surat:</label>
            <input type="text" name="nosurat" class="form-control" placeholder="Masukan No Surat" required/>
        </div>   
        <div class="form-group">
            <label>Tanggal Surat:</label>
            <input type="Date" name="tanggal_surat" class="form-control" placeholder="Masukan No Tanggal Surat" required />
        </div>
        <div class="form-group">
            <label>No Porsi:</label>
            <input type="text" name="no_porsi" class="form-control" placeholder="Masukan No Porsi" required/>
        </div>
        <div class="form-group">
            <label>Nama :</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required/>
        </div>
        <div class="form-group">
            <label>Alamat:</label>
            <input type="text" name="alamat" class="form-control" placeholder="Masukan Alamat" required/>
        </div>
        <div class="form-group">
            <label>Status:</label>
            <textarea name="status" class="form-control"placeholder="Masukan Status" required></textarea>
        </div>

        <input type="hidden" name="no_pembatalan" value="<?php echo $data['no_pembatalan']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
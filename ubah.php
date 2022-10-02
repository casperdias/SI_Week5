<?php
include "connect.php";
require 'function.php';


if (isset($_GET['nim'])) {
    $NIM = $_GET['nim'];
    $kuerimhs = mysqli_query($conn, "SELECT * FROM mahasiswa INNER JOIN nilai ON mahasiswa.nim = nilai.nim WHERE mahasiswa.nim = '$NIM'");

    // Looping terus selama fetching dari query berlangsung
    while ($mahasiswa = mysqli_fetch_array($kuerimhs)) {
        $nim    = $mahasiswa['nim'];
        $nama   = $mahasiswa['nama'];

        $si             = $mahasiswa['si'];
        $pk2            = $mahasiswa['pk2'];
        $jarkomdat      = $mahasiswa['jarkomdat'];
        $mekatronika    = $mahasiswa['mekatronika'];
        $praktelkom     = $mahasiswa['praktelkom'];
    };
    // var_dump($nim, $nama, $si);
};

if (isset($_POST["submit"])) {
    //Cek data apakah sudah diubah atau belum
    if (ubah($_POST)  > 0) {
        echo "
        <script>
        alert ('data berhasil diubah!');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "
        <script>
        alert ('gagal!');
        </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <title>Edit Nilai Mahasiswa</title>
</head>

<body>
    <header>
        <h2 style="text-align: center; margin-bottom:3%; margin-top:3%;">Edit Data Mahasiswa </h2>
    </header>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $_GET['nim']; ?>">
            <div class="mb-2 row">
                <label for="nim" class="col-sm-3 col-form-label">NIM :</label>
                <div class="col-sm-9"><input type="text" class="form-control" id="nim" name="nim" required value="<?= $nim ?>"></div>
            </div>
            <div class="mb-2 row">
                <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap : </label>
                <div class="col-sm-9"><input type="text" class="form-control" id="nama" name="nama" required value="<?= $nama ?>"></div>
            </div>
            <div class="mb-2 row">
                <label for="si" class="col-sm-3 col-form-label">Nilai MK SI :</label>
                <div class="col-sm-9"><input type="int" class="form-control" id="si" name="si" required value="<?= $si ?>"></div>
            </div>
            <div class="mb-2 row">
                <label for="pk2" class="col-sm-3 col-form-label">Nilai MK PK-2 :</label>
                <div class="col-sm-9"><input type="int" class="form-control" id="pk2" name="pk2" required value="<?= $pk2 ?>"></div>
            </div>
            <div class="mb-2 row">
                <label for="mekatronika" class="col-sm-3 col-form-label">Nilai MK Mekatronika :</label>
                <div class="col-sm-9"><input type="int" class="form-control" id="mekatronika" name="mekatronika" required value="<?= $mekatronika ?>"></div>
            </div>
            <div class="mb-2 row">
                <label for="jarkomdat" class="col-sm-3 col-form-label">Nilai MK Jaringan Komunikasi Data :</label>
                <div class="col-sm-9"> <input type="int" class="form-control" id="jarkomdat" name="jarkomdat" required value="<?= $jarkomdat ?>"></div>
            </div>
            <div class="mb-2 row">
                <label for="praktelkom" class="col-sm-3 col-form-label">Nilai MK Prak. Telekomunikasi :</label>
                <div class="col-sm-9"><input type="int" class="form-control" id="praktelkom" name="praktelkom" required value="<?= $praktelkom ?>"></div>
            </div>

            <div class="d-grid gap-2 col-6 mx-auto">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
        </form>
        <br>
        <!-- <a href="index.php" type="button" class="btn btn-outline-primary">Kembali ke Daftar Nilai</a> -->
        <a href="index.php" style="margin-left:auto; margin-right:0;">Kembali ke Daftar Nilai</a>
    </div>
</body>

</html>
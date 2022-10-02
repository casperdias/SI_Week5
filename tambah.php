<?php
include "connect.php";
require 'function.php';


// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

     // cek isi variabel yang dikirim (debugging)
     // var_dump($_POST);
     // var_dump($_FILES);
     // die;

     // cek data sudah ditambahkan
     if (tambah($_POST) > 0) {
          echo "
          <script>
          alert ('data berhasil ditambahkan!');
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

     <title>Tambah Data Mahasiswa</title>
</head>

<body>
     <header>
          <h2 style="text-align: center; margin-bottom:3%; margin-top:3%;">Tambah Data Mahasiswa </h2>
     </header>
     <div class="container">
          <form action="" method="post" enctype="multipart/form-data">
               <input type="hidden" name="id" value="<?= $mahasiswa["nim"]; ?>">
               <div class="mb-2 row">
                    <label for="nim" class="col-sm-3 col-form-label">NIM :</label>
                    <div class="col-sm-9"><input type="text" class="form-control" id="nim" name="nim" placeholder="Contoh : I0720001"></div>
               </div>
               <div class="mb-2 row">
                    <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap : </label>
                    <div class="col-sm-9"><input type="text" class="form-control" id="nama" name="nama" placeholder="Contoh : John Doe"></div>
               </div>
               <div class="mb-2 row">
                    <label for="si" class="col-sm-3 col-form-label">Nilai MK SI :</label>
                    <div class="col-sm-9"><input type="int" class="form-control" id="si" name="si" placeholder="Contoh 3, 3.5, atau 4"></div>
               </div>
               <div class="mb-2 row">
                    <label for="pk2" class="col-sm-3 col-form-label">Nilai MK PK-2 :</label>
                    <div class="col-sm-9"><input type="int" class="form-control" id="pk2" name="pk2" placeholder="Contoh 3, 3.5, atau 4"></div>
               </div>
               <div class="mb-2 row">
                    <label for="mekatronika" class="col-sm-3 col-form-label">Nilai MK Mekatronika :</label>
                    <div class="col-sm-9"><input type="int" class="form-control" id="mekatronika" name="mekatronika" placeholder="Contoh 3, 3.5, atau 4"></div>
               </div>
               <div class="mb-2 row">
                    <label for="jarkomdat" class="col-sm-3 col-form-label">Nilai MK Jaringan Komunikasi Data :</label>
                    <div class="col-sm-9"> <input type="int" class="form-control" id="jarkomdat" name="jarkomdat" placeholder="Contoh 3, 3.5, atau 4"></div>
               </div>
               <div class="mb-2 row">
                    <label for="praktelkom" class="col-sm-3 col-form-label">Nilai MK Prak. Telekomunikasi :</label>
                    <div class="col-sm-9"><input type="int" class="form-control" id="praktelkom" name="praktelkom" placeholder="Contoh 3, 3.5, atau 4"></div>
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
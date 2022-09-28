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
     <title>Edit Nilai Mahasiswa</title>
</head>

<body>
     <header>
          <h2 style="text-align: center;">Edit Nilai Mahasiswa </h2>
     </header>
     <form action="" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $mahasiswa["nim"]; ?>">
          <ul>
               <li>
                    <label for="nim">NIM : </label>
                    <input type="text" name="nim" id="nim" required>
               </li>
               <li>
                    <label for="nim">Nama : </label>
                    <input type="text" name="nama" id="nama" required>
               </li>
               <li>
                    <label for="nim">Nilai MK SI : </label>
                    <input type="int" name="si" id="si" required>
               </li>
               <li>
                    <label for="nim">Nilai MK PK-2 : </label>
                    <input type="int" name="pk2" id="pk2" required>
               </li>
               <li>
                    <label for="nim">Nilai MK Jarkomdat : </label>
                    <input type="int" name="jarkomdat" id="jarkomdat" required>
               </li>
               <li>
                    <label for="nim">Nilai MK Mekatronika : </label>
                    <input type="int" name="mekatronika" id="mekatronika" required>
               </li>
               <li>
                    <label for="nim">Nilai MK Prak. Telekomunikasi : </label>
                    <input type="int" name="praktelkom" id="praktelkom" required>
               </li>
               <li>
                    <button type="submit" name="submit">Tambah Data</button>
               </li>

          </ul>

     </form>

     <a href="index.php">Kembali ke Daftar Nilai</a>
</body>

</html>
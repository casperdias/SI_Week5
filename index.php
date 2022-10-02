<?php

//Koneksi ke database
require "connect.php";

// Jika Tombol Search di Klik
// if (isset($_POST["searching"])) {
//     $kuerimhs = cari($_POST["keyword"]);
// };
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Sistem Informasi</title>
</head>

<body class="body">
    <header class="header">
        <h1>Sistem Aplikasi Nilai</h1>
    </header>
    <div class="container" style="margin-left:auto; margin-right:auto;">
        <!-- Search -->
        <!-- <form action="" method="post">
            <input type="text" name="keyword" size="30" autofocus placeholder="Masukkan keyword pencarian" autocomplete="off">
            <button type="submit" name="searching">Search!</button>
            <br><br>
        </form> -->

        <table cellpadding="10px">
            <th>No</th>
            <th>NIM</th>
            <th style="white-space:nowrap;width:100%;">Nama Lengkap</th>
            <th>Sistem Informasi</th>
            <th>Jaringan Komunikasi Data</th>
            <th>Proyek Kreatif 2</th>
            <th>Mekatronika</th>
            <th>Praktikum Telekomunikasi</th>
            <!-- Kalau mau pake CRUD -->
            <th>Aksi</th>
            <tbody>
                <?php
                //Untuk urutan
                $i = 1;
                // Query dari Database
                // menggabungkan table mahasiswa dan table nilai melalui 'nim' yang sama dan disorting melalui nim juga
                $kuerimhs = mysqli_query($conn, "SELECT * FROM mahasiswa INNER JOIN nilai ON mahasiswa.nim = nilai.nim ORDER BY mahasiswa.nim");

                // Looping terus selama fetching dari query berlangsung
                while ($mahasiswa = mysqli_fetch_array($kuerimhs)) {
                    $nim    = $mahasiswa['nim'];
                    $absen = substr($nim, 1);
                    $urut = (int) $absen;
                    $nama   = $mahasiswa['nama'];

                    $si             = $mahasiswa['si'];
                    $pk2            = $mahasiswa['pk2'];
                    $jarkomdat      = $mahasiswa['jarkomdat'];
                    $mekatronika    = $mahasiswa['mekatronika'];
                    $praktelkom     = $mahasiswa['praktelkom'];
                ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $nim ?></td>
                        <td style="white-space:nowrap;width:100%;"><?= $nama ?></td>

                        <td style="text-align: center;"><?= $si ?></td>
                        <td style="text-align: center;"><?= $jarkomdat ?></td>
                        <td style="text-align: center;"><?= $pk2 ?></td>
                        <td style="text-align: center;"><?= $mekatronika ?></td>
                        <td style="text-align: center;"><?= $praktelkom ?></td>
                        <!-- Kalau Mau CRUD -->
                        <td style="text-align: center; width:100%; white-space:nowrap;">
                            <a class="btn btn-outline-primary btn-sm" href="ubah.php?nim=<?= $mahasiswa["nim"]; ?>">Ubah</a>
                            <a class="btn btn-outline-danger btn-sm" href="hapus.php?nim=<?= $mahasiswa["nim"]; ?>" onclick="return confirm ('yakin?')">Hapus</a>
                            <!-- <button><a href="ubah.php?nim=<?= $mahasiswa["nim"]; ?>">Ubah</a></button>
                            <button><a href="hapus.php?nim=<?= $mahasiswa["nim"]; ?>" onclick="return confirm ('yakin?')">Hapus</a></button> -->
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <br>
        <br>
        <a href="tambah.php">Tambah Data Mahasiswa</a>
    </div>


    <script src="js/main.js"></script>
</body>

</html>
<?php

//Koneksi ke database
$conn = new mysqli("localhost", "root", "", "sisteminformasi");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

// Query dari Database
$kuerimhs = mysqli_query($conn, "SELECT * FROM mahasiswa ORDER BY id ASC");
$kuerinilai = mysqli_query($conn, "SELECT * FROM nilai ORDER BY id ASC");

// // Fetching Query Tabel Mahasiswa
// $mahasiswa = mysqli_fetch_array($kuerimhs);
// $nim = $mahasiswa['nim'];
// $nama = $mahasiswa['nama'];

// // Fetching Query Tabel Nilai
// $nilai = mysqli_fetch_array($kuerinilai);
// $si = $nilai['si'];
// $pk2 = $nilai['pk2'];
// $jarkomdat = $nilai['jarkomdat'];
// $mekatronika = $nilai['mekatronika'];
// $praktelkom = $nilai['praktelkom'];


// var_dump($mahasiswa);
// var_dump($nilai);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi</title>
</head>

<body>
    <header style="text-align: center;">
        <h1>Sistem Aplikasi Nilai</h1>
    </header>
    <div class="container" style="margin-left:auto; margin-right:auto;">
        <table border="5px" cellpadding="5px">
            <thead>
                <th>No</th>
                <th>NIM</th>
                <th>Nama Lengkap</th>
                <th>Lihat Nilai</th>
            </thead>
            <tbody>
                <?php
                $i = 1;
                $kuerimhs = mysqli_query($conn, "SELECT * FROM mahasiswa ORDER BY id ASC");
                while ($mahasiswa = mysqli_fetch_array($kuerimhs)) {
                    $nim    = $mahasiswa['nim'];
                    $nama   = $mahasiswa['nama'];
                ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $nim ?></td>
                        <td><?= $nama ?></td>
                        <td><a href="lihatnilai.php">Lihat Nilai</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>
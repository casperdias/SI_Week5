<?php

//Koneksi ke database
$conn = new mysqli("localhost", "root", "", "sisteminformasi");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

// Query dari Database
// $kuerimhs = mysqli_query($conn, "SELECT * FROM mahasiswa ORDER BY id ASC");
// $kuerinilai = mysqli_query($conn, "SELECT * FROM nilai ORDER BY id ASC");

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
    <link rel="stylesheet" href="css/style.css">
    <title>Sistem Informasi</title>
</head>

<body>
    <header style="text-align: center;">
        <h1>Sistem Aplikasi Nilai</h1>
    </header>
    <div class="container" style="margin-left:auto; margin-right:auto;">
        <table border="5px" cellpadding="5px" style="margin-left:auto; margin-right:auto;">
            <thead>
                <th>No</th>
                <th>NIM</th>
                <th>Nama Lengkap</th>
                <th>Sistem Informasi</th>
                <th>Jaringan Komunikasi Data</th>
                <th>Proyek Kreatif 2</th>
                <th>Mekatronika</th>
                <th>Praktikum Telekomunikasi</th>
                <!-- Kalau mau pake CRUD -->
                <!-- <th>Aksi</th> -->
            </thead>
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
                        <td><?= $nama ?></td>

                        <td style="text-align: center;"><?= $si ?></td>
                        <td style="text-align: center;"><?= $jarkomdat ?></td>
                        <td style="text-align: center;"><?= $pk2 ?></td>
                        <td style="text-align: center;"><?= $mekatronika ?></td>
                        <td style="text-align: center;"><?= $praktelkom ?></td>
                        <!-- Kalau Mau CRUD -->
                        <!-- <td>
                            <a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a>
                            <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm ('yakin?')">Hapus</a>
                        </td> -->
                    </tr>
                    <!-- The Modal -->
                    <div id="myModal" class="modal">

                        <!-- Modal content -->
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <p>Some text in the Modal..</p>
                        </div>

                    </div>


                <?php
                }
                ?>
            </tbody>
        </table>
    </div>


    <script src="js/main.js"></script>
</body>

</html>
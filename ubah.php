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
    <title>Edit Nilai Mahasiswa</title>
</head>

<body>
    <header>
        <h2 style="text-align: center;">Edit Nilai Mahasiswa </h2>
    </header>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $mahasiswa["nim"]; ?>">
        <ul>
            <li>
                <label for="nim">NIM : </label>
                <input type="text" name="nim" id="nim" required value="<?= $nim ?>">
            </li>
            <li>
                <label for="nim">Nama : </label>
                <input type="text" name="nama" id="nama" required value="<?= $nama ?>">
            </li>
            <li>
                <label for="nim">Nilai MK SI : </label>
                <input type="int" name="si" id="si" required value="<?= $si ?>">
            </li>
            <li>
                <label for="nim">Nilai MK PK-2 : </label>
                <input type="int" name="pk2" id="pk2" required value="<?= $pk2 ?>">
            </li>
            <li>
                <label for="nim">Nilai MK Jarkomdat : </label>
                <input type="int" name="jarkomdat" id="jarkomdat" required value="<?= $jarkomdat ?>">
            </li>
            <li>
                <label for="nim">Nilai MK Mekatronika : </label>
                <input type="int" name="mekatronika" id="mekatronika" required value="<?= $mekatronika ?>">
            </li>
            <li>
                <label for="nim">Nilai MK Prak. Telekomunikasi : </label>
                <input type="int" name="praktelkom" id="praktelkom" required value="<?= $praktelkom ?>">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data</button>
            </li>

        </ul>

    </form>

    <a href="index.php">Kembali ke Daftar Nilai</a>
</body>

</html>
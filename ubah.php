<?php
    include "connect.php";
    if(isset($_GET['nim'])){
        $NIM = $_GET['nim'];
        $kuerimhs = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim = '$NIM' " );
        // INNER JOIN nilai ON mahasiswa.nim = nilai.nim WHERE mahasiswa.nim = $NIM");

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
        };
        var_dump($NIM);
    };
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input</title>
</head>
<body>
    <form action="" method="post">
        <label for=""></label>
        <input type="text" name="" id="">
        <label for=""></label>
        <input type="text" name="" id="">
        <label for=""></label>
        <input type="text" name="" id="">
        <label for=""></label>
        <input type="text" name="" id="">
        
    </form>
</body>
</html>
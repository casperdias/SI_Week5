<?php
require "../connect.php";
$keyword = $_GET["keyword"];

$kuerimhs = mysqli_query($conn, "SELECT * FROM mahasiswa INNER JOIN nilai ON mahasiswa.nim = nilai.nim WHERE mahasiswa.nama LIKE '%$keyword%' OR mahasiswa.nim LIKE '%$keyword%' ORDER BY mahasiswa.nim");
?>

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
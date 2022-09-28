<?php
// koneksi ke database
// mysqli_connect($hostname, $username, $password, $database)
$koneksi = new mysqli("localhost", "root", "", "sisteminformasi");

function query($query)
{
     // agar $koneksi pake yang di luar fungsi ini
     global $koneksi;
     $result = mysqli_query($koneksi, $query);
     $rows = [];
     while ($row = mysqli_fetch_assoc($result)) {
          // rows diisi row
          $rows[] = $row;
     }
     // rows bentuknya array asosiatif
     return $rows;
}

function tambah($data)
{
     global $koneksi;
     // ambil data dari tiap inputan ke suatu variabel
     $nim = htmlspecialchars($data["nim"]);
     $nama = htmlspecialchars($data["nama"]);

     $si = htmlspecialchars($data["si"]);
     $pk2 = htmlspecialchars($data["pk2"]);
     $jarkomdat = htmlspecialchars($data["jarkomdat"]);
     $meka = htmlspecialchars($data["mekatronika"]);
     $praktelkom = htmlspecialchars($data["praktelkom"]);


     // htmlspecialchars agar elemen html yang dimasukkan ke form tidak ngefek ke tampilan sistem

     // query insert data
     $isi = "INSERT INTO mahasiswa VALUES ('', '$nim', '$nama')";

     $isi2 = "INSERT INTO nilai VALUES ('', '$si','$pk2', '$jarkomdat','$meka','$praktelkom', '$nim')";

     mysqli_query($koneksi, $isi);
     mysqli_query($koneksi, $isi2);
     return  mysqli_affected_rows($koneksi);
}


function hapus($id)
{
     // isi $id adalah 'nim'
     global $koneksi;
     mysqli_query($koneksi, "DELETE FROM mahasiswa INNER JOIN nilai ON mahasiswa.nim = nilai.nim WHERE mahasiswa.nim = '$id'");
     // mysqli_query($koneksi, "DELETE FROM nilai WHERE  nim=$id");
     return mysqli_affected_rows($koneksi);
}

function ubah($data)
{
     global $koneksi;
     // ambil data dari tiap inputan ke suatu variabel
     $id = $data["id"];
     $nim = htmlspecialchars($data["nim"]);
     $nama = htmlspecialchars($data["nama"]);

     $si = htmlspecialchars($data["si"]);
     $pk2 = htmlspecialchars($data["pk2"]);
     $jarkomdat = htmlspecialchars($data["jarkomdat"]);
     $meka = htmlspecialchars($data["mekatronika"]);
     $praktelkom = htmlspecialchars($data["praktelkom"]);
     // htmlspecialchars agar elemen html yang dimasukkan ke form tidak ngefek ke tampilan sistem

     // Query Update Data
     // =============================================

     // Percobaan Update Satu per Satu
     // $isi = "UPDATE mahasiswa SET nim = '$nim', nama = '$nama' WHERE id = $id";
     // $isi2 = "UPDATE nilai SET si='$si',pk2='$pk2',jarkomdat='$jarkomdat',mekatronika='$meka',praktelkom='$praktelkom' WHERE nim = $nim ";

     // Percobaan Update Langsung
     $update = "UPDATE mahasiswa INNER JOIN nilai ON mahasiswa.nim=nilai.nim 
                                        SET mahasiswa.nim = $nim, 
                                            mahasiswa.nama = $nama, 
                                            nilai.si = $si,
                                            nilai.pk2 = $pk2,
                                            nilai.jarkomdat = $jarkomdat,
                                            nilai.mekatronika = $meka,
                                            nilai.praktelkom= $praktelkom
                    WHERE mahasiswa.nim = $nim";

     // mysqli_query($koneksi, $isi);
     // mysqli_query($koneksi, $isi2);
     mysqli_query($koneksi, $update);

     // Return angka ketika ada data yang berhasil di update lalu dipakai untuk isset hapus.php
     return  mysqli_affected_rows($koneksi);

     var_dump($isi2);
}

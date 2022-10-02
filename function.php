<?php
// koneksi ke database
// mysqli_connect($hostname, $username, $password, $database)
$koneksi = new mysqli("localhost", "root", "", "sisteminformasi");

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


function hapus($nim)
{
     // isi $id adalah 'nim'
     global $koneksi;
     mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE nim = '$nim'");
     mysqli_query($koneksi, "DELETE FROM nilai WHERE nim = '$nim'");

     var_dump($nim);

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
     var_dump($nim, $nama, $id);
     // htmlspecialchars agar elemen html yang dimasukkan ke form tidak ngefek ke tampilan sistem

     // Percobaan Update Langsung
     $update = "UPDATE mahasiswa INNER JOIN nilai ON mahasiswa.nim=nilai.nim 
                                        SET mahasiswa.nim = '$nim', 
                                            mahasiswa.nama = '$nama', 
                                            nilai.si = $si,
                                            nilai.pk2 = $pk2,
                                            nilai.jarkomdat = $jarkomdat,
                                            nilai.mekatronika = $meka,
                                            nilai.praktelkom= $praktelkom
                    WHERE mahasiswa.nim = '$nim'";

     mysqli_query($koneksi, $update);

     // Return angka ketika ada data yang berhasil di update lalu dipakai untuk isset hapus.php
     return  mysqli_affected_rows($koneksi);
}

// function cari($keyword)
// {
//      $query = "SELECT * FROM mahasiswa INNER JOIN nilai ON mahasiswa.nim=nilai.nim  
//                WHERE
//                     mahasiswa.nama LIKE '%$keyword%' OR
//                     mahasiswa.nim LIKE '%$keyword%'";
//      return query($query);
// }

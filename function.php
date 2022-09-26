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
     $jarkomdat = htmlspecialchars($data["si"]);
     $meka = htmlspecialchars($data["meka"]);
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
     global $koneksi;
     mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE  id=$id");
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
     $jarkomdat = htmlspecialchars($data["si"]);
     $meka = htmlspecialchars($data["meka"]);
     $praktelkom = htmlspecialchars($data["praktelkom"]);
     // htmlspecialchars agar elemen html yang dimasukkan ke form tidak ngefek ke tampilan sistem

     // query insert data
     $isi = "UPDATE mahasiswa SET nim = '$nim', nama = '$nama' WHERE id=$id";
     $isi2 = "UPDATE nilai SET si='$si',pk2='$pk2',jarkomdat='$jarkomdat',meka='$meka',praktelkom='$praktelkom' ";


     mysqli_query($koneksi, $isi);
     mysqli_query($koneksi, $isi2);
     // return angka ketika ada data yang berhasil di update
     return  mysqli_affected_rows($koneksi);
}

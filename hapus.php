<?php
require 'function.php';

$nim = $_GET['nim'];

if (hapus($nim) > 0) {
     echo "
     <script>
     alert ('data berhasil dihapus!');
     document.location.href = 'index.php';
     </script>";
} else {
     echo "
     <script>
     alert ('gagal!');
     </script>";
}

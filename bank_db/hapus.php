<?php
require 'functions.php';

$kodeNasabah = $_GET["kodeNasabah"];

if(hapus($kodeNasabah) > 0){
    echo "
        <script>
            alert('Data Nasabah Berhasil Dihapus');
            document.location.href = 'index.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data Nasabah Gagal Dihapus');
            document.location.href = 'index.php';
        </script>
    ";
}
?>
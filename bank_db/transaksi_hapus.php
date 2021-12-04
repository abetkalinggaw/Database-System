<?php
require 'functions.php';

$kodeTransaksi = $_GET["kodeTransaksi"];

if(hapus_transaksi($kodeTransaksi) > 0){
    echo "
        <script>
            alert('Data Berhasil Dihapus');
            document.location.href = 'transaksi.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data Gagal Dihapus');
            document.location.href = 'transaksi.php';
        </script>
    ";
}
?>
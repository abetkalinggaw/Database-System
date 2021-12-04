<?php
require 'functions.php';

$kodePegawai = $_GET["kodePegawai"];

if(hapus_pegawai($kodePegawai) > 0){
    echo "
        <script>
            alert('Data Berhasil Dihapus');
            document.location.href = 'pegawai.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data Gagal Dihapus');
            document.location.href = 'pegawai.php';
        </script>
    ";
}
?>
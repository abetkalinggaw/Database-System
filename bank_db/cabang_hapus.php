<?php
require 'functions.php';

$kodeCabang = $_GET["kodeCabang"];

if(hapus_cabang($kodeCabang) > 0){
    echo "
        <script>
            alert('Data Berhasil Dihapus');
            document.location.href = 'cabang.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data Gagal Dihapus');
            document.location.href = 'cabang.php';
        </script>
    ";
}
?>
<?php
require 'functions.php';

$kodeSetup = $_GET["kodeSetup"];

if(hapus_setrekening($kodeSetup) > 0){
    echo "
        <script>
            alert('Data Berhasil Dihapus');
            document.location.href = 'setupRekening.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data Gagal Dihapus');
            document.location.href = 'setupRekening.php';
        </script>
    ";
}
?>
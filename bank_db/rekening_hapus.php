<?php
require 'functions.php';

$noRekening = $_GET["noRekening"];

if(hapus_rekening($noRekening) > 0){
    echo "
        <script>
            alert('Data Berhasil Dihapus');
            document.location.href = 'rekening.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data Gagal Dihapus');
            document.location.href = 'rekening.php';
        </script>
    ";
}
?>
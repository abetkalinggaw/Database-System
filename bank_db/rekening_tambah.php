<?php
require 'functions.php';

$conn = mysqli_connect("localhost", "root", "", "bank_crud");

if(isset($_POST["submit"])){
    
    if(tambah_rekening($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Ditambahkan');
                document.location.href = 'rekening.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Ditambahkan');
                document.location.href = 'rekening.php';
            </script>
        ";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <!-- Data Tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">

    <title>TUGAS 2 | CRUD</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-uppercase">
        <div class="container">
            <a class="navbar-brand" href="index.php">TUGAS 2 | CRUD</a>
        </div>
    </nav>
    <!-- Close Navbar -->

    <!-- Container -->
    <div class="container">
        <div class="row my-2">
            <div class="col-md">
                <h3 class="fw-bold text-uppercase"><i class="bi bi-person-plus-fill"></i>&nbsp;Tambah Data Rekening</h3>
            </div>
            <hr>
        </div>
        <div class="row my-2">
            <div class="col-md">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="noRekening" class="form-label">Nomor Rekening</label>
                        <input type="text" class="form-control form-control-md w-50" id="noRekening"
                            placeholder="Masukkan No. Rekening" name="noRekening" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="namaRekening" class="form-label">Nama Rekening</label>
                        <select class="form-control w-50" id="namaRekening" name="namaRekening">
                            <option selected> - PILIH - </option>
                            <option value="TAHAPAN"> TAHAPAN </option>
                            <option value="TAHAPAN GOLD"> TAHAPAN GOLD </option>
                            <option value="TAHAPAN XPRESI"> TAHAPAN XPRESI </option>
                            <option value="SIMPANAN PELAJAR"> SIMPANAN PELAJAR </option>
                            <option value="TAPRES"> TAPRES </option>
                            <option value="DEPOSITO"> DEPOSITO </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tipeRekening" class="form-label">Tipe Rekening</label>
                        <select class="form-control w-50" id="tipeRekening" name="tipeRekening">
                            <option selected> - PILIH - </option>
                            <option value="BIRU"> BIRU </option>
                            <option value="GOLD"> GOLD </option>
                            <option value="PLATINUM"> PLATINUM </option>
                            <option value="XPRESI"> XPRESI </option>
                            <option value="KARTU KREDIT"> KARTU KREDIT </option>
                            <option value="FLAZZ"> FLAZZ </option>
                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="saldo" class="form-label">Saldo</label>
                        <input type="text" class="form-control w-50" id="saldo" placeholder="Masukkan Saldo"
                            name="saldo" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="tandaTangan" class="form-label">Tanda Tangan</label>
                        <input type="text" class="form-control w-50" id="tandaTangan" placeholder="Masukkan Nomor HP"
                            name="tandaTangan" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="kodeCabang" class="form-label">Kode Cabang</label>
                        <input type="text" class="form-control w-50" id="kodeCabang" name="kodeCabang"
                            placeholder="Masukkan Kode Cabang" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="nomorATM" class="form-label">Nomor ATM</label>
                        <input type="text" class="form-control w-50" id="nomorATM" name="nomorATM"
                            placeholder="Masukkan No. ATM" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="bunga" class="form-label">Bunga</label>
                        <input type="text" class="form-control w-50" id="bunga" name="bunga"
                            placeholder="Bunga" autocomplete="off" required>
                    </div>
                    <hr>
                    <a href="rekening.php" class="btn btn-secondary">Kembali</a>
                    <button type="submit" name="submit" class="btn btn-primary">Tambahkan Data</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Close Container -->

</body>

</html>
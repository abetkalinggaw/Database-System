<?php
require 'functions.php';

$conn = mysqli_connect("localhost", "root", "", "bank_crud");
$nasabah = query("SELECT kodeNasabah, namaNasabah FROM nasabah");
$rekening = query("SELECT noRekening FROM rekening");
$pegawai = query('SELECT kodePegawai, namaPegawai FROM pegawai');

if(isset($_POST["submit"])){
    
    if(tambah_transaksi($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Ditambahkan');
                document.location.href = 'transaksi.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Ditambahkan');
                document.location.href = 'transaksi.php';
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
                <h3 class="fw-bold text-uppercase"><i class="bi bi-person-plus-fill"></i>&nbsp;Tambah Transaksi</h3>
            </div>
            <hr>
        </div>
        <div class="row my-2">
            <div class="col-md">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="namaTransaksi" class="form-label">Nama Transaksi</label>
                        <input type="text" class="form-control form-control-md w-50" id="namaTransaksi"
                            placeholder="Masukkan Nama Transaksi" name="namaTransaksi" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggalTransaksi" class="form-label">Tanggal</label>
                        <input type="date" class="form-control form-control-md w-50" id="tanggalTransaksi" name="tanggalTransaksi" required>
                    </div>
                    <div class="mb-3">
                        <label for="noRekening" class="form-label">No Rekening</label>
                        <select id="noRekening" name="noRekening" class="form-control" required>
                            <option>- PILIH -</option>
                            <?php foreach($rekening as $row) : ?>
                            <option value=<?= $row["noRekening"];?>><?= $row["noRekening"];?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="kodeNasabah" class="form-label">Nama Nasabah</label>
                        <select id="kodeNasabah" name="kodeNasabah" class="form-control" required>
                            <option>- PILIH -</option>
                            <?php foreach($nasabah as $row) : ?>
                            <option value=<?= $row["kodeNasabah"];?>><?= $row["namaNasabah"];?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nominal" class="form-label">Nominal Transaksi</label>
                        <input type="text" class="form-control form-control-md w-50" id="nominal"
                            placeholder="Masukkan Nominal" name="nominal" required>
                    </div>
                    <div class="mb-3">
                        <label for="kodePegawai" class="form-label">Pegawai</label>
                        <select id="kodePegawai" name="kodePegawai" class="form-control" required>
                            <option>- PILIH -</option>
                            <?php foreach($pegawai as $row) : ?>
                            <option value=<?= $row["kodePegawai"];?>><?= $row["namaPegawai"];?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tipeTransaksi" class="form-label">Tipe Transaksi</label>
                        <select class="form-control w-50" id="tipeTransaksi" name="tipeTransaksi">
                            <option selected> - PILIH - </option>
                            <option value="DEBIT"> DEBIT </option>
                            <option value="KREDIT"> KREDIT </option>
                            <option value="TRANSFER"> TRANSFER </option>
                        </select>
                    </div>
                    <hr>
                    <a href="transaksi.php" class="btn btn-secondary">Kembali</a>
                    <button type="submit" name="submit" class="btn btn-primary">Tambahkan Data</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Close Container -->

</body>

</html>
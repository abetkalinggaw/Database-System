<?php
require 'functions.php';

$kodeTransaksi = $_GET["kodeTransaksi"];

$transaksi = query("SELECT * FROM transaksi WHERE kodeTransaksi = $kodeTransaksi")[0];
$rekening = query("SELECT noRekening FROM rekening");
$nasabah = query("SELECT kodeNasabah, namaNasabah FROM nasabah");
$pegawai = query('SELECT kodePegawai, namaPegawai FROM pegawai');

$conn = mysqli_connect("localhost", "root", "", "bank_crud");

if (isset($_POST['submit'])) {
    if (update_transaksi($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Diupdate!');
                document.location.href = 'transaksi.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Diupdate!');
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
                <h3 class="fw-bold text-uppercase"><i class="bi bi-pencil-square"></i>&nbsp;Ubah Transaksi</h3>
            </div>
            <hr>
        </div>
        <div class="row my-2">
            <div class="col-md">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="kodeTransaksi" value="<?= $transaksi["kodeTransaksi"];?>">
                    <div class="mb-3">
                        <label for="namaTransaksi" class="form-label">Nama Transaksi</label>
                        <input type="text" class="form-control form-control-md w-50" id="namaTransaksi"
                            placeholder="Masukkan Nama Transaksi" name="namaTransaksi" required 
                            value="<?= $transaksi["namaTransaksi"];?>">
                    </div>
                    <div class="mb-3">
                        <label for="tanggalTransaksi" class="form-label">Tanggal</label>
                        <input type="date" class="form-control form-control-md w-50" id="tanggalTransaksi" name="tanggalTransaksi" required>
                    </div>
                    <div class="mb-3">
                        <label for="noRekening" class="form-label">No Rekening</label>
                        <input type="text" class="form-control form-control-md w-50" id="noRekening"
                            placeholder="Masukkan No Rekening" name="noRekening" required value="<?= $transaksi["noRekening"];?>">
                    </div>
                    <div class="mb-3">
                        <label for="kodeNasabah" class="form-label">Kode Nasabah</label>
                        <input type="text" class="form-control form-control-md w-50" id="kodeNasabah"
                            placeholder="Masukkan Kode Nasabah" name="kodeNasabah" required value="<?= $transaksi["kodeNasabah"];?>">
                    </div>
                    <div class="mb-3">
                        <label for="nominal" class="form-label">Nominal Transaksi</label>
                        <input type="text" class="form-control form-control-md w-50" id="nominal"
                            placeholder="Masukkan Nominal" name="nominal" required value="<?= $transaksi["nominal"];?>">
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
                    <hr>
                    <a href="rekening.php" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-warning" name="submit">Update Data</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Close Container -->
</body>

</html>
<?php
require 'functions.php';
$transaksi = query("SELECT * FROM transaksi");
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
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php">Nasabah</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="rekening.php">Rekening</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="transaksi.php">Transaksi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pegawai.php">Pegawai</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cabang.php">Cabang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" tabindex="-1" aria-disabled="true"></a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Close Navbar -->

    <!-- Container -->
    <div class="container">
        <div class="row my-2">
            <div class="col-md">
                <h3 class="text-center fw-bold text-uppercase">Transaksi</h3>
                <hr>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-md">
                <a href="transaksi_tambah.php" class="btn btn-primary"><i class="bi bi-person-plus-fill"></i>&nbsp;Tambah</a>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md">
                <table id="data" class="table table-striped table-responsive table-hover text-center"
                    style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th>Pengaturan</th>
                            <th>Kode Transaksi</th>
                            <th>Nama Transaksi</th>
                            <th>Tanggal</th>
                            <th>No Rekening</th>
                            <th>Kode Nasabah</th>
                            <th>Nominal</th>
                            <th>Kode Transaksi</th>
                            <th>Tipe Transaksi</th>
                            <th>Cetak</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $kodeTransaksi= 1; ?>
                        <?php foreach ($transaksi as $row) : ?>
                        <tr>
                            <td>
                                <a href="transaksi_update.php?kodeTransaksi=<?= $row['kodeTransaksi']; ?>"
                                    class="btn btn-warning btn-sm" style="font-weight: 600;"><i
                                        class="bi bi-pencil-square"></i>&nbsp;Update</a>
                                <a href="transaksi_hapus.php?kodeTransaksi=<?= $row['kodeTransaksi']; ?>"
                                    class="btn btn-danger btn-sm" style="font-weight: 600;"
                                    onclick="return confirm('Apakah anda yakin ingin menghapus data <?= $row['kodeTransaksi']; ?> ?');"><i
                                        class="bi bi-trash-fill"></i>&nbsp;Delete</a>
                            </td>
                            <td><?= $row["kodeTransaksi"];?></td>
                            <td><?= $row["namaTransaksi"];?></td>
                            <td><?= $row["tanggalTransaksi"];?></td>
                            <td><?= $row["noRekening"];?></td>
                            <td><?= $row["kodeNasabah"];?></td>
                            <td><?= $row["nominal"];?></td>
                            <td><?= $row["kodePegawai"];?></td>
                            <td><?= $row["tipeTransaksi"];?></td>
                            <td>
                            <a href="cetak.php?kodeTransaksi=<?= $row['kodeTransaksi']; ?>"
                                    class="btn btn-success btn-sm" style="font-weight: 600;"><i
                                        class="bi bi-save"></i>&nbsp; Cetak</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Close Container -->

    <!-- Data Tables -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>

</body>

</html>
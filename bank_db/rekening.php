<?php
require 'functions.php';
$rekening = query("SELECT * FROM rekening");
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
                <h3 class="text-center fw-bold text-uppercase">Data Rekening</h3>
                <hr>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-md">
                <a href="rekening_tambah.php" class="btn btn-primary"><i class="bi bi-person-plus-fill"></i>&nbsp;Tambah
                    Data</a>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md">
                <table id="data" class="table table-striped table-responsive table-hover text-center"
                    style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th>Pengaturan</th>
                            <th>No Rekening</th>
                            <th>Nama Rekening</th>
                            <th>Tipe Rekening</th>
                            <th>Saldo</th>
                            <th>Tanda Tangan</th>
                            <th>Kode Cabang</th>
                            <th>Nomor ATM</th>
                            <th>Bunga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $noRekening= 1; ?>
                        <?php foreach ($rekening as $row) : ?>
                        <tr>
                            <td>
                                <a href="rekening_update.php?noRekening=<?= $row['noRekening']; ?>"
                                    class="btn btn-warning btn-sm" style="font-weight: 600;"><i
                                        class="bi bi-pencil-square"></i>&nbsp;Update</a>
                                <a href="rekening_hapus.php?noRekening=<?= $row['noRekening']; ?>"
                                    class="btn btn-danger btn-sm" style="font-weight: 600;"
                                    onclick="return confirm('Apakah anda yakin ingin menghapus data <?= $row['noRekening']; ?> ?');"><i
                                        class="bi bi-trash-fill"></i>&nbsp;Delete</a>
                            </td>
                            <td><?= $row["noRekening"];?></td>
                            <td><?= $row["namaRekening"];?></td>
                            <td><?= $row["tipeRekening"];?></td>
                            <td><?= $row["saldo"];?></td>
                            <td><?= $row["tandaTangan"];?></td>
                            <td><?= $row["kodeCabang"];?></td>
                            <td><?= $row["nomorATM"];?></td>
                            <td><?= $row["bunga"];?></td>
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
<?php
require 'functions.php';

$kodeTransaksi = $_GET["kodeTransaksi"];

$row = query("SELECT transaksi.kodeTransaksi, transaksi.namaTransaksi, transaksi.tanggalTransaksi, 
            rekening.noRekening, nasabah.namaNasabah, transaksi.nominal, transaksi.tipeTransaksi FROM transaksi
                INNER JOIN rekening ON rekening.noRekening = transaksi.noRekening
                INNER JOIN nasabah ON nasabah.kodeNasabah = transaksi.kodeNasabah
                WHERE kodeTransaksi = $kodeTransaksi")[0];
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

    <title>INVOICE</title>
</head>

<body>
    <!-- Container -->
    <div class="container">
        <div class="row my-2">
            <div class="col-md">
                <h3 class="text-center fw-bold text-uppercase">INVOICE</h3>
                <hr>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md">
                <table id="data" class="table table-striped table-responsive table-hover text-center"
                    style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th>Kode Transaksi</th>
                            <th>Nama Transaksi</th>
                            <th>Tanggal</th>
                            <th>No Rekening</th>
                        </tr>
                    </thead>
                    </tr>
                    <tbody>
                        <tr>
                            </td>
                            <td><?= $row["kodeTransaksi"];?></td>
                            <td><?= $row["namaTransaksi"];?></td>
                            <td><?= $row["tanggalTransaksi"];?></td>
                            <td><?= $row["noRekening"];?></td>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table id="data" class="table table-striped table-responsive table-hover text-center"
                    style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th>Nama Nasabah</th>
                            <th>Nominal</th>
                            <th>Tipe Transaksi</th>
                        </tr>
                    </thead>
                    </tr>
                    <tbody>
                        <tr>
                            </td>
                            <td><?= $row["namaNasabah"];?></td>
                            <td><?= $row["nominal"];?></td>
                            <td><?= $row["tipeTransaksi"];?></td>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <hr>
                <a href="transaksi.php" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
    <!-- Close Container -->

    <!-- Data Tables -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>

</body>

</html>
<?php
require 'functions.php';

$conn = mysqli_connect("localhost", "root", "", "bank_crud");
$pegawai = query('SELECT kodeManager, namaPegawai FROM pegawai');

if(isset($_POST["submit"])){
    
    if(tambah_cabang($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Ditambahkan');
                document.location.href = 'cabang.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Ditambahkan');
                document.location.href = 'cabang.php';
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
                <h3 class="fw-bold text-uppercase"><i class="bi bi-person-plus-fill"></i>&nbsp;Tambah Data Cabang</h3>
            </div>
            <hr>
        </div>
        <div class="row my-2">
            <div class="col-md">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="namaCabang" class="form-label">Nama</label>
                        <input type="text" class="form-control form-control-md w-50" id="namaCabang"
                            placeholder="Masukkan Nama" name="namaCabang" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamatCabang" class="form-label">Alamat</label>
                        <input type="text" class="form-control w-50" row="5" id="alamatCabang" placeholder="Masukkan Alamat"
                            name="alamatCabang" required>
                    </div>
                    <div class="mb-3">
                        <label for="kodeManager" class="form-label">Kode Manager</label>
                        <select id="kodeManager" name="kodeManager" class="form-control" required>
                            <option selected> - PILIH - </option>
                            <option value="1"> 1 </option>
                            <option value="11"> 11 </option>
                        </select>
                    <hr>
                    <a href="cabang.php" class="btn btn-secondary">Kembali</a>
                    <button type="submit" name="submit" class="btn btn-primary">Tambahkan Data</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Close Container -->

</body>

</html>
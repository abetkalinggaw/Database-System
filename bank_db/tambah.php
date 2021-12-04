<?php
require 'functions.php';

$conn = mysqli_connect("localhost", "root", "", "bank_crud");

if(isset($_POST["submit"])){
    
    if(tambah($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Ditambahkan');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Ditambahkan');
                document.location.href = 'index.php';
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
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- Own CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>Tambah Data | CRUD</title>
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
                <h3 class="fw-bold text-uppercase"><i class="bi bi-person-plus-fill"></i>&nbsp;Tambah Data Nasabah</h3>
            </div>
            <hr>
        </div>
        <div class="row my-2">
            <div class="col-md">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="namaNasabah" class="form-label">Nama</label>
                        <input type="text" class="form-control form-control-md w-50" id="namaNasabah"
                            placeholder="Masukkan Nama" name="namaNasabah" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="NIK" class="form-label">NIK</label>
                        <input type="number" class="form-control w-50" id="NIK" placeholder="Masukkan NIK" name="NIK"
                            autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control w-50" id="tanggalLahir" name="tanggalLahir" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-Mail</label>
                        <input type="email" class="form-control w-50" id="email" placeholder="Masukkan E-Mail"
                            name="email" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="noHP" class="form-label">Nomor HP</label>
                        <input type="text" class="form-control w-50" id="noHP" placeholder="Masukkan Nomor HP"
                            name="noHP" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control w-50" id="alamat" rows="5" name="alamat"
                            placeholder="Masukkan Alamat" autocomplete="off" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="namaIbuKandung" class="form-label">Nama Ibu Kandung</label>
                        <textarea class="form-control w-50" id="namaIbuKandung" name="namaIbuKandung"
                            placeholder="Masukkan Nama Ibu Kandung" autocomplete="off" required></textarea>
                    </div>
                    <hr>
                    <a href="index.php" class="btn btn-secondary">Kembali</a>
                    <button type="submit" name="submit" class="btn btn-primary">Tambahkan Data</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Close Container -->

</body>

</html>
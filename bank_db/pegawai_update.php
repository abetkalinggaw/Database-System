<?php
require 'functions.php';

$kodePegawai = $_GET["kodePegawai"];

$Pegawai = query("SELECT * FROM pegawai WHERE kodePegawai = $kodePegawai")[0];

$conn = mysqli_connect("localhost", "root", "", "bank_crud");

if (isset($_POST['submit'])) {
    if (update_pegawai($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Diupdate!');
                document.location.href = 'pegawai.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Diupdate!');
                document.location.href = 'pegawai.php';
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
            <a class="navbar-brand" href="pegawai.php">TUGAS 2 | CRUD</a>
        </div>
    </nav>
    <!-- Close Navbar -->

    <!-- Container -->
    <div class="container">
        <div class="row my-2">
            <div class="col-md">
                <h3 class="fw-bold text-uppercase"><i class="bi bi-pencil-square"></i>&nbsp;Ubah Data Pegawai</h3>
            </div>
            <hr>
        </div>
        <div class="row my-2">
            <div class="col-md">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="kodePegawai" class="form-label">Kode Pegawai</label>
                        <input type="text" class="form-control form-control-md w-50" id="kodePegawai"
                            placeholder="Masukkan Kode Pegawai" name="kodePegawai"
                            value="<?= $Pegawai["kodePegawai"];?>">
                    </div>
                    <div class="mb-3">
                        <label for="namaPegawai" class="form-label">Nama</label>
                        <input type="text" class="form-control form-control-md w-50" id="namaPegawai"
                            placeholder="Masukkan Nama" name="namaPegawai" required
                            value="<?= $Pegawai["namaPegawai"];?>">
                    </div>
                    <div class="mb-3">
                        <label for="emailPegawai" class="form-label">E-Mail</label>
                        <input type="email" class="form-control w-50" id="emailPegawai" placeholder="Masukkan E-Mail"
                            name="emailPegawai" required value="<?= $Pegawai["emailPegawai"];?>">
                    </div>
                    <div class="mb-3">
                        <label for="kodeManager" class="form-label">Kode Manager</label>
                        <select id="kodeManager" name="kodeManager" class="form-control" required value="<?= $Pegawai["kodeManager"];?>">
                            <option> - PILIH - </option>
                            <option value="1"> 1 </option>
                            <option value="11"> 11 </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="kodeCabang" class="form-label">Kode Cabang</label>
                        <input type="n" class="form-control w-50" id="kodeCabang" placeholder="Masukkan Kode Cabang"
                            name="kodeCabang" required value="<?= $Pegawai["kodeCabang"];?>">
                    </div>
                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <input type="text" class="form-control w-50" id="jabatan" placeholder="Masukkan Jabatan"
                            name="jabatan" autocomplete="off" required value="<?= $Pegawai["jabatan"];?>">
                    </div>
                    <hr>
                    <a href="pegawai.php" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-warning" name="submit">Update Data</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Close Container -->
</body>

</html>
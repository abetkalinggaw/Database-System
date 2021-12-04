<?php
$conn = mysqli_connect("localhost", "root", "", "bank_crud");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

//////////////////////////////// NASABAH /////////////////////////////////////

//Function TAMBAH
function tambah($data) {
    global $conn;

    $namaNasabah    = htmlspecialchars($data["namaNasabah"]);
    $NIK            = htmlspecialchars($data["NIK"]);
    $tanggalLahir   = htmlspecialchars($data["tanggalLahir"]);
    $email          = htmlspecialchars($data["email"]);
    $noHP           = htmlspecialchars($data["noHP"]);
    $alamat         = htmlspecialchars($data["alamat"]);
    $namaIbuKandung = htmlspecialchars($data["namaIbuKandung"]);

    $query = "INSERT INTO nasabah VALUES
                ('','$namaNasabah','$NIK','$tanggalLahir','$email','$noHP', '$alamat', '$namaIbuKandung')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


//Function HAPUS
function hapus($kodeNasabah) {
    global $conn;
    mysqli_query($conn, "DELETE FROM nasabah WHERE kodeNasabah = $kodeNasabah");
    return mysqli_affected_rows($conn);
}


//Function UPDATE
function update($data) {
    global $conn;

    $kodeNasabah    = $data["kodeNasabah"];
    $namaNasabah    = htmlspecialchars($data["namaNasabah"]);
    $NIK            = htmlspecialchars($data["NIK"]);
    $tanggalLahir   = htmlspecialchars($data["tanggalLahir"]);
    $email          = htmlspecialchars($data["email"]);
    $noHP           = htmlspecialchars($data["noHP"]);
    $alamat         = htmlspecialchars($data["alamat"]);
    $namaIbuKandung = htmlspecialchars($data["namaIbuKandung"]);

    $query = "UPDATE nasabah SET 
        namaNasabah = '$namaNasabah', 
        NIK = '$NIK', 
        tanggalLahir = '$tanggalLahir', 
        email = '$email', 
        noHP = '$noHP', 
        alamat = '$alamat', 
        namaIbuKandung = '$namaIbuKandung'
            WHERE kodeNasabah = '$kodeNasabah'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//////////////////////////////// PEGAWAI ////////////////////////////////////////////

// Membuat fungsi tambah
function tambah_pegawai($data){
    global $conn;

    $kodePegawai         = htmlspecialchars($data["kodePegawai"]);
    $namaPegawai         = htmlspecialchars($data["namaPegawai"]);
    $emailPegawai        = htmlspecialchars($data["emailPegawai"]);
    $kodeManager         = htmlspecialchars($data["kodeManager"]);
    $kodeCabang          = htmlspecialchars($data["kodeCabang"]);
    $jabatan             = htmlspecialchars($data["jabatan"]);

    $query = "INSERT INTO pegawai VALUES 
                ('$kodePegawai', '$namaPegawai','$emailPegawai','$kodeManager','$kodeCabang', '$jabatan')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//Function HAPUS
function hapus_pegawai($kodePegawai) {
    global $conn;
    mysqli_query($conn, "DELETE FROM pegawai WHERE kodePegawai = $kodePegawai");
    return mysqli_affected_rows($conn);
}

//Function UPDATE
function update_pegawai($data) {
    global $conn;

    $kodePegawai         = $data["kodePegawai"];
    $namaPegawai         = htmlspecialchars($data["namaPegawai"]);
    $emailPegawai        = htmlspecialchars($data["emailPegawai"]);
    $kodeManager         = htmlspecialchars($data["kodeManager"]);
    $kodeCabang          = htmlspecialchars($data["kodeCabang"]);
    $jabatan             = htmlspecialchars($data["jabatan"]);

    $query = "UPDATE pegawai SET kodePegawai = '$kodePegawai', namaPegawai = '$namaPegawai', emailPegawai = '$emailPegawai', kodeManager = '$kodeManager', kodeCabang = '$kodeCabang', jabatan = '$jabatan'
                WHERE kodePegawai = '$kodePegawai'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//////////////////////////////// CABANG//////////////////////////////////

// Membuat fungsi tambah
function tambah_cabang($data){
    global $conn;

    $namaCabang           = htmlspecialchars($data["namaCabang"]);
    $alamatCabang         = htmlspecialchars($data["alamatCabang"]);
    $kodeManager          = htmlspecialchars($data["kodeManager"]);


    $query = "INSERT INTO cabang VALUES 
                ('', '$namaCabang','$alamatCabang','$kodeManager')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//Function HAPUS
function hapus_cabang($kodeCabang) {
    global $conn;
    mysqli_query($conn, "DELETE FROM cabang WHERE kodeCabang = $kodeCabang");
    return mysqli_affected_rows($conn);
}

//Function UPDATE
function update_cabang($data) {
    global $conn;

    $kodeCabang             = $data["kodeCabang"];
    $namaCabang             = htmlspecialchars($data["namaCabang"]);
    $alamatCabang           = htmlspecialchars($data["alamatCabang"]);
    $kodeManager            = htmlspecialchars($data["kodeManager"]);

    $query = "UPDATE cabang SET namaCabang = '$namaCabang', alamatCabang = '$alamatCabang', alamatCabang = '$alamatCabang', kodeManager = '$kodeManager'
                WHERE kodeCabang = '$kodeCabang'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


//////////////////////////////// REKENING //////////////////////////////////


// Membuat fungsi tambah
function tambah_rekening($data){
    global $conn;

    $noRekening             = htmlspecialchars($data["noRekening"]);
    $namaRekening           = htmlspecialchars($data["namaRekening"]);
    $tipeRekening           = htmlspecialchars($data["tipeRekening"]);
    $saldo                  = htmlspecialchars($data["saldo"]);
    $tandaTangan            = htmlspecialchars($data["tandaTangan"]);
    $kodeCabang             = htmlspecialchars($data["kodeCabang"]);
    $nomorATM               = htmlspecialchars($data["nomorATM"]);
    $bunga                  = htmlspecialchars($data["bunga"]);

    $query = "INSERT INTO rekening VALUES 
                ('$noRekening', '$namaRekening','$tipeRekening','$saldo','$tandaTangan', '$kodeCabang','$nomorATM','$bunga')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//Function HAPUS
function hapus_rekening($noRekening) {
    global $conn;
    mysqli_query($conn, "DELETE FROM rekening WHERE noRekening = $noRekening");
    return mysqli_affected_rows($conn);
}

//Function UPDATE
function update_rekening($data) {
    global $conn;

    $noRekening             = $data["noRekening"];
    $namaRekening           = htmlspecialchars($data["namaRekening"]);
    $tipeRekening           = htmlspecialchars($data["tipeRekening"]);
    $saldo                  = htmlspecialchars($data["saldo"]);
    $tandaTangan            = htmlspecialchars($data["tandaTangan"]);
    $kodeCabang             = htmlspecialchars($data["kodeCabang"]);
    $nomorATM               = htmlspecialchars($data["nomorATM"]);
    $bunga                  = htmlspecialchars($data["bunga"]);

    $query = "UPDATE rekening SET namaRekening = '$namaRekening', tipeRekening = '$tipeRekening', saldo = '$saldo', tandaTangan = '$tandaTangan', kodeCabang = '$kodeCabang', nomorATM = '$nomorATM', bunga = '$bunga'
                WHERE noRekening = '$noRekening'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//////////////////////////////// SETUP REKENING //////////////////////////////////

// Membuat fungsi tambah
function tambah_setrekening($data){
    global $conn;

    $kodeNasabah            = htmlspecialchars($data["kodeNasabah"]);
    $noRekening             = htmlspecialchars($data["noRekening"]);
    $tanggalPembukuan       = htmlspecialchars($data["tanggalPembukuan"]);
    $kodePegawai            = htmlspecialchars($data["kodePegawai"]);

    $query = "INSERT INTO setuprekening VALUES 
                ('', '$kodeNasabah','$noRekening','$tanggalPembukuan','$kodePegawai')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//Function HAPUS
function hapus_setrekening($kodeSetup) {
    global $conn;
    mysqli_query($conn, "DELETE FROM setuprekening WHERE kodeSetup = $kodeSetup");
    return mysqli_affected_rows($conn);
}

//Function UPDATE
function update_setrekening($data) {
    global $conn;

    $kodeSetup              = $data["kodeSetup"];
    $kodeNasabah            = htmlspecialchars($data["kodeNasabah"]);
    $noRekening             = htmlspecialchars($data["noRekening"]);
    $tanggalPembukuan       = htmlspecialchars($data["tanggalPembukuan"]);
    $kodePegawai            = htmlspecialchars($data["kodePegawai"]);

    $query = "UPDATE setuprekening SET kodeNasabah = '$kodeNasabah', noRekening = '$noRekening', tanggalPembukuan = '$tanggalPembukuan', kodePegawai = '$kodePegawai'
                WHERE kodeSetup = '$kodeSetup'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
    
}

//////////////////////////////// TRANSAKSI //////////////////////////////////

// Membuat fungsi tambah
function tambah_transaksi($data){
    global $conn;

    $namaTransaksi      = htmlspecialchars($data["namaTransaksi"]);
    $tanggalTransaksi   = htmlspecialchars($data["tanggalTransaksi"]);
    $noRekening         = htmlspecialchars($data["noRekening"]);
    $kodeNasabah        = htmlspecialchars($data["kodeNasabah"]);
    $nominal            = htmlspecialchars($data["nominal"]);
    $kodePegawai        = htmlspecialchars($data["kodePegawai"]);
    $tipeTransaksi      = htmlspecialchars($data["tipeTransaksi"]);

    $query = "INSERT INTO transaksi VALUES 
                ('', '$namaTransaksi','$tanggalTransaksi','$noRekening','$kodeNasabah', '$nominal','$kodePegawai ','$tipeTransaksi ')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//Function HAPUS
function hapus_transaksi($kodeTransaksi) {
    global $conn;
    mysqli_query($conn, "DELETE FROM transaksi WHERE kodeTransaksi = $kodeTransaksi");
    return mysqli_affected_rows($conn);
}

//Function UPDATE
function update_transaksi($data) {
    global $conn;

    $kodeTransaksi          = ($data["kodeTransaksi"]);
    $namaTransaksi          = htmlspecialchars($data["namaTransaksi"]);
    $tanggalTransaksi       = htmlspecialchars($data["tanggalTransaksi"]);
    $noRekening             = htmlspecialchars($data["noRekening"]);
    $kodeNasabah            = htmlspecialchars($data["kodeNasabah"]);
    $nominal                = htmlspecialchars($data["nominal"]);
    $kodePegawai            = htmlspecialchars($data["kodePegawai"]);
    $tipeTransaksi          = htmlspecialchars($data["tipeTransaksi"]);

    $query = "UPDATE transaksi SET namaTransaksi = '$namaTransaksi', tanggalTransaksi = '$tanggalTransaksi', noRekening = '$noRekening', kodeNasabah = '$kodeNasabah', 
                nominal = '$nominal', kodePegawai = '$kodePegawai', tipeTransaksi = '$tipeTransaksi'
                WHERE kodeTransaksi = '$kodeTransaksi'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

?>
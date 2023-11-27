<?php

session_start();

//membuat koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_rejeki");

//tambah data user
if (isset($_POST['simpanuser'])) {
    $nama_user = $_POST['nama_user'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $jabatan = $_POST['jabatan'];

    $simpanuser = mysqli_query($conn, "INSERT INTO tb_user (id_user, nama_user, email, password, jabatan)
                VALUES ('$id_user', '$nama_user', '$email', '$password', '$jabatan')");

    if ($simpanuser) {
        header('location:user.php');
    } else {
        echo "Gagal simpan data user";
        header('location:user.php');
    }
}

//tambah data pelanggan
if (isset($_POST['simpanpelanggan'])) {
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $email = $_POST['email'];
    $point_award = $_POST['point_award'];
    $keterangan = $_POST['keterangan'];

    $simpanpelanggan = mysqli_query($conn, "INSERT INTO tb_pelanggan (id_pelanggan, nama, alamat, no_telp, email, point_award, keterangan)
                VALUES ('$id_pelanggan', '$nama_pelanggan', '$alamat', '$no_telp', '$email', '$point_award', '$keterangan')");

    if ($simpanpelanggan) {
        header('location:pelanggan.php');
    } else {
        echo "Gagal simpan data pelanggan";
        header('location:pelanggan.php');
    }
}

//tambah data transaksi
if (isset($_POST['simpantransaksi'])) {
    $tgl_pesan = $_POST['tgl_pesan'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $status_bayar = $_POST['status_bayar'];
    $batas_bayar = $_POST['batas_bayar'];
    $jumlah_transaksi = $_POST['jumlah_transaksi'];
    $total_transaksi = $_POST['total_transaksi'];
    $keterangan = $_POST['keterangan'];

    $simpantransaksi = mysqli_query($conn, "INSERT INTO tb_transaksi (id_transaksi, tgl_transaksi, nama, status_bayar, batas_bayar, jumlah_transaksi, total_transaksi, keterangan)
                VALUES ('$id_transaksi', '$tgl_transaksi', '$nama_pelanggan', '$status_bayar', '$batas_bayar', '$jumlah_transaksi', '$total_transaksi', '$keterangan')");

    if ($simpanpelanggan) {
        header('location:transaksi.php');
    } else {
        echo "Gagal simpan data transaksi";
        header('location:transaksi.php');
    }
}

//tambah data pesanan
if (isset($_POST['simpanpesanan'])) {
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $no_telp = $_POST['no_telp'];
    $email = $_POST['email'];
    $layanan = $_POST['layanan'];
    $keterangan = $_POST['keterangan'];

    $simpanpesanan = mysqli_query($conn, "INSERT INTO tb_pemesanan (id_pesanan, nama, no_telp, email, layanan, keterangan)
                VALUES ('$id_pesanan', '$nama_pelanggan', '$no_telp', '$email', '$layanan', '$keterangan')");

    if ($simpanpesanan) {
        header('location:pemesanan.php');
    } else {
        echo "Gagal simpan data pemesanan";
        header('location:pemesanan.php');
    }
}

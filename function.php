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


//update data user
if (isset($_POST['edituser'])) {
    $id_user = $_POST['id_user'];
    $nama_user = $_POST['nama_user'];
    $email = $_POST['email'];
    $jabatan = $_POST['jabatan'];

    $edituser = mysqli_query($conn, "UPDATE tb_user SET nama_user='$nama_user', email='$email', jabatan='$jabatan' WHERE id_user='$id_user'");
    // print_r($edituser);
    // die;

    if ($edituser) {
        header('location:user.php');
    } else {
        echo "Gagal update data user";
        header('location:user.php');
    }
}

//delete data user
if (isset($_POST['hapususer'])) {
    $id_user = $_POST['id_user'];
    $hapususer = mysqli_query($conn, "DELETE FROM tb_user WHERE id_user='$id_user'");
    // print_r($hapususer);
    // die;

    if ($hapususer) {
        header('location:user.php');
    } else {
        echo "Gagal update data user";
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

    $simpanpelanggan = mysqli_query($conn, "INSERT INTO tb_pelanggan (id_pelanggan, nama_pelanggan, alamat, no_telp, email, point_award, keterangan)
                VALUES ('$id_pelanggan', '$nama_pelanggan', '$alamat', '$no_telp', '$email', '$point_award', '$keterangan')");

    if ($simpanpelanggan) {
        header('location:pelanggan.php');
    } else {
        echo "Gagal simpan data pelanggan";
        header('location:pelanggan.php');
    }
}

//update data pelanggan
if (isset($_POST['editpelanggan'])) {
    $id_pelanggan = $_POST['id_pelanggan'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $email = $_POST['email'];
    $point_award = $_POST['point_award'];
    $keterangan = $_POST['keterangan'];

    $editpelanggan = mysqli_query($conn, "UPDATE tb_pelanggan SET nama_pelanggan='$nama_pelanggan', alamat='$alamat', no_telp='$no_telp', email='$email', point_award='$point_award', keterangan='$keterangan' WHERE id_pelanggan='$id_pelanggan'");
    // print_r($editpelanggan);
    // die;

    if ($editpelanggan) {
        header('location:pelanggan.php');
    } else {
        echo "Gagal update data pelanggan";
        header('location:pelanggan.php');
    }
}

//delete data pelanggan
if (isset($_POST['hapuspelanggan'])) {
    $id_pelanggan = $_POST['id_pelanggan'];
    $hapuspelanggan = mysqli_query($conn, "DELETE FROM tb_pelanggan WHERE id_pelanggan='$id_pelanggan'");
    // print_r($hapuspelanggan);
    // die;

    if ($hapuspelanggan) {
        header('location:pelanggan.php');
    } else {
        echo "Gagal update data pelanggan";
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

    $simpanpesanan = mysqli_query($conn, "INSERT INTO tb_pemesanan(id_pesanan, nama_pelanggan, no_telp, email, layanan, keterangan)
                VALUES ('$id_pesanan', '$nama_pelanggan', '$no_telp', '$email', '$layanan', '$keterangan')");

    if ($simpanpesanan) {
        header('location:pemesanan.php');
    } else {
        echo "Gagal simpan data pesanan";
        header('location:pemesanan.php');
    }
}

//update data pesanan
if (isset($_POST['editpesanan'])) {
    $id_pesanan = $_POST['id_pesanan'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $no_telp = $_POST['no_telp'];
    $email = $_POST['email'];
    $layanan = $_POST['layanan'];
    $keterangan = $_POST['keterangan'];

    $editpesanan = mysqli_query($conn, "UPDATE tb_pemesanan SET nama_pelanggan='$nama_pelanggan', no_telp='$no_telp', email='$email', layanan='$layanan', keterangan='$keterangan' WHERE id_pesanan='$id_pesanan'");
    // print_r($editpesanan);
    // die;

    if ($editpesanan) {
        header('location:pemesanan.php');
    } else {
        echo "Gagal update data pesanan";
        header('location:pemesanan.php');
    }
}

//delete data pesanan
if (isset($_POST['hapuspesanan'])) {
    $id_pesanan = $_POST['id_pesanan'];
    $hapuspesanan = mysqli_query($conn, "DELETE FROM tb_pemesanan WHERE id_pesanan='$id_pesanan'");
    // print_r($hapuspesanan);
    // die;

    if ($hapuspesanan) {
        header('location:pemesanan.php');
    } else {
        echo "Gagal update data pesanan";
        header('location:pemesanan.php');
    }
}


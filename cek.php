<?php

//cocokkan dengan database
$cekdatabase = mysqli_query($conn, "SELECT * FROM tb_user WHERE nama_user='$nama_user' and password='$password' ");

//hitung jumlah data

$hitung = $cekdatabase->num_rows;
$data = mysqli_fetch_assoc($cekdatabase);


//jika belum login
if ($data['jabatan'] == "admin") {
    $_SESSION['admin'] = $data['id_user'];
    header("location:index.php");
} elseif ($data['jabatan'] == "direktur") {
    $_SESSION['direktur'] = $data['id_user'];
    header("location:index.php");
} elseif ($data['jabatan'] == "mandor") {
    $_SESSION['mandor'] = $data['id_user'];
    header("location:index.php");
} elseif ($data['jabatan'] == "pelanggan") {
    $_SESSION['pelanggan'] = $data['id_user'];
    header('location:index.php');
} else {
    header('location:login.php');
}

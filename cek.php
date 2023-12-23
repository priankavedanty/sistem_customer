<?php

// ini hanya akan digunakan bila sudah login
if (@$_SESSION['admin'] || @$_SESSION['mandor'] || @$_SESSION['direktur']) {

    // ambil data dari session
    $id_user = @$_SESSION['admin'] . @$_SESSION['mandor'] . @$_SESSION['direktur'];
    
    //cocokkan dengan database
    $cekdatabase = mysqli_query($conn, "SELECT * FROM tb_user WHERE id_user='$id_user'");

    //hitung jumlah data
    $hitung = $cekdatabase->num_rows;
    $data = mysqli_fetch_assoc($cekdatabase);

    // buatkan variabel untuk menampung data
    $nama_user = $data['nama_user'];
    $email = $data['email'];
    $jam_kerja = $data['jam_kerja'];
    $jabatan = $data['jabatan'];

} else {
    // jika belum login, maka akan diarahkan ke halaman login
    header('location: login.php');
}


?>

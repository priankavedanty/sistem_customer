<?php

session_start();

//membuat koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_manajemen");

//tambah data user
if (isset($_POST['simpanuser'])) {
    $nama_user = $_POST['nama_user'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $jabatan = $_POST['jabatan'];
    $jam_kerja = $_POST['jam_kerja'];

    $simpanuser = mysqli_query($conn, "INSERT INTO tb_user (id_user, nama_user, email, password, jabatan, jam_kerja)
                VALUES ('$id_user', '$nama_user', '$email', '$password', '$jabatan', '$jam_kerja')");

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
    $jam_kerja = $_POST['jam_kerja'];

    $edituser = mysqli_query($conn, "UPDATE tb_user SET nama_user='$nama_user', email='$email', jabatan='$jabatan', jam_kerja='$jam_kerja' WHERE id_user='$id_user'");
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
        echo "Gagal delete data user";
        header('location:user.php');
    }
}

//tambah data pelanggan
if (isset($_POST['simpanpelanggan'])) {
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $email = $_POST['email'];
    $keterangan = $_POST['keterangan'];

    $simpanpelanggan = mysqli_query($conn, "INSERT INTO tb_pelanggan (id_pelanggan, nama_pelanggan, alamat, no_telp, email, keterangan)
                VALUES ('$id_pelanggan', '$nama_pelanggan', '$alamat', '$no_telp', '$email', '$keterangan')");

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
    $keterangan = $_POST['keterangan'];

    $editpelanggan = mysqli_query($conn, "UPDATE tb_pelanggan SET nama_pelanggan='$nama_pelanggan', alamat='$alamat', no_telp='$no_telp', email='$email', keterangan='$keterangan' WHERE id_pelanggan='$id_pelanggan'");
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
        echo "Gagal delete data pelanggan";
        header('location:pelanggan.php');
    }
}

//tambah data mandor
if (isset($_POST['simpanmandor'])) {
    $nama_mandor = $_POST['nama_mandor'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $email = $_POST['email'];
    $dokumen = $_POST['dokumen'];

    $simpanmandor = mysqli_query($conn, "INSERT INTO tb_mandor (id_mandor, nama_mandor, alamat, no_telp, email, dokumen)
                VALUES ('$id_mandor', '$nama_mandor', '$alamat', '$no_telp', '$email', '$dokumen')");

    if ($simpanmandor) {
        header('location:mandor.php');
    } else {
        echo "Gagal simpan data mandor";
        header('location:mandor.php');
    }
}

//update data mandor
if (isset($_POST['editmandor'])) {
    $id_mandor = $_POST['id_mandor'];
    $nama_mandor = $_POST['nama_mandor'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $email = $_POST['email'];
    $dokumen = $_POST['dokumen'];

    $editmandor = mysqli_query($conn, "UPDATE tb_mandor SET nama_mandor='$nama_mandor', alamat='$alamat', no_telp='$no_telp', email='$email', dokumen='$dokumen' WHERE id_mandor='$id_mandor'");
    // print_r($editmandor);
    // die;

    if ($editmandor) {
        header('location:mandor.php');
    } else {
        echo "Gagal update data mandor";
        header('location:mandor.php');
    }
}

//delete data mandor
if (isset($_POST['hapusmandor'])) {
    $id_mandor = $_POST['id_mandor'];
    $hapusmandor = mysqli_query($conn, "DELETE FROM tb_mandor WHERE id_mandor='$id_mandor'");
    // print_r($hapusmandor);
    // die;

    if ($hapusmandor) {
        header('location:mandor.php');
    } else {
        echo "Gagal delete data mandor";
        header('location:mandor.php');
    }
}

//tambah data proyek
if (isset($_POST['simpanproyek'])) {
    $tgl_pengerjaan = $_POST['tgl_pengerjaan'];
    $kegiatan = $_POST['kegiatan'];
    $pekerjaan = $_POST['pekerjaan'];
    $lokasi = $_POST['lokasi'];
    $volume = $_POST['volume'];
    $total = $_POST['total'];
    $progress_proyek = $_POST['progress_proyek'];
    $dokumen = $_POST['dokumen'];

    $simpanproyek = mysqli_query($conn, "INSERT INTO tb_proyek (id_proyek, tgl_pengerjaan, kegiatan, pekerjaan, lokasi, volume, total, progress_proyek, dokumen)
                VALUES ('$id_proyek', '$tgl_pengerjaan', '$kegiatan', '$pekerjaan', '$lokasi', '$volume', '$total', '$progress_proyek', '$dokumen')");

    if ($simpanproyek) {
        header('location:proyek.php');
    } else {
        echo "Gagal simpan data proyek";
        header('location:proyek.php');
    }
}

//update data proyek
if (isset($_POST['editproyek'])) {
    $id_proyek = $_POST['id_proyek'];
    $tgl_pengerjaan = $_POST['tgl_pengerjaan'];
    $kegiatan = $_POST['kegiatan'];
    $pekerjaan = $_POST['pekerjaan'];
    $lokasi = $_POST['lokasi'];
    $volume = $_POST['volume'];
    $total = $_POST['total'];
    $progress_proyek = $_POST['progress_proyek'];
    $dokumen = $_POST['dokumen'];

    $editproyek = mysqli_query($conn, "UPDATE tb_proyek SET tgl_pengerjaan='$tgl_pengerjaan', kegiatan='$kegiatan', pekerjaan='$pekerjaan', lokasi='$lokasi', volume='$volume', total='$total', progress_proyek='$progress_proyek', dokumen='$dokumen' WHERE id_proyek='$id_proyek'");
    // print_r($editproyek);
    // die;

    if ($editproyek) {
        header('location:proyek.php');
    } else {
        echo "Gagal update data proyek";
        header('location:proyek.php');
    }
}

//delete data proyek
if (isset($_POST['hapusproyek'])) {
    $id_proyek = $_POST['id_proyek'];
    $hapusproyek = mysqli_query($conn, "DELETE FROM tb_proyek WHERE id_proyek='$id_proyek'");
    // print_r($hapusproyek);
    // die;

    if ($hapusproyek) {
        header('location:proyek.php');
    } else {
        echo "Gagal delete data proyek";
        header('location:proyek.php');
    }
}

//tambah data inventory
if (isset($_POST['simpaninventory'])) {
    $jenis_bahan = $_POST['jenis_bahan'];
    $satuan = $_POST['satuan'];
    $harga = $_POST['harga'];
    $terpakai = $_POST['terpakai'];
    $jumlah_stok = $_POST['jumlah_stok'];
    $keterangan = $_POST['keterangan'];

    $simpaninventory = mysqli_query($conn, "INSERT INTO tb_inventory (id_inventory, jenis_bahan, satuan, harga, terpakai, jumlah_stok, keterangan)
                VALUES ('$id_inventory', '$jenis_bahan', '$satuan', '$harga', '$terpakai', '$jumlah_stok', '$keterangan')");

    if ($simpaninventory) {
        header('location:inventory.php');
    } else {
        echo "Gagal simpan data inventory";
        header('location:inventory.php');
    }
}

//update data inventory
if (isset($_POST['editinventory'])) {
    $id_inventory = $_POST['id_inventory'];
    $jenis_bahan = $_POST['jenis_bahan'];
    $satuan = $_POST['satuan'];
    $harga = $_POST['harga'];
    $terpakai = $_POST['terpakai'];
    $jumlah_stok = $_POST['jumlah_stok'];
    $keterangan = $_POST['keterangan'];

    $editinventory = mysqli_query($conn, "UPDATE tb_inventory SET jenis_bahan='$jenis_bahan', satuan='$satuan', harga='$harga', terpakai='$terpakai', jumlah_stok='$jumlah_stok', keterangan='$keterangan' WHERE id_inventory='$id_inventory'");
    // print_r($editinventory);
    // die;

    if ($editinventory) {
        header('location:inventory.php');
    } else {
        echo "Gagal update data inventory";
        header('location:inventory.php');
    }
}

//delete data inventory
if (isset($_POST['hapusinventory'])) {
    $id_inventory = $_POST['id_inventory'];
    $hapusinventory = mysqli_query($conn, "DELETE FROM tb_inventory WHERE id_inventory='$id_inventory'");
    // print_r($hapusinventory);
    // die;

    if ($hapusinventory) {
        header('location:inventory.php');
    } else {
        echo "Gagal delete data inventory";
        header('location:inventory.php');
    }
}

//tambah data transaksi
if (isset($_POST['simpantransaksi'])) {
    $tgl_transaksi = $_POST['tgl_transaksi'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $status_bayar = $_POST['status_bayar'];
    $batas_bayar = $_POST['batas_bayar'];
    $jumlah_transaksi = $_POST['jumlah_transaksi'];
    $total_transaksi = $_POST['total_transaksi'];
    $keterangan = $_POST['keterangan'];

    $simpantransaksi = mysqli_query($conn, "INSERT INTO tb_transaksi (id_transaksi, tgl_transaksi, nama_pelanggan, status_bayar, batas_bayar, jumlah_transaksi, total_transaksi, keterangan)
                VALUES ('$id_transaksi', '$tgl_transaksi', '$nama_pelanggan', '$status_bayar', '$batas_bayar', '$jumlah_transaksi', '$total_transaksi', '$keterangan')");

    if ($simpantransaksi) {
        header('location:transaksi.php');
    } else {
        echo "Gagal simpan data transaksi";
        header('location:transaksi.php');
    }
}

//delete data transaksi
if (isset($_POST['hapustransaksi'])) {
    $id_transaksi = $_POST['id_transaksi'];
    $hapustransaksi = mysqli_query($conn, "DELETE FROM tb_transaksi WHERE id_transaksi='$id_transaksi'");

    if ($hapustransaksi) {
        header('location:transaksi.php');
    } else {
        echo "Gagal delete data transaksi";
        header('location:transaksi.php');
    }
}

//tambah data pesanan
if (isset($_POST['simpanpesanan'])) {
    $tanggal = $_POST['tanggal'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $no_telp = $_POST['no_telp'];
    $lokasi = $_POST['lokasi'];
    $luas_bangunan = $_POST['luas_bangunan'];
    $layanan = $_POST['layanan'];
    $jenis_properti = $_POST['jenis_properti'];
    // print_r($_POST);
    // die;

    // buat tanggal pesanan
    $simpanpesanan = mysqli_query($conn, "INSERT INTO tb_pesanan (id_pesanan, tanggal, nama_pelanggan, no_telp, lokasi, luas_bangunan, layanan, jenis_properti)
                VALUES ('$id_pesanan', '$tanggal', '$nama_pelanggan', '$no_telp', '$lokasi', '$luas_bangunan', '$layanan', '$jenis_properti')");

    if ($simpanpesanan) {
        header('location:pesanan.php');
    } else {
        echo "Gagal simpan data pesanan";
        header('location:pesanan.php');
    }
}

//update data pesanan
if (isset($_POST['editpesanan'])) {
    $id_pesanan = $_POST['id_pesanan'];
    $tanggal = $_POST['tanggal'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $no_telp = $_POST['no_telp'];
    $lokasi = $_POST['lokasi'];
    $luas_bangunan = $_POST['luas_bangunan'];
    $layanan = $_POST['layanan'];
    $jenis_properti = $_POST['jenis_properti'];

    $editpesanan = mysqli_query($conn, "UPDATE tb_pesanan SET tanggal='$tanggal', nama_pelanggan='$nama_pelanggan', no_telp='$no_telp', lokasi='$lokasi', luas_bangunan='$luas_bangunan', layanan='$layanan', jenis_properti='$jenis_properti' WHERE id_pesanan='$id_pesanan'");
    // print_r($editpesanan);
    // die;

    if ($editpesanan) {
        header('location:pesanan.php');
    } else {
        echo "Gagal update data pesanan";
        header('location:pesanan.php');
    }
}

//delete data pesanan
if (isset($_POST['hapuspesanan'])) {
    $id_pesanan = $_POST['id_pesanan'];
    $hapuspesanan = mysqli_query($conn, "DELETE FROM tb_pesanan WHERE id_pesanan='$id_pesanan'");

    if ($hapuspesanan) {
        header('location:pesanan.php');
    } else {
        echo "Gagal delete data pesanan";
        header('location:pesanan.php');
    }
}

if (isset($_POST['simpandesain'])) {
    $nama_desain = $_POST['nama_desain'];
    $jenis_desain = $_POST['jenis_desain'];
    $keterangan = $_POST['keterangan'];

    $namaFile = $_FILES['gambar']['name']; // simpan nama file ke variabel
    $namaSementara = $_FILES['gambar']['tmp_name']; // simpan gambar sementara ke variabel
    $dirUpload = "img/"; // folder penyimpanan gambar
    $terupload = move_uploaded_file($namaSementara, $dirUpload . $namaFile); // simpan gambar ke folder penyimpanan

    $simpandesain = mysqli_query($conn, "INSERT INTO tb_desain (id_desain, nama_desain, jenis_desain, gambar, keterangan)
                VALUES ('$id_desain', '$nama_desain', '$jenis_desain', '$namaFile', '$keterangan')");

    if ($simpandesain) {
        header('location:desain.php');
    } else {
        echo "Gagal simpan data desain";
        header('location:desain.php');
    }
}

if (isset($_POST['editdesain'])) {
    $nama_desain = $_POST['nama_desain'];
    $jenis_desain = $_POST['jenis_desain'];
    $keterangan = $_POST['keterangan'];
    $id_desain = $_POST['id_desain'];

    if (empty($_FILES['gambar']['name'])) {
        $editdesain = mysqli_query($conn, "UPDATE tb_desain SET nama_desain='$nama_desain', jenis_desain='$jenis_desain', keterangan='$keterangan' WHERE id_desain='$id_desain'");
    } else {
        // Hapus file gambar sebelumnya yang ada di folder img
        $query = mysqli_query($conn, "SELECT * FROM tb_desain WHERE id_desain='$id_desain'");
        $data = mysqli_fetch_array($query);
        $namaFile = $data['gambar']; // Simpan nama file ke variabel
        unlink("img/" . $namaFile); // Hapus file gambar

        // Simpan file gambar yang baru diunggah ke folder penyimpanan
        $namaFile = $_FILES['gambar']['name'];
        $namaSementara = $_FILES['gambar']['tmp_name'];
        $dirUpload = "img/";
        $terupload = move_uploaded_file($namaSementara, $dirUpload . $namaFile);

        // Update record dengan informasi file gambar baru
        $editdesain = mysqli_query($conn, "UPDATE tb_desain SET nama_desain='$nama_desain', jenis_desain='$jenis_desain', gambar='$namaFile', keterangan='$keterangan' WHERE id_desain='$id_desain'");
    }

    if ($editdesain) {
        header('location:desain.php');
    } else {
        // Pindahkan atau tampilkan pesan kesalahan setelah header redirect
        header('location:desain.php?error=1');
    }
}

if (isset($_POST['hapusdesain'])) {
    $id_desain = $_POST['id_desain'];

    $query = mysqli_query($conn, "SELECT * FROM tb_desain WHERE id_desain='$id_desain'");
    $data = mysqli_fetch_array($query);
    $namaFile = $data['gambar'];
    unlink("img/" . $namaFile);

    $hapusdesain = mysqli_query($conn, "DELETE FROM tb_desain WHERE id_desain='$id_desain'");

    if ($hapusdesain) {
        header('location:desain.php');
    } else {
        header('location:desain.php?error=1');
    }
}

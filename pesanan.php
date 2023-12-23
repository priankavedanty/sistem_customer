<?php

require 'function.php';
require 'cek.php';

if (@$_SESSION['admin'] || @$_SESSION['direktur'] || @$_SESSION['mandor'] || @$_SESSION['pelanggan']) {  

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sistem Informasi Manajemen</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php">CV Nampi Rejeki</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
                <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Home</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <?php if (@$_SESSION['admin']) { ?>
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link" href="user.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Data User
                        </a>
                        <a class="nav-link" href="pelanggan.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Data Pelanggan
                        </a>
                        <a class="nav-link" href="mandor.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Data Mandor
                        </a>
                    <?php } if (@$_SESSION['admin']) { ?>
                        <a class="nav-link" href="inventory.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Data Inventory
                        </a>
                        <a class="nav-link" href="pesanan.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Data Pesanan
                        </a>
                        <a class="nav-link" href="transaksi.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Data Transaksi
                        </a>
                    <?php } if (@$_SESSION['mandor']) { ?>
                        <a class="nav-link" href="proyek.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Data Proyek
                        </a>
                    <?php } if (@$_SESSION['mandor'] || @$_SESSION['direktur']) { ?> 
                        <a class="nav-link" href="laporan.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Data Laporan
                        </a>
                        <?php } ?>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as: <br>
                        <?php echo $email ?> </div>
                    </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h2 class="mt-4">Data Pesanan</h2>
                    <!-- Button to Open the Modal -->

                    <div class="card mb-4">
                        <div class="card-header">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                Tambah Data
                            </button>
                        </div>

                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Tanggal</th>
                                        <th>Pelanggan</th>
                                        <th>No telp</th>
                                        <th>Lokasi</th>
                                        <th>Luas bangunan</th>
                                        <th>Layanan</th>
                                        <th>Jenis Properti</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Tanggal</th>
                                        <th>Pelanggan</th>
                                        <th>No telp</th>
                                        <th>Lokasi</th>
                                        <th>Luas bangunan</th>
                                        <th>Layanan</th>
                                        <th>Jenis Properti</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    <?php
                                    $no = 1;
                                    $sql = $conn->query("SELECT * FROM tb_pesanan order by id_pesanan asc");
                                    while ($data = mysqli_fetch_array($sql)) {
                                        $tanggal = $data['tanggal'];
                                        $nama_pelanggan = $data['nama_pelanggan'];
                                        $no_telp = $data['no_telp'];
                                        $lokasi = $data['lokasi'];
                                        $luas_bangunan = $data['luas_bangunan'];
                                        $layanan = $data['layanan'];
                                        $jenis_properti = $data['jenis_properti'];
                                        $id_pesanan = $data['id_pesanan'];
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $tanggal; ?></td>
                                            <td><?= $nama_pelanggan; ?></td>
                                            <td><?= $no_telp; ?></td>
                                            <td><?= $lokasi; ?></td>
                                            <td><?= $luas_bangunan; ?></td>
                                            <td><?= $layanan; ?></td>
                                            <td><?= $jenis_properti; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit<?= $id_pesanan; ?>">Edit</button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $id_pesanan; ?>">Delete</button>
                                            </td>
                                        </tr>

                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="edit<?= $id_pesanan; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Data Pesanan</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <form method="POST">
                                                        <div class="modal-body">
                                                            <div class="row mb-3">
                                                                <div class="col">
                                                                    <label>Layanan</label> <br>
                                                                    <!-- buat sebuah radio untuk edit dimana valuenya terisi dari database dan sisanya kosong -->
                                                                    <label><input type="radio" name="layanan" value="bangun baru" <?php if ($layanan == "bangun baru") {
                                                                                                                                        echo "checked";
                                                                                                                                    } ?>> Bangun Baru </label> <br>
                                                                    <label><input type="radio" name="layanan" value="renovasi" <?php if ($layanan == "renovasi") {
                                                                                                                                    echo "checked";
                                                                                                                                } ?>> Renovasi </label> <br>
                                                                    <label><input type="radio" name="layanan" value="desain arsitek" <?php if ($layanan == "desain arsitek") {
                                                                                                                                            echo "checked";
                                                                                                                                        } ?>> Desain Arsitek </label> <br>
                                                                </div>
                                                                <div class="col">
                                                                    <label>Jenis Properti</label> <br>
                                                                    <label><input type="radio" name="jenis_properti" value="rumah baru" <?php if ($jenis_properti == "rumah baru") {
                                                                                                                                            echo "checked";
                                                                                                                                        } ?>> Rumah Baru </label> <br>
                                                                    <label><input type="radio" name="jenis_properti" value="vila" <?php if ($jenis_properti == "vila") {
                                                                                                                                        echo "checked";
                                                                                                                                    } ?>> Vila </label> <br>
                                                                    <label><input type="radio" name="jenis_properti" value="ruko" <?php if ($jenis_properti == "ruko") {
                                                                                                                                        echo "checked";
                                                                                                                                    } ?>> Ruko </label> <br>
                                                                    <label><input type="radio" name="jenis_properti" value="bangunan" <?php if ($jenis_properti == "bangunan") {
                                                                                                                                            echo "checked";
                                                                                                                                        } ?>> Bangunan </label> <br>
                                                                    <label><input type="radio" name="jenis_properti" value="perkantoran" <?php if ($jenis_properti == "perkantoran") {
                                                                                                                                                echo "checked";
                                                                                                                                            } ?>> Perkantoran </label> <br>
                                                                    <label><input type="radio" name="jenis_properti" value="lainnya" <?php if ($jenis_properti == "lainnya") {
                                                                                                                                            echo "checked";
                                                                                                                                        } ?>> Lainnya </label> <br>
                                                                </div>



                                                                <div class="row">
                                                                    <div class="col">
                                                                        <label>Tanggal</label>
                                                                        <input type="date" name="tanggal" value="<?= $tanggal; ?>" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" autocomplete="off">

                                                                        <label>Nama Pelanggan</label>
                                                                        <input type="text" name="nama_pelanggan" value="<?= $nama_pelanggan; ?>" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" autocomplete="off">

                                                                        <label>Lokasi Proyek</label>
                                                                        <input type="text" name="lokasi" value="<?= $lokasi; ?>" class="form-control" required>

                                                                    </div>
                                                                    <div class="col">
                                                                        <label>No telp</label>
                                                                        <input type="text" name="no_telp" value="<?= $no_telp; ?>" class="form-control" required>

                                                                        <label>Luas Bangunan</label>
                                                                        <input type="text" name="luas_bangunan" value="<?= $luas_bangunan; ?>" class="form-control" required>

                                                                    </div>
                                                                </div>

                                                                <!-- Hidden id pesanan -->
                                                                <input type="hidden" name="id_pesanan" value="<?= $id_pesanan; ?>">
                                                                <!-- Modal footer -->
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary" name="editpesanan">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="delete<?= $id_pesanan; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Delete Data Pesanan</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <form method="POST">
                                                        <div class="modal-body">
                                                            <label>Tanggal</label>
                                                            <input type="date" name="tanggal" value="<?= $tanggal; ?>" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" autocomplete="off">

                                                            <label>Nama Pelanggan</label>
                                                            <input type="text" name="nama_pelanggan" value="<?= $nama_pelanggan; ?>" class="form-control" readonly>

                                                            <label>No telp</label>
                                                            <input type="text" name="no_telp" value="<?= $no_telp; ?>" class="form-control" readonly>

                                                            <label>Email</label>
                                                            <input type="text" name="email" value="<?= $email; ?>" class="form-control" readonly>

                                                            <!-- Hidden id_pesanan value -->
                                                            <input type="hidden" name="id_pesanan" value="<?= $id_pesanan; ?>">
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <label>Yakin ingin menghapus?</label>
                                                            <button type="submit" class="btn btn-primary" name="hapuspesanan">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    <?php }; // penutup perulangan while 
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; CV Nampi Rejeki 2023</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-newarea-demo.js"></script>
    <script src="assets/demo/chart-newbar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>


<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Pesanan</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <form method="POST">
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col">
                            <label>Layanan</label> <br>
                            <label><input type="radio" name="layanan" value="bangun baru"> Bangun Baru </label> <br>
                            <label><input type="radio" name="layanan" value="renovasi"> Renovasi </label> <br>
                            <label><input type="radio" name="layanan" value="desain arsitek"> Desain Arsitek </label> <br>
                        </div>

                        <div class="col">
                            <label>Jenis Properti</label> <br>
                            <label><input type="radio" name="jenis_properti" value="rumah baru"> Rumah Baru </label> <br>
                            <label><input type="radio" name="jenis_properti" value="vila"> Vila </label> <br>
                            <label><input type="radio" name="jenis_properti" value="ruko"> Ruko </label> <br>
                            <label><input type="radio" name="jenis_properti" value="bangunan"> Bangunan </label> <br>
                            <label><input type="radio" name="jenis_properti" value="perkantoran"> Perkantoran </label> <br>
                            <label><input type="radio" name="jenis_properti" value="lainnya"> Lainnya </label> <br>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" placeholder="Masukkan tanggal" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" autocomplete="off">

                            <label>Nama Pelanggan</label>
                            <input type="text" name="nama_pelanggan" placeholder="Masukkan nama pelanggan" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" autocomplete="off">

                            <label>Lokasi Proyek</label>
                            <input type="text" name="lokasi_proyek" placeholder="Masukkan lokasi proyek" class="form-control" required>
                        </div>

                        <div class="col">
                            <label>No telp</label>
                            <input type="text" name="no_telp" placeholder="Masukkan no telp" class="form-control" required>

                            <label>Luas Bangunan</label>
                            <input type="text" name="luas_bangunan" placeholder="Masukkan luas bangunan" class="form-control" required>

                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="simpanpesanan">Submit</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>

</html>

<?php
} else {
    // jika belum login, maka akan diarahkan ke halaman login
    header('location: login.php');
}
?>
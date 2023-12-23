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
                        Admin </div>
                    </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h2 class="mt-4">Data Inventory</h2>
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
                                        <th>Jenis bahan</th>
                                        <th>Satuan</th>
                                        <th>Harga</th>
                                        <th>Terpakai</th>
                                        <th>Jumlah stok</th>
                                        <th>Penggunaan stok</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Jenis bahan</th>
                                        <th>Satuan</th>
                                        <th>Harga</th>
                                        <th>Terpakai</th>
                                        <th>Jumlah stok</th>
                                        <th>Penggunaan stok</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    <?php
                                    $no = 1;
                                    $sql = mysqli_query($conn, "SELECT * FROM tb_inventory");
                                    while ($data = mysqli_fetch_array($sql)) {
                                        $jenis_bahan = $data['jenis_bahan'];
                                        $satuan = $data['satuan'];
                                        $harga = $data['harga'];
                                        $terpakai = $data['terpakai'];
                                        $jumlah_stok = $data['jumlah_stok'];
                                        $penggunaan = $data['penggunaan'];
                                        $id_inventory = $data['id_inventory'];
                                    ?>

                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $jenis_bahan; ?></td>
                                            <td><?= $satuan; ?></td>
                                            <td><?= $harga; ?></td>
                                            <td><?= $terpakai; ?></td>
                                            <td><?= $jumlah_stok; ?></td>
                                            <td><?= $penggunaan; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit<?= $id_inventory; ?>">Edit</button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $id_inventory; ?>">Delete</button>
                                            </td>
                                        </tr>

                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="edit<?= $id_inventory; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Data Inventory</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <form method="POST">
                                                        <div class="modal-body">

                                                            <label>Jenis bahan</label>
                                                            <input type="text" name="jenis_bahan" value="<?= $jenis_bahan; ?>" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" autocomplete="off">

                                                            <label>Satuan</label>
                                                            <input type="text" name="satuan" value="<?= $satuan; ?>" class="form-control" required>

                                                            <label>Harga</label>
                                                            <input type="text" name="harga" value="<?= $harga; ?>" class="form-control" required>

                                                            <label>Terpakai</label>
                                                            <input type="text" name="terpakai" value="<?= $terpakai; ?>" class="form-control" required>

                                                            <label>Jumlah stok</label>
                                                            <input type="number" name="jumlah_stok" value="<?= $jumlah_stok; ?>" class="form-control" required>

                                                            <label>Penggunaan</label>
                                                            <input type="text" name="penggunaan" value="<?= $penggunaan; ?>" class="form-control" required>

                                                            <!-- Hidden id_pelanggan value -->
                                                            <input type="hidden" name="id_inventory" value="<?= $id_inventory; ?>">
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary" name="editinventory">Submit</button>

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="delete<?= $id_inventory; ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Delete Data Inventory</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <form method="POST">
                                                        <div class="modal-body">

                                                            <label>Jenis bahan</label>
                                                            <input type="text" name="jenis_bahan" value="<?= $jenis_bahan; ?>" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" autocomplete="off">

                                                            <label>Satuan</label>
                                                            <input type="text" name="satuan" value="<?= $satuan; ?>" class="form-control" required>

                                                            <label>Harga</label>
                                                            <input type="text" name="harga" value="<?= $harga; ?>" class="form-control" required>

                                                            <label>Terpakai</label>
                                                            <input type="text" name="terpakai" value="<?= $terpakai; ?>" class="form-control" required>

                                                            <label>Jumlah stok</label>
                                                            <input type="number" name="jumlah_stok" value="<?= $jumlah_stok; ?>" class="form-control" required>

                                                            <label>Penggunaan</label>
                                                            <input type="text" name="penggunaan" value="<?= $penggunaan; ?>" class="form-control" required>

                                                            <!-- Hidden id_pelanggan value -->
                                                            <input type="hidden" name="id_inventory" value="<?= $id_inventory; ?>">
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <label>Yakin ingin menghapus?</label>
                                                            <button type="submit" class="btn btn-primary" name="hapusinventory">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>


                                    <?php }; ?>

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
                <h4 class="modal-title">Tambah Data Inventory</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <form method="POST">
                <div class="modal-body">

                    <label>Jenis bahan</label>
                    <input type="text" name="jenis_bahan" placeholder="Masukkan jenis bahan" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" autocomplete="off">

                    <label>Satuan</label>
                    <input type="text" name="satuan" placeholder="Masukkan satuan" class="form-control" required>

                    <label>Harga</label>
                    <input type="number" name="harga" placeholder="Masukkan harga" class="form-control" required>

                    <label>Terpakai</label>
                    <input type="text" name="terpakai" placeholder="Masukkan jumlah terpakai" class="form-control" required>

                    <label>Jumlah stok</label>
                    <input type="number" name="jumlah_stok" placeholder="Masukkan jumlah stok" class="form-control" required>

                    <label>Penggunaan</label>
                    <input type="text" name="penggunaan" placeholder="Masukkan penggunaan stok" class="form-control" required>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="simpaninventory">Submit</button>

                    </div>
            </form>
        </div>
    </div>
</div>

</html>

<?php
}
?>
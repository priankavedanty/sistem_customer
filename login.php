<?php

require 'function.php';

//cek login, terdaftar atau tidak

if (isset($_POST['login'])) {
    $nama_user = $_POST['nama_user'];
    $password = $_POST['password'];

    //cocokkan dengan database
    $cekdatabase = mysqli_query($conn, "SELECT * FROM tb_user WHERE nama_user='$nama_user' and password='$password' ");

    //hitung jumlah data
    $hitung = mysqli_num_rows($cekdatabase);
    $user = mysqli_fetch_assoc($cekdatabase);

    if ($hitung > 0) {
        if ($user['jabatan'] == "admin") {
            $_SESSION['jabatan'] = 'True';                
            header("location:index.php");
        } elseif ($user['jabatan'] == "mandor") {
            $_SESSION['jabatan'] = 'True'; 
            header("location:index.php"); 
        } elseif ($user['jabatan'] == "pelanggan") {
            $_SESSION['jabatan'] = 'True'; 
            header("location:index.php");
        } elseif ($user['jabatan'] == "direktur") {
            $_SESSION['jabatan'] = 'True'; 
            header("location:index.php");      
        } 
        else {
            header('location:login.php');
    }
}
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sistem E-CRM</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class style="background-color: #87CEEB;">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Silahkan Login</h3>
                                </div>
                                <div class="card-body">
                                    <form method="post">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="nama_user" id="inputNamaUser" type="nama_user" placeholder="Username" />
                                            <label for="inputNamaUser">Enter Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="password" id="inputPassword" type="password" placeholder="Password" />
                                            <label for="inputPassword">Enter Password</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <button class=" btn btn-primary " name="login">Login</button>
                                        </div>
                                        <?php
                                        // Check if $data is set and not empty before printing
                                        if (isset($data) && !empty($data)) {
                                            echo '<pre>';
                                            print_r($data);
                                            echo '</pre>';
                                        }
                                        ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>
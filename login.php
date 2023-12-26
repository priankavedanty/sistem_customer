<?php

require 'function.php';

// Cek nama_user dan password, jika benar alihkan ke index.php
if (isset($_POST['login'])) {
    $nama_user = $_POST['nama_user'];
    $password = $_POST['password'];

    $cek_database = mysqli_query($conn, "SELECT * FROM tb_user WHERE nama_user='$nama_user' AND password='$password'");
    $cek = mysqli_num_rows($cek_database);

    if ($cek > 0) {
        $data = mysqli_fetch_assoc($cek_database);

        if ($data['jabatan'] == "admin") {
            $_SESSION['admin'] = $data['id_user'];
            header('location: index.php');
        } else if ($data['jabatan'] == "mandor") {
            $_SESSION['mandor'] = $data['id_user'];
            header('location: index.php');
        } else if ($data['jabatan'] == "direktur") {
            $_SESSION['direktur'] = $data['id_user'];
            header('location: index.php');
        } else if ($data['jabatan'] == "pelanggan") {
            $_SESSION['pelanggan'] = $data['id_user'];
            header('location: index.php');
        }
    } else {
        echo "<script>alert('Username atau Password Salah!');</script>";
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
                                    <form method="post" action="login.php">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="nama_user" id="inputNamaUser" type="nama_user" placeholder="Username" />
                                            <label for="inputNamaUser">Enter Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="password" id="inputPassword" type="password" placeholder="Password" />
                                            <label for="inputPassword">Enter Password</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <button class="btn btn-primary" name="login" type="submit">Login</button>
                                        </div>
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
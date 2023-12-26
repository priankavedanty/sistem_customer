<?php

//jika belum login
if (isset($_SESSION['jabatan'])) {
	
} else {
	header('location:login.php');
}

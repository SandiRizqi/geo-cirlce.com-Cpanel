<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'koneksi.php';
 
// menangkap data yang dikirim dari form
$email = $_POST['email'];
$password = md5($_POST['password']);
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($conn,"select * from register where email='$email' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);


$r_cek=mysqli_fetch_array($data);


if ($cek == 0) {
    $_SESSION['info'] = 'Akun Salah';
	echo "<script>document.location.href='login.php'</script>";
}else if ($r_cek['status'] == 0) {
    $_SESSION['info'] = 'Belum Aktif';
	echo "<script>document.location.href='login.php'</script>";
} elseif ($cek > 0) {
    $_SESSION['username'] = $r_cek['username'];
	$_SESSION['status'] = "login";
	header("location:/map.php");
    
} else{
	header("location:login.php?pesan=gagal");
}


?>





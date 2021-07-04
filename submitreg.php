<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
     
     
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
     
     
   
$mail = new PHPMailer(true);
     

session_start();

ini_set('display_errors', 1);
error_reporting( E_ALL );

include 'koneksi.php';


$fullname = $_POST['fullname'];
$username = $_POST['username'];
$email = $_POST['email'];
$dateofbirth = $_POST['dateofbirth'];
$phonenumber = $_POST['phonenumber'];
$password = md5($_POST['password']);
$password2 = md5($_POST['confirmpassword']);
$token = bin2hex(openssl_random_pseudo_bytes(64));


// menyeleksi email yang sudah terdahtar
$data = mysqli_query($conn,"select * from register where email='$email'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if($password != $password2){
    $_SESSION['info'] = 'DontMatch';
	echo "<script>document.location.href='register.php'</script>";
}else if($cek > 0){
	$_SESSION['info'] = 'Exist';
	echo "<script>document.location.href='register.php'</script>";
}else {
    
    $mail->SMTPDebug = 2;// Enable verbose debug output
    $mail->isSMTP();// Set mailer to use SMTP
    $mail->Host = 'mail.geo-circle.com'; // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true; // Enable SMTP authentication
    $mail->Username   = 'verification@geo-circle.com'; // SMTP username
    $mail->Password   = '********'; // SMTP password
    $mail->SMTPSecure = 'ssl';
    $mail->Port       =  465;  // TCP port to connect to
    $mail->setFrom('verification@geo-circle.com', 'Geocircle');
    $mail->addAddress($email);// Add a recipient
    $mail->isHTML(true);// Set email format to HTML
    $mail->Subject = 'Account Verification';
    $mail->Body    = "Selamat, anda berhasil membuat akun GeoCircle. Untuk mengaktifkan akun anda silahkan klik link berikut ini https://geo-circle.com/activation.php?t=$token";
    //$mail->AltBody = '';
     
    $mail->send();
    
    



    // Insert Data ke database
    $insert = mysqli_query($conn, "INSERT INTO register(fullname, username, email, dateofbirth, phonenumber, password, token) values('$fullname', '$username', '$email', '$dateofbirth', '$phonenumber','$password', '$token')");
    
    if($insert){
				$_SESSION['info'] = 'Notify';
				echo "<script>document.location.href='register.php'</script>";
			}else{
				$_SESSION['info'] = 'Gagal Disimpan';
				echo "<script>document.location.href='register.php'</script>";
			}

		}











?>

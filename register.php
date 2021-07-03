<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" type="image/x-icon" href="/static/images/logo.png">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Geo-Artificial Intelligence for Environment</title>
    <link rel="stylesheet" href="/static/css/stylereg.css">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@700&display=swap" rel="stylesheet">
	  <link href="animstyle.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/static/css/style.css" media="all">
    <link rel="stylesheet" type="text/css" href="/static/css/indexstyle.css" media="all">
    <link rel="stylesheet" type="text/css" href="/static/css/animstyle.css" media="all">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito&display=swap">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script defer src="/static/script/formcheck.js"></script>

    
</head>
<style>
      .swal2-popup{
            font-size: 0.8rem!important;
    
        }

    .form-group label {
    	display: inline-block;
    	margin-bottom: 5px;
    }
    
    .form-group  input {
    	border: 2px solid #f0f0f0;
    	border-radius: 4px;
    	display: block;
    	font-family: inherit;
    	font-size: 14px;
    	padding: 10px;
    	width: 100%;
    }
    
    .form-group  input:focus {
    	outline: 0;
    	border-color: #777;
    }
    
    .form-group.success input {
    	border-color: #2ecc71;
    }
    
    .form-group.error input {
    	border-color: #e74c3c;
    }
    
    .form-group i {
    	visibility: hidden;
    	position: absolute;
    	top: 40px;
    	right: 10px;
    }
    
    .form-group.success i.fa-check-circle {
    	color: #2ecc71;
    	visibility: visible;
    }
    
    .form-group.error i.fa-exclamation-circle {
    	color: #e74c3c;
    	visibility: visible;
    }
    

    .form-group.error small {
    	visibility: visible;
    }


  .navbar {
    position: fixed;
    z-index: 1;
    background: linear-gradient(90deg,  #abebc6  , #27ae60 );
    width: 100%;
}
.dropdown-menu {
    font-size: 15px;
    margin: 0px;
    font-weight: 500;
    background: #70cf99;
}
.dropdown-item {
    font-size: 15px;
    color: #fff!important;
    margin: 0px;
    font-weight: 500;
    background: #70cf99 ;
}

.dropdown-menu: hover {
    font-weight: 600;
    border-bottom: 1px solid #fff;
}

.dropdown-item: hover {
  font-weight: 600;
  border-bottom: 1px solid #fff;
}
</style>
<body>
    <?php
      
    session_start();
    if($_SESSION['status']=="login"){
      header("location:../map.php");
    }

    if(isset($_GET['pesan'])){
      if($_GET['pesan'] == "gagal"){
        echo "Login gagal! username dan password salah!";
      }else if($_GET['pesan'] == "logout"){
        echo "Anda telah berhasil logout";
      }else if($_GET['pesan'] == "belum_login"){
        echo "Anda harus login untuk mengakses halaman admin";
      }
    }
    
    
    
    ?>
    <!-- SWAL -->
	<div class="info-data" data-infodata="<?php if(isset($_SESSION['info'])){ echo $_SESSION['info']; } unset($_SESSION['info']); ?>"></div>
    
  <header>
        <div class="menu-bar">
          <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
                  <a class="navbar-brand" href="#"><img src="/static/images/logo.png" alt="logo" href="/"></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="fa fa-bars"></i>
                  </button>

                  <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                      <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Satellite Imagery
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="/login.php">Project Orders</a>
                        
                          <a class="dropdown-item" href="/Satellite.html">Products Gallery</a>
                        </div>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="/geoai.html">Geo-Artificial Intelligence </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="https://api.whatsapp.com/send/?phone=6282170829587&text&app_absent=0">Contact Us</a>
                      </li>
                    </ul>
                  </div>
          </nav>
        </div>
        
      <header>

        <ul class="box-area">
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
        </ul>
    

          
          <div class="container text-center" style="height: 100vh; position: relative;">
          
                <form action="submitreg.php" method="post" class="box">
                  <div class="header">
                      <h4>Register</h4>
                      <h5>Hello, GeoCircle Users!</h5>
                      <h6>Welcome to GeoCircle, Geo-Artificial Intelligence for Environment</h6>
                  </div>
                  <div class="login-area">
                    <div class= "form-row">
                      <div class="form-group col-6" style="text-align: left;">
                        <label for="inputFullname4">Fullname</label>
                        <input type="text" class="form-control" placeholder="Your fullname" name="fullname" id="inputFullname4" required="required">
                      </div>
                   
                    
                      <div class="form-group col-6" style="text-align: left;">
                        <label for="inputUsername4">Username</label>
                        <input type="text" class="form-control" placeholder="Username" name="username" id="username" required="required">
                      </div>
                      </div>
             

                    <div class= "form-row">
        
                        <div class="form-group col-6" style="text-align: left;">
                          <label for="inputEmail4">Email</label>
                          <input type="text" class="form-control" placeholder="Example: xxx@mail.com" name="email" id="email" required="required">
                        </div>
                        <div class="form-group col-4" style="text-align: left;">
                          <label for="inputDateofbirth4">Date of birth</label>
                          <input type="date" class="form-control" placeholder="Password" name="dateofbirth" id="inputDateofbirth4" required="required">
                        </div>
                        <div class="form-group col-4" style="text-align: left;">
                          <label for="inputPhonenumber4">Phone number</label>
                          <input type="text" class="form-control" placeholder="Phone number" name="phonenumber" id="inputPhonenumber4" required="required">
                        </div>
                    </div>
  
                    <div class= "form-row">
                      <div class="form-group col-6" style="text-align: left;">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="password" id="password" required="required">
  
                      </div>
                      <div class="form-group col-6" style="text-align: left;">
                        <label for="password2">Confirm Password</label>
                        <input type="password" class="form-control" placeholder="Confirm Password" name="confirmpassword" id="password2" required="required">
                        
                      </div>
                      </div>
                    
                  </div>
       
                  <input type="submit" value="Register" class="submit">
                      <a href="login.php">Login now</a>
              </form>

          
          </div>
          
          
          
          

	



          

          
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
          
          
          <!-- Swal -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.15.2/dist/sweetalert2.all.min.js"></script>
	<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
	<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
	<script src="/static/script/notif.js"></script>

	

          




  

    


</body>

</html>

const notifikasi = $('.info-data').data('infodata');

if(notifikasi == "Disimpan" || notifikasi=="Dihapus"){
	Swal.fire({
	  icon: 'success',
	  title: 'Sukses',
	  text: 'Data Berhasil '+notifikasi,
	  showClass: { popup: 'animate__animated animate__fadeInDown'
	},
	  hideClass: {
	  popup: 'animmate__animated animate__fadeOutUp',
	}}).then(function() {
            window.location.href = "login.php";
        })

}else if(notifikasi == "Gagal Disimpan" || notifikasi=="Gagal Dihapus"){
	Swal.fire({
	  icon: 'error',
	  title: 'GAGAL',
	  text: 'Data '+notifikasi,
	  showClass: { popup: 'animate__animated animate__fadeInDown'
	},
	  hideClass: {
	  popup: 'animmate__animated animate__fadeOutUp',
	}})
}else if(notifikasi == "Exist"){
    Swal.fire({
	  icon: 'error',
	  title: 'Failed',
	  text: "Email acount's registered",
	  showClass: { popup: 'animate__animated animate__flipInY'
	},
	  hideClass: {
	  popup: 'animmate__animated animate__fadeOutUp',
	}})
}else if(notifikasi == "Belum Aktif"){
    Swal.fire({
	  icon: 'error',
	  title: 'Failed',
	  text: "Acount's not activated yet",
	  confirmButtonColor: '#3085d6',
	  showClass: { popup: 'animate__animated animate__fadeInDown'
	},
	  hideClass: {
	  popup: 'animmate__animated animate__fadeOutUp',

	}})
 
}else if(notifikasi == "Akun Salah"){
    Swal.fire({
	  icon: 'error',
	  title: 'Failed',
	  text: "Your Email or password is incorrect",
	  confirmButtonColor: '#3085d6',
	  showClass: { popup: 'animate__animated animate__fadeInDown'
	},
	  hideClass: {
	  popup: 'animmate__animated animate__fadeOutUp',

	}})
}else if(notifikasi == "DontMatch"){
    Swal.fire({
	  icon: 'error',
	  title: 'Failed',
	  text: "Your password doesn't match",
	  confirmButtonColor: '#3085d6',
	  showClass: { popup: 'animate__animated animate__flipInY'
	},
	  hideClass: {
	  popup: 'animmate__animated animate__fadeOutUp',

	}})
}else if(notifikasi == "Notify"){
    Swal.fire({
	  icon: 'success',
	  title: 'Sukses',
	  text: 'Data saved successfully, Check your Email to activate your Account',
	  showClass: { popup: 'animate__animated animate__fadeInDown'
	},
	  hideClass: {
	  popup: 'animmate__animated animate__fadeOutUp',
	}}).then(function() {
            window.location.href = "login.php";

	})
}
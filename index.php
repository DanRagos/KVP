<?php
include 'classes/db.php';
?>
<?php
session_start();
if (isset($_SESSION['user'])){
	header('location/pages/dashboard.php');
}
?>
<!--
=========================================================
* Material Dashboard 2 - v3.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Test Sign Up
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />
</head>

<body class="bg-gray-200">
  
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('img/bg.webp');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
                  
                </div>
              </div>
              <div class="card-body">
			   <div id="loginAlert"></div>
                <form id="login-form" class="text-start" method="post" action="#" autocomplete="off">
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Username</label>
                    <input type="text" id="username" name="username" class="form-control">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                  </div>
                  <div class="form-check form-switch d-flex align-items-center mb-3">
                    <input class="form-check-input" type="checkbox" id="rememberMe" checked>
                    <label class="form-check-label mb-0 ms-3" for="rememberMe">Remember me</label>
                  </div>
                  <div class="text-center">
                    <a href="pages/dashboard.php"> <button type="submit" id= "login-btn" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign in</button> </a>
                  </div>
                  <p class="mt-4 text-sm text-center">
                    Don't have an account?
                    <a href="../pages/sign-up.html" class="text-primary text-gradient font-weight-bold">Request Account</a>
                  </p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
		
    </div>


  </main>
  <!--   Core JS Files   -->
  <script src="assets/js/plugins/jquery-3.6.1.js"></script>
  <script src='assets/js/plugins/main.js'></script>
  <script src="assets/js/plugins/jquery.dataTables.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <script src="assets/js/plugins/moment.js"></script>
  <script src="assets/js/plugins/dateTime.min.js"></script>
   <script src="assets/js/plugins/sweetalert.min.js"></script>




<script>
$(document).ready(function(){
  $("#login-btn").click(function(e){
	 if($("#login-form")[0].checkValidity()) {
		 e.preventDefault();
		 $("#login-btn").text('Please wait..');
		 $.ajax({
			url:'php/action.php',
			method: 'post',
			data: $("#login-form").serialize()+'&action=login',
			success:function(response){
				console.log(response);
				$("#login-btn").text('Signing In..');
					if(response === 'login') {
	Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'LoggedIn',
  showConfirmButton: false,
  timer: 1500,
  timerProgressBar: true,
  			 didOpen: () => {
				 Swal.showLoading();
			 },
				willClose: () => {
				Swal.hideLoading();
				},
}).then(function() {
    window.location = "pages/dashboard.php";
});
					}
					else {
						$("#loginAlert").html(response);
					}
			}
		 });
	 } 
  });
});
</script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.min.js?v=3.0.4"></script>

</body>

</html>

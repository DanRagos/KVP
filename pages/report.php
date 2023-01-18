<?php include 'head.php'; 
	require_once '../comp/static_modal.php';
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
    <title>
    Dashboard
  </title>
<style>
.report2,.report1{
   display:none;
}
</style>
</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
   <?php include 'aside.php'; ?>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Report</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Report</h6>
        </nav>
        <?php include 'nav.php'; ?>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
       <div class="row">	
        <div class="col-12">
		 
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Generate Report</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
               <div class="container">
			   <div class="input-group input-group-static mb-4">
					<label for="topic">Report Choices</label>
						<select class="form-control" name="topic">
							<option selected>Select Report</option>
							<option value="Report 1">Report 1</option>
							<option value="Report 2">Report 2</option>
							<option value="Report 3">Report 3</option>
						</select>
				</div>
			<div class="report1">
				<div class="row">
    <div class="col">
      <div class="input-group input-group-outline my-3">
	  <h1> Report no. 1</h1>
        <input type="text" class="form-control">
      </div>
    </div>
    <div class="col">
      <div class="input-group input-group-outline my-3">
        <input type="text" class="form-control">
      </div>
    </div>
	<div class="col">
      <div class="input-group input-group-outline my-3">
      <input type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="input-group input-group-outline my-3">
        <input type="text" class="form-control">
      </div>
    </div>
	<div class="col">
      <div class="input-group input-group-outline my-3">
        <input type="text" class="form-control">
      </div>
    </div>
	<div class="col">
      <div class="input-group input-group-outline my-3">
        <input type="text" class="form-control">
      </div>
    </div>
  </div>
			</div>
			<div class="report2">
				<div class="row">
    <div class="col">
      <div class="input-group input-group-outline my-3">
	  <h1> Report no. 2</h1>
        <input type="text" class="form-control">
      </div>
    </div>
    <div class="col">
      <div class="input-group input-group-outline my-3">
        <input type="text" class="form-control">
      </div>
    </div>
	<div class="col">
      <div class="input-group input-group-outline my-3">
      <input type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="input-group input-group-outline my-3">
        <input type="text" class="form-control">
      </div>
    </div>
	<div class="col">
      <div class="input-group input-group-outline my-3">
        <input type="text" class="form-control">
      </div>
    </div>
	<div class="col">
      <div class="input-group input-group-outline my-3">
        <input type="text" class="form-control">
      </div>
    </div>
  </div>
			</div>
			
			
			<div class="form-group upload">
				<label for="send_cv">--</label>
					<input type="file" name="send_cv" />
			</div>
         
  
            </div>
			</div>
			</div>
      </div>
      
    </div>
	</div>
  </main>
 
  <!--   Core JS Files   -->
  <?php include 'scripts.php' ?>
  <script>
  $('select[name="topic"]').on('change',function(){
	  
   if($(this).val()=="Report 1")
   {
    	$('.upload').hide();
		 $('.report2').hide();
        $('.report1').show();
   }
   else if($(this).val()=="Report 2")
   {
    	$('.upload').hide();
        $('.report1').hide();
		$('.report2').show();
   }
    else if($(this).val()==null)
   {
    	$('.upload').hide();
        $('.report1').hide();
		$('.report2').show();
   }
   else
   {
        $('.upload').show();
        $('.report1').hide();
		$('.report2').hide();
   }
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
 
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.0.4"></script>
</body>

</html>
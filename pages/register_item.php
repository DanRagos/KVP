<?php include 'head.php'; 

  require_once '../php/session.php';
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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Schedule</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">PM Record</h6>
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
                <h6 class="text-white text-capitalize ps-3">Register Item</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
               <div class="container">
                <form action="#" method="post" id="register-form" autocomplete="off">
         <div class="row">
		 <div class="col">
		  <img src="../img/line_jpg.jpg" class="img-fluid" style="width:40%;height:50%" alt="...">
		 </div>
    <div class="col">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">IMTE Name</label>
        <input type="text" name="name" class="form-control" required>
      </div>
    </div>
    <div class="col">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">ID No.:</label>
        <input type="text" name="id" class="form-control">
      </div>
    </div>
	<div class="col">
      <div class="input-group input-group-static mb-3">
        <label for="type" class="ms-0">Type:</label>
       <select class="form-control" name = "type" id="type"required>
	    <option value="2">Calibration</option>
       <option value= "1">Verification</option>
     </select>
      </div>
    </div>
	<div class="col">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Request No.:</label>
        <input type="text" name="request" class="form-control">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Requested by: </label>
        <input type="text" name="request_by" class="form-control">
      </div>
    </div>
    <div class="col">
      <div class="input-group input-group-static mb-3">
        <label>Date Request.:</label>
        <input type="date" class="form-control" name="date_request" value=<?php echo date("Y-m-d") ?>>
      </div>
    </div>
	
	<div class="col">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Reference Doc.:</label>
        <input type="text" name="reference_doc" class="form-control">
      </div>
    </div>
  </div>
  <div class="row">
  <div class="col">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Serial:</label>
        <input type="text" name="serial_no" class="form-control" required>
      </div>
    </div>
	<div class="col">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Model:</label>
        <input type="text" name="model" class="form-control"required>
      </div>
    </div>
	<div class="col">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Manufacturer :</label>
        <input type="text" name="manufacturer" class="form-control"required>
      </div>
    </div>
	<div class="col">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Location:</label>
        <input type="text" name="location" class="form-control"required>
      </div>
    </div>
	<div class="col">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Owner:</label>
        <input type="text" name = "owner" class="form-control"required>
      </div>
    </div>
	<div class="col">
      <div class="input-group input-group-static mb-4">
        <label for="exampleFormControlSelect1" class="ms-0">Interval:</label>
       <select class="form-control" id="exampleFormControlSelect1" name="y_interval"required>
	    <option>Y</option>
       <option>2Y</option>
       <option>3Y</option>
       <option>4Y</option>
       <option>5Y</option>
     </select>
      </div>
    </div>
	<div class="col">
      <div class="input-group input-group-outline my-3">
        <label class="form-label">Instruction Reference:</label>
        <input type="text" name="instruct_reference" class="form-control"required>
      </div>
    </div>
	<div class="col">
      <div class="input-group input-group-static mb-3">
        <label>First PM Schedule:</label>
       <input type="date" class="form-control" name="first_pm" value="<?php echo date("Y-m-d") ?>"required>
      </div>
    </div>
              </div>
			<div class ="row">
			<div class="col-lg-2 col-sm-4 col-4 ">
			
                  <button class="btn bg-gradient-primary w-100 mb-2 toast-btn" type="submit" name= "register_tool" id="registerToolBtn" ><i class="material-icons opacity-10 m-1">add</i>Add</button>
				  
                </div>
			</div>
            </div>
			</form>
          </div>
        </div>
      </div>
        
    </div>

	</div>
  </main>
 
  <!--   Core JS Files   -->	
  <?php include 'scripts.php' ?>
  <script>
// Custom filtering function which will search data in column four between two values
$(document).ready(function() {
    $("#registerToolBtn").click(function(e){
        if($("#register-form")[0].checkValidity()){
          e.preventDefault();
		  $("#registerToolBtn").text('Please wait...');
		  $.ajax({
			 url:'../php/process.php',
			 method: 'post',
			 data: $("#register-form").serialize()+'&action=register_tool',
			 success:function(response){
				 $("#registerToolBtn").text('Add Note');
				 $("#register-form")[0].reset();
				 swal("Tool Registered!", "", "success");
				 displayAllNotes();
			 }
		  });
        }
    });

	//Display All Note of an User 
	
	
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
  <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
  <script  src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.0.4"></script>
</body>

</html>
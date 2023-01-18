<?php 
require_once '../php/session.php';
include 'head.php'; 
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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Masterlist</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Calibration / Verification Masterlist</h6>
        </nav>
        <?php include 'nav.php'; ?>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
       <div class="row">	
        <div class="col-12">
		<!--
		 <div class="mb-4">
            <div class="p-3">
              <div class="row">
                <div class="col-lg-2 col-sm-4 col-4 ">
                  <button class="btn bg-gradient-primary w-100 mb-2 toast-btn" type="button"  data-bs-toggle="modal" data-bs-target="#addTool"> <i class="material-icons opacity-10 m-1">add</i>Register Tool</button>
				  
                </div>
              </div>
            </div>
          </div> -->
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Calibration / Verification Masterlist</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive " id="calibTable1">
              <p class="text-center lead mt-5"> Please Wait.. </p>
                    
                   
                    
              
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
   $(document).ready( function () {
  

	displayAllNotes();
	//View All details
	$("body").on("click",".editBtn", function(e) {
		e.preventDefault();
		var edit_id = $(this).attr('id');
		$.ajax({
			url: '../php/process.php',
			method: 'post',
			data: {edit_id : edit_id},
			success: function (response) {
				data = JSON.parse(response);
				$("#id_no").val(edit_id);
				if (data.type == "1"){
					$("#type").text('Verification');
				} else {
					$("#type").text('Calibration');
				}
				
				$("#type").val(data.type);
				$("#name").val(data.name);
				$("#model").val(data.model);
				$("#location").val(data.location);
				$("#serial").val(data.serial);
				$("#manufacturer").val(data.manufacturer);
				$("#owner").val(data.owner);
				$("#instruct_reference").val(data.instruct_reference);
				$("#interval_date").text(data.interval_date+'Y');
				$("#title").text('Edit details for '+data.name);
			}
			
		});
	});
	//Update details
	$("#editToolBtn").click(function(e){
		if ($("#edit-tool-form")[0].checkValidity()) {
			e.preventDefault();
			$.ajax({
				url:'../php/process.php',
				method: 'post',
				data: $("#edit-tool-form").serialize()+"&action=update_tool",
				success:function(response){
					swal("Tool Updated!", "", "success");
					$("#edit-tool-form")[0].reset();
					$("#editTool").modal('hide');
					displayAllNotes();
				}
			});
		}
	});
		function displayAllNotes() {
		$.ajax({
			url:'../php/pro.php',
			method: 'POST',
			data: {action:'display_notes'},
		success: function(response){
			$("#calibTable1").html(response);
			$("#table").DataTable({
});
		}
		});
	}
	
	// Obsolete
	$("body").on("click",".deleteBtn", function(e){
		e.preventDefault();
		del_id = $(this).attr('id');
		swal({
			title: "Are you sure?",
			text: "Once deleted, you will not be able to recover this imaginary file!",
			type: "warning",
			buttons: true,
			dangerMode: true,
			})
			.then((willDelete) => {
			if (willDelete) {
			$.ajax({
				url: '../php/pro.php',
				method: 'post',
				data: {del_id : del_id},
				success: function(response){
					swal("Tool marked us Obsolete", {
					icon: "success",
			});
				console.log(response);
				displayAllNotes();
				}
			});
			
			}
			});
		
	});
} );


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
  <script src="../assets/js/material-dashboard.min.js?v=3.0.4"></script>
</body>

</html>
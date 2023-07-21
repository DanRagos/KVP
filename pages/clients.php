<?php 
	require_once '../php/session.php';
	include 'head.php'; 
	require_once '../comp/client_modal.php';
	include '../php/populate.php';

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
        .no_margin {
            margin-bottom: 0rem;
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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Users Management</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Active Clients</h6>
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
                <h6 class="text-white text-capitalize ps-3">Active Clients</h6>
              </div>
			  <div class="col-lg-2 col-sm-4 col-4 mt-1">
                  <button class="btn bg-gradient-primary w-100 mb-2 toast-btn" type="button" data-bs-toggle="modal" data-bs-target="#createClient"> <i class="material-icons opacity-10 m-1">add</i>Register Clients</button>
				  
                </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0" id="displayAllclients">
                
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
  $(document).ready(function() {
  		$(document).on("click", ".viewProfile", function(e){
      // Get the client ID from the data-id attribute
      var clientId = $(this).data('id');
      
      // Redirect to s profile page with the client ID as a query parameter
       window.open('summary.php?client_id=' + clientId, '_blank');
	
    });
$(".freq").click(function(){
if ($(this).val()=='2') {
$('#inp_reason').attr('required', true); 
document.getElementById('reason').style.display = '';
}
else {
$('#inp_reason').val(''); 
$('#inp_reason').attr('required', false); 
document.getElementById('reason').style.display = 'none';
}
});
//Date Range Picker
$(function() {

$('input[name="datefilter"]').daterangepicker({
autoUpdateInput: false,
locale: {
cancelLabel: 'Clear'
}
});

$('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
});

$('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
$(this).val('');
});

});
   
		
		    displayAllclients();

	//View Details Users
	$("body").on("click", ".editClientBtn", function(e){
		e.preventDefault();
		var edit_client = $(this).attr('id');
			$.ajax({
				url: '../php/process.php',
				method: 'post',
				data: {edit_client : edit_client},
				success: function (response){
				console.log(response);
				data = JSON.parse(response);
				$("#client_id").val(edit_client);
				$("#client_name").val(data.client_name);
				$("#address").val(data.client_address);
				$("#cPerson").val(data.contact_person);
				$("#email").val(data.contact_email);
				$("#title").text('Edit details for '+data.client_name);
				$("#title1").text('Add details for '+data.client_name);
				$("#editImage").attr("src", data.imglink);
				console.log($("#title1").text());
	
				}
			});
	});
		//Update Users
		$("#editClientBtn").click(function(e){
		if ($("#edit-client-form")[0].checkValidity()) {
			e.preventDefault();
			$.ajax({
				url:'../php/process.php',
				method: 'post',
				data: $("#edit-client-form").serialize()+"&action=update_client",
				success:function(response){
				swal("Tool Updated!", "", "success");
					displayAllclients();
					$("#edit-client-form")[0].reset();
					$("#editClient").modal('hide');
				
					
				}
			});
		}
	});
//Show Add Contract Modal
$("body").on("click",".addContractBtn", function(e) {
		e.preventDefault();
		var sched_id = $(this).attr('id'); 
			$.ajax({
				url: '../php/process.php',
				method: 'post',
				data: {edit_client : sched_id},
				success: function (response){
				data = JSON.parse(response);
				$("#contract_id").val(sched_id);
				$("#title1").text('Add contract for '+data.client_name);
			
	
				}
			});
		});
//Add Contract  
	$("#add-contract-btn").click(function(e){
	let add_id = $(this).attr('id');
	if($("#add-contract-form")[0].checkValidity()){
          e.preventDefault();
		  let add_id = $(this).attr('id');
			   $("#passError").text('');
				$.ajax({
				url: '../php/process.php',
				method: 'post',
				data: $("#add-contract-form").serialize()+"&action=add_contract",
				success: function (response){
				console.log(response);
				Swal.fire({
            icon: 'success',
            title: 'Contract Added',
            timer: 1500,
            timerProgressBar: true,
            didOpen: () => {
              Swal.showLoading();
            },
            willClose: () => {
              Swal.hideLoading();
            },
          });
					$("#add-contract-form")[0].reset();
					$("#addContract").modal('hide');
				/*data = JSON.parse(response);
				$("#client_id").val(add_id);
				$("#client_name").val(data.client_name);
				$("#address").val(data.client_address);
				$("#cPerson").val(data.contact_person);
				$("#email").val(data.contact_email);
				$("#title1").text('Add contract for '+data.client_name);
				*/
	
				}
			});
		  
        }
      });
	
   	function displayAllclients() {
		$.ajax({
			url:'../php/process.php',
			method: 'POST',
			data: {action:'display_clients'},
		success: function(response){
			$("#displayAllclients").html(response);
				$('#table').DataTable({ 
				 "order": [],
				  stateSave: true,
				   scrollY: '45vh',
				   scrollX: true,
				scrollCollapse: true,
				  	fixedColumns:   {
            left: 1,
        }
    });
		}
		
		});
	}
	//View Profile

	$("#client-register-btn").click(function (e) {
  if ($("#client-form")[0].checkValidity()) {
    e.preventDefault();
    var formData = new FormData($("#client-form")[0]);
    formData.append('action', 'add_client');
    $.ajax({
      url: '../php/process.php',
      method: 'post',
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
        response = response.trim();
        if (response === 'Valid') {
          $("#client-form")[0].reset();
          $("#createClient").modal('hide');
          $('#regAlert').hide();
          displayAllclients();
          Swal.fire({
            icon: 'success',
            title: 'Client Added',
            text: 'The client has been added successfully.', // Add a custom success message here if needed
            timer: 1500,
            timerProgressBar: true,
            didOpen: () => {
              Swal.showLoading();
            },
            willClose: () => {
              Swal.hideLoading();
            },
          });
        } else {
          $('#regAlert').show();
          $('#regAlert').html(response);
          setTimeout(function () {
            $('#regAlert').hide();
          }, 3000);
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
  <script src="../assets/js/material-dashboard.min.js?v=3.0.4"></script>
</body>

</html>
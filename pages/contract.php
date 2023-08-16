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
            margin-top: 0rem;
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
          <h6 class="font-weight-bolder mb-0">Contract</h6>
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
                <h6 class="text-white text-capitalize ps-3">Active Contract</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
			  <table id="contracts" class="table align-items-center justify-content-center table-responsive" style="width:100%;" >
        <thead>
            <tr>
					  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID/Client</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Client</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Machine</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Turnover - Coverage</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contract</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Completion</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No. SV Call</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
            </tr>
        </thead>
 
    </table>         
                
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
    $(document).ready(function(){
		var db = 3;
		var user_id = 1;
		var table= $('#contracts').DataTable({
					 
					 processing: true,
					 serverSide: true,
           scrollY: '45vh',
           scrollX: true,
					ajax: {
					url: '../php/ssp_list.php',
					data: {db : db,
					user_id:user_id},
					method:'GET',
					},
					"order":[0,'asc'],					
				
					
    });

    $(document).on('click', '.viewContractReport', function() {
            let contract_id = $(this).attr('data-id');
            $.ajax({
                url: '../php/export_service.php',
                type: 'GET',
                data: {
                    action: "viewContracts",
                    contract_id: contract_id
                },
                xhrFields: {
                    responseType: 'blob' // Set the response type to 'blob' to handle binary data
                },
                success: function(response) {
                    var blob = new Blob([response], {
                        type: 'application/pdf'
                    });

                    // Create a temporary URL for the blob
                    var blobUrl = URL.createObjectURL(blob);

                    // Open the PDF in a new tab or window
                    window.open(blobUrl, '_blank');

                }
            });
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
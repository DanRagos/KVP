  <?php 
	require_once '../php/session.php';
	include 'head.php';
	require_once '../classes/auth.php';	
	include '../comp/schedule_modal.php';
	require_once '../classes/db.php';
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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Schedule</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Calendar</h6>
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
                <h6 class="text-white text-capitalize ps-3 ">Service Done</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive" >
			  <div class="row justify-content-md-center">
			 <div class="col col-lg-2">
			 <div class="input-group input-group-static mt-4 is-filled">
				<label class="form-label">PM/ SV Date</label>
				<input type="month" name="month_date" id="month-filter" class="form-control" value="<?php echo date('Y-m');?>">
				</div>
				</div>
			 <div class="col col-lg-2">
				<div class="input-group input-group-static mb-3">
				<label>Schedule Type:</label>
				<select class="form-control" name="tool_type" id="tool_type"> 
				<option selected> Select </option>
				<option value="1"> PMS </option>
				<option value="2"> SV Call </option>
				<option value="3"> All </option>
				</select>
				</div>	
				</div>				
				</div>
		 <table id="example" class="table align-items-center justify-content-center table-responsive" style="width:100%;" >
        <thead>
            <tr>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Schedule no.</th>
					  <th class="text-center text-uppercase text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Client Name</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Client Address</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Brand</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Model</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Reported Problem</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">PMS/SV Date</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
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
   <?php include 'scripts.php'; ?>
<script>
    var db = 1;
		var table= $('#example').DataTable({
					 stateSave: true,
					 processing: true,
					 serverSide: true,
           scrollY: '45vh',
           scrollX: true,
					ajax: {
					url: '../php/ssp_list.php',
					data: {db : db},
					method:'GET',
					},
					"order":[0,'asc'],					
				
					
    });
 $('#month-filter').on('change', function() {
    var value = $(this).val();
    table.column(7).search(value).draw();
  });	
$('#tool_type').on('change', function() {
   var value = $(this).val();
   if (value === '3') {
      table.columns(3).search('').draw();
   } else {
      table.column(3).search(value).draw();
   }
});
	
	
		$("body").on("click",".viewPms", function(e) {
		let accomp_id = $(this).attr('data-id');
		e.preventDefault();
		$.ajax({
			url: '../php/process.php',
			method: 'get',
			data: {
				accomp_id: accomp_id,
				action: 'view_report'
			},
			success: function (response) {
				console.log(response);
	$.ajax({
    url: '../php/export_service.php',
    type: 'POST',
    data: { jsonData: response },
    xhrFields: {
        responseType: 'blob' // Set the response type to 'blob' to handle binary data
    },
    success: function(pdfResponse) {
        console.log(pdfResponse);

        // Create a blob object from the binary data
        var blob = new Blob([pdfResponse], { type: 'application/pdf' });

        // Create a temporary URL for the blob
        var blobUrl = URL.createObjectURL(blob);

        // Open the PDF in a new tab or window
        window.open(blobUrl, '_blank');
    },
    error: function(error) {
        // Handle the error
    }
});
	

			}
			
		});
	});

  $(document).on('click', '.editPm', function() {
            let accomp_id = $(this).attr('data-id');
            $.ajax({
                url: '../php/process.php',
                method: 'GET',
                data: {
                    accomp_id: accomp_id,
                    action: 'edit_pm_details'
                },
                success: function(response) {
                  
                    $('.update_pm_contents').html(response);
                    const arrayValue = JSON.parse(document.getElementById('myDiv').dataset
                        .arrayValue);
                    $.ajax({
                        url: '../php/process.php',
                        method: 'GET',
                        data: {
                            'action': 'getServiceBy'
                        },
                        dataType: 'json',
                        success: function(data) {

                            // Assuming the response data is an array of objects with label and value properties
                            var optionsData = data.map(function(item) {
                                var fullName = item.firstname + ' ' +
                                    item.lastname;
                                return {
                                    label: fullName,
                                    value: item.mem_id
                                };
                            });

                            // Initialize Virtual Select with the fetched options
                            VirtualSelect.init({
                                ele: '.sample-select',
                                options: optionsData,
                                multiple: true,

                            });

                            document.querySelector('.sample-select').setValue(
                                arrayValue);

                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching options:', error);
                        }
                    });
                }
            });

        });

        $(document).on('click', '.updatePm', function(e) {
            if ($("#update_pm_form")[0].checkValidity()) {
    e.preventDefault();
    var formData = new FormData($("#update_pm_form")[0]);
    formData.append('action', 'updatePms');
    $.ajax({
      url: '../php/process.php',
      method: 'post',
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
        console.log(response);
          $("#update_pm_form")[0].reset();
          $("#edit-pm-modal").modal('hide');
          table.ajax.reload( null, false );
          Swal.fire({
            icon: 'success',
            title: 'PMS Update',
            text: 'The PM details has been edited successfully.', // Add a custom success message here if needed
            timer: 1500,
            timerProgressBar: true,
            didOpen: () => {
              Swal.showLoading();
            },
            willClose: () => {
              Swal.hideLoading();
            },
          });
       
        
      }
    });
  }
        });
	
</script>
</body>


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
  <script>
$(document).ready(function (){
	
});
</script>
</body>


</html>
<?php
require_once '../php/session.php';
include 'head.php';
require_once '../comp/static_modal.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Masterlist</title>
    <style>
        .no_margin {
            margin-bottom: 0rem;
        }

        .accordion-content {
            display: none;
        }

        table:hover {
            cursor: pointer;
        }
    </style>
</head>
<body class="g-sidenav-show bg-gray-200 ">
   <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-warning editTest">Add input fields</button>
        <button type="button" class="btn btn-primary">Add changes</button>
      </div>
    </div>
  </div>
</div>
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <?php include 'aside.php'; ?>
</aside>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Masterlist</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Calibration Masterlist</h6>
            </nav>
            <?php include 'nav.php'; ?>
        </div>
    </nav>
    <div class="container-fluid px-2 px-ms-2">
	      <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <span class="mask  bg-gradient-primary  opacity-6"></span>
      </div>
	      <div class="container-fluid py-4 card-body mx-4 mx-md-2 mt-n7 p-3 m-2">
      <div class="row d-flex justify-content-center">
	  <div class="card col-3">
	            <div class="col-auto">
            <div class="avatar avatar-xl position-relative mt-n3">
              <img src="../assets/img/bruce-mars.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <div class="bg-gradient-transparent col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
                Richard Davis
              </h5>
              <p class="mb-0 font-weight-normal text-sm">
                CEO / Co-Founder
              </p>
            </div>
          </div>
		  </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">weekend</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Today's Money</p>
                <h4 class="mb-0">$53k</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than last week</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Today's Users</p>
                <h4 class="mb-0">2,300</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>than last month</p>
            </div>
          </div>
        </div>
		        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">New Clients</p>
                <h4 class="mb-0">3,462</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span> than yesterday</p>
            </div>
          </div>
        </div>
		
		</div>
		</div>
				<div class="row mt-4">
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                <div class="chart">
                  <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h6 class="mb-0 ">Website Views</h6>
              <p class="text-sm ">Last Campaign Performance</p>
              <hr class="dark horizontal">
              <div class="d-flex ">
                <i class="material-icons text-sm my-auto me-1">schedule</i>
                <p class="mb-0 text-sm"> campaign sent 2 days ago </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
          <div class="card z-index-2  ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                <div class="chart">
                  <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h6 class="mb-0 "> Daily Sales </h6>
              <p class="text-sm "> (<span class="font-weight-bolder">+15%</span>) increase in today sales. </p>
              <hr class="dark horizontal">
              <div class="d-flex ">
                <i class="material-icons text-sm my-auto me-1">schedule</i>
                <p class="mb-0 text-sm"> updated 4 min ago </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mt-4 mb-3">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                <div class="chart">
                  <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h6 class="mb-0 ">Completed Tasks</h6>
              <p class="text-sm ">Last Campaign Performance</p>
              <hr class="dark horizontal">
              <div class="d-flex ">
                <i class="material-icons text-sm my-auto me-1">schedule</i>
                <p class="mb-0 text-sm">just updated</p>
              </div>
            </div>
          </div>
        </div>
      </div>
        <div class="row">
            <div class="col">
                <div class="card my-4 card ">
			
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Active Contract</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                       
                        <div class="table-responsive" id="initial-table">

                        </div>
                    </div>
					
					
                </div>

            </div>
        </div>
		        <div class="row">
            <div class="col">
                <div class="card my-4 card ">
			
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Active Contract</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                       
                        <div class="table-responsive" id="initial-table">

                        </div>
                    </div>
					
					
                </div>

            </div>
        </div>


    </div>
</main>

<?php include 'scripts.php' ?>
<script>
    $(document).ready(function () {
		
        // Load initial table via AJAX
        $.ajax({
            url: '../php/process.php',
            type: 'GET',
            data: {action: 'display_ajaxUsers'},
            success: function (response) {
                $('#initial-table').html(response);
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });

        // Click event for expanding/collapsing accordion content
  $(document).on('click', '.accordion-btn', function () {
    var btn = $(this);
    var accordionContent = btn.closest('.table-row').next('.accordion-content');

    // Check if accordion content is already visible
    if (!accordionContent.is(':visible')) {
      var rowData = btn.closest('.table-row').data('row'); // Retrieve data for the clicked row
	  var dataId = btn.attr('data-id');
	
      // Make AJAX request for accordion content
      $.ajax({
        url: '../php/accordion_test.php',
        type: 'GET',
        data: { dataId: dataId, action: 'getAccordionContent' },
        success: function (response) {
		 var dropToggleIcon = btn.find('i');
          dropToggleIcon.removeClass('fa-sort-down').addClass('fa-sort-up');
			var table = $('.testTable').DataTable();
			table.destroy();
          accordionContent.find('.accordion-placeholder').html(response);
		  accordionContent.slideToggle('fade');

		  initTable();
        },
        error: function (xhr, status, error) {
          console.log(error);
        }
      });
    } else {
     var dropToggleIcon = btn.find('i');
      dropToggleIcon.removeClass('fa-sort-up').addClass('fa-sort-down');
      accordionContent.slideToggle('fade');
    }
  });
  
  function initTable(){
	  		 $('.testTable').DataTable({
			 		
		 });
  }
  
          $(document).on('click', '.editTest', function() {
  // Generate a unique name for the input field
  var fieldName = 'inputField_' + Date.now(); // Example: inputField_1623286595761

  // Create the input field dynamically with the unique name
  var inputField = $('<input>').attr({
    type: 'text',
    name: fieldName
  });

  // Append the input field to the container element
  $('.modal-body').append(inputField);
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
<script src="../assets/js/material-dashboard.min.js?v=3.0.4"></script>
</body>
</html>
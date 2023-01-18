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
  <?php include 'head.php'; 
  require_once '../comp/static_modal.php';
  ?>
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
          <h6 class="font-weight-bolder mb-0">Verification Masterlist</h6>
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
                <h6 class="text-white text-capitalize ps-3">PM Logs of 212</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
			  <div class = "container p-0">
			  <div class="row">
    <div class="col">
      <div class="input-group input-group-static my-3">
        <label class="form-">ID No. / IMTE Name</label>
        <input type="text" class="form-control" value= "212 / Handheld Laser Particle Counter" disabled>
      </div>
    </div>
    <div class="col">
      <div class="input-group input-group-static my-3">
        <label class="form-">Model / Serial</label>
        <input type="text" class="form-control" value= "3886 GEO-a / 619264" disabled>
      </div>
    </div>
	<div class="col">
      <div class="input-group input-group-static my-3">
        <label class="form-">Manufacturer</label>
        <input type="text" class="form-control" value= "Konomax" disabled>
      </div>
    </div>
	<div class="col">
      <div class="input-group input-group-static my-3">
        <label class="form-">Location / Owner</label>
        <input type="text" class="form-control" value= "Clean Room / PDN-COB" disabled>
      </div>
    </div>
  </div>
			  </div>
      
		
    
                <table id="calibTable" class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">PM Interval</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">PM Instruction</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">PM Sched</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actual</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Deadline</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Remarks</th>					  
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Back Lag Grade</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Calibration Fee (PHP.)</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Other Charges (PHP.)</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>        
					  <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">3Y</span>
                      </td>
					   <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">External</span>
                      </td>
					  <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-primary">2022-12-01</span>
                      </td>
					  <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-danger">2023-01-01</span>
                      </td>
					  <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-warning">2022-12-05</span>
                      </td>
					  <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">N/A</span>
                      </td>
					   <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">84%</span>
                      </td>
					  <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">49,000.00</span>
                      </td>
					  <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">3,000.00</span>
                      </td>
					  
					  <td>
					  <form action= "pm_logs.php">
					   <button type="submit" class="btn btn-primary" formtarget="_blank" >View</button>
					   <button type="button" class="btn btn-warning">Edit</button>
					   <button type="button" class="btn btn-danger">Obselete</button>
					  </form>
					  </td>
                    </tr>
                    <tr>        
					  <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">3Y</span>
                      </td>
					   <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">External</span>
                      </td>
					  <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-primary">2021-11-01</span>
                      </td>
					  <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-danger">2022-01-01</span>
                      </td>
					  <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-warning">2021-12-05</span>
                      </td>
					  <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">N/A</span>
                      </td>
					   <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">84%</span>
                      </td>
					  <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">40,000.00</span>
                      </td>
					  <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">1,600.00</span>
                      </td>
					  
					  <td>
					  <form action= "pm_logs.php">
					   <button type="submit" class="btn btn-primary" formtarget="_blank" >View</button>
					   <button type="button" class="btn btn-warning">Edit</button>
					   <button type="button" class="btn btn-danger">Obselete</button>
					  </form>
					  </td>
                    </tr>
                    
                   
                  </tbody>
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
 var minDate, maxDate;
 
// Custom filtering function which will search data in column four between two values
$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = minDate.val();
        var max = maxDate.val();
        var date = new Date( data[7] );
 
        if (
            ( min === null && max === null ) ||
            ( min === null && date <= max ) ||
            ( min <= date   && max === null ) ||
            ( min <= date   && date <= max )
        ) {
            return true;
        }
          $('#calibTable').DataTable();
    }
);
 
$(document).ready(function() {
    // Create date inputs
    minDate = new DateTime($('#min'), {
        format: 'MMMM DD YYYY'
    });
    maxDate = new DateTime($('#max'), {
        format: 'MMMM DD YYYY'
    });
 
    // DataTables initialisation
    var table = $('#calibTable').DataTable();
 
    // Refilter the table
    $('#min, #max').on('change', function () {
        table.draw();
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
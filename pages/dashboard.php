<?php
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
  <?php include 'head.php'; 
		include '../comp/dashboardModal.php';
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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Dashboard</h6>
        </nav>
        <?php include 'nav.php'; ?>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
     
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
		<input type="hidden" id="user_id" value="<?php echo $user_id ?>">
          <div class="card">
		  <a  type="button"  data-bs-toggle="modal" data-bs-target="#activeUsers">
            <div class="card-header p-3 pt-5">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons-round opacity-10">calendar_month</i>
              </div>
              <div class="text-end pt-1">
                <h1 class="text-sm mb-0 text-capitalize">Service Schedule</h1>
                <h1 class="mb-2" id="serviceSchedule">...</h1>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
             </a>
            </div>
          </div>
        </div>
		
           <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
		  <a  type="button"  data-bs-toggle="modal" data-bs-target="#newToolModal">
            <div class="card-header p-3 pt-5">
			
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-primary text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons-round opacity-10">design_services</i>
              </div>
              <div class="text-end pt-1">
                <h1 class="text-sm mb-0 text-capitalize">Service Call</h1>
                <h1 class="mb-2" id="serviceCall">...</h1>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              </a>
            </div>
          </div>
        </div>	
		 <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
		  <a  type="button"  data-bs-toggle="modal" data-bs-target="#scheduledModal">
            <div class="card-header p-3 pt-5">
			
              <div class="icon icon-lg icon-shape bg-gradient-warning shadow-primary text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons-round opacity-10">engineering</i>
              </div>
              <div class="text-end pt-1">
                <h1 class="text-sm mb-0 text-capitalize">PMS</h1>
                <h1 class="mb-2" id="pms">...</h1>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              </a>
            </div>
          </div>
        </div>
		<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
		  <a  type="button"  id="pendingSvBtn" data-bs-toggle="modal" data-bs-target="#pendingSv">
            <div class="card-header p-3 pt-5">
			
              <div class="icon icon-lg icon-shape bg-gradient-danger shadow-primary text-center border-radius-xl mt-n4 position-absolute">
               <i class="fa-solid fa-calendar-xmark opacity-10"></i>
              </div>
              <div class="text-end pt-1">
                <h1 class="text-sm mb-0 text-capitalize">Pending SV Call</h1>
                <h1 class="mb-2" id="pSvCall">...</h1>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">View</span></p></a>
            </div>
          </div>
        </div>
	<div class="container">
  <div class="row mt-2 justify-content-center">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <a type="button" id="pendingPmBtn" data-bs-toggle="modal" data-bs-target="#pendingPm">
          <div class="card-header p-3 pt-5">
            <div class="icon icon-lg icon-shape bg-gradient-danger shadow-primary text-center border-radius-xl mt-n4 position-absolute">
            <i class="fa-solid fa-calendar-xmark opacity-10"></i>
            </div>
            <div class="text-end pt-1">
              <h1 class="text-sm mb-0 text-capitalize">Pending PMS</h1>
              <h1 class="mb-2" id="pPms">...</h1>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">View</span></p>
          </div>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <a type="button" data-bs-toggle="modal" data-bs-target="#scheduledModal">
          <div class="card-header p-3 pt-5">
            <div class="icon icon-lg icon-shape bg-gradient-success shadow-primary text-center border-radius-xl mt-n4 position-absolute">
            <i class="material-icons-round opacity-10">event_available</i>
            </div>
            <div class="text-end pt-1">
              <h1 class="text-sm mb-0 text-capitalize">Resolved</h1>
              <h1 class="mb-2" id="resolved">...</h1>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">View</span></p>
          </div>
        </a>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <a type="button" data-bs-toggle="modal" data-bs-target="#scheduledModal">
          <div class="card-header p-3 pt-5">
            <div class="icon icon-lg icon-shape bg-gradient-info shadow-primary text-center border-radius-xl mt-n4 position-absolute">
              <i class="fa-solid fa-calendar opacity-10"></i>
            </div>
            <div class="text-end pt-1">
              <h1 class="text-sm mb-0 text-capitalize">Schedule for this Month</h1>
              <h1 class="mb-2" id="scheduleMonth">...</h1>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">View</span></p>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>

	
      </div>
	  <div class="row mt-4">
        <div class="col-lg-4 col-lg-6 mt-4 mb-4">
          <div class="card z-index-2  ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-primary shadow-success border-radius-lg py-3 pe-1">
			  <div class="chart">
                  <canvas id="chart-line" class="chart-canvas" height="230"></canvas>				  
                </div>
              </div>
            </div>
            <div class="card-body">
              <h6 class="mb-0 "> Calibration Grade </h6>
              <p class="text-sm "> <span class="font-weight-bolder"></span> </p>
              <hr class="dark horizontal">

            </div>
          </div>
        </div>
        <div class="col-lg-4 col-lg-6 mt-4 mb-3">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-success shadow-dark border-radius-lg py-3 pe-1">
                <div class="chart">
                  <canvas id="chart-line-ver" class="chart-canvas" height="230"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h6 class="mb-0 ">Verification Grade</h6>
               <p class="text-sm "> <span class="font-weight-bolder"></span> </p>
 			  <hr class="dark horizontal">

            </div>
          </div>
        </div>
        <div class="col-lg-4 col-lg-6 mt-4 mb-3">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-info shadow-dark border-radius-lg py-3 pe-1">
                <div class="chart">
                  <canvas id="donut-graph" class="chart-canvas" height="225"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h6 class="mb-0 ">Verification Grade</h6>
               <p class="text-sm "> <span class="font-weight-bolder"></span> </p>
 			  <hr class="dark horizontal">

            </div>
          </div>
        </div>
        <div class="col-lg-4 col-lg-6 mt-4 mb-3">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                <div class="chart">
                  <canvas id="bar-graph" class="chart-canvas" height="225"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h6 class="mb-0 ">Bar Grade</h6>
               <p class="text-sm "> <span class="font-weight-bolder"></span> </p>
 			  <hr class="dark horizontal">

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
    //Modals
    $(document).on('click', '#pendingSvBtn', function(){
      $.ajax({
        url: '../php/dboardProcess.php?action=pendingSvModal', // Pass the action as a query parameter
        method: 'GET',
        success: function (response){ 
              $('.pendSvTableContent').html(response);
              console.log(response);
              $('#pendSvTable').DataTable();
            
          
        }
      });
    });
    $(document).on('click', '#pendingPmBtn', function(){
      $.ajax({
        url: '../php/dboardProcess.php?action=pendingPmModal', // Pass the action as a query parameter
        method: 'GET',
        success: function (response){ 
          console.log(response);
              $('.pendPmTableContent').html(response);
             
              $('#pendPmTable').DataTable();
            
          
        }
      });
    });
	  setInterval(loadDashboard, 3000);
	  
	  function loadDashboard () {
		  
	  $.ajax({
		  url:'../php/dboardProcess.php',
		  method: 'GET',
		  data: {action:'dboardCards'},
		  success: function (response) {
        
			   let json = JSON.parse(response);
        console.log(json);
         $('#serviceSchedule').text(json.serviceSchedule);
			 $('#serviceCall').text(json.svCall);
			  $('#pms').text(json.pms);
			   $('#pPms').text(json.pendPms);
			   $('#pSvCall').text(json.pendSv);
			   $('#resolved').text(json.resolved);
         $('#scheduleMonth').text(json.schedule);
			 
		  }
	  });
	  }
  });
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Sales",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "rgba(255, 255, 255, .8)",
          data: [2000, 10500, 30000, 4500, 15000, 8000, 9000],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Jan","Feb","Mar","Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Calibration Grade",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: [100,100,70,80,50, 95, 100, 100, 70, 80, 40, 100],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });

    var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

    new Chart(ctx3, {
      type: "line",
      data: {
        labels: ["Jan","Feb","Mar","Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Verification Grade",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: [100,100,70,80,50, 95, 100, 100, 70, 80, 40, 100],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#f8f9fa',
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
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
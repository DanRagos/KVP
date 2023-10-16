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
        <a id="resolvedBtn" type="button" data-bs-toggle="modal" data-bs-target="#resolved">
          <div class="card-header p-3 pt-5">
            <div class="icon icon-lg icon-shape bg-gradient-success shadow-primary text-center border-radius-xl mt-n4 position-absolute">
            <i class="material-icons-round opacity-10">event_available</i>
            </div>
            <div class="text-end pt-1">
              <h1 class="text-sm mb-0 text-capitalize">Service Done</h1>
              <h1 class="mb-2" id="resolvedH1">...</h1>
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
        <a type="button" id="scheduleMonthBtn"data-bs-toggle="modal" data-bs-target="#scheduledMonthModal">
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
                  <canvas id="schedule-done-chart" class="chart-canvas" height="230"></canvas>				  
                </div>
              </div>
            </div>
            <div class="card-body">
              <h6 class="mb-0 ">Schedule Done </h6>
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
                  <canvas id="user-done-chart" class="chart-canvas" height="230"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h6 class="mb-0 ">Service By</h6>
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

    scheduleDoneChart();
    userScheduleDoneChart();
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
    $(document).on('click', '#resolvedBtn', function(){
      $.ajax({
        url: '../php/dboardProcess.php?action=resolvedModal', // Pass the action as a query parameter
        method: 'GET',
        success: function (response){ 
          console.log(response);
              $('.resolvedTableContent').html(response);
              $('#resolvedTable').DataTable();
        }
      });
    });
    $(document).on('click', '#scheduleMonthBtn', function(){
      $.ajax({
        url: '../php/dboardProcess.php?action=scheduleModalMonth', // Pass the action as a query parameter
        method: 'GET',
        success: function (response){ 
          console.log(response);
              $('.scheduleMonthTableContent').html(response);
              $('#scheduleMonthTable').DataTable()     
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
			   $('#resolvedH1').text(json.resolved);
         $('#scheduleMonth').text(json.schedule);
			 
		  }
	  });
	  }
  });

  function userScheduleDoneChart() {
    $.ajax({
      url: '../php/dboardProcess.php',
      method: 'GET',
      data: {
        action: 'getUserScheduleDoneChart'
      },
      success: function (response){
        console.log(response);
        data= JSON.parse(response);

        let labels = data.map((x)=>x.firstname.trim());
        let count = data.map((y)=>y.totalCount);
       var pieCtx = document.getElementById("user-done-chart").getContext("2d");
       if (window.userDone) {
        window.userDone.destroy();
       }
       var backgroundColors = generateRandomColor(count.length)
       window.userDone = new Chart(pieCtx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    data: count,
                    backgroundColor: backgroundColors
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
          legend: {
            display: true,
			labels: {
				color: 'white',
			}
          }
        },
                title: {
                    display: true,    
                    text: 'Customer Counts by Lastname'
                }
            }
        }); 
        function generateRandomColor(length) {
  var colors = [];
  for (var i = 0; i < length; i++) {
    var color = 'rgba(' + Math.floor(Math.random() * 256) + ', '
                        + Math.floor(Math.random() * 256) + ', '
                        + Math.floor(Math.random() * 256) + ', 0.8)';
    colors.push(color);
  }
  return colors;
}   
       
      }
    });
  }
  function scheduleDoneChart() {
    $.ajax({
      url: '../php/dboardProcess.php',
      method: 'GET',
      data: {
        action: 'getScheduleDoneChart'
      },
      success: function(response){
        console.log(response);
        data = JSON.parse(response);
      
        if (window.lineTask) {
window.lineTask.destroy();
}
        var ctx = document.getElementById("schedule-done-chart").getContext("2d");

   window.lineTask =  new Chart(ctx, {
      type: "line",
      data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct",
                        "Nov", "Dec"
                    ],
                    datasets: [{
                            label: "Preventive Maintenance",
                            tension: 0,
                            borderWidth: 0,
                            pointRadius: 5,
                            pointBackgroundColor: "rgba(255, 255, 255, .8)",
                            pointBorderColor: "transparent",
                            borderColor: "blue",
                            borderWidth: 4,
                            backgroundColor: "transparent",
                            fill: true,
                            data: data.pm,
                            maxBarThickness: 2

                        }, {
                            label: "Service Call",
                            tension: 0,
                            borderWidth: 0,
                            pointRadius: 5,
                            pointBackgroundColor: "rgba(255, 255, 255, .8)",
                            pointBorderColor: "transparent",
                            borderColor: "green",
                            borderWidth: 4,
                            backgroundColor: "transparent",
                            fill: true,
                            data: data.sv,
                            maxBarThickness: 2
                        }


                    ],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true,
                            labels: {
                                color: 'white',
                            }
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
      }
    });
  }
    


    

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
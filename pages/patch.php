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
          Schedule
      </title>
  </head>

  <body class="g-sidenav-show  bg-gray-200">
      <aside
          class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
          id="sidenav-main">
          <?php include 'aside.php'; ?>
      </aside>
      <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
          <!-- Navbar -->
          <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
              data-scroll="true">
              <div class="container-fluid py-1 px-3">
                  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                          <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark"
                                  href="javascript:;">Pages</a></li>
                          <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Schedule</li>
                      </ol>
                      <h6 class="font-weight-bolder mb-0">Calendar</h6>
                  </nav>
                  <?php include 'nav.php'; ?>
              </div>
          </nav>
          <!-- End Navbar -->
          <div class="container-fluid py-5 pb-0 pt-0">
              <div class="row">
                  <!-- Tabs navs -->

              </div>
              <div class="row">
                  <div class="col-md-12">
                      <div class="card my-4">
                          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                  <h6 class="text-white text-capitalize ps-3">Patch Notes 01.25.2025
                                   </h6>
                              </div>
                          </div>
                          <div class="card-body px-0 pb-2">           
                              <div class="mx-3">
                                    <h5>Dashboard Page</h5>
                                    <ul>
                                        <li>
                                        <h6>Service Schedule Card</h6>
                                        <p>
                                            Updated query: Count all COMPLETED schedules within the current YEAR, where the schedule date is also in the current year.  
                                            (Schedules delayed from previous years are excluded.) Remove schedules linked to a deleted contract.
                                        </p>
                                        </li>
                                        <li>
                                        <h6>Service Call Card</h6>
                                        <p>
                                            Updated query: Count all COMPLETED service calls within the current YEAR.  
                                            Service calls linked to a DELETED contract are EXCLUDED.
                                        </p>
                                        </li>
                                        <li>
                                        <h6>PMS Card</h6>
                                        <p>
                                            Updated query: Count all COMPLETED PMS within the current YEAR.  
                                            Deleted service calls linked to a DELETED contract are EXCLUDED.
                                        </p>
                                        </li>
                                        <li>
                                        <h6>Pending Service Call Card</h6>
                                        <p>
                                            Updated query: Service call schedules that are not marked as DONE from the first day of the current month are considered DELAYED.  
                                            Service calls linked to a DELETED contract are EXCLUDED.
                                        </p>
                                        </li>
                                        <li>
                                        <h6>Pending PMS Card</h6>
                                        <p>
                                            Updated query: PMS schedules that are not marked as DONE from the first day of the current month are considered DELAYED.  
                                            Service calls linked to a DELETED contract are EXCLUDED.
                                        </p>
                                        </li>
                                        <li>
                                        <h6>Service Done Card</h6>
                                        <p>
                                            Updated query: Count all schedules (both PMS and Service Call) where the actual service date is within the current YEAR.  
                                            Schedules from previous years where the actual service date falls within the current year are INCLUDED.  
                                            Schedules linked to a DELETED contract are EXCLUDED.
                                        </p>
                                        </li>
                                        <li>
                                        <h6>Schedule for This Month Card</h6>
                                        <p>
                                            Updated query: Count all schedules (both PMS and Service Call) that fall within the current MONTH.  
                                            Schedules linked to a DELETED contract are EXCLUDED.
                                        </p>
                                        </li>
                                    </ul>
                                    <h5>Clients Page</h5>
                                    <ul>
                                        <li> Additional Machine Types (2D ECHO, FLAT PANEL DETECTOR) </li>
                                    </ul>
                                    <h5>Calendar Page </h5>
                                    <ul>
                                        <li> Create emailing function. Add a choice if user wants to email the service report to the service coordinators. 
                                            ** This is just a testing. Can remove or modify later **. </li>
                                    </ul>
                                    <h5>Service Done Page</h5>
                                    <p>
                                            Updated query: Query all schedules (both PMS and Service Call) where the actual service date is within the current YEAR.  
                                            Schedules from previous years where the actual service date falls within the current year are INCLUDED.  
                                            Schedules linked to a DELETED contract are EXCLUDED.
                                        </p>
                                    </div>


                              
                              

                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </main>
      <!--   Core JS Files   -->
      <?php include 'scripts.php'; ?>
      
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
$(document).ready(function() {

});
  </script>
  </body>


  </html>
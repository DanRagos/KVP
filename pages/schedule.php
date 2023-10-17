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
                  <div class="col-lg-6 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                      <div class="nav-wrapper position-relative end-0">
                          <ul class="nav nav-pills nav-fill p-1" role="tablist" id="tabslist">
                              <li class="nav-item" id="liCalendar">
                                  <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href="javascript:;"
                                      role="tab" aria-selected="true">
                                      <i class="material-icons text-lg position-relative">home</i>
                                      <span class="ms-1">Calendar View</span>
                                  </a>
                              </li>
                              <li class="nav-item" id="liTable">
                                  <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;"
                                      role="tab" aria-selected="false">
                                      <i class="material-icons text-lg position-relative">event_available</i>
                                      <span class="ms-1">Table View</span>
                                  </a>
                              </li>

                          </ul>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12">
                      <div class="card my-4">
                          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                  <h6 class="text-white text-capitalize ps-3">Schedule for Year
                                      <?php 	echo date('Y');	?></h6>
                              </div>
                          </div>
                          <div class="card-body px-0 pb-2">
                              <!-- <div class="col-3 mx-3">
          <div class="input-group input-group-static mb-4">
     <label for="sl" class="ms-0">Select View</label>
     <select class="form-control" id="sl" name="view" >
       <option value=1 selected> Calendar View</option>
       <option value= 2> Table View</option>
     </select>
   </div>
</div> -->
                              <div class="d-flex flex-row ms-1 row-2 gap-1">
                                  <button type="button" class="btn btn-block bg-gradient-primary ms-3"
                                      data-bs-toggle="modal" data-bs-target="#addSchedule">
                                      <span><i class="fa fa-info-circle"></i></span>
                                      <span> Add Service Call (Client)</span>
                                  </button>
                                  <button type="button" class="btn btn-block bg-gradient-success  ml-3"
                                      data-bs-toggle="modal" data-bs-target="#addSvGModal">
                                      <span><i class="fa fa-info-circle"></i></span>
                                      <span> Add Service Call (Guest)</span>
                                  </button>
                              </div>
                              <div class="d-flex justify-content-center">

                                  <div id="spinner" class="spinner-border mt-4"
                                      style="width: 6rem; height: 6rem; display:none;" role="status">
                                      <span class="sr-only">Loading...</span>
                                  </div>
                                  <div id="calendar" style="width: 50%; height:50%;"> </div>
                                  <div class="table-responsive" id="schedTable" style="display:none;">
                                      <table id="tableCalendar" class="table align-items-center mb-0 table-striped"
                                          style="width:100%;">
                                          <thead>
                                              <tr>
                                                  <th
                                                      class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                                      Schedule Id</th>
                                                  <th
                                                      class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                                      Schedule Type</th>
                                                  <th
                                                      class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ">
                                                      Client</th>
                                                  <th
                                                      class="text-uppercase text-center  text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                      Machine</th>
                                                  <th
                                                      class="text-uppercase text-center  text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                      Schedule Date</th>
                                                  <th
                                                      class="text-uppercase text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                      Status</th>
                                                  <th
                                                      class="text-uppercase text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                      Reported Problem</th>
                                                  <th
                                                      class="text-uppercase text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                      Action</th>
                                              </tr>
                                          </thead>
                                      </table>
                                  </div>
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
      $(document).ready(function() {
          function isTableViewActive() {
              return $("#schedTable").is(":visible");
          }
          function isCalendarViewActive() {
              return $("#calendar").is(":visible");
          }

          showSchedules();
          $('#liCalendar').click(function() {
              $('#spinner').show();
              setTimeout(() => {
                  $('#spinner').hide();
                  $('#calendar').show();
                  $('#schedTable').hide();
                  showSchedules();
              }, 300)
          });
          $('#liTable').click(function() {
              $('#spinner').show();
              setTimeout(() => {
                  $('#spinner').hide();
                  $('#calendar').hide();
                  $('#schedTable').show();
                  if ($.fn.DataTable.isDataTable('#tableCalendar')) {
                      // Destroy the DataTable instance
                      $('#tableCalendar').DataTable().destroy();
                  }
                  displaySchedule();
              }, 300)
          });

          ///Table Schedule
          function displaySchedule() {
              if ($.fn.DataTable.isDataTable('#tableCalendar')) {
                  // Destroy the DataTable instance
                  $('#tableCalendar').DataTable().destroy();
              }

              let db = 10;
              var table = $('#tableCalendar').DataTable({
                  stateSave: true,
                  processing: true,
                  serverSide: true,
                  scrollY: '45vh',
                  scrollX: true,
                  ajax: {
                      url: '../php/ssp_list.php',
                      type: 'GET',
                      data: {
                          db: db,
                      },
                  },
                  columns: [{
                          data: 'schedule_id',
                          render: function(data, type, row) {
                              return '<div class="align-middle text-center text-sm">' +
                                  '<p class="text-sm font-weight-bold mb-0">' + row
                                  .schedule_id +
                                  '</p>' +
                                  '</div>';
                          }
                      },
                      {
                          data: 'schedule_type',
                          render: function(data, type, row) {
                              var type = data == 2 ? "SV" : "PMS"; // Use 'data' instead of '$d'
                              var color = data == 1 ? "primary" :
                                  "success"; // Use 'data' instead of '$row['schedule_type']'
                              return '<div class="align-middle text-center text-sm">' +
                                  '<span class="badge badge-sm bg-gradient-' + color + '">' +
                                  type + '</span>' +
                                  '</div>';
                          }
                      },
                      // Replace 'client_id' with the actual column name
                      {
                          data: 'client_name',
                          render: function(data, type, row) {
                              return '<div class="align-middle text-center text-sm">' +
                                  '<h6 class="mb-0 text-sm">' + row.client_name +
                                  '</h6>' +
                                  '<p class="text-xs text-secondary mb-0">' + row.address +
                                  '</p>' +
                                  '</div>';
                          }
                      },
                      {
                          data: 'model',
                          render: function(data, type, row) {
                              return '<div class="align-middle text-center text-sm">' +
                                  '<h6 class="mb-0 text-sm">' + row.brand + ' / ' + row.model +
                                  '</h6>' +
                                  '<p class="text-xs text-secondary mb-0">' + row.machine_name +
                                  '</p>' +
                                  '</div>';
                          }
                      },
                      {
                          data: 'schedule_date',
                          render: function(data, type, row) {
                              const schedule_date = new Date(row.schedule_date)
                                  .toLocaleDateString(
                                      'en-US', {
                                          month: 'short',
                                          day: 'numeric',
                                          year: 'numeric'
                                      });


                              return '<div class="align-middle text-center text-sm">' +
                                  '<p class="badge badge-sm bg-gradient-success">' +
                                  schedule_date + '</p>' +
                                  '</div>';
                          }
                      },
                      {
                          data: 'status',
                          render: function(data, type, row) {
                              const currentDate = new Date();
                              const currentYear = currentDate.getFullYear();
                              const currentMonth = currentDate.getMonth() + 1;
                              let partStatus = (row.status == 3) ? "Unresolved" : "Not Done";
                              let partColor = (row.status == 3) ? "warning" : "info";

                              const targetDate = row.schedule_date;
                              const [targetYear, targetMonth] = targetDate.split('-').map(
                                  Number);

                              // Compare the month and year
                              if (targetYear < currentYear || (targetYear === currentYear &&
                                      targetMonth < currentMonth)) {
                                  partStatus = "Delayed";
                                  partColor = "danger";
                              } else {
                                  console.log('Status: On track');
                              }
                              return '<div class="align-middle text-center text-sm">' +
                                  '<p class="badge badge-sm bg-gradient-' + partColor + '">' +
                                  partStatus + '</p>' +
                                  '</div>';
                          }
                      },
                      {
                          data: 'rep_problem',
                          render: function(data, type, row) {
                              return '<div class="align-middle text-center text-sm">' +
                                  '<p class="text-sm font-weight-bold mb-0">' + row
                                  .rep_problem +
                                  '</p>' +
                                  '</div>';
                          }
                      },

                      {
                          orderable: false,
                          data: 'schedule_id',
                          defaultContent: '',
                          render: function(data, type, row) {
                              return `
    <span data-bs-toggle="tooltip" data-bs-placement="top" title="Confirm Schedule">
        <button type="button" data-id="${row.schedule_id}" class="btn btn-secondary no_margin confirmSchedule">
            <i class="fa fa-check"></i>
        </button>
    </span>`;

                          },
                          width: "15px"
                      }, // Replace 'client_name' with the actual column name
                      // Define other data columns...
                  ]
              });

              $(document).on('click', '.confirmSchedule', function(e) {
                  let id = $(this).attr('data-id');
                  $.ajax({
                      url: "../php/process.php",
                      method: "POST",
                      data: {
                          action: 'show_sched_details',
                          id: id
                      },
                      success: function(data) {
                          console.log(id);
                          // Set the content of the modal with the AJAX request's response data
                          $("#schedule_details_modal .contents")
                              .html(data);
                      }
                  });
                  $("#schedule_details_modal").modal("show");

              });
          }

          // Calendar Schedule
          function showSchedules(initialDate) {
              $.ajax({
                  url: '../php/process.php',
                  method: 'post',
                  data: {
                      action: 'display_schedule'
                  },
                  success: function(response) {
                      var scheds = $.parseJSON(response);
                      var calendar;
                      var Calendar = FullCalendar.Calendar;
                      var events = [];
                      $(function() {
                          if (!!scheds) {
                              Object.keys(scheds).map(k => {
                                  var row = scheds[k]
                                  events.push({
                                      id: row.schedule_id,
                                      title: row.title,
                                      start: row.schedule_date,
                                      color: row.color
                                  });
                              })
                          }
                          var date = new Date()
                          var d = date.getDate(),
                              m = date.getMonth(),
                              y = date.getFullYear()

                          calendar = new Calendar(document.getElementById('calendar'), {
                              headerToolbar: {
                                  left: 'prev,next today',
                                  right: 'dayGridMonth,dayGridWeek,list',
                                  center: 'title',
                              },
                              selectable: true,
                              themeSystem: 'bootstrap',
                              initialDate: initialDate,
                              //Random default events
                              events: events,
                              eventClick: function(info) {
                                  var id = info.event.id;
                                  $.ajax({
                                      url: "../php/process.php",
                                      method: "POST",
                                      data: {
                                          action: 'show_sched_details',
                                          id: id
                                      },
                                      success: function(data) {
                                          console.log(id);
                                          // Set the content of the modal with the AJAX request's response data
                                          $("#schedule_details_modal .contents")
                                              .html(data);
                                      }
                                  });
                                  $("#schedule_details_modal").modal("show");
                              },
                              eventDidMount: function(info) {
                                  // Do Something after events mounted
                              },
                              editable: false
                          });
                          calendar.render();
                          // Form reset listener
                          $('#schedule-form').on('reset', function() {
                              $(this).find('input:hidden').val('')
                              $(this).find('input:visible').first().focus()
                          })


                      })
                  }
              });




          }

          // Event Handlers

          $(document).on('click', '#addSchedule', function() {
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
                          var fullName = item.firstname + ' ' + item.lastname;
                          return {
                              label: fullName,
                              value: item.mem_id
                          };
                      });
                      // Initialize Virtual Select with the fetched options
                      VirtualSelect.init({
                          ele: '.service_by_client',
                          options: optionsData,
                          multiple: true,
                      });
                  },
                  error: function(xhr, status, error) {
                      console.error('Error fetching options:', error);
                  }
              });
          });
          $(document).on('click', '#addSvGModal', function() {
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
                          var fullName = item.firstname + ' ' + item.lastname;
                          return {
                              label: fullName,
                              value: item.mem_id
                          };
                      });
                      // Initialize Virtual Select with the fetched options
                      VirtualSelect.init({
                          ele: '.service_by_svg',
                          options: optionsData,
                          multiple: true,
                      });
                  },
                  error: function(xhr, status, error) {
                      console.error('Error fetching options:', error);
                  }
              });
          });

          $("#pmsCheck").on('change', function(e) {
              if ($(this).is(':checked')) {
                  $('#client_id option:not(:selected)').prop('disabled', true);
                  $('#machine').prop('required', true);
                  $('#option2').hide();
                  $('#option2').removeAttr("required");
                  $('#option1').show();
                  $('#pmsCheck').val(1);
                  let client_id = $('#client_id').val();
                  $.ajax({
                      url: '../php/process.php',
                      method: 'POST',
                      data: {
                          client_id: client_id,
                          action: 'isClient'
                      },
                      success: function(response) {
                          $('#machine').html(response);
                          let contract_id1 = $('#machine').val();
                      }
                  });
              } else {
                  $('#client_id option:not(:selected)').prop('disabled', false);
                  $('#option2').show();
                  $('#option1').hide();
                  $('#add-sched-form')[0].reset();
                  $('#machine').prop('required', false);
                  //$('#pmsCheck').val(0);

              }
          });

          $('#machine').on('change', function() {
              var ctr = $(this).val();
              if (ctr) {
                  $.ajax({
                      url: '../php/process.php',
                      method: 'POST',
                      data: {
                          ctr: ctr
                      },
                      success: function(response) {
                          $('#sv_call').val(response);
                      }
                  });
              } else {
                  $('#city').html('<input placeholder="test">');
              }
          });



          $("body").on("click", "#updateBtn", function(e) {
              let sched_id = $(this).attr('data-id');

              var edit_id = $(this).attr('data-id');
              $.ajax({
                  url: '../php/process.php',
                  method: 'post',
                  data: {
                      sched_id: sched_id,
                      action: 'updateSchedule'
                  },
                  success: function(response) {
                      $("#confirm-sched-modal .update_contents").html(response);
                      $("#confirm-sched-modal").modal("show");
                      const arrayValue = JSON.parse(document.getElementById('serviceByDiv')
                          .dataset
                          .arrayValue);

                      $.ajax({
                          url: '../php/process.php',
                          method: 'GET',
                          data: {
                              action: 'getServiceBy'
                          },
                          dataType: 'json',
                          success: function(data) {
                              var optionsData = data.map((item) => {
                                  let fullname = item.firstname + ' ' +
                                      item.lastname

                                  return {
                                      label: fullname,
                                      value: item.mem_id
                                  }
                              })

                              VirtualSelect.init({
                                  ele: '.sample-select-update',
                                  options: optionsData,
                                  multiple: true,

                              });
                              document.querySelector('.sample-select-update')
                                  .setValue(arrayValue);

                          }
                      })
                  }
              });
          });

          //Resched
          $("body").on("click", ".reschedBtn", function(e) {
              let resched_id = $(this).attr('data-id');
              e.preventDefault();
              $.ajax({
                  url: '../php/process.php',
                  method: 'post',
                  data: {
                      resched_id: resched_id
                  },
                  success: function(response) {
                      $("#reschedModal .reschedContent").html(response);
                      $("#reschedModal").modal("show");
                  }
              });
          });


          $("#confirmBtn").click(function(e) {
              if ($("#add-sched-form")[0].checkValidity()) {
                  e.preventDefault();

                  // Create a new FormData object directly from the form
                  var formData = new FormData($("#add-sched-form")[0]);

                  // Append the action 'confirm_sched' to the FormData object
                  formData.append('action', 'confirm_sched');

                  // Send the AJAX request using $.ajax()
                  $.ajax({
                      url: '../php/process.php',
                      method: 'post',
                      data: formData,
                      processData: false, // Set processData to false when using FormData
                      contentType: false, // Set contentType to false when using FormData
                      success: function(response) {
                          console.log(response);
                          $("#addSchedule").modal('hide');
                          $("#add-sched-form")[0].reset();
                          $('#option2').show();
                          $('#option1').hide();
                          $('#client_id option:not(:selected)').prop('disabled', false);
                          Swal.fire({
                              icon: 'success',
                              title: 'Saved',
                              timer: 1500,
                              timerProgressBar: true,
                              didOpen: () => {
                                  Swal.showLoading();
                              },
                              willClose: () => {
                                  Swal.hideLoading();
                                  if (isTableViewActive()) {
                                      displaySchedule();
                                  } else {
                                      showSchedules();
                                  }
                              },
                          });
                      }
                  });
              }
          });

          $("#confirmG").click(function(e) {
              if ($("#add-sched-g-form")[0].checkValidity()) {
                  e.preventDefault();
                  let service_by1 = $('.service_by_svg').val();
                  $.ajax({
                      url: '../php/process.php',
                      method: 'post',
                      data: {
                          ...$("#add-sched-g-form").serializeArray(),
                          action: "confirm_g_sched",
                          service_by1: service_by1
                      },
                      success: function(response) {
                          console.log(response);
                          $("#addSvGModal").modal('hide');
                          $("#add-sched-g-form")[0].reset();
                          Swal.fire({
                              icon: 'success',
                              title: 'Saved',
                              timer: 1500,
                              timerProgressBar: true,
                              didOpen: () => {
                                  Swal.showLoading();
                              },
                              willClose: () => {
                                  Swal.hideLoading();
                                  if (isTableViewActive()) {
                                      displaySchedule();
                                  } else {
                                      showSchedules();
                                  }
                              },
                          });
                      }
                  });
              }
          });


          $(document).on("click", '#c_confirmBtn', function(e) {
            
              let service_by = $('.sample-select').val();
              if ($("#confirm_form")[0].checkValidity()) {
                  e.preventDefault();
                  var formData = new FormData($("#confirm_form")[0]);
                  formData.append('action', 'update_sched');
                  $.ajax({
                      url: '../php/process.php',
                      method: 'post',
                      data: formData,
                      contentType: false,
                      processData: false,
                      success: function(response) {
                          console.log(response);
                          Swal.fire({
                              icon: 'success',
                              title: 'Saved',
                              timer: 1500,
                              timerProgressBar: true,
                              didOpen: () => {
                                  Swal.showLoading();
                              },
                              willClose: () => {
                                  Swal.hideLoading();
                                  if (isTableViewActive()) {
                                      displaySchedule();
                                  } else {
                                      showSchedules();
                                  }
                              },
                          });

                          // Check which view is active and execute the appropriate function


                          $("#confirm-sched-modal").modal('hide');
                          $("#confirm_form")[0].reset();
                      }
                  });
              }
          });




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
$(document).ready(function() {

});
  </script>
  </body>


  </html>
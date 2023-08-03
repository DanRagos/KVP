<?php
require_once '../php/session.php';
include '../comp/schedule_modal.php';
include '../comp/static_modal.php';
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
<title>Masterlist</title>
 <?php include 'head.php'; ?>
 <style>
  
  .viewMore:hover {
    cursor: pointer;
  }
</style>
</head>

<body class="g-sidenav-show bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
  <?php include 'aside.php'; ?>
  </aside>
  <div class="main-content position-relative max-height-vh-100 h-100">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Profile</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Profile</h6>
        </nav>
        <?php include 'nav.php'; ?>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid ">
      <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <span class="mask  bg-gradient-primary  opacity-6"></span>
      </div>
      <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4 mb-2">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="../assets/img/bruce-mars.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
                <?php echo $firstname.' '. $lastname; ?>
              </h5>
              <p class="mb-0 font-weight-normal text-sm text-uppercase">
                <?php echo $type; ?>
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
              <ul class="nav nav-pills nav-fill p-1" role="tablist" id="tabslist">
                <li class="nav-item" id="homeTab">
                  <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                    <i class="material-icons text-lg position-relative">home</i>
                    <span class="ms-1">Home</span>
                  </a>
                </li>
                <li class="nav-item" id="scheduleTab">
                  <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                    <i class="material-icons text-lg position-relative">settings</i>
                    <span class="ms-1">Schedule</span>
                  </a>
                </li>
                <li class="nav-item" id="settingTab">
                  <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                    <i class="material-icons text-lg position-relative">settings</i>
                    <span class="ms-1">Settings</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row" id="homeContent">
          <div class="row">
          <div class="col-12 col-xl-3">
              <div class="card card-plain h-100">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-md-8 d-flex align-items-center">
                      <h6 class="mb-0">Profile Information</h6>
                    </div>
                
                  </div>
                </div>
                <div class="card-body p-3">
                 
                  <hr class="horizontal gray-light my-2">
                  <ul class="list-group">
                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full Name:</strong> &nbsp; <?php echo $firstname.' '.$lastname;?></li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Username:</strong> &nbsp; <?php echo $username;?></li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; <?php echo $email; ?></li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Location:</strong> &nbsp; Philippines</li>
                    <li class="list-group-item border-0 ps-0 pb-0">
                      <strong class="text-dark text-sm">Social:</strong> &nbsp;
                      <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                        <i class="fab fa-facebook fa-lg"></i>
                      </a>
                      <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                        <i class="fab fa-twitter fa-lg"></i>
                      </a>
                      <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                        <i class="fab fa-instagram fa-lg"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-4">
              <div class="card card-plain h-100">
                <div class="card-header pb-0 p-3">
                  <h6 class="mb-0">Platform Settings</h6>
                </div>
               
                    <div class="card z-index-2 ">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                <div class="chart">
                                    <canvas id="line-graph" class="chart-canvas" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h6 class="mb-0 ">Serviced Done</h6>
                          
                            <hr class="dark horizontal">
                            <div class="d-flex ">
                                
                            </div>
                        </div>
                    </div>
                
              </div>
            </div>
           
            <div class="col-12 col-xl-4">
              <div class="card card-plain h-100">
                <div class="card-header pb-0 p-3">
                  <h6 class="mb-0">Notifications</h6>
                </div>
                <div class="card-body p-3 scrollable-container">   
                 <ul class="list-group notifContent" >
                </ul>
                </div>
              </div>
            </div>
         
          </div>
        </div>
        <div class="row" id="scheduleContent" style="display:none;">
          <div class="row">
        <div class="col-6 d-flex justify-content-center align-items-center">
          <div id="calendar"style="width: 100%; height:100%;" >  </div>
</div>  
<div class="col-6">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Service Done</h6>
              </div>
			
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
              <table id="user_task" class="table align-items-center justify-content-center table-responsive" style="max-width:300px;max-height:300px;" >
        <thead>
            <tr>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
					  <th class="text-center text-uppercase text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Client Name</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Reported Problem</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">PMS/SV Date</th>
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
        <div class="row" id="settingContent" style="display:none;">
          <div class="row">
            <div class="col-12 col-xl-4">
              <div class="card card-plain h-100">
                <div class="card-header pb-0 p-3">
                  <h6 class="mb-0">Setting Settings</h6>
                </div>
                <div class="card-body p-3">
                  <h6 class="text-uppercase text-body text-xs font-weight-bolder">Account</h6>
                  <ul class="list-group">
                    <li class="list-group-item border-0 px-0">
                      <div class="form-check form-switch ps-0">
                        <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault" checked>
                        <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault">Email me when someone follows me</label>
                      </div>
                    </li>
                    <li class="list-group-item border-0 px-0">
                      <div class="form-check form-switch ps-0">
                        <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault1">
                        <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault1">Email me when someone answers on my post</label>
                      </div>
                    </li>
                    <li class="list-group-item border-0 px-0">
                      <div class="form-check form-switch ps-0">
                        <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault2" checked>
                        <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault2">Email me when someone mentions me</label>
                      </div>
                    </li>
                  </ul>
                  <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-4">Application</h6>
                  <ul class="list-group">
                    <li class="list-group-item border-0 px-0">
                      <div class="form-check form-switch ps-0">
                        <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault3">
                        <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault3">New launches and projects</label>
                      </div>
                    </li>
                    <li class="list-group-item border-0 px-0">
                      <div class="form-check form-switch ps-0">
                        <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault4" checked>
                        <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault4">Monthly product updates</label>
                      </div>
                    </li>
                    <li class="list-group-item border-0 px-0 pb-0">
                      <div class="form-check form-switch ps-0">
                        <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault5">
                        <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault5">Subscribe to newsletter</label>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-4">
              <div class="card card-plain h-100">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-md-8 d-flex align-items-center">
                      <h6 class="mb-0">Profile Information</h6>
                    </div>
                    <div class="col-md-4 text-end">
                      <a href="javascript:;">
                        <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="card-body p-3">
                  <p class="text-sm">
                    Hi, I’m Alec Thompson, Decisions: If you can’t decide, the answer is no. If two equally difficult paths, choose the one more painful in the short term (pain avoidance is creating an illusion of equality).
                  </p>
                  <hr class="horizontal gray-light my-4">
                  <ul class="list-group">
                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full Name:</strong> &nbsp; Alec M. Thompson</li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile:</strong> &nbsp; (44) 123 1234 123</li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; alecthompson@mail.com</li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Location:</strong> &nbsp; USA</li>
                    <li class="list-group-item border-0 ps-0 pb-0">
                      <strong class="text-dark text-sm">Social:</strong> &nbsp;
                      <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                        <i class="fab fa-facebook fa-lg"></i>
                      </a>
                      <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                        <i class="fab fa-twitter fa-lg"></i>
                      </a>
                      <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                        <i class="fab fa-instagram fa-lg"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-4">
              <div class="card card-plain h-100">
                <div class="card-header pb-0 p-3">
                  <h6 class="mb-0">Conversations</h6>
                </div>
                <div class="card-body p-3">
                  <ul class="list-group">
                    <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2 pt-0">
                      <div class="avatar me-3">
                        <img src="../assets/img/kal-visuals-square.jpg" alt="kal" class="border-radius-lg shadow">
                      </div>
                      <div class="d-flex align-items-start flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">Sophie B.</h6>
                        <p class="mb-0 text-xs">Hi! I need more information..</p>
                      </div>
                      <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto" href="javascript:;">Reply</a>
                    </li>
                    <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                      <div class="avatar me-3">
                        <img src="../assets/img/marie.jpg" alt="kal" class="border-radius-lg shadow">
                      </div>
                      <div class="d-flex align-items-start flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">Anne Marie</h6>
                        <p class="mb-0 text-xs">Awesome work, can you..</p>
                      </div>
                      <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto" href="javascript:;">Reply</a>
                    </li>
                    <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                      <div class="avatar me-3">
                        <img src="../assets/img/ivana-square.jpg" alt="kal" class="border-radius-lg shadow">
                      </div>
                      <div class="d-flex align-items-start flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">Ivanna</h6>
                        <p class="mb-0 text-xs">About files I can..</p>
                      </div>
                      <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto" href="javascript:;">Reply</a>
                    </li>
                    <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                      <div class="avatar me-3">
                        <img src="../assets/img/team-4.jpg" alt="kal" class="border-radius-lg shadow">
                      </div>
                      <div class="d-flex align-items-start flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">Peterson</h6>
                        <p class="mb-0 text-xs">Have a great afternoon..</p>
                      </div>
                      <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto" href="javascript:;">Reply</a>
                    </li>
                    <li class="list-group-item border-0 d-flex align-items-center px-0">
                      <div class="avatar me-3">
                        <img src="../assets/img/team-3.jpg" alt="kal" class="border-radius-lg shadow">
                      </div>
                      <div class="d-flex align-items-start flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">Nick Daniel</h6>
                        <p class="mb-0 text-xs">Hi! I need more information..</p>
                      </div>
                      <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto" href="javascript:;">Reply</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
         
          </div>
        </div>
      </div>
    </div>

  </div>

  <!--   Core JS Files   -->
 <?php include 'scripts.php';?>

 <script>
 $(document).ready(function(){
    var notifCount = 5;
    taskDone();

    getNotifications(notifCount);
  
    $('#homeTab').click(function(){
        $('#scheduleContent').hide();
        $('#settingContent').hide();
        $('#homeContent').show();
        getNotifications(notifCount);
    });
    $('#scheduleTab').click(function(){
        $('#scheduleContent').show();
        $('#settingContent').hide();
        $('#homeContent').hide();
        showSchedules();
        notifCount= 5;
    });
    $('#settingTab').click(function(){
        $('#scheduleContent').hide();
        $('#settingContent').show();
        $('#homeContent').hide();
    });

    //Ajax for Notification 
    function getNotifications(count) {
        let user_id = <?php echo $id; ?>;
       
    $.ajax({
        url:'../php/process.php',
        method: 'GET',
        data: {
            count:count,
            user_id:user_id,
            action:'getUserNotifications'
        },
        success: function(response){
            $('.notifContent').html(response);
            
        }
    });
}



$(document).on('click','.viewMore', function(){
    notifCount +=5;
    getNotifications(notifCount);
  
});

function taskDone() {
    var db = 2;
    let user_id = <?php echo $id; ?>;
		var table= $('#user_task').DataTable({
					 stateSave: true,
					 processing: true,
					 serverSide: true,
           
          
         
					ajax: {
					url: '../php/ssp_list.php',
					data: {db : db, user_id:user_id},
					method:'GET',
					},
					"order":[0,'asc'],					
				
					
    });
}

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
          if ($.fn.DataTable.isDataTable('#user_task')) {
  // If it exists, destroy the DataTable
  $('#user_task').DataTable().destroy();
}
         taskDone();
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

        $("body").on("click","#updateBtn", function(e) {
	let sched_id = $(this).attr('data-id');
	e.preventDefault();
	var edit_id = $(this).attr('data-id');
		$.ajax({
			url: '../php/process.php',
			method: 'post',
			data: {sched_id : sched_id,
			action:'updateSchedule'},
			success: function (response) {
			 $("#confirm-sched-modal .update_contents").html(response);
			 $("#confirm-sched-modal").modal("show");

			}
		});
	});

        
function showSchedules(initialDate) {
    let user_idNotif = <?php echo $id; ?>;
		$.ajax ({
			url: '../php/process.php',
			method: 'post',
			data: {user_idNotif:user_idNotif, action:'display_schedule'},
			success: function(response){
			var scheds = $.parseJSON(response);
			var calendar;
    var Calendar = FullCalendar.Calendar;
    var events = [];
    $(function() {
        if (!!scheds) {
            Object.keys(scheds).map(k => {
                var row = scheds[k]
                events.push({ id: row.schedule_id, title: row.title, start: row.schedule_date, color: row.color});
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
        data: { action: 'show_sched_details',
		id: id },
        success: function(data) {
			console.log(id);
            // Set the content of the modal with the AJAX request's response data
            $("#schedule_details_modal .contents").html(data);
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

        // Edit Button
        $('#resched-12').click(function() {
            var id = $(this).attr('data-id')
            if (!!scheds[id]) {
                var _form = $('#schedule-form')
                console.log(String(scheds[id].start_datetime), String(scheds[id].start_datetime).replace(" ", "\\t"))
                _form.find('[name="id"]').val(id)
                _form.find('[name="start_date"]').val(scheds[id].start)
                _form.find('[name="description"]').val(scheds[id].description)
                _form.find('[name="start_datetime"]').val(String(scheds[id].start_datetime).replace(" ", "T"))
                _form.find('[name="end_datetime"]').val(String(scheds[id].end_datetime).replace(" ", "T"))
                $('#resched-modal').modal('hide')
                _form.find('[name="title"]').focus()
            } else {
                alert("Event is undefined");
            }
        })
        // Delete Button / Deleting an Event
        $('#delete').click(function() {
            var id = $(this).attr('data-id')
            if (!!scheds[id]) {
                var _conf = confirm("Are you sure to delete this scheduled event?");
                if (_conf === true) {
                    location.href = "./delete_schedule.php?id=" + id;
                }
            } else {
                alert("Event is undefined");
            }
        })
    })
			}
		});
	}
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
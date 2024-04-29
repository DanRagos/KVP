<?php
require_once '../php/session.php';

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
    <?php include 'head.php'; ?>
</head>

<body class="g-sidenav-show bg-gray-200 ">
    <!-- Modal -->


    <aside
        class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
        id="sidenav-main">
        <?php include 'aside.php'; ?>
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Masterlist</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Calibration Masterlist</h6>
                </nav>
                <?php include 'nav.php'; ?>
            </div>
        </nav>
        <div class="container-fluid px-2 px-ms-2">
            <div class="page-header min-height-300 border-radius-xl mt-4"
                style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
                <span class="mask  bg-gradient-primary  opacity-6"></span>
            </div>
            <div class="container-fluid py-4  mx-4 mx-md-2 mt-n7 p-3 m-2">
                <div class="row d-flex justify-content-center">
                    <div class="card col-3">
                        <div class="col-auto">
                            <div class="avatar avatar-xl position-relative mt-n3">
                                <img src="<?php echo $client_img; ?>" alt="profile_image"
                                    class="w-100 border-radius-lg shadow-sm">
                            </div>
                        </div>
                        <div class="bg-gradient-transparent col-auto my-auto">
                            <div class="h-100">
                                <h6 class="mb-1">
                                    <?php echo $firstname.' '.$lastname; ?>
                                </h6>
                                <p class="mb-0 font-weight-normal text-sm text-uppercase">
                                    <?php echo $type ; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="material-icons opacity-10">weekend</i>
                                </div>
                                <div class="text-end pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Schedule Rendered</p>
                                    <h4 class="mb-0" id="serviceSchedule">...</h4>
                                </div>
                            </div>
                            <hr class="dark horizontal my-2">
                            <div class="card-footer p-3">

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="material-icons opacity-10">person</i>
                                </div>
                                <div class="text-end pt-1">
                                    <p class="text-lg mb-0 text-capitalize">PMS Rendered</p>
                                    <h4 class="mb-0" id="pmsSched">...</h4>
                                </div>
                            </div>
                            <hr class="dark horizontal my-2">
                            <div class="card-footer p-3">

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-xl-0 ">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="material-icons opacity-10">person</i>
                                </div>
                                <div class="text-end pt-1">
                                    <p class="text-lg mb-0 text-capitalize">SV Rendered</p>
                                    <h4 class="mb-0" id="svSched">...</h4>
                                </div>
                            </div>
                            <hr class="dark horizontal my-2">
                            <div class="card-footer p-3">
                                <p class="mb-0"><span class="text-danger text-sm font-weight-bolder"></span>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
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
            <!-- <div class="row mt-4">
                <div class="col-lg-6 col-md-6 mt-4 mb-4">
                    <div class="card z-index-2 ">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                <div class="chart">
                                    <canvas id="donut-graph" class="chart-canvas" height="170"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h6 class="mb-0 ">Serviced By</h6>
                          
                            <hr class="dark horizontal">
                            <div class="d-flex ">
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 mt-4 mb-3">
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
                         
                            <hr class="dark horizontal">
                            <div class="d-flex ">
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- <div class="row">
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
            </div> -->
            <!-- <div class="row">
                <div class="col">
                    <div class="card my-4 card ">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Completed Contract</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive table-sm" id="expired-table">
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

        </div>

    </main>

    <?php include 'scripts.php' ?>
    <script>
$(document).ready(function(){
    var notifCount = 5;
  
  
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
            $('.notifContent').append(response);
            $('#notifTable').DataTable({ 
				 "order": [],
				 
				   scrollY: '45vh',
				   scrollX: true,
				
				 
    });
        }
    });
}
$(document).on('click','.viewMore', function(){
    notifCount +=5;
    getNotifications(notifCount);
  
});

function showSchedules(initialDate) {
		$.ajax ({
			url: '../php/process.php',
			method: 'post',
			data: {action:'display_schedule'},
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
    <script src="../assets/js/material-dashboard.min.js?v=3.0.4"></script>
</body>

</html>
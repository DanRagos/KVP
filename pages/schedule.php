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
    <div class="container-fluid py-5 pb-0 pt-0">
       <div class="row">	
        <div class="col-md-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Schedule for Year <?php 	echo date('Y');	?></h6>
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
           
                            <button type="button" class="btn btn-block bg-gradient-primary ms-3" data-bs-toggle="modal" data-bs-target="#addSchedule">
							<span><i class="fa fa-info-circle"></i></span>
                            <span> Add Service Call (Client)</span>
                            </button>
							 <button type="button" class="btn btn-block bg-gradient-success  ml-3" data-bs-toggle="modal" data-bs-target="#addSvGModal">
							<span><i class="fa fa-info-circle"></i></span>
                            <span> Add Service Call (Guest)</span>
                            </button>	 
                </div>
             <center> <div id="calendar" style="width: 50%; height:50%;" > </center> </div>
			    <div class="table-responsive" id="schedTable" style="display:none";>
              <p class="text-center lead mt-5"> Please Wait.. </p>
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
$(document).ready(function(){
	displaySchedule();
	showSchedules();
	$(document).on('click', '#addSchedule', function (){
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
$(document).on('click', '#addSvGModal', function (){
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

	 $("#pmsCheck").on('change',function(e){
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
				method : 'POST',
				data: {client_id : client_id,
                action:'isClient'},
				success: function (response){	
				$('#machine').html(response);
				let contract_id1= $('#machine').val();
				}
			});
		   }
		   else {
			    $('#client_id option:not(:selected)').prop('disabled', false);
				$('#option2').show();
				$('#option1').hide();
				$('#add-sched-form')[0].reset();
				$('#machine').prop('required', false);
				//$('#pmsCheck').val(0);
		
		   }
        });
		
		 $('#machine').on('change', function(){
        var ctr = $(this).val();
        if(ctr){
            $.ajax({
                url: '../php/process.php',
				method : 'POST',
				data: {ctr : ctr},
                success:function(response){
                    $('#sv_call').val(response);		
                }
            }); 
        }else{
            $('#city').html('<input placeholder="test">'); 
        }
    });
	//Resched Schedule
	
			$('#resched-btn1').click(function(e) { 
			e.preventDefault();
			$.ajax({
				url: '../php/process.php',
				method : 'POST',
				data: $("#resched-form1").serialize()+ '&action=resched',
				success: function (response){
						swal("Rescheduled", "", "success");
							$("#resched-form1")[0].reset();
							$("#reschedModalTable").modal('hide');
							displaySchedule();			 
				}
			});
		});
	//Display All Schedule Table View
		function displaySchedule() {
		$.ajax({
			url:'../php/process.php',
			method: 'POST',
			data: {action:'display_table_sched'},
		success: function(response){
			$("#schedTable").html(response);
			let table = $('#table').DataTable({
			stateSave:true,
    });
		}
		});
	}
	//Resched
		$("body").on("click",".reschedBtn", function(e) {
	let resched_id = $(this).attr('data-id');
	e.preventDefault();
		$.ajax({
			url: '../php/process.php',
			method: 'post',
			data: {resched_id : resched_id},
			success: function (response) {
			 $("#reschedModal .reschedContent").html(response);
			 $("#reschedModal").modal("show");			 
			}
		});
	});
		//Confirm Resched
		$("body").on("click","#reschedConfirm", function(e) {
	let resched_cId = $(this).attr('data-id');
	e.preventDefault();
		$.ajax({
			url: '../php/process.php',
			method: 'post',
			data: $("#resched_form").serialize()+"&action=confirm_resched",
			success: function (response) {
				var formattedDate = new Date(response).toISOString().substring(0, 10);
                Swal.fire({
            icon: 'success',
            title: 'Rescheduled',
            text: '.', // Add a custom success message here if needed
            timer: 1500,
            timerProgressBar: true,
            didOpen: () => {
              Swal.showLoading();
            },
            willClose: () => {
              Swal.hideLoading();
            },
          });
							$("#add-sched-form")[0].reset();
							$("#reschedModal").modal('hide');	
						showSchedules(formattedDate);	
				
			}
		});
	});
	// Confirm Schedule
	$("body").on("click","#updateBtn", function(e) {
	let sched_id = $(this).attr('data-id');
	
	var edit_id = $(this).attr('data-id');
		$.ajax({
			url: '../php/process.php',
			method: 'post',
			data: {sched_id : sched_id,
			action:'updateSchedule'},
			success: function (response) {
			 $("#confirm-sched-modal .update_contents").html(response);
			 $("#confirm-sched-modal").modal("show");
             const arrayValue = JSON.parse(document.getElementById('serviceByDiv').dataset
                        .arrayValue);
                       
            $.ajax({
                url:'../php/process.php',
                method: 'GET',
                data: {
                    action:'getServiceBy'
                },
                dataType: 'json',
                success: function (data){
                    var optionsData = data.map((item)=>{
                        let fullname = item.firstname + ' ' +  item.lastname

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
                  document.querySelector('.sample-select-update').setValue(arrayValue);
                 
                }
            })
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
                        showSchedules();
                    },
                });
            }
        });
    }
});
	
$("#confirmG").click(function (e) {
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
            success: function (response) {
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
                        showSchedules();
                    },
                });
            }
        });
    }
});
		
		$("body").on("click","#c_confirmBtn", function(e) {
        let service_by =$('.sample-select').val();
		if ($("#confirm_form")[0].checkValidity()) {
			e.preventDefault();
    var formData = new FormData($("#confirm_form")[0]);
    formData.append('action', 'update_sched');
			$.ajax({
				url:'../php/process.php',
				method: 'post',
                data: formData,
                contentType: false,
                    processData: false,
				success:function(response){
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
                        showSchedules();
                    },
                });
					$("#confirm-sched-modal").modal('hide');
					$("#confirm_form")[0].reset();
					showSchedules();
					}
			});
		} 
	});	
	//Cancel Service Call
		$("body").on("click",".cancelSv", function(e){
		e.preventDefault();
		del_id = $(this).attr('data-id');
		swal({
			title: "Are you sure?",
			text: "This will cancel this schedule",
			icon: "warning",
			buttons: true,
			dangerMode: true,
			})
			.then((willDelete) => {
			if (willDelete) {
			$.ajax({
				url: '../php/process.php',
				method: 'post',
				data: {del_id : del_id},
				success: function(response){
					swal("Schedule Cancelled", {
					icon: "success",
			});
			$("#schedule_details_modal").modal('hide');
				showSchedules();
				}
			});	
			}
			});
	});
	//Calendar show Schedule function
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
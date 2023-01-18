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
			<div class="d-flex flex-row ms-1 row-2 gap-1">
                 <!--<div class="input-group input-group-static mb-4">
     <label for="sl" class="ms-0">Select View</label>
     <select class="form-control" id="sl" name="view" >
       <option value=1 selected> Calendar View</option>
       <option value= 2> Table View</option>
     </select>
   </div>-->

                            <button type="button" class="btn btn-block bg-gradient-primary ms-3" data-bs-toggle="modal" data-bs-target="#addScheduleModal">
							<span><i class="fa fa-info-circle"></i></span>
                            <span> Add Service Call (Client)</span>
                            </button>
							 <button type="button" class="btn btn-block bg-gradient-success  ml-3" data-bs-toggle="modal" data-bs-target="#addSchedule">
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
	 $("#pmsCheck").on('change',function(e){
		   if ($(this).is(':checked')) {
			  $('#client_id option:not(:selected)').prop('disabled', true);
				$('#option2').hide();
				$('#option1').show();
				let user_id = $('#client_id').val();
			
				$.ajax({
				url: '../php/process.php',
				method : 'POST',
				data: {user_id : user_id},
				success: function (response){
				$('#machine').html(response);
				
				}
			});
		   }
		   else {
			    $('#client_id option:not(:selected)').prop('disabled', false);
				$('#option2').show();
				$('#option1').hide();
			
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
					console.log(ctr);
                }
            }); 
        }else{
            $('#city').html('<input placeholder="test">'); 
        }
    });
		
		
			  $('select[name="view"]').on('change',function(){
   if($(this).val()==1)
   {
    	$('#schedTable').hide();
        $('#calendar').show();
   }
   else 
   {
		$('#schedTable').show();
        $('#calendar').hide();
   }
});
/*--------------------------------------------------------------------------------------------------------*/
//Add service Call
$("#addScheduleBtn").click(function(e){
		if ($("#add-sched-form")[0].checkValidity()) {
			e.preventDefault();
			$.ajax({
				url:'../php/process.php',
				method: 'post',
				data: $("#add-sched-form").serialize()+"&action=add_sv",
				success:function(response){
					console.log(response);
					$("#add-sched-form")[0].reset();
					swal("Schedule Done!", "", "success");
					$("#addScheduleModal").modal('hide');				
					displaySchedule();
					showSchedules();
					}
			});
		} 
	});
	//Resched Schedule
		$('#resched-btn').click(function(e) { 
			e.preventDefault();
			$.ajax({
				url: '../php/process.php',
				method : 'POST',
				data: $("#resched-form").serialize()+ '&action=resched',
				success: function (response){
					swal("Rescheduled", "", "success");
							$("#resched-form")[0].reset();
							$("#resched-modal").modal('hide');
							 showSchedules(response);			 
				}
			});
		});
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
	//View All Schedule Details
	$("body").on("click",".reschedBtn", function(e) {
		
		e.preventDefault();
		var sched_id = $(this).attr('id');
		$.ajax({
			url: '../php/process.php',
			method: 'post',
			data: {sched_id : sched_id},
			success: function (response) {
				data = JSON.parse(response);
				$("#tbl_id").val(data.id);
				$("#start_d").val(data.start_date);
				$("#last_d").val(data.deadline_date);
			}
		});
	});
	//Schedule Modal
		$("body").on("click",".schedBtn", function(e) {
		e.preventDefault();
		var edit_id = $(this).attr('data-id');
		$.ajax({
			url: '../php/process.php',
			method: 'post',
			data: {edit_id : edit_id},
			success: function (response) {
				data = JSON.parse(response);
				console.log(data);
				$("#tool_id").val(data.id);
				$("#sched_id").val(data.sched_id);
				$("#start_da").val(data.start_date);
				$("#deadline_da").val(data.deadline_date);
				$("#inter_date").val(data.interval_date);
				$("#sched_title").text('Confirm schedule for '+data.name);	
			}
		});
	});
	//
	$("#confirmBtn1").click(function(e){
		if ($("#confirm-sched-form")[0].checkValidity()) {
			e.preventDefault();
			$.ajax({
				url:'../php/process.php',
				method: 'post',
				data: $("#confirm-sched-form").serialize()+"&action=confirm_sched",
				success:function(response){
					console.log(response);
					swal("Schedule Done!", "", "success");
					$("#confirm-sched-form")[0].reset();
					$("#confirmSchedModal").modal('hide');
					displaySchedule();
					showSchedules();
					}
			});
		} 
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
                events.push({ id: row.schedule_id, title: row.client_name, start: row.schedule_date, color: row.color });
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
                var _details = $('#event-details-modal')
				var _details1 = $('#resched-modal')
				var _details2 = $('#confirmSchedModal')
                var id = info.event.id
                if (!!scheds[id]) {
                    _details.find('#title').text(scheds[id].client_name)
                    _details.find('#description').text(scheds[id].brand+' '+scheds[id].model)
					_details.find('#address').text(scheds[id].client_address)
                    _details.find('#start').text(scheds[id].schedule_date)
					_details.find('#stats').text(scheds[id].status)
					_details.find('#end').text(scheds[id].deadline_date)
					_details1.find('#id').val(scheds[id].id)
                    _details1.find('#description').text(scheds[id].model)
                    _details1.find('#start').val(scheds[id].start_date)
                    _details1.find('#end').val(scheds[id].deadline_date)
                    _details.find('#edit','#resched','#delete').attr('data-id', id)
					_details2.find('#sched_title').text('Confirm schedule for '+scheds[id].name)
					_details2.find('#tool_id').val(id)
					_details2.find('#sched_id').val(scheds[id].sched_id)
					_details2.find('#start_da').val(scheds[id].start_date)
					_details2.find('#deadline_da').val(scheds[id].deadline_date)
					_details2.find('#inter_date').val(scheds[id].interval_date)
                    _details.modal('show')
				
                } else {
                    alert("Event is undefined");
                }
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
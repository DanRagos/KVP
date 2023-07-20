<?php
require_once '../php/session.php';
include 'head.php';
require_once '../comp/static_modal.php';
$client_id = $_GET['client_id'];
$row = $client ->edit_clients($client_id);
$client_name = $row['client_name'];
$client_address =$row['client_address'];
$client_img =$row['imglink'];
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
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add PM</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-2 ms-auto">
                            <div class="input-group input-group-outline col-2 is-filled">
                                <label class="form-label">PMS # :</label>
                                <input type="text" name="pms_no" class="form-control" id="pms_no" readonly>
                                <input type="hidden" name="contract_id" id="pms_contract_id">
                                <input type="hidden"  id="last_pms">
                                <input type="hidden"  id="frequency">
                            </div>
                        </div>
                    </div>
                    <form id="pms-forms">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning editTest">Add PMS</button>
                    <button type="button" class="btn btn-primary addChanges">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editContractModal" tabindex="-1" aria-labelledby="editContractLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content editContractContent">

            </div>
        </div>
    </div>
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
            <div class="container-fluid py-4 card-body mx-4 mx-md-2 mt-n7 p-3 m-2">
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
                                    <?php echo $client_name; ?>
                                </h6>
                                <p class="mb-0 font-weight-normal text-sm">
                                    <?php echo $client_address ; ?>
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
                                    <p class="text-sm mb-0 text-capitalize">Service Schedule</p>
                                    <h4 class="mb-0" id="serviceSchedule">...</h4>
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-3">
                                <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than
                                    last week</p>
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
                                    <p class="text-sm mb-0 text-capitalize">PMS for this Month</p>
                                    <h4 class="mb-0" id="pmsSched">...</h4>
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-3">
                                <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>than
                                    last month</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="material-icons opacity-10">person</i>
                                </div>
                                <div class="text-end pt-1">
                                    <p class="text-sm mb-0 text-capitalize">SV for this Month</p>
                                    <h4 class="mb-0" id="svSched">...</h4>
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-3">
                                <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span> than
                                    yesterday</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-6 col-md-6 mt-4 mb-4">
                    <div class="card z-index-2 ">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                <div class="chart">
                                    <canvas id="pie-chart-tasks" class="chart-canvas" height="170"></canvas>
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
                            <div class="table-responsive table-sm" id="initial-table">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <?php include 'scripts.php' ?>
    <script>
    $(document).ready(function() {
    
        schedDone();
        displayContracts();

        function displayContracts() {
            let client_id = <?php echo $client_id; ?>;
            let isActive = 1;
            // Load initial table via AJAX
            $.ajax({
                url: '../php/process.php',
                type: 'GET',
                data: {
                    action: 'displayContracts',
                    client_id: client_id,
                    isActive : isActive
                },
                success: function(response) {
                    $('#initial-table').html(response);
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        }
        $(document).on('click', '.accordion-btn', function() {
            var btn = $(this);
            var accordionContent = btn.closest('.table-row').next('.accordion-content');
            console.log(accordionContent);
            if (!accordionContent.is(':visible')) {
                var rowData = btn.closest('.table-row').data(
                    'row'); // Retrieve data for the clicked row
                var dataId = btn.attr('data-id');
                $.ajax({
                    url: '../php/process.php',
                    type: 'GET',
                    data: {
                        dataId: dataId,
                        action: 'getAccordionContent'
                    },
                    success: function(response) {
                        var dropToggleIcon = btn.find('i');
                        dropToggleIcon.removeClass('fa-sort-down').addClass('fa-sort-up');
                        var table = $('.testTable').DataTable();
                        table.destroy();
                        accordionContent.find('.accordion-placeholder').html(response);
                        accordionContent.slideToggle('fade');

                        initTable();

                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            } else {
                var dropToggleIcon = btn.find('i');
                dropToggleIcon.removeClass('fa-sort-up').addClass('fa-sort-down');
                accordionContent.slideToggle('fade');
            }
        });

        $(document).on('click', '.viewContractReport', function() {
            let contract_id = $(this).attr('data-id');
            $.ajax({
                url: '../php/export_service.php',
                type: 'GET',
                data: {
                    action: "viewContracts",
                    contract_id: contract_id
                },
                xhrFields: {
                    responseType: 'blob' // Set the response type to 'blob' to handle binary data
                },
                success: function(response) {
                    var blob = new Blob([response], {
                        type: 'application/pdf'
                    });

                    // Create a temporary URL for the blob
                    var blobUrl = URL.createObjectURL(blob);

                    // Open the PDF in a new tab or window
                    window.open(blobUrl, '_blank');

                }
            });
        });

        $(document).on('click', '.viewContractPmReport', function() {
            let accomp_id = $(this).attr('data-id');
            $.ajax({
                url: '../php/export_service.php',
                type: 'GET',
                data: {
                    action: "viewContractPm",
                    accomp_id: accomp_id
                },
                xhrFields: {
                    responseType: 'blob' // Set the response type to 'blob' to handle binary data
                },
                success: function(response) {
                    var blob = new Blob([response], {
                        type: 'application/pdf'
                    });

                    // Create a temporary URL for the blob
                    var blobUrl = URL.createObjectURL(blob);

                    // Open the PDF in a new tab or window
                    window.open(blobUrl, '_blank');

                }
            });
        });

        function initTable() {
            $('.testTable').DataTable({});
        }
     
        $(document).on('click', '.editTest', function() {
         
            // Generate a unique name for the input field
            let contract_no = $('#pms_contract_id').val();
            let pm_no = $('#pms_no').val();
            let frequency = $('#frequency').val()
           
          
        var fieldName = 'inputField_' + Date.now(); // Example: inputField_1623286595761
        let last_sched = $('#last_pms').val();

            // Create the input field dynamically with the unique name
            var inputField = $('<input>').attr({
                type: 'text',
                name: fieldName
            });
            if (pm_no > 0) {
           
            var html = '<div class="row">' +
                '<div class="col">' +
                '<div class="input-group input-group-outline my-3 is-filled">' +
                '<label class="form-label">Schedule Date</label>' +
                '<input type="date" class="form-control" value="'+last_sched+ '" name="sched_date" max="<?php echo date('Y-m-d');?>" required>' +
                '</div>' +
                '</div>' +
                '<div class="col">' +
                '<div class="input-group input-group-outline my-3 is-filled">' +
                '<label class="form-label">Service Date</label>' +
                '<input type="date" class="form-control" value="<?php echo date('Y-m-d');?>" name="serv_date" required>' +
                '</div>' +
                '</div>' +
                '<div class="col">' +
                '<div class="input-group input-group-outline my-3 is-filled">' +
                '<label class="form-label">Problem:</label>' +
                '<input class="form-control" type="text" name="problem">' +
                '</div>' +
                '</div>' +
                '<div class="col">' +
                '<div class="input-group input-group-outline my-3 is-filled">' +
                '<label class="form-label">Diagnosis:</label>' +
                '<input class="form-control" type="text" name="diagnosis">' +
                '</div>' +
                '</div>' +
                '<div class="row">' +
                '<div class="col">' +
                '<div class="input-group input-group-outline my-3 is-filled">' +
                '<label class="form-label">Service Done</label>' +
                '<input type="text" class="form-control" name="service_done" required>' +
                '</div>' +
                '</div>' +
                '<div class="col">' +
                '<div class="input-group input-group-outline my-3 is-filled">' +
                '<label class="form-label">Recommendation</label>' +
                '<input type="text" class="form-control"  name="recomm"required>' +
                '</div>' +
                '</div>' +
                '<div class="col">' +
                '<div class="input-group input-group-outline my-3 is-filled">' +
                '<label class="form-label">Service By</label>' +
                '<input type="text" class="form-control"  name="service_by"  required>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<hr style="background-color:rgb(131 110 110 / 92%);">';
                let nextDate = new Date(last_sched);
                nextDate.setMonth(nextDate.getMonth() + 3);
                 last_sched = nextDate.toISOString().slice(0, 10);
            // Append the input field to the container element
            $('#pms-forms').append(html);
            pm_no -= 1;
            $('#pms_no').val(pm_no);
        $('#last_pms').val(last_sched);
            }
        });
       

        $(document).on('click', '.addChanges', function(){
  var modalBody = $(this).closest('.modal-content').find('.modal-body');

  // Collect form data from the specific modal-body
  var formDataArray = [];

  modalBody.find('.row').each(function() {
    var formData = {};
    $(this).find('input, select').each(function() {
      var fieldName = $(this).attr('name');
      var fieldValue = $(this).val();
      formData[fieldName] = fieldValue;
    });
    formDataArray.push(formData);
  });

  // Send the form data via AJAX
  
  swal.fire({
    title: 'Confirm changes',
    confirmButtonText: 'Save',
    showCancelButton:true,

  }).then((result) => {
      if (result.isConfirmed){
        $.ajax({
    url: '../php/process.php',
    type: 'POST',
    data: { formDataArray: JSON.stringify(formDataArray) },
    success: function(response) {
      // Handle the AJAX response
      $('#pms-forms').empty();
      $('#exampleModal').modal('hide')
      console.log(response);
      
      
      Swal.fire({
			 icon: 'success',
			 title: 'Saved',
			 timer : 1500,
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

});

        $(document).on('click', '.addPms', function() {
            let sv_no = $(this).attr('data-sv');
            $('#pms_no').val(sv_no)
            $('#pms_contract_id').val($(this).attr('data-id'));
         $('#frequency').val($(this).attr('data-frequency'));
            let contract_no = $(this).attr('data-id');
            $.ajax({
    url: '../php/process.php', // Replace 'process.php' with your actual PHP script filename
    method: 'get',
    data: { contract_no: contract_no, action: 'last_pm' },
    success: function(response) {
     
      let d = JSON.parse(response)
      $('#last_pms').val(d.schedule_date);
      
    }
   });
         
        });
        $(document).on('click', '.editContract', function() {
            let contract_id = $(this).attr('data-id');
            $.ajax({
                url: '../php/process.php',
                method: 'GET',
                data: {
                    contract_id: contract_id,
                    action: 'editContract'
                },
                success: function(response) {
                    $('.editContractContent').html(response);
                }

            });
        });
        $(document).on('click', '.delContract', function() {
            let contract_id = $(this).attr('data-id');
            $.ajax({
                url: '../php/process.php',
                method: 'GET',
                data: {
                    contract_id: contract_id,
                    action: 'del_Contract'
                },
                success: function(e) {
                    console.log(e);
                    Swal.fire({
                        title: 'Do you want to delete the contract?',
                        showDenyButton: true,
                        showCancelButton: true,
                        confirmButtonText: 'Confirm',
                        denyButtonText: 'Cancel',
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            Swal.fire('Deleted!', '', 'success')
                            displayContracts();
                        } else if (result.isDenied) {
                            Swal.fire('Changes are not saved', '', 'info')
                        }
                    })
                }
            });

        });

        function schedDone() {
            var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");
            var labels = [];
            var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

            new Chart(ctx3, {
                type: "line",
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct",
                        "Nov", "Dec"
                    ],
                    datasets: [{
                            label: "Schedule Accuracy",
                            tension: 0,
                            borderWidth: 0,
                            pointRadius: 5,
                            pointBackgroundColor: "rgba(255, 255, 255, .8)",
                            pointBorderColor: "transparent",
                            borderColor: "blue",
                            borderWidth: 4,
                            backgroundColor: "transparent",
                            fill: true,
                            data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                            maxBarThickness: 2

                        }, {
                            label: "Calibration Grade",
                            tension: 0,
                            borderWidth: 0,
                            pointRadius: 5,
                            pointBackgroundColor: "rgba(255, 255, 255, .8)",
                            pointBorderColor: "transparent",
                            borderColor: "green",
                            borderWidth: 4,
                            backgroundColor: "transparent",
                            fill: true,
                            data: [2, 34, 123, 220, 12, 14, 400, 230, 55, 412, 213],
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

        setInterval(viewSummaryDashboard, 3000);

        function viewSummaryDashboard() {
            let client_id = <?php echo $client_id; ?>;
            $.ajax({
                url: '../php/process.php',
                type: 'get',
                data: {
                    client_id: client_id,
                    action: 'viewSummaryDashboard'
                },
                success: function(response) {
                    let data = JSON.parse(response);
                    $('#serviceSchedule').text(data.serviceSched);
                    $('#pmsSched').text(data.pmSched);
                    $('#svSched').text(data.svSched);
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
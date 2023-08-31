<?php 
	require_once '../php/session.php';
	include 'head.php'; 
	require_once '../comp/client_modal.php';
  require_once '../comp/static_modal.php';
	include '../php/populate.php';

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
    <style>
    .no_margin {
        margin-bottom: 0rem;
        margin-top: 0rem;
    }
    </style>
</head>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
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
                            <input type="hidden" id="last_pms">
                            <input type="hidden" id="frequency">
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
<div class="modal fade" id="renewContractModal" tabindex="-1" aria-labelledby="renewContractLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content renewContractContent">

        </div>
    </div>
</div>

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
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Users Management</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Contract</h6>
                </nav>
                <?php include 'nav.php'; ?>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <!-- Tabs navs -->
                <div class="col-lg-6 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1" role="tablist" id="tabslist">
                            <li class="nav-item" id="liActive">
                                <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href="javascript:;"
                                    role="tab" aria-selected="true">
                                    <i class="material-icons text-lg position-relative">home</i>
                                    <span class="ms-1">Generate Report</span>
                                </a>
                            </li>
                            <li class="nav-item" id="liComplete">
                                <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab"
                                    aria-selected="false">
                                    <i class="material-icons text-lg position-relative">event_available</i>
                                    <span class="ms-1">Generated Reports</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-center">
                        <div id="spinner" class="spinner-border mt-4" style="width: 6rem; height: 6rem; display:none;"
                            role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
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
                    <div class="card my-4" id="tabActive">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Generate Report</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="d-flex flex-row ms-1 row-2 gap-1">

                                <button type="button" class="btn btn-block bg-gradient-primary ms-3"
                                    data-bs-toggle="modal" data-bs-target="#reportNewModal">
                                    <span><i class="fa fa-info-circle"></i></span>
                                    <span> New Database</span>
                                </button>
                                <button type="button" class="btn btn-block bg-gradient-success  ml-3"
                                    data-bs-toggle="modal" data-bs-target="#addSvGModal">
                                    <span><i class="fa fa-info-circle"></i></span>
                                    <span> Add Service Call (Guest)</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card my-4 card " id="tabComplete" style="display:none">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Completed Contract</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive">
                                <table id="completedContract" class="table align-items-center mb-0 table-striped"
                                    style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                                Hover</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                                Contract No.</th>
                                            <th
                                                class="text-uppercase  text-center text-secondary text-xxs font-weight-bolder opacity-7 ">
                                                Client</th>

                                            <th
                                                class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ">
                                                Machine</th>
                                            <th
                                                class="text-uppercase text-center  text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Turnover-Coverage</th>
                                            <th
                                                class="text-uppercase text-center  text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Parts Warranty / Status</th>
                                            <th
                                                class="text-uppercase text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Type</th>
                                            <th
                                                class="text-uppercase text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Completion</th>
                                            <th
                                                class="text-uppercase text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                No. of Sv Call</th>
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
    </main>

    <!--   Core JS Files   -->
    <?php include 'scripts.php' ?>
    <script>
    $(document).ready(function() {
       //Date Range Picker
$(function() {

$('input[name="datefilter"]').daterangepicker({
autoUpdateInput: false,
locale: {
cancelLabel: 'Clear'
}
});

$('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
});

$('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
$(this).val('');
});

$('input[name="partsWarranty"]').daterangepicker({
autoUpdateInput: false,
locale: {
cancelLabel: 'Clear'
}
});

$('input[name="partsWarranty"]').on('apply.daterangepicker', function(ev, picker) {
$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
});

$('input[name="partsWarranty"]').on('cancel.daterangepicker', function(ev, picker) {
$(this).val('');
});

});


        $('#liActive').click(function() {
            $('#spinner').show();
            setTimeout(() => {
                $('#spinner').hide();
                $('#tabActive').show();
                $('#tabComplete').hide();
                $('#tabService').hide();

              
            }, 300)
        });
        $('#liComplete').click(function() {
            $('#spinner').show();
            setTimeout(() => {
                $('#spinner').hide();
                $('#tabActive').hide();
                $('#tabComplete').show();
                $('#tabService').hide();
            
            }, 300)

        });
        $('#reportType').change(function() {
            let choice = $(this).val();
          if (choice == 1){
            $('#scheduleReport input, #scheduleReport select').prop('disabled', false);
            $('#contractReport input, #contractReport select').prop('disabled', true);
            $("#scheduleReport").show();
            $("#contractReport").hide();
            $("#serviceReport").hide();
          }
          else if (choice == 2){
            $('#scheduleReport input, #scheduleReport select').prop('disabled', true);
            $('#contractReport input, #contractReport select').prop('disabled', false);
            $("#scheduleReport").hide();
            $("#contractReport").show();
            $("#serviceReport").hide();
          }
          else if (choice == 3){
            $("#serviceReport").show();
            $("#contractReport").hide();
            $("#scheduleReport").hide();
          }
          else if (choice == 4){
            $("#serviceReport").show();
          }
        });

        $('#schedType').change(function() {
            let sched = $(this).val();
          if (sched == 1){
            $(".unresolved").hide();
          }
          else if (sched == 2){
            $(".unresolved").show();
           
          }
        });

        $('#scheduleStatus').change(function() {
            let schedS = $(this).val();
          if (schedS == 0 || schedS == 1){
            $("#servicedBy").hide();
            
           
          }
          else{
            $("#servicedBy").show();
           
          }
        });
            
        // Virtual Select for Service By
        $.ajax({
                        url: '../php/process.php',
                        method: 'GET',
                        data: {
                            'action': 'reportServiceClient'
                        },
                        dataType: 'json',
                        success: function(data) {
                            console.log(data);
                           

                            // Assuming the response data is an array of objects with label and value properties
                            var serviceBy = data.users.map(function(item) {
                                var fullName = item.firstname + ' ' +
                                    item.lastname;
                                return {
                                    label: fullName,
                                    value: item.mem_id
                                };
                            });

                            var clients = data.clients.map(function(item) {
                                var fullName = item.client_name;
                                return {
                                    label: fullName,
                                    value: item.client_id
                                };
                            });

                            // Initialize Virtual Select with the fetched options
                            VirtualSelect.init({
                                ele: '.sample-select',
                                options: serviceBy,
                                multiple: true,

                            });
                            VirtualSelect.init({
                                ele: '.sample-select1',
                                options: clients,
                                multiple: true,

                            });

                            document.querySelector('.sample-select').setValue(
                                arrayValue);

                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching options:', error);
                        }
                    });

     $(document).on('click','#report-confirm-btn', function (e){
        var formData = new FormData($("#report-form")[0]);
        formData.append('action', 'reportProcess');

        if ($('#reportType').val() == 1) {
            formData.append('selectInsideDiv', $('#scheduleReport select').val());
            formData.append('inputInsideDiv', $('#scheduleReport input').val());
        } else if ($('#selectOption').val() == 2) {
            formData.append('selectInsideDiv', $('#secondDiv select').val());
            formData.append('inputInsideDiv', $('#secondDiv input').val());
        }

       $.ajax({
        url: '../php/process.php',
        method: 'POST',
        data: formData,
        contentType: false,
      processData: false,
        success: function(e){
            console.log(e);
        }
       });
     }) ;              

      
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
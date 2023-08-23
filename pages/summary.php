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
                                    <p class="text-lg mb-0 text-capitalize">Service Schedule</p>
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
                                    <p class="text-lg mb-0 text-capitalize">PMS</p>
                                    <h4 class="mb-0" id="pmsSched">...</h4>
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
                                    class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="material-icons opacity-10">person</i>
                                </div>
                                <div class="text-end pt-1">
                                    <p class="text-lg mb-0 text-capitalize">SV</p>
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
            <div class="row mt-4">
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
            </div>
            <div class="row">
                <!-- Tabs navs -->
                <div class="col-lg-6 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
              <ul class="nav nav-pills nav-fill p-1" role="tablist" id="tabslist">
                <li class="nav-item" id="liActive">
                  <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                    <i class="material-icons text-lg position-relative">home</i>
                    <span class="ms-1">Active Contract</span>
                  </a>
                </li>
                <li class="nav-item" id="liComplete">
                  <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                    <i class="material-icons text-lg position-relative">event_available</i>
                    <span class="ms-1">Completed Contract</span>
                  </a>
                </li>
                <li class="nav-item" id="liService">
                  <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                    <i class="material-icons text-lg position-relative">settings</i>
                    <span class="ms-1">Service Call</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
            </div>
            <div class="row" >
                <div class="col">
                    <div class="card my-4 card " id="tabActive">

                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Active Contract</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">

                            <table id="example" class="table align-items-center mb-0 table-striped" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                            Hover</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                            Contract No.</th>
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
                    <div class="card my-4 card "  id="tabComplete" style="display:none">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Completed Contract</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive">
                                <table id="completedContract" class="table align-items-center mb-0 table-striped" style="width:100%;"
                                    >
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                                Hover</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                                Contract No.</th>
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

                    <div class="card my-4 card "  id="tabService" style="display:none">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Service Call</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive">
                                <table id="serviceCall" class="table align-items-center mb-0 table-striped" style="width:100%;"
                                    >
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                                Service No.</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                                Schedule No.</th>
                                            <th
                                                class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ">
                                                Machine</th>
                                            <th
                                                class="text-uppercase text-center  text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Schedule Date</th>
                                            <th
                                                class="text-uppercase text-center  text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Service Date</th>
                                            <th
                                                class="text-uppercase text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Diagnosis</th>
                                            <th
                                                class="text-uppercase text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Service Done</th>
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

    </main>

    <?php include 'scripts.php' ?>
    <script>
    $(document).ready(function() {
        //Display Handler
        $('#liActive').click(function(){
        $('#tabActive').show();
        $('#tabComplete').hide();
        $('#tabService').hide();

        if ($.fn.DataTable.isDataTable('#example')) {
    // Destroy the DataTable instance
    $('#example').DataTable().destroy();
        }
        activeContract();
     
    });
    $('#liComplete').click(function(){
        $('#tabActive').hide();
        $('#tabComplete').show();
        $('#tabService').hide();
        if ($.fn.DataTable.isDataTable('#completedContract')) {
    // Destroy the DataTable instance
    $('#completedContract').DataTable().destroy();
        }
        completedContract();
    });
    $('#liService').click(function(){
        $('#tabActive').hide();
        $('#tabComplete').hide();
        $('#tabService').show();
        if ($.fn.DataTable.isDataTable('#serviceCall')) {
    // Destroy the DataTable instance
    $('#serviceCall').DataTable().destroy();
        }
        serviceCall();
    });


        schedDone();
        activeContract();
      
        function activeContract() {
            let db = 5;
            let client_id = <?php echo $client_id;?>;
            var table = $('#example').DataTable({
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
                        client_id: client_id
                    },

                },
                columns: [{
                        className: 'details-control',
                        orderable: false,
                        data: 'clientId',
                        defaultContent: '',
                        render: function() {
                            return '<i class="fa fa-plus-square" aria-hidden="true"></i>';
                        },
                        width: "15px"
                    },
                    {
                        data: 'contractId',
                        render: function(data, type, row) {
                            return '<div class="align-middle text-center text-sm">' +
                                '<p class="text-sm font-weight-bold mb-0">' + row.contractId +
                                '</p>' +
                                '</div>';
                        }
                    },
                    // Replace 'client_id' with the actual column name
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
                        data: 'turnover',
                        render: function(data, type, row) {
                            const formattedTurnover = new Date(row.turnover).toLocaleDateString(
                                'en-US', {
                                    month: 'short',
                                    day: 'numeric',
                                    year: 'numeric'
                                });
                            const formattedCoverage = new Date(row.coverage).toLocaleDateString(
                                'en-US', {
                                    month: 'short',
                                    day: 'numeric',
                                    year: 'numeric'
                                });

                            return '<div class="align-middle text-center text-sm">' +
                                '<p class="badge badge-sm bg-gradient-success">' +
                                formattedTurnover + ' / ' + formattedCoverage + '</p>' +
                                '</div>';
                        }
                    },
                    {
                        data: 'pCoverage',
                        render: function(data, type, row) {
                            let tDate = new Date(row.pCoverage);
                            let currentDate = new Date();
                            let partStatus = (tDate < currentDate) ? "Expired" : "Active";
                            let partColor = (tDate < currentDate) ? "danger" : "success";
                            const formattedpTurnover = new Date(row.pTurn_over)
                                .toLocaleDateString('en-US', {
                                    month: 'short',
                                    day: 'numeric',
                                    year: 'numeric'
                                });
                            const formattedpCoverage = new Date(row.pCoverage)
                                .toLocaleDateString('en-US', {
                                    month: 'short',
                                    day: 'numeric',
                                    year: 'numeric'
                                });

                            return '<div class="align-middle text-center text-sm">' +
                                '<p class="badge badge-sm bg-gradient-primary">' +
                                formattedpTurnover + ' / ' + formattedpCoverage + '</p>' +
                                ' <p class="badge badge-sm bg-gradient-' + partColor + '">' +
                                partStatus + '</p>' +
                                '</div>';

                        }
                    },
                    {
                        data: 'status',
                        render: function(data, type, row) {
                            let strStatus = (row.status == 1) ? "Installation Warranty" :
                                "PMS Contract";
                            let strFre = (row.frequency == 1) ? "Quarterly" : ((row.frequency ==
                                2) ? "Semi-Annual" : "Annual")
                            return '<div class="align-middle text-center text-sm">' +
                                '<h6 class="mb-0 text-sm">' + strStatus + '</h6>' +
                                '<p class="text-xs text-secondary mb-0">' + strFre + '</p>' +
                                '</div>';
                        }
                    },
                    {
                        data: 'count',
                        render: function(data, type, row) {
                            let count = 100 - ((row.count / row.total) * 100);
                            return '<div class="align-middle text-center text-sm">' +
                                '<p class="text-sm font-weight-bold mb-0">' + count.toFixed(2) +
                                '%</p>' +
                                '</div>';
                        }
                    },
                    {
                        data: 'sv_call',
                        render: function(data, type, row) {
                            return '<div class="align-middle text-center text-sm">' +
                                '<p class="text-sm font-weight-bold mb-0">' + row.sv_call +
                                '</p>' +
                                '</div>';
                        }
                    },


                    {
                        orderable: false,
                        data: 'clientId',
                        defaultContent: '',
                        render: function(data, type, row) {
                            return `
    <span data-bs-toggle="tooltip" data-bs-placement="top" title="View Contract Report">
        <button type="button" data-id="${row.contract_id}" class="btn btn-secondary no_margin viewContractReport">
            <i class="fa fa-eye"></i>
        </button>
    </span>
    <span data-bs-toggle="tooltip" data-bs-placement="top" title="Add PMS">
        <button type="button" data-id="${row.contract_id}" data-bs-toggle="modal" data-bs-target="#exampleModal"
            data-sv="${row.count}" data-frequency="${row.frequency}" class="btn btn-primary no_margin addPms">
            <i class="fa fa-plus"></i>
        </button>
    </span>
    <span data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Contract">
        <button type="button" data-id="${row.contract_id}" data-bs-toggle="modal" data-bs-target="#editContractModal"
            class="btn btn-warning no_margin editContract">
            <i class="fa fa-edit"></i>
        </button>
    </span>
    <span data-bs-toggle="tooltip" data-bs-placement="top" title="Delete/Cancel Contract">
        <button type="button" data-id="${row.contract_id}" class="btn btn-danger no_margin delContract">
            <i class="fa fa-trash"></i>
        </button>
    </span>`;

                        },
                        width: "15px"
                    }, // Replace 'client_name' with the actual column name
                    // Define other data columns...
                ]
            });
            $('#example tbody').on('click', 'td.details-control', function() {
                var tr = $(this).closest('tr');
                var tdi = tr.find("i.fa");
                var row = table.row(tr);

                if (row.child.isShown()) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                    tdi.first().removeClass('fa-minus-square');
                    tdi.first().addClass('fa-plus-square');
                } else {
                    // Open this row
                    let datas = row.data()
                    $.ajax({
                        url: '../php/process.php?action=show_contract_acrdn',
                        method: 'GET',
                        data: datas,
                        success: function(e) {
                            row.child(e).show();
                            tr.addClass('shown');
                            tdi.first().removeClass('fa-plus-square');
                            tdi.first().addClass('fa-minus-square');
                            var table2 = $('#test-table').DataTable();

                            $(document).on('click', '.updatePm', function(e) {

                                if ($("#update_pm_form")[0].checkValidity()) {
                                    e.preventDefault();
                                    var formData = new FormData($(
                                        "#update_pm_form")[0]);
                                    formData.append('action', 'updatePms');
                                    $.ajax({
                                        url: '../php/process.php',
                                        method: 'post',
                                        data: formData,
                                        contentType: false,
                                        processData: false,
                                        success: function(response) {
                                            table2.ajax.reload();
                                            $("#update_pm_form")[0]
                                                .reset();
                                            $("#edit-pm-modal").modal(
                                                'hide');
                                            row.child.hide();
                                            tr.removeClass('shown');
                                            tdi.first().removeClass(
                                                'fa-minus-square');
                                            tdi.first().addClass(
                                                'fa-plus-square');
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'PMS Update',
                                                text: 'The PM details has been edited successfully.', // Add a custom success message here if needed
                                                timer: 1500,
                                                timerProgressBar: true,
                                                didOpen: () => {
                                                    Swal
                                                .showLoading();
                                                },
                                                willClose: () => {
                                                    Swal
                                                .hideLoading();
                                                },
                                            });


                                        }
                                    });
                                }
                            });
                        }
                    });

                }
            });
            $(document).on('click', '#edit-contract-btn', function() {
                let client_id = <?php echo $client_id; ?>;
                $.ajax({
                    url: '../php/process.php',
                    method: 'POST',
                    data: $('#edit-contract-form').serialize() + "&action=update_contract",
                    success: function(response) {

                        data = JSON.parse(response);
                        console.log(data);
                        if (data.status === 0) {
                            Swal.fire(
                                'Invalid',
                                data.message,
                                'error'
                            );
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Contract Updated',
                                text: 'Contract has been edited successfully.', // Add a custom success message here if needed
                                timer: 1500,
                                timerProgressBar: true,
                                didOpen: () => {
                                    Swal.showLoading();
                                },
                                willClose: () => {
                                    Swal.hideLoading();
                                    $('#editContractModal').modal('hide');
                                    table.ajax.reload();
                                },
                            });
                        }


                    }
                });

            });
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

                    var html = '<div class="row ">' +
                        '<div class="col">' +
                        '<div class="input-group input-group-outline my-3 is-filled">' +
                        '<label class="form-label">Schedule Date</label>' +
                        '<input type="date" class="form-control" value="' + last_sched +
                        '" name="sched_date" max="<?php echo date('Y-m-d');?>" readonly>' +
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
                        '<label class="form-label">Diagnosis:</label>' +
                        '<input class="form-control" type="text" name="diagnosis">' +
                        '</div>' +
                        '</div>' +
                        '<div class="row align-items-center">' +
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
                        ' <div  class="form-control p-0 sample-select" name="service_by"> </div>' +
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
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No of PMS Reached!!',
                    })
                }
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
                            ele: '.sample-select',
                            options: optionsData,
                            multiple: true,
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching options:', error);
                    }
                });
            });


            $(document).on('click', '.addChanges', function() {

                let contract_id = $('#pms_contract_id').val();
                let frequency = $('#frequency').val()
                var modalBody = $(this).closest('.modal-content').find('.modal-body');
                var formDataArray = []; // Step 1: Initialize the formDataArray
                modalBody.find('.row').each(function() {
                    var formData = {};
                    $(this).find('input, select').each(function() {
                        var fieldName = $(this).attr('name');
                        var fieldValue = $(this).val();
                        formData[fieldName] = fieldValue;


                    });
                    formData['service_by'] = $(this).find('.sample-select').val();

                    // Step 2: Check if the row contains the required data (sched_date, serv_date, problem, diagnosis, service_done, recomm, service_by)
                    // If yes, add it to the formDataArray
                    if (
                        formData.hasOwnProperty('sched_date') &&
                        formData.hasOwnProperty('serv_date') &&
                        formData.hasOwnProperty('diagnosis') &&
                        formData.hasOwnProperty('service_done') &&
                        formData.hasOwnProperty('recomm') &&
                        formData.hasOwnProperty('service_by')
                    ) {
                        formDataArray.push(formData);
                    }
                });

                // Step 3: Send the form data via AJAX
                swal.fire({
                    title: 'Confirm changes',
                    confirmButtonText: 'Save',
                    showCancelButton: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '../php/process.php',
                            type: 'POST',
                            data: {
                                formDataArray: JSON.stringify(formDataArray),
                                contract_id: contract_id,
                                frequency: frequency
                            },
                            success: function(response) {
                                console.log(response);

                                // Handle the AJAX response
                                $('#pms-forms').empty();
                                $('#exampleModal').modal('hide');

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
                                        table.ajax.reload(null, false);
                                    },
                                });
                            },
                            error: function(xhr, status, error) {
                                console.log(error);
                            },
                        });
                    }
                });
            });


        }

 function completedContract() {
    let db1 = 6;
        let client_id = <?php echo $client_id; ?>;
        var completeTable = $('#completedContract').DataTable({
            stateSave: true,
            processing: true,
            serverSide: true,
            scrollY: '45vh',
            scrollX: true,
           
            ajax: {
                url: '../php/ssp_list.php',
                type: 'GET',
                data: {
                    db: db1,
                    client_id: client_id
                },
            },
            columns: [{
                    className: 'details-control',
                    orderable: false,
                    data: 'clientId',
                    defaultContent: '',
                    render: function() {
                        return '<i class="fa fa-plus-square" aria-hidden="true"></i>';
                    },
                    width: "15px"
                },

                {
                    data: 'contractId',
                    render: function(data, type, row) {
                        return '<div class="align-middle text-center text-sm">' +
                            '<p class="text-sm font-weight-bold mb-0">' + row.contractId +
                            '</p>' +
                            '</div>';
                    }
                },
                // Replace 'client_id' with the actual column name
                {
                    data: 'brand',
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
                    data: 'turnover',
                    render: function(data, type, row) {
                        const formattedTurnover = new Date(row.turnover).toLocaleDateString(
                            'en-US', {
                                month: 'short',
                                day: 'numeric',
                                year: 'numeric'
                            });
                        const formattedCoverage = new Date(row.coverage).toLocaleDateString(
                            'en-US', {
                                month: 'short',
                                day: 'numeric',
                                year: 'numeric'
                            });
                        let toTimestamp = Date.parse(row.turnover);

                        return '<td data-sort="' + toTimestamp +
                            '" class="align-middle text-center text-sm">' +
                            '<p class="badge badge-sm bg-gradient-success">' +
                            formattedTurnover + ' / ' + formattedCoverage + '</p>' +
                            '</td>';
                    }
                },

                {
                    data: 'pCoverage',
                    render: function(data, type, row) {
                        let tDate = new Date(row.pCoverage);
                        let currentDate = new Date();
                        let partStatus = (tDate < currentDate) ? "Expired" : "Active";
                        let partColor = (tDate < currentDate) ? "danger" : "success";
                        const formattedpTurnover = new Date(row.pTurn_over).toLocaleDateString(
                            'en-US', {
                                month: 'short',
                                day: 'numeric',
                                year: 'numeric'
                            });
                        const formattedpCoverage = new Date(row.pCoverage).toLocaleDateString(
                            'en-US', {
                                month: 'short',
                                day: 'numeric',
                                year: 'numeric'
                            });
                        let toTimestamp = Date.parse(row.pCoverage);

                        return '<td data-sort="' + toTimestamp +
                            '" class="align-middle text-center text-sm">' +
                            '<p class="badge badge-sm bg-gradient-primary">' +
                            formattedpTurnover + ' / ' + formattedpCoverage + '</p>' +
                            ' <p class="badge badge-sm bg-gradient-' + partColor + '">' +
                            partStatus + '</p>' +
                            '</td>';

                    }
                },
                {
                    data: 'status',
                    render: function(data, type, row) {
                        let strStatus = (row.status == 1) ? "Installation Warranty" :
                            "PMS Contract";
                        let strFre = (row.frequency == 1) ? "Quarterly" : ((row.frequency ==
                            2) ? "Semi-Annual" : "Annual")
                        return '<div class="align-middle text-center text-sm">' +
                            '<h6 class="mb-0 text-sm">' + strStatus + '</h6>' +
                            '<p class="text-xs text-secondary mb-0">' + strFre + '</p>' +
                            '</div>';
                    }
                },
                {
                    data: 'count',
                    render: function(data, type, row) {
                        let count = 100 - ((row.count / row.total) * 100);
                        return '<div class="align-middle text-center text-sm">' +
                            '<p class="text-sm font-weight-bold mb-0">' + count.toFixed(2) +
                            '%</p>' +
                            '</div>';
                    }
                },
                {
                    data: 'sv_call',
                    render: function(data, type, row) {
                        return '<div class="align-middle text-center text-sm">' +
                            '<p class="text-sm font-weight-bold mb-0">' + row.sv_call + '</p>' +
                            '</div>';
                    }
                },


                {
                    orderable: false,
                    data: 'clientId',
                    defaultContent: '',
                    render: function(data, type, row) {
                        return `
            <span data-bs-toggle="tooltip" data-bs-placement="top" title="View Contract Report">
                <button type="button" data-id="${row.contract_id}" class="btn btn-secondary no_margin viewContractReport">
                    <i class="fa fa-eye"></i>
                </button>
            </span>
           
            <span data-bs-toggle="tooltip" data-bs-placement="top" title="Renew Contract">
                <button type="button" data-id="${row.contract_id}" data-bs-toggle="modal" data-bs-target="#renewContractModal"
                    class="btn btn-success no_margin renewContract">
                    <i class="material-icons opacity-10">autorenew</i>
                </button>
            </span>
            <span data-bs-toggle="tooltip" data-bs-placement="top" title="Delete/Cancel Contract">
                <button type="button" data-id="${row.contract_id}" class="btn btn-danger no_margin delContract">
                    <i class="fa fa-trash"></i>
                </button>
            </span>`;
                    },
                    width: "15px"
                }
                // Replace 'client_name' with the actual column name
                // Define other data columns...
            ]
        });

        $('#completedContract tbody').on('click', 'td.details-control', function() {

            var tr = $(this).closest('tr');
            var tdi = tr.find("i.fa");
            var row = completeTable.row(tr);

            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
                tdi.first().removeClass('fa-minus-square');
                tdi.first().addClass('fa-plus-square');
            } else {
                // Open this row
                let datas = row.data()
                $.ajax({
                    url: '../php/process.php?action=show_contract_acrdn',
                    method: 'GET',
                    data: datas,
                    success: function(e) {
                        row.child(e).show();
                        tr.addClass('shown');
                        tdi.first().removeClass('fa-plus-square');
                        tdi.first().addClass('fa-minus-square');
                        var table2 = $('#test-table').DataTable();
                        $(document).on('click', '.updatePm', function(e) {

                            if ($("#update_pm_form")[0].checkValidity()) {
                                e.preventDefault();
                                var formData = new FormData($("#update_pm_form")[
                                0]);
                                formData.append('action', 'updatePms');
                                $.ajax({
                                    url: '../php/process.php',
                                    method: 'post',
                                    data: formData,
                                    contentType: false,
                                    processData: false,
                                    success: function(response) {
                                        table2.ajax.reload();
                                        $("#update_pm_form")[0].reset();
                                        $("#edit-pm-modal").modal(
                                            'hide');
                                        row.child.hide();
                                        tr.removeClass('shown');
                                        tdi.first().removeClass(
                                            'fa-minus-square');
                                        tdi.first().addClass(
                                            'fa-plus-square');
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'PMS Update',
                                            text: 'The PM details has been edited successfully.', // Add a custom success message here if needed
                                            timer: 1500,
                                            timerProgressBar: true,
                                            didOpen: () => {
                                                Swal
                                            .showLoading();
                                            },
                                            willClose: () => {
                                                Swal
                                            .hideLoading();
                                            },
                                        });


                                    }
                                });
                            }
                        });
                    }
                });

            }
        });
        $(document).on('click', '.renewContract', function() {
            let contract_id = $(this).attr('data-id');
            $.ajax({
                url: '../php/process.php',
                method: 'GET',
                data: {
                    contract_id: contract_id,
                    action: 'renewContract'
                },
                success: function(response) {
                    $('.renewContractContent').html(response);
                }

            });
        });

        $(document).on('click', '#renew-contract-btn', function() {
                let client_id = <?php echo $client_id; ?>;
                $.ajax({
                    url: '../php/process.php',
                    method: 'POST',
                    data: $('#edit-contract-form').serialize() + "&action=renew_contract",
                    success: function(response) {
                        // console.log(response);
                        // data = JSON.parse(response);
                        // console.log(data);
                        // if (data.status === 0) {
                        //     Swal.fire(
                        //         'Invalid',
                        //         data.message,
                        //         'error'
                        //     );
                        // } else {
                        //     Swal.fire({
                        //         icon: 'success',
                        //         title: 'Contract Updated',
                        //         text: 'Contract has been edited successfully.', // Add a custom success message here if needed
                        //         timer: 1500,
                        //         timerProgressBar: true,
                        //         didOpen: () => {
                        //             Swal.showLoading();
                        //         },
                        //         willClose: () => {
                        //             Swal.hideLoading();
                        //             $('#editContractModal').modal('hide');
                        //             table.ajax.reload();
                        //         },
                        //     });
                        // }


                    }
                });

            });

 }
      





        function serviceCall() {
            let db = 7;
        let client_id = <?php echo $client_id; ?>;
        var serviceCallTbl = $('#serviceCall').DataTable({
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
                    client_id: client_id
                },
            },
            columnDefs: [
        // Apply ellipsis to the column with index 3 (replace with the actual index)
        {
            targets: 6, // Replace with the actual column index
            render: $.fn.dataTable.render.ellipsis(6, true) // Set the number of characters
        }
    ],
            columns: [
                {
                    data: 'accomp_id',
                    render: function(data, type, row) {
                        return '<div class="align-middle text-center text-sm">' +
                            '<p class="text-sm font-weight-bold mb-0">' + row.accomp_id +
                            '</p>' +
                            '</div>';
                    }
                },

                {
                    data: 'sched_id',
                    render: function(data, type, row) {
                        return '<div class="align-middle text-center text-sm">' +
                            '<p class="text-sm font-weight-bold mb-0">' + row.sched_id +
                            '</p>' +
                            '</div>';
                    }
                },
                // Replace 'client_id' with the actual column name
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
                        const formattedTurnover = new Date(row.schedule_date).toLocaleDateString(
                            'en-US', {
                                month: 'short',
                                day: 'numeric',
                                year: 'numeric'
                            });
                        
                        let toTimestamp = Date.parse(row.schedule_date);

                        return '<td data-sort="' + toTimestamp +
                            '" class="align-middle text-center text-sm">' +
                            '<p class="badge badge-sm bg-gradient-info">' +
                            formattedTurnover  + '</p>' +
                            '</td>';
                    }
                },
                {
                    data: 'accomp_date',
                    render: function(data, type, row) {
                        const formattedTurnover = new Date(row.accomp_date).toLocaleDateString(
                            'en-US', {
                                month: 'short',
                                day: 'numeric',
                                year: 'numeric'
                            });
                        
                        let toTimestamp = Date.parse(row.accomp_date);

                        return '<td data-sort="' + toTimestamp +
                            '" class="align-middle text-center text-sm">' +
                            '<p class="badge badge-sm bg-gradient-success">' +
                            formattedTurnover  + '</p>' +
                            '</td>';
                    }
                },
                {
                    data: 'diagnosis',
                    render: function(data, type, row) {
                        return '<div class="align-middle text-center text-sm">' +
                            '<p class="text-sm font-weight-bold mb-0">' +row.diagnosis +
                            '</p>' +
                            '</div>';
                    }
                },
                {
    data: 'service_don', // Replace with your column data property
    render: function(data, type, row) {
        return data.length > 25 ?
            '<div class="align-middle text-center text-sm">' +
            '<p class="text-sm font-weight-bold mb-0">' + data.substr(0, 25) +
            ' ...</p>' +
            '</div>' :
            '<div class="align-middle text-center text-sm">' +
            '<p class="text-sm font-weight-bold mb-0">' + data +
            '</p>' +
            '</div>';
    }
},


                {
                    data: 'accomp_status',
                    render: function(data, type, row) {
                        let strStatus = (row.accomp_status == 1) ? "Unresolved" :
                            "Done";
                        let strFre = (row.withC == 1) ? "W/Collection" : ""; 
                        return '<div class="align-middle text-center text-sm">' +
                            '<h6 class="mb-0 text-sm">' + strStatus + '</h6>' +
                            '<p class="text-xs text-secondary mb-0">' + strFre + '</p>' +
                            '</div>';
                    }
                },
                {
                    data: 'rep_problem',
                    render: function(data, type, row) {
                        return '<div class="align-middle text-center text-sm">' +
                            '<p class="text-sm font-weight-bold mb-0">' + row.rep_problem +
                            '</p>' +
                            '</div>';
                    }
                },

                {
                    orderable: false,
                    data: 'accomp_id',
                    defaultContent: '',
                    render: function(data, type, row) {
                        return `
            <span data-bs-toggle="tooltip" data-bs-placement="top" title="View Contract Report">
                <button type="button" data-id="${row.accomp_id}" class="btn btn-secondary no_margin viewContractReport">
                    <i class="fa fa-eye"></i>
                </button>
            </span>
            <span data-bs-toggle="tooltip" data-bs-placement="top" title="Delete/Cancel Contract">
                <button type="button" data-id="${row.accomp_id}" class="btn btn-danger no_margin delContract">
                    <i class="fa fa-trash"></i>
                </button>
            </span>`;
                    },
                    width: "15px"
                }
                // Replace 'client_name' with the actual column name
                // Define other data columns...
            ],
       
        });
        }




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





        $(document).on('click', '.addPms', function() {

            $('#pms-forms').empty();
            let sv_no = $(this).attr('data-sv');
            $('#pms_no').val(sv_no)
            $('#pms_contract_id').val($(this).attr('data-id'));
            $('#frequency').val($(this).attr('data-frequency'));
            let contract_no = $(this).attr('data-id');
            $.ajax({
                url: '../php/process.php', // Replace 'process.php' with your actual PHP script filename
                method: 'get',
                data: {
                    contract_no: contract_no,
                    action: 'last_pm'
                },
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

        $(document).on('click', '.editPm', function() {
            let accomp_id = $(this).attr('data-id');
            let value = [1, 2];
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

        $(document).on('click', '.delContract', function() {
            let contract_id = $(this).attr('data-id');


            Swal.fire({
                title: 'Do you want to delete the contract?',
                showDenyButton: true,

                confirmButtonText: 'Confirm',
                denyButtonText: 'Cancel',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        url: '../php/process.php',
                        method: 'GET',
                        data: {
                            contract_id: contract_id,
                            action: 'del_Contract'
                        },
                        success: function(e) {
                            Swal.fire('Deleted!', '', 'success')
                            displayContracts();
                        }
                    });

                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            })



        });

        function schedDone() {
            let client_id = <?php echo $client_id; ?>;
            var data;
            $.ajax({
                url: '../php/process.php',
                method: 'GET',
                data: {
                    client_id: client_id,
                    action: 'getSchedStats'
                },
                success: function(response) {
                    console.log(response);
                    data = JSON.parse(response);

                    console.log(data.pm);

                    if (window.lineGraph) {
                        window.lineGraph.destroy();
                    }
                    var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");
                    var labels = [];
                    var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep",
                        "Oct", "Nov", "Dec"
                    ];

                    window.lineGraph = new Chart(ctx3, {
                        type: "line",
                        data: {
                            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug",
                                "Sep", "Oct",
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

            $.ajax({
                url: '../php/process.php',
                method: 'GET',
                data: {
                    client_id: client_id,
                    action: 'getxD'
                },
                success: function(response) {
                    console.log(response);
                    data = JSON.parse(response);
                    console.log(data);
                    var labels = data.map(item => item.firstname.trim());
                    var userPie = document.getElementById('donut-graph').getContext('2d');
                    var count = data.map(item => item.count);


                    if (window.userPieGraph) {
                        window.userPieGraph.destroy();
                    }
                    var backgroundColors = generateRandomColor(count
                    .length); // Pass the length of counts array

                    window.userPieGraph = new Chart(userPie, {
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
                            var color = 'rgba(' + Math.floor(Math.random() * 256) + ', ' +
                                Math.floor(Math.random() * 256) + ', ' +
                                Math.floor(Math.random() * 256) + ', 0.8)';
                            colors.push(color);
                        }
                        return colors;
                    }

                }
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
                    console.log(response);
                    let data = JSON.parse(response);
                    $('#serviceSchedule').text(data.serviceSched);
                    $('#pmsSched').text(data.pmSched);
                    $('#svSched').text(data.svSched);
                }
            });
        }

        setInterval(schedDone, 30000);






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
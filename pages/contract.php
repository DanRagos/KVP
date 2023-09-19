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
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Schedule</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Contracts</h6>
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
                                    <span class="ms-1">Active Contract</span>
                                </a>
                            </li>
                            <li class="nav-item" id="liComplete">
                                <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab"
                                    aria-selected="false">
                                    <i class="material-icons text-lg position-relative">event_available</i>
                                    <span class="ms-1">Completed Contract</span>
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
                                <h6 class="text-white text-capitalize ps-3">Active Contract</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table id="example" class="table align-items-center mb-0 table-striped"
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
        activeContract();
        $('#liActive').click(function() {
            $('#spinner').show();
            setTimeout(() => {
                $('#spinner').hide();
                $('#tabActive').show();
                $('#tabComplete').hide();
                $('#tabService').hide();

                if ($.fn.DataTable.isDataTable('#example')) {
                    // Destroy the DataTable instance
                    $('#example').DataTable().destroy();
                }
                activeContract();

            }, 300)
        });
        $('#liComplete').click(function() {
            $('#spinner').show();
            setTimeout(() => {
                $('#spinner').hide();
                $('#tabActive').hide();
                $('#tabComplete').show();
                $('#tabService').hide();
                if ($.fn.DataTable.isDataTable('#completedContract')) {
                    // Destroy the DataTable instance
                    $('#completedContract').DataTable().destroy();
                }
                completedContract();
            }, 300)

        });

        function activeContract() {
            let db = 8;
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
                        data: 'client_name',
                        render: function(data, type, row) {
                            return '<div class="align-middle text-center text-sm">' +
                                '<h6 class="mb-0 text-sm">' + row.client_name +
                                '</h6>' +
                                '<p class="text-xs text-secondary mb-0">' + row.client_address +
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
                        if (row.status == 2) {    
                            return '<div class="align-middle text-center text-sm">' +
                                '<p class="text-sm font-weight-bold mb-0">' + row.sv_call +
                                '</p>' +
                                '</div>';
                        }
                        else {
                            return '<div class="align-middle text-center text-sm">' +
                                '<p class="text-sm font-weight-bold mb-0"> Unli' +
                                '</p>' +
                                '</div>';
                        }
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
                            console.log(datas);
                            row.child(e).show();
                            tr.addClass('shown');
                            tdi.first().removeClass('fa-plus-square');
                            tdi.first().addClass('fa-minus-square');
                            var table2 = $('.test-table').DataTable();

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
                                            console.log(response);
                                            table.ajax.reload();
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
                        const arrayValue = JSON.parse(document.getElementById('myDiv')
                            .dataset
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
                                    var fullName = item.firstname +
                                        ' ' +
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

                                document.querySelector('.sample-select')
                                    .setValue(
                                        arrayValue);

                            },
                            error: function(xhr, status, error) {
                                console.error('Error fetching options:', error);
                            }
                        });
                    }
                });

            });

            //       $(document).on('click', '.updatePm', function(e) {
            //           if ($("#update_pm_form")[0].checkValidity()) {
            //   e.preventDefault();
            //   var formData = new FormData($("#update_pm_form")[0]);
            //   formData.append('action', 'updatePms');
            //   $.ajax({
            //     url: '../php/process.php',
            //     method: 'post',
            //     data: formData,
            //     contentType: false,
            //     processData: false,
            //     success: function (response) {
            //       console.log(response);
            //         $("#update_pm_form")[0].reset();
            //         $("#edit-pm-modal").modal('hide');
            //         table2.ajax.reload( null, false );
            //         Swal.fire({
            //           icon: 'success',
            //           title: 'PMS Update',
            //           text: 'The Service details has been edited successfully.', // Add a custom success message here if needed
            //           timer: 1500,
            //           timerProgressBar: true,
            //           didOpen: () => {
            //             Swal.showLoading();
            //           },
            //           willClose: () => {
            //             Swal.hideLoading();
            //           },
            //         });


            //     }
            //   });
            // }
            //       });

            $("body").on("click", ".viewPms", function(e) {
                let accomp_id = $(this).attr('data-id');
                e.preventDefault();
                $.ajax({
                    url: '../php/process.php',
                    method: 'get',
                    data: {
                        accomp_id: accomp_id,
                        action: 'view_report'
                    },
                    success: function(response) {
                        console.log(response);
                        $.ajax({
                            url: '../php/export_service.php',
                            type: 'POST',
                            data: {
                                jsonData: response
                            },
                            xhrFields: {
                                responseType: 'blob' // Set the response type to 'blob' to handle binary data
                            },
                            success: function(pdfResponse) {
                                console.log(pdfResponse);

                                // Create a blob object from the binary data
                                var blob = new Blob([pdfResponse], {
                                    type: 'application/pdf'
                                });

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

        }

        function completedContract() {
            let db = 9;

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
                        db: db,

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
                    {
                        data: 'client_name',
                        render: function(data, type, row) {
                            return '<div class="align-middle text-center text-sm">' +
                                '<h6 class="mb-0 text-sm">' + row.client_name +
                                '</h6>' +
                                '<p class="text-xs text-secondary mb-0">' + row.client_address +
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
                            const formattedpTurnover = new Date(row.pTurn_over)
                                .toLocaleDateString(
                                    'en-US', {
                                        month: 'short',
                                        day: 'numeric',
                                        year: 'numeric'
                                    });
                            const formattedpCoverage = new Date(row.pCoverage)
                                .toLocaleDateString(
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
                        if (row.status == 2) {    
                            return '<div class="align-middle text-center text-sm">' +
                                '<p class="text-sm font-weight-bold mb-0">' + row.sv_call +
                                '</p>' +
                                '</div>';
                        }
                        else {
                            return '<div class="align-middle text-center text-sm">' +
                                '<p class="text-sm font-weight-bold mb-0"> Unli' +
                                '</p>' +
                                '</div>';
                        }
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
                                    var formData = new FormData($(
                                        "#update_pm_form")[
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

                $.ajax({
                    url: '../php/process.php',
                    method: 'POST',
                    data: $('#renew-contract-form').serialize() + "&action=renew_contract",
                    success: function(response) {
                        console.log(response);
                        console.log(response);
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
                                    $('#renewContractModal').modal('hide');
                                    completeTable.ajax.reload();
                                },
                            });
                        }


                    }
                });

            });

        }
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
                    '<input class="form-control" type="text" name="diagnosis" required>' +
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
        // var db = 3;
        // var user_id = 1;
        // var table= $('#contracts').DataTable({

        // 			 processing: true,
        // 			 serverSide: true,
        //        scrollY: '45vh',
        //        scrollX: true,
        // 			ajax: {
        // 			url: '../php/ssp_list.php',
        // 			data: {db : db,
        // 			user_id:user_id},
        // 			method:'GET',
        // 			},
        // 			"order":[0,'asc'],					


        // });

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
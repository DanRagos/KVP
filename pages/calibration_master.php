<?php 
require_once '../php/session.php';
include 'head.php'; 
require_once '../comp/client_modal.php';
	

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
	     td.details-control {
            text-align:center;
            color:forestgreen;
    cursor: pointer;
}
tr.shown td.details-control {
    text-align:center; 
    color:red;
}
	</style>
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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Masterlist</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Calibration / Verification Masterlist</h6>
        </nav>
        <?php include 'nav.php'; ?>
      </div>
    </nav>
    <!-- End Navbar -->
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
                <h6 class="text-white text-capitalize ps-3">Calibration / Verification Masterlist</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive" id="calibTable1">
			  <table id="example" class="table align-items-center mb-0 table-striped" style="width:100%;">
        <thead>
            <tr>
			<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">Hover</th>		  
			<th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ">Machine</th>
			<th class="text-uppercase text-center  text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Turnover-Coverage</th>
			<th class="text-uppercase text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type</th>
			<th class="text-uppercase text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Completion</th>
			<th class="text-uppercase text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No. of Sv Call</th>
			<th class="text-uppercase text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
					 
                    
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
   $(document).ready( function () {
	let db = 5;
	let client_id = 1;
	var table = $('#example').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: '../php/ssp_list.php',
        type: 'GET',
		data: {db:db,client_id: client_id},
    },
    columns: [
        {
            className: 'details-control',
            orderable: false,
            data: 'clientId',
            defaultContent: '',
            render: function () {
				return '<i class="fa fa-plus-square" aria-hidden="true"></i>';
            },
            width: "15px"
        },
       // Replace 'client_id' with the actual column name
	   {	
    data: 'brand',
    render: function(data, type, row) {
        return '<div class="align-middle text-center text-sm">' +
               '<h6 class="mb-0 text-sm">' + row.brand + ' / ' + row.model + '</h6>' +
               '<p class="text-xs text-secondary mb-0">' + row.machine_name + '</p>' +
               '</div>';
   		 }
		},
		{	
    data: 'turnover',
    render: function(data, type, row) {
        const formattedTurnover = new Date(row.turnover).toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });
        const formattedCoverage = new Date(row.coverage).toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });

        return '<div class="align-middle text-center text-sm">' +
               '<p class="badge badge-sm bg-gradient-success">' + formattedTurnover + ' / ' + formattedCoverage + '</p>' +
               '</div>';
    }
},
{	
    data: 'status',
    render: function(data, type, row) {
	 let strStatus = (row.status == 1) ? "Installation Warranty" : "PMS Contract";
	 let strFre = (row.frequency == 1) ? "Quarterly" :((row.frequency == 2 )? "Semi-Annual": "Annual")
        return '<div class="align-middle text-center text-sm">' +
               '<h6 class="mb-0 text-sm">' + strStatus +  '</h6>' +
               '<p class="text-xs text-secondary mb-0">' + strFre + '</p>' +
               '</div>';
   		 }
		},
		{	
    data: 'count',
    render: function(data, type, row) {
		let count = 100 - ((row.count / row.total)*100) ;
        return '<div class="align-middle text-center text-sm">' +
		'<p class="text-sm font-weight-bold mb-0">'+ count.toFixed(2)+'%</p>'+
               '</div>';
   		 }
		},
		{	
    data: 'sv_call',
    render: function(data, type, row) {
        return '<div class="align-middle text-center text-sm">' +
		'<p class="text-sm font-weight-bold mb-0">'+ row.sv_call+'</p>'+
               '</div>';
   		 }
		},


         {   
            orderable: false,
            data: 'clientId',
            defaultContent: '',
			render: function (data, type, row) {
				return `
    <span data-bs-toggle="tooltip" data-bs-placement="top" title="View Contract Report">
        <button type="button" data-id="${row.contract_id}" class="btn btn-secondary no_margin viewContractReport">
            <i class="fa fa-eye"></i>
        </button>
    </span>
    <span data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Contract">
        <button type="button" data-id="${row.contract_id}" data-bs-toggle="modal" data-bs-target="#editContractModal"
            class="btn btn-warning no_margin editContract">
            <i class="fa fa-edit"></i>
        </button>
    </span>
   `;

},
            width: "15px"
        }, // Replace 'client_name' with the actual column name
        // Define other data columns...
    ]
});



	$('#example tbody').on('click', 'td.details-control', function () {
             var tr = $(this).closest('tr');
             var tdi = tr.find("i.fa");
             var row = table.row(tr);

             if (row.child.isShown()) {
                 // This row is already open - close it
                 row.child.hide();
                 tr.removeClass('shown');
                 tdi.first().removeClass('fa-minus-square');
                 tdi.first().addClass('fa-plus-square');
             }
             else {
                 // Open this row
				 let datas = row.data()
				 $.ajax({
					url:'../php/process.php?action=show_contract_acrdn',
					method:'GET',
					data: datas,
					success: function (e){
				 row.child(e).show();
                 tr.addClass('shown');
                 tdi.first().removeClass('fa-plus-square');
                 tdi.first().addClass('fa-minus-square');
				 $('#test-table').DataTable();
					}
				 });
                
             }
         });

         table.on("user-select", function (e, dt, type, cell, originalEvent) {
             if ($(cell.node()).hasClass("details-control")) {
                 e.preventDefault();
             }
         });

		
	$("body").on("click", ".editClientBtn", function(e){
		e.preventDefault();
		var edit_client = $(this).attr('id');
			$.ajax({
				url: '../php/process.php',
				method: 'post',
				data: {edit_client : edit_client},
				success: function (response){
				console.log(response);
				data = JSON.parse(response);
				$("#client_id").val(edit_client);
				$("#client_name").val(data.client_name);
				$("#address").val(data.client_address);
				$("#cPerson").val(data.contact_person);
				$("#email").val(data.contact_email);
				$("#title").text('Edit details for '+data.client_name);
				$("#title1").text('Add details for '+data.client_name);
				$("#editImage").attr("src", data.imglink);
				console.log($("#title1").text());
	
				}
			});
	});
	$("#editClientBtn").click(function(e){
		if ($("#edit-client-form")[0].checkValidity()) {
			e.preventDefault();
			$.ajax({
				url:'../php/process.php',
				method: 'post',
				data: $("#edit-client-form").serialize()+"&action=update_client",
				success:function(response){
				swal.fire("Tool Updated!", "", "success");
				table.ajax.reload(null, false)
					$("#edit-client-form")[0].reset();
					$("#editClient").modal('hide');
				
					
				}
			});
		}
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
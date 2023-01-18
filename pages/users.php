<?php 
		require_once '../php/session.php';
	include 'head.php'; 
	require_once '../comp/users_modal.php';

	
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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Users Management</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Active Users</h6>
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
                <h6 class="text-white text-capitalize ps-3">Active Users</h6>
              </div>
			  <div class="col-lg-2 col-sm-4 col-4 mt-3">
                  <button class="btn bg-gradient-primary w-100 mb-2 toast-btn" type="button" data-bs-toggle="modal" data-bs-target="#createUser"> <i class="material-icons opacity-10 m-1">add</i>Register User</button>
				  
                </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0" id="usersTable">
                
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
   
  </script>
  <script>
    $(document).ready(function(){
		    displayAllUsers();
      //Register ajax
      $("#register-btn").click(function(e){
        if($("#register-form")[0].checkValidity()){
          e.preventDefault();
          $("#register-btn").text('Please Wait..');  
		  if($("#password").val() != $("#cpassword").val()) {
			  $("#passError").text('Password not matched!');
			   
		  }
		  else {
			   
			   $("#passError").text('');
			   $.ajax({
				  url: '../php/action.php',
				  method: 'post',
				  data: $("#register-form").serialize()+'&action=register',
				  success:function(response){
					  console.log(response);
					  $("#register-btn").text('Sign Up'); 
						if(response ==='register'){
							swal("User added", "", "success");
							$("#register-form")[0].reset();
							$("#createUser").modal('hide');
							$("#passError").text('');
							 displayAllUsers();
						}
						else {
							$("#passError").html(response);
						}
				  }
			   });
		  }
        }
      });
	//View Details Users
	$("body").on("click", ".editUserbtn", function(e){
		e.preventDefault();
		var edit_id = $(this).attr('id');
			$.ajax({
				url: '../php/process.php',
				method: 'post',
				data: {edit_userid : edit_id},
				success: function (response){
					data = JSON.parse(response);
				$("#user_id").val(edit_id);
				$("#firstname").val(data.firstname);
				$("#lastname").val(data.lastname);
				$("#username").val(data.username);
				$("#type").val(data.type);
				$("#email").val(data.email);
				$("#pass").val(data.password);
				$("#title").text('Edit details for '+data.firstname);
	
				}
			});
	});
	
	//Update Users
		$("#editUserBtn").click(function(e){
		if ($("#edit-user-form")[0].checkValidity()) {
			e.preventDefault();
			$.ajax({
				url:'../php/process.php',
				method: 'post',
				data: $("#edit-user-form").serialize()+"&action=update_user",
				success:function(response){
					swal("Tool Updated!", "", "success");
					$("#edit-user-form")[0].reset();
					$("#editUser").modal('hide');
					displayAllUsers();
				}
			});
		}
	});
	
   	function displayAllUsers() {
		$.ajax({
			url:'../php/process.php',
			method: 'POST',
			data: {action:'display_users'},
		success: function(response){
			$("#usersTable").html(response);
				$('#table').DataTable({ 
				  stateSave: true,
    });
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
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
    <div class="container-fluid py-5">
       <div class="row">	
        <div class="col-md-10">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Calibration / Verfication Schedule</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div id="calendar"> </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </main>
 
  <!--   Core JS Files   -->
   <?php include 'scripts.php'; ?>

<?php 
$conn1 = new Db();
$sql ="Select * from schedule_list";
$stmt = $conn1->conn->prepare($sql);
$stmt ->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$sched_res = [];
foreach($result as $row){
    $row['sdate'] = date("F d, Y",strtotime($row['start_date']));
    $row['edate'] =  date("F d, Y",strtotime($row['deadline_date']));
    $sched_res[$row['schedule_id']] = $row;
}

	
?>
<?php 
if(isset($conn)) $conn->close();
?>
</body>
<script>
    var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
	console.log(scheds);
</script>
<script src="../assets/js/plugins/script.js"></script>
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
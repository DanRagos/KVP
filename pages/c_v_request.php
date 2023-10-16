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
  <?php include 'head.php'; 
	require_once '../comp/static_modal.php';
  ?>
  
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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Masterlist</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Register Requests</h6>
        </nav>
        <?php include 'nav.php'; ?>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
       <div class="row">	
        <div class="col-12">
		 
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Registration Requests</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table id="calibTable" class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID No. / IMTE Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Request No.</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Requested By</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date Request</th>
				      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Reference Doc</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/small-logos/machine-2.svg" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">212</h6>
                            <p class="text-xs text mb-0">Handheld Laser Particle Counter</p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">3886 GEO-a</p>
                        <p class="text-xs text-secondary mb-0">619264</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">962</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">December 10, 2022</span>
                      </td>
					  <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">PDN-COB</span>
                      </td>
					  <div class="col-2">
					   <td class="align-middle text-center">
                        <button class="btn bg-gradient-primary toast-btn" type="button"  data-bs-toggle="modal" data-bs-target="#addTool"> <i class="material-icons">visibility</i>View</button>
						<button class="btn bg-gradient-danger toast-btn" type="button"  data-bs-toggle="modal" data-bs-target="#addTool"> <i class="material-icons">delete</i>Delete</button>
                      </td>
					  </div>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/small-logos/machine-1.svg" class="avatar avatar-sm me-3 border-radius-lg" alt="user2">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">031</h6>
                            <p class="text-xs text-secondary mb-0">Zero - Con</p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">ZC-001</p>
                        <p class="text-xs text-secondary mb-0">0120146</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">962</span>
                      </td>
                     <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">December 22, 2022</span>
                      </td>
					  <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">PDN-TC</span>
                      </td>
					   <div class="col-2">
					   <td class="align-middle text-center">
                        <button class="btn bg-gradient-primary toast-btn" type="button"  data-bs-toggle="modal" data-bs-target="#addTool"> <i class="material-icons">visibility</i>View</button>
						<button class="btn bg-gradient-danger toast-btn" type="button"  data-bs-toggle="modal" data-bs-target="#addTool"> <i class="material-icons">delete</i>Delete</button>
                      </td>
					  </div>
                    </tr>
                    <tr>
                     <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/small-logos/machine-1.svg" class="avatar avatar-sm me-3 border-radius-lg" alt="user2">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">217</h6>
                            <p class="text-xs text-secondary mb-0">Zero - Con</p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">ZC-001</p>
                        <p class="text-xs text-secondary mb-0">0120146</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">962</span>
                      </td>
                     <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">December 18, 2022</span>
                      </td>
					  <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">PDN-TC</span>
                      </td>
					  <div class="col-2">
					   <td class="align-middle text-center">
                        <button class="btn bg-gradient-primary toast-btn" type="button"  data-bs-toggle="modal" data-bs-target="#addTool"> <i class="material-icons">visibility</i>View</button>
						<button class="btn bg-gradient-danger toast-btn" type="button"  data-bs-toggle="modal" data-bs-target="#addTool"> <i class="material-icons">delete</i>Delete</button>
                      </td>
					  </div>
                    </tr>
                    <tr>
						<td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/small-logos/machine-1.svg" class="avatar avatar-sm me-3 border-radius-lg" alt="user2">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">016</h6>
                            <p class="text-xs text-secondary mb-0">Zero - Con</p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">1231</p>
                       
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">962</span>
                      </td>
                     <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">December 12, 2022</span>
                      </td>
					  <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">PDN-TC</span>
                      </td>
					   <div class="col-2">
					   <td class="align-middle text-center">
                        <button class="btn bg-gradient-primary toast-btn" type="button"  data-bs-toggle="modal" data-bs-target="#addTool"> <i class="material-icons">visibility</i>View</button>
						<button class="btn bg-gradient-danger toast-btn" type="button"  data-bs-toggle="modal" data-bs-target="#addTool"> <i class="material-icons">delete</i>Delete</button>
                      </td>
					  </div>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/small-logos/machine-1.svg" class="avatar avatar-sm me-3 border-radius-lg" alt="user2">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">234</h6>
                            <p class="text-xs text-secondary mb-0">Zero - Con</p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">1234</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">962</span>
                      </td>
                     <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">December 13, 2022</span>
                      </td>
					  <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">PDN-TC</span>
                      </td>
					  <div class="col-2">
					   <td class="align-middle text-center">
                        <button class="btn bg-gradient-primary toast-btn" type="button"  data-bs-toggle="modal" data-bs-target="#addTool"> <i class="material-icons">visibility</i>View</button>
						<button class="btn bg-gradient-danger toast-btn" type="button"  data-bs-toggle="modal" data-bs-target="#addTool"> <i class="material-icons">delete</i>Delete</button>
                      </td>
					  </div> 
                    </tr>
                  </tbody>
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
    $('#calibTable').DataTable();
} );
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
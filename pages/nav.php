<div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            
          </div>
          <ul class="navbar-nav  justify-content-end">
            
          <li class="nav-item d-flex align-items-center">
              <a href="#" class="nav-link text-body font-weight-bold px-0">
              <img src="<?php echo $img; ?>" class="avatar mb-2 mr-1 p-2">
                <span class="d-sm-inline d-none"><?php echo $firstname?></span>
				<input type="hidden" id="cuser_id" value="<?php echo $user_id?>"> 
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
        <li class="nav-item dropdown px-3 pe-2 d-flex align-items-center" id="notifications">
              <a href="javascript:;" class="nav-link text-body p-0 position-relative" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="material-icons cursor-pointer">
              notifications
            </i>
                
                  <span class="position-absolute top-5 start-100 translate-middle badge rounded-pill bg-danger border border-white small py-1 px-2"> 
				         <span class="small" id="notif_bell"></span><span class="visually-hidden">unread notifications</span>
                </span>
                  
              </a>
              <ul class="dropdown-menu dropdown-menu-end p-2 me-sm-n4 notifContent" aria-labelledby="dropdownMenuButton">
                
             
            </ul>

            <li class="nav-item dropdown px-3 pe-2 d-flex align-items-center">
               <a href="#" class="dropdown-item border-radius-md logoutBtn" href="javascript:;">
                <i class="fa-solid fa-right-from-bracket cursor-pointer"></i>
              </a>
            
            </li>
</ul>

        </div>
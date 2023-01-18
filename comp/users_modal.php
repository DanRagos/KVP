<!-- Modal for Register Users -->
<div class="modal fade modal-lg" id="createUser"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header ">
	 <img src="../img/icon.jpg" class="img-fluid" style="width:15%;height:10%;padding-right:14px;" alt="...">
        <h5 class="modal-title " id="staticBackdropLabel">Create User</h5> 
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  <div class="container">
         <div class="row">
		 <form id="register-form" action="#" method="POST" autocomplete="off">
		 <div id="regAlert"></div>
		  <div class="form-group">

  </div>
	<div class="col">
      <div class="input-group input-group-static my-3">
        <label for="exampleFormControlSelect1"class="ms-0">User Type:</label>
       <select class="form-control" id="exampleFormControlSelect1"  name ="level" required>
	    <option value="visitor">Visitor</option>
       <option value="admin" >Admin</option>
     </select>
      </div>
    </div>	 
    <div class="col">
      <div class="input-group input-group-static my-3">
        <label class="form-">Firstname:</label>
        <input type="text" name="firstname" class="form-control" required>
      </div>
    </div>
	<div class="col">
      <div class="input-group input-group-static my-3">
        <label class="form-">Lastname:</label>
        <input type="text" name="lastname" class="form-control"required>
      </div>
    </div>
		<div class="col">
      <div class="input-group input-group-static my-3">
        <label class="form-">Email:</label>
        <input type="email" name="email" class="form-control"required>
      </div>
    </div>
	<div class="col">
      <div class="input-group input-group-static my-3">
        <label class="form-">Username:</label>
        <input type="text" name="username" class="form-control"required>
      </div>
    </div>
	<div class="col">
      <div class="input-group input-group-static my-3">
        <label class="form-">Password:</label>
        <input type="password" name="password" class="form-control" id="password" required>
      </div>
    </div>
	<div class="col">
      <div class="input-group input-group-static my-3">
        <label class="form-">Confirm Password:</label>
        <input type="password" name="cpassword" class="form-control" id="cpassword" required>
      </div>
    </div>
	
		<div id="passError" class="text-danger font-weight-normal text-center" >
	</div>
	
  </div>
  </div>
 
      </div>
      <div class="modal-footer">
	  <button type="submit" class="btn btn-primary" name="registerBtn" id="register-btn">Confirm</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
	  </form>
    </div>
    </div>
  </div>

  
 <!-- Modal for Edit Users --> 
<div class="modal fade modal-lg" id="editUser"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
	  <img src="../img/line_jpg.jpg" class="img-fluid" style="width:25%;height:15%;padding-right:14px;" alt="...">
        <h5 class="modal-title " id="title"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  <div class="container">
	  <form action="#" method="post" id="edit-user-form">
         <div class="row">
	 
    <div class="col">
      <div class="input-group input-group-static my-3">
        <label class="form-">Username</label>
        <input type="text" id="username" name="username" class="form-control" disabled>
		<input type="hidden" id="user_id" name="id" >
      </div>
    </div>
    <div class="col">
      <div class="input-group input-group-static my-3">
        <label class="form-">Firstname:</label>
        <input type="text" id="firstname" name="firstname" class="form-control" >
      </div>
    </div>
	<div class="col">
      <div class="input-group input-group-static my-3">
        <label class="form-">Lastname:</label>
        <input type="text" class="form-control" id="lastname" name="lastname" >
      </div>
    </div>
	
  </div>
  <div class="row">
  	<div class="col">
      <div class="input-group input-group-static my-3">
        <label for="type" class="ms-0">Level:</label>
       <select class="form-control" id="type" name="type">
	   	 <option id="type" selected></option>
		 <option value ="visitor">Visitor</option>
		 <option value="admin" >Admin</option>
     </select>
      </div>
    </div>
	<div class="col">
      <div class="input-group input-group-static my-3">
        <label class="form-">Email:</label>
        <input type="email" class="form-control" id="email" name="email">
      </div>
    </div>
  </div>
  <div class= "row">
  <div class="col">
      <div class="input-group input-group-static my-3">
        <label class="form-">Password:</label>
        <input type="password" id="pass" class="form-control" name="password">
      </div>
    </div>
  
  </div>
  </div>
      </div>
      <div class="modal-footer">
	  <button type="button" class="btn btn-primary" id="editUserBtn" >Confirm</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
	  </form>
    </div>
    </div>
  </div>
</div>
<!-- Modal for Deleting Users -->
<div class="col-md-4">
    <div class="modal fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
      <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title font-weight-normal" id="modal-title-notification">Your attention is required</h6>
            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="py-3 text-center">
              <i class="material-icons ">
                warning
              </i>
              <h4 class="text-gradient text-danger mt-4">You should read this!</h4>
              <p>This action will delete user: davidRagos</p>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Confirm</button>
            <button type="button" class="btn btn-secondary ml-auto" data-bs-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>
  </div>
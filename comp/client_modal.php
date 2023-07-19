<!-- Modal for Register Clients -->
<div class="modal fade modal-lg" id="createClient"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header ">
	 <img src="../img/icon.jpg" class="img-fluid" style="width:15%;height:10%;padding-right:14px;" alt="...">
        <h5 class="modal-title " id="staticBackdropLabel">Add Client</h5> 
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  <div class="container">
         <div class="row">
		 <form id="client-form" action="#" method="POST"  enctype="multipart/form-data" autocomplete="off">
		 <div id="regAlert"></div>
		  <div class="form-group">

  </div>
    <div class="row">
	<div class="col-2">
      <div class="input-group input-group-static my-3">
     
        <label class="form-">Client Picture (.JPG Only)</label>
      </div>
	  </div>
	  	<div class="col-3">
      <div class="input-group input-group-static my-3">
        <input type="file" name="picture" class="form-control"   accept="image/jpeg" required>
        
      </div>
	  </div>
    </div>  
    <div class="col">
      <div class="input-group input-group-static my-3">
        <label class="form-">Client Name:</label>
        <input type="text" name="client_name" class="form-control" required>
      </div>
    </div>
	<div class="col">
      <div class="input-group input-group-static my-3">
        <label class="form-">Client Address:</label>
        <input type="text" name="client_address" class="form-control"required>
      </div>
    </div>
	<div class="col">
      <div class="input-group input-group-static my-3">
        <label class="form-">Contact Person:</label>
        <input type="text" name="contact_person" class="form-control"required>
      </div>
    </div>
		<div class="col">
      <div class="input-group input-group-static my-3">
        <label class="form-">Contact Email:</label>
        <input type="text" name="email" class="form-control"required>
      </div>
    </div>
	
		<div id="passError" class="text-danger font-weight-normal text-center" >
	</div>
	
  </div>
  </div>
 
      </div>
      <div class="modal-footer">
	  <button type="submit" class="btn btn-primary" name="clientRegisterBtn" id="client-register-btn">Confirm</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
	  </form>
    </div>
    </div>
  </div>

  
 <!-- Modal for Edit Clients --> 
<div class="modal fade modal-lg" id="editClient"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
	  <img src=""  id="editImage" class="img-fluid" style="width:25%;height:15%;padding-right:14px;" alt="...">
        <h5 class="modal-title " id="title"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  <div class="container">
	  <form action="#" method="post" id="edit-client-form">
         <div class="row">
	 
    <div class="col">
      <div class="input-group input-group-static my-3">
        <label class="form-">Client name:</label>
        <input type="text" id="client_name" name="client_name" class="form-control" >
			<input type="hidden" id="client_id" name="client_id" >
      </div>
    </div>
	<div class="col">
      <div class="input-group input-group-static my-3">
        <label class="form-">Address:</label>
        <input type="text" class="form-control" id="address" name="address" >
      </div>
    </div>
	
  </div>
  <div class="row">
  	<div class="col">
      <div class="input-group input-group-static my-3">
        <label class="form-">Contact Person:</label>
        <input type="text" class="form-control" id="cPerson" name="cPerson" >
      </div>
    </div>
	<div class="col">
      <div class="input-group input-group-static my-3">
        <label class="form-">Contact Email:</label>
        <input type="text" class="form-control" id="email" name="email" >
      </div>
    </div>
  </div>

  </div>
      </div>
      <div class="modal-footer">
	  <button type="button" class="btn btn-primary" id="editClientBtn" >Confirm</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
	  </form>
    </div>
    </div>
  </div>
</div>
<!-- Modal for Adding  Contract -->
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
  
  <!-- Adding Contract -->
  <div class="modal fade modal-lg" id="addContract"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
	  <img src="../img/line_jpg.jpg" class="img-fluid" style="width:25%;height:15%;padding-right:14px;" alt="...">
        <h5 class="modal-title " id="title1"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  <div class="container">
	  <form action="#" method="POST" id="add-contract-form" autocomplete="off">
      <input type="hidden" name="id" id="contract_id">
	 <div class="row">
	 <div class="col">
	 <div class="input-group input-group-static mb-4">
	<label class="ms-0">Machine Type</label>
	<select class="form-control" name="machine_type" required>
	<option selected> Select </option>
	<?php
		$sql ="Select * from machine_type";
		$stmt = $tool->conn->prepare($sql);
		$stmt ->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $row){	
	?>
	   <option value = "<?php echo $row['machine_id']?>"><?php echo $row['machine_name']?></option>
		<?php } ?>
	</select>
	</div>
	</div>
	   <div class="col">
      <div class="input-group input-group-static mb-4">
        <label class="form-">Brand :</label>
        <input type="text" name="brand" class="form-control" required>
			<input type="hidden" id="client_id" name="client_id" >
			
      </div>
    </div>
	<div class="col">
      <div class="input-group input-group-static mb-4">
        <label class="form-">Model :</label>
        <input type="text"  name="model" class="form-control" required>
      </div>
    </div>
	
	 </div>
  <div class="row">
  	<div class="col">
      <div class="input-group input-group-static mb-4">
        <label class="form-">Turn Over / Coverage Date:</label>
        <input type="text" class="form-control"name="datefilter" required>
      </div>
    </div>
		<div class="col">
      <div class="input-group input-group-static mb-4">
        <label class="form-">First PMS date:</label>
        <input type="date" class="form-control"name="first_pms" required>
      </div>
    </div>
	 <div class="col">
	 <div class="input-group input-group-static mb-4">
	<label class="ms-0">Frequency</label>
	<select class="form-control " name="frequency" required>
	<option value="1" selected> Quarterly </option>
	<option value="2"> Semi-Annual </option>
	<option value="3" > Annually </option>
	</select>
	</div>
	</div>
	
  </div>
   <div class="row">
    <div class="col">
	 <div class="input-group input-group-static mb-4"  >
	<label class="ms-0" id="test">Type</label>
	<select class="form-control freq" name="contract_type" id="sAccept"required>
	<option value="1" selected > Installation Warranty </option>
	<option value="2"> PMS Contract </option>
	</select>
	</div>
	<div class="input-group input-group-outline" style="display:none"  id="reason">
									<label class="form-label">PMS Count:</label>
									<input type="number" min=1 name="pms_count"  id="inp_reason" class="form-control" >
									</div>
	</div>
	 
	
   </div>

  </div>
      </div>
      <div class="modal-footer">
	  <button type="submit" class="btn btn-primary" id="add-contract-btn" >Confirm</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
	  </form>
    </div>
    </div>
  </div>
</div>
  <div class="modal fade" id="addSvc1" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-body p-0">
            <div class="card card-plain">
              <div class="responsive card-header pb-0 text-left">

                <center> <h6 class="">Add Schedule for Service Call</h6> </center>

            
              </div>
              <div class="card-body">
                <form role="form text-left" action="../inc/save_service_call.php" method="post" autocomplete="off"> 
				 <!-- <input type = "text" name="contract_id" value= " <?php echo $contract_id ?> "hidden> -->
			<div class="input-group input-group-static mb-4">
				<label class="ms-0">Client</label>
			<select class="form-control" name="client_id" id="depart"required>
				<option selected> Select </option>
				</select>
				</div>
				  <label for="profile">
						<input type="checkbox" id="profile" 
						 
						>
						Guest Client? Insert Client Name / Address
						</label>
				 <div class="input-group input-group-static mb-4">
				 	<input type="text" id="other" name="client_name" class="form-control" placeholder = "Client Name / Client Address" autocomplete="off" disabled required >
				<label class="ms-0">Machine Type</label>
			<select class="form-control" name="machine_Type">
			<option selected> Select </option>
				</select>
				</div>
				<div class="input-group input-group-static my-3">
			<label >Brand</label>
                <input  name="brand" class="form-control" required>
        </div>
		<div class="input-group input-group-static my-3">
			<label >Model</label>
                <input  name="model" class="form-control" required>
        </div>
				  <div class="input-group input-group-static mb-4">
			<label>Service Call Date</label>
		<input name="service_call"  class="form-control" required >
		</div>
		 <div class="input-group input-group-static mb-4">
			<label>Reported Problem</label>
		<input name="problem"  class="form-control" maxlength="80"required >
		</div>
		 
			   
                
                
                  <div class="text-center">
                    <button type="submit" name="add_sched" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Add</button>
                  </div>
                </form>
              </div>
            
            </div>
          </div>
        </div>
      </div>
    </div>

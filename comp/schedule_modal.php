<div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="schedule_details_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0 contents">

            </div>
        </div>
    </div>

<div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-header rounded-0">
                    <h5 class="modal-title" >Schedule Details</h5>
                </div>
                <div class="modal-body rounded-0">
                    <div class="container-fluid">
                        <dl>
                            <dt class="text-muted">ID / IMTE Name</dt>
                            <dd id="title" class="fw-bold fs-5"></dd>
                            <dt class="text-muted">Brand / Model</dt>
                            <dd id="description" class=""></dd>
							<dt class="text-muted">Client Address</dt>
                            <dd id="address" class=""></dd>
                            <dt class="text-muted">Schedule</dt>
                            <dd id="start" class=""></dd>
							<dt class="text-muted">Status</dt>
                            <dd id="stats" class="">Test</dd>
							<dt class="text-muted">Problem</dt>
                            <dd id="" class=""></dd>
                        </dl>
                    </div>
                </div>
                <div class="modal-footer rounded-0">
                    <div class="text-end">
                        <button type="button" class="btn btn-primary btn-sm rounded-0" id="updateBtn" data-bs-target="#confirm-sched-modal" data-bs-toggle="modal" > Update</button>
                        <button type="button" class="btn btn-info btn-sm rounded-0"  data-bs-target="#resched" data-bs-toggle="modal" data-id="">Re-Schedule</button>
                        <button type="button" class="btn btn-danger btn-sm rounded-0"  data-bs-target="#delete" data-bs-toggle="modal" data-id="">Delete</button>
						<button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- Modal for Resched -->
	<div class="modal fade modal-lg" id="confirm-sched-modal"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog">
    <div class="modal-content update_contents">

    </div>
  </div>
</div>
<!-- Modal for Resched -->
	<div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="reschedModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0 reschedContent">

            </div>
        </div>
    </div>
	<!-- Modal for Adding Schedule -->
	<div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="addSchedule">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content rounded-0">
                <div class="modal-header rounded-0">
                    <h5 class="modal-title">Add Service Call</h5>
                </div>
                <div class="modal-body rounded-0">
                    <div class="container-fluid">
					 <form action="#" method= "post" id ="add-sched-form" autocomplete="off">
                      <div class="row">
					  <div class="col">
	 <div class="input-group input-group-static mb-4">
	<label class="ms-0">Client</label>
	<select class="form-control" name="client_id" id="client_id" required>
	<option selected> Select </option>
	<?php
		$sql ="Select * from clients order by client_name";
		$stmt = $tool->conn->prepare($sql);
		$stmt ->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $row){	
	?>
	   <option value = "<?php echo $row['client_id']?>"><?php echo $row['client_name']?></option>
		<?php } ?>
	</select>
	</div>
	</div>
	<div class="col">
	<div class="form-check pt-4">
	<input type="hidden" name="pmsCheck" value = 0>
  <input class="form-check-input" type="checkbox" name="pmsCheck" id="pmsCheck" >
  <label class="custom-control-label" for="pmsCheck">PMS Contract?</label>
</div>
	</div>
	</div>
	<div class="row" id="option1" name="option1" style="display:none">
	<div class="col">
	 <div class="input-group input-group-static mb-4">
	<label class="ms-0">Brand / Model</label>
	<select class="form-control" name="contract_id" id="machine">
	 <option selected value="">Select</option>
	</select>
	</div>
	</div>
	<div class="col">
      <div class="input-group input-group-static mb-4">
        <label class="form-">No. of SV Call :</label>
        <input type="text" id="sv_call" class="form-control" readonly>	
      </div>
    </div>			
	</div>
	<div class="row" id="option2" >
	
					 <div class="col">
	 <div class="input-group input-group-static mb-4">
	<label class="ms-0">Machine Type</label>
	<select class="form-control" name="machine_type" >
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
        <input type="text" name="brand" class="form-control" >
			
      </div>
    </div>
	<div class="col">
      <div class="input-group input-group-static mb-4">
        <label class="form-">Model :</label>
        <input type="text"  name="model" class="form-control" >
      </div>
    </div>				
	</div>
<div class="row">
<div class="col">
      <div class="input-group input-group-static mb-4">
        <label class="form-">Reported Problem :</label>
        <input type="text"  name="rep_problem" class="form-control" required>
      </div>
    </div>
	<div class="col">
      <div class="input-group input-group-static mb-4">
        <label class="form-">Service Call Date:</label>
        <input type="date"  name="sv_date" class="form-control" required>
      </div>
    </div>
    <div class="col">
      <div class="input-group input-group-outline my-3 is-filled">
                    <label class="form-label">Assign To: </label>
                     <div  name="service_by" class="form-control p-0 service_by_client"> </div>
                    </div>
    </div>
</div>						
                    </div>
                </div>
                <div class="modal-footer rounded-0">
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary btn-sm rounded-0" id="confirmBtn" name="addSchedule"> Confirm</button>
                           <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
                    </div>
					</form>
                </div>
            </div>
        </div>
    </div>
	
<!-- Add guess sv call -->
<div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="addSvGModal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content rounded-0">
                <div class="modal-header rounded-0">
                    <h5 class="modal-title">Add Service Call</h5>
                </div>
                <div class="modal-body rounded-0">
                    <div class="container-fluid">
					 <form action="#" method= "post" id ="add-sched-g-form">
                      <div class="row">
					  <div class="col">
	 <div class="input-group input-group-static mb-4">
	<label class="ms-0">Guest Client Name</label>
	 <input type="text" class="form-control" name="gName" >	
	</div>
	</div>
	<div class="col">
      <div class="input-group input-group-static mb-4">
	<label class="ms-0">Guest Client Address</label>
	 <input type="text" class="form-control" name="gAddress" >	
	</div>
    </div>
		

	</div>
	<div class="row">
					 <div class="col">
	 <div class="input-group input-group-static mb-4">
	<label class="ms-0">Machine Type</label>
	<select class="form-control" name="machine_type" >
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
        <input type="text" name="brand" class="form-control" >
			
      </div>
    </div>
	<div class="col">
      <div class="input-group input-group-static mb-4">
        <label class="form-">Model :</label>
        <input type="text"  name="model" class="form-control" >
      </div>
    </div>
	
						
					
	</div>
<div class="row">
<div class="col">
      <div class="input-group input-group-static mb-4">
        <label class="form-">Reported Problem :</label>
        <input type="text"  name="rep_problem" class="form-control" required>
      </div>
    </div>
	<div class="col">
      <div class="input-group input-group-static mb-4">
        <label class="form-">Service Call Date:</label>
        <input type="date"  name="sv_date" class="form-control" required>
      </div>
    </div>
    <div class="col">
      <div class="input-group input-group-outline my-3 is-filled">
                    <label class="form-label">Assign To: </label>
                     <div  class="form-control p-0 service_by_svg"> </div>
                    </div>
    </div>
</div>						
                    </div>
                </div>
                <div class="modal-footer rounded-0">
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary btn-sm rounded-0" id="confirmG" name="addSchedule"> Confirm</button>
                           <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
                    </div>
					</form>
                </div>
            </div>
        </div>
    </div>

<!-- Modal for Editing PM -->
<div class="modal fade modal-lg" id="edit-pm-modal"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-md">
    <div class="modal-content update_pm_contents">

    </div>
  </div>
</div>  
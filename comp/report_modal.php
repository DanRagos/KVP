<!--  Modal for Generating Report-->
<div class="modal fade" id="generateReport" tabindex="-1" role="dialog" aria-labelledby="generateReport" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role=document>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Report</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">X</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="input-group input-group-static">
                  
                         <label for="" class="ms-0">Reports</label>
                   
                    <select name="doc_name" onchange="ChangeDoc(this)" class="form-control" required>
                        <option value="" selected>Reports</option>
						 <option value="Memorandum of Agreement"hidden>Memorandum of Agreement</option>
                        <option value="Memorandum of Agreement"hidden>Memorandum of Agreement</option>
                        <option value="Minutes of the Meeting"hidden>Minutes of the Meeting</option>
                        <option value="Incoming Communication"hidden>Incoming Communication</option>
                        <option value="Outgoing Communication"hidden>Outgoing Communication</option>
						   <option value="Outgoing Communication"hidden>Outgoing Communication</option>
                        <option value="Resolved PMS">PMS</option>
                        <option value="Service Call">Service Call</option>
                        <option value="Contract Status">PMS Contract Status</option>
                        <option value="Extension Coordinator Uploaded">Service Done </option>
                    </select>
                </div>
                <form action="../inc/report.php" method="post" style="display:none;" target="_blank" autocomplete="off">
                    <div class="mt-2">
                        <input type="hidden" name="doc_name" value="PMS">
					 <div class="input-group input-group-outline mb-1">
						<label class="form-label">Report Name</label>
						<input type="text" class="form-control" name="report_name" required>
						</div>
						<!--
						 <div class="input-group input-group-outline mb-1">                
                       
                    <select name="category" class="form-control" required>
					
                        <option value="null" selected>PMS And Service Call</option>
                        <option value="pms">PMS Only</option>
                        <option value="service">Service Call Only</option>
                    </select>
                </div>
				<-->
				<div class="input-group input-group-outline mb-1">                
                     <select name="category" class="form-control" required>
                                <option selected value="Attended">Attended</option>                   
                               <option  value="Unattended">Unattended</option>            
                                
                            </select>
                </div>
			
						 <div class="input-group input-group-outline mb-1">
						<label class="form-label">PMS Schedule Date</label>
						<input name="datefilter" class="form-control" required>
						</div>
							<div class="input-group input-group-outline mb-1">                
                     <select name="client_id" class="form-control" required>
                                <option selected value="null">Client: (Optional)</option>
                                <?php
                                    $sql = "SELECT DISTINCT client_id, client_name FROM clients";
                                    $result = $conn->query($sql);
                                    while ($row = $result -> fetch_assoc()){
                                ?>
                                <option value = "<?php echo $row['client_id']?>"><?php echo $row['client_name']?></option>
                                <?php
                                    }
                                ?>
                            </select>
                </div>
						<div class="input-group input-group-outline mb-1">                
                     <select name="service_by" class="form-control" required>
                                <option selected value="null">Serviced by: (Optional)</option>
                                <?php
                                    $sql = "SELECT DISTINCT service_by FROM pms";
                                    $result = $conn->query($sql);
                                    while ($row = $result -> fetch_assoc()){
                                ?>
                                <option value = "<?php echo $row['service_by']?>"><?php echo $row['service_by']?></option>
                                <?php
                                    }
                                ?>
                            </select>
                </div>
                        
                        <div class="form-group input-group mb-3">
                            <div class="type-choose">
                                <input class="choosen" name="doc_type" type="hidden" value="res_pms">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer text-center">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" name="create_report" value="submit"><i class="fa fa-file"></i> Generate</button>
                    </div>
                </form>
                 <form action="../inc/report.php" method="post" style="display:none;" target="_blank" autocomplete="off">
                    <div class="mt-2">
                        <input type="hidden" name="doc_name" value="Service Call">
                 
					 <div class="input-group input-group-outline mb-1">
						<label class="form-label">Report Name</label>
						<input type="text" class="form-control" name="report_name" required>
						</div>
					
					<div class="input-group input-group-outline mb-1">                
                     <select name="category" class="form-control" required>
                                <option selected value="Resolved">Resolved</option>                   
                               <option  value="Unresolved">Unresolved</option>            
                                
                            </select>
                </div>
			
						 <div class="input-group input-group-outline mb-1">
						<label class="form-label">Service Date</label>
						<input name="datefilter" class="form-control" required>
						</div>
							<div class="input-group input-group-outline mb-1">                
                     <select name="client_id" class="form-control" required>
                                <option selected value="null">Client (Optional)</option>
                                <?php
                                    $sql = "SELECT DISTINCT client_id, client_name FROM clients";
                                    $result = $conn->query($sql);
                                    while ($row = $result -> fetch_assoc()){
                                ?>
                                <option value = "<?php echo $row['client_id']?>"><?php echo $row['client_name']?></option>
                                <?php
                                    }
                                ?>
                            </select>
                </div>
						<div class="input-group input-group-outline mb-1">                
                     <select name="service_by" class="form-control" required>
                                <option selected value="null">Serviced by: (Optional)</option>
                                <?php
                                    $sql = "SELECT DISTINCT service_by FROM pms";
                                    $result = $conn->query($sql);
                                    while ($row = $result -> fetch_assoc()){
                                ?>
                                <option value = "<?php echo $row['service_by']?>"><?php echo $row['service_by']?></option>
                                <?php
                                    }
                                ?>
                            </select>
                </div>
                        
                        <div class="form-group input-group mb-3">
                            <div class="type-choose">
                                <input class="choosen" name="doc_type" type="hidden" value="svc">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer text-center">
                        <button  class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" name="create_report" value="submit"><i class="fa fa-file"></i> Generate</button>
                    </div>
                </form>
				    <form action="../inc/report.php" method="post" style="display:none;" target="_blank" autocomplete="off">
					
                    <div class="mt-2">
                        <input type="hidden" name="doc_name" value="Contract Status">
                 
					 <div class="input-group input-group-outline mb-1">
						<label class="form-label">Report Name</label>
						<input type="text" class="form-control" name="report_name" required>
						</div>
				
			
						 <div class="input-group input-group-outline mb-1">
						<label class="form-label"> Coverage Date</label>
						<input name="datefilter" class="form-control" required>
						</div>
							<div class="input-group input-group-outline mb-1">                
                     <select name="category" class="form-control" required>
                                <option selected value="Active">Active</option>
								 <option  value="Expired">Expired</option>
                               
                            </select>
                </div>
					
                        <div class="form-group input-group mb-3">
                            <div class="type-choose">
                                <input class="choosen" name="doc_type" type="hidden" value="contract_status">
								<input class="choosen" name="client_id" type="hidden" value="null">
									<input class="choosen" name="service_by" type="hidden" value="null">
								
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer text-center">
                        <button  class="btn btn-secondary" data-bs-dismiss="modal"> Cancel</button>
                        <button type="submit" class="btn btn-primary" name="create_report" value="submit"><i class="fa fa-file"></i> Generate</button>
                    </div>
                </form>
             <form action="../inc/report.php" method="post" style="display:none;" target="_blank" autocomplete="off">
                    <div class="mt-2">
                        <input type="hidden" name="doc_name" value="Service Done">
                 
					 <div class="input-group input-group-outline mb-1">
						<label class="form-label">Report Name</label>
						<input type="text" class="form-control" name="report_name" required>
						</div>
					
						 <div class="input-group input-group-outline mb-1">
						<label class="form-label">Service Date</label>
						<input name="datefilter" class="form-control" required>
						</div>
							<div class="input-group input-group-outline mb-1">                
                     <select name="client_id" class="form-control" required>
                                <option selected value="null">Client (Optional)</option>
                                <?php
                                    $sql = "SELECT DISTINCT client_id, client_name FROM clients";
                                    $result = $conn->query($sql);
                                    while ($row = $result -> fetch_assoc()){
                                ?>
                                <option value = "<?php echo $row['client_id']?>"><?php echo $row['client_name']?></option>
                                <?php
                                    }
                                ?>
                            </select>
                </div>
						<div class="input-group input-group-outline mb-1">                
                     <select name="service_by" class="form-control" required>
                                <option selected value="null">Serviced by: (Optional)</option>
                                <?php
                                    $sql = "SELECT DISTINCT service_by FROM pms";
                                    $result = $conn->query($sql);
                                    while ($row = $result -> fetch_assoc()){
                                ?>
                                <option value = "<?php echo $row['service_by']?>"><?php echo $row['service_by']?></option>
                                <?php
                                    }
                                ?>
                            </select>
                </div>
                        
                        <div class="form-group input-group mb-3">
                            <div class="type-choose">
                                <input class="choosen" name="doc_type" type="hidden" value="service_done">
								       <input class="choosen" name="category" type="hidden" value="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer text-center">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" name="create_report" value="submit"><i class="fa fa-file"></i> Generate</button>
                    </div>
                </form>
				    
			 </div>
        </div>
    </div>
</div>

<?php
require_once 'session.php';
// Edit Client Details
if (isset($_POST['edit_client'])){
	$id = $_POST['edit_client'];
	$row = $client ->edit_clients($id);
	echo json_encode($row);
	
}
//Update Update Client Details
if (isset($_POST['action'])&& $_POST['action'] == 'update_client'){
	$id = $_POST['client_id'];
	$name = $_POST['client_name'];
	$address = $_POST['address'];
	$cPerson = $_POST['cPerson'];
	$email = $_POST['email'];
	$row = $client->update_client($id,$name,$address,$cPerson,$email);
	print_r($_POST);
}

//Display all Clients
if (isset($_POST['action'])&& $_POST['action'] == 'display_clients'){
	$output= '';
	$row = $client->showClients();
	if($row) {
		$output .= '  <table id="table" class="table align-items-center justify-content-center" >
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Client</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contacts</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                  </thead>
                  <tbody>';
	foreach($row as $row){
		$output .= ' <tr>
						<td>
                         <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../image/uploads/mv santiago.webp" class="avatar avatar-sm me-3 border-radius-lg" alt="user2">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
							<input type = "hidden" name="client_id" value="'.$row['client_id'].'">
                            <h6 class="mb-0 text-sm">'.$row['client_name'].'</h6>
                            <p class="text-xs text-secondary mb-0">'.$row['client_address'].'</p>
                          </div>
                        </div>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
						<h6 class="mb-0 text-sm">'.$row['contact_person'].'</h6>
                        <p class="text-xs font-weight-bold mb-0">'.$row['contact_email'].'</p>
               
                      </td>
					  <td>
					   
					   <button type="button" id="'.$row['client_id'].'"data-bs-target = "#editClient" data-bs-toggle="modal" class="btn btn-warning editClientBtn"><i class="material-icons">edit</i></button>
					   <button type="button" id="'.$row['client_id'].'"  data-bs-toggle="modal"  class="btn btn-danger deleteBtn"><i class="material-icons">delete</i></button>
					  </td>
                    </tr>';
	}
	$output .='</tbody> </table>';
	echo $output;
	}
}
?>
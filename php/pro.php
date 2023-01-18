<?php
require_once 'session.php';
require_once '../classes/auth.php';
require_once '../classes/db.php';
class Test extends Db {
public function get_list1(){
		$sql ="Select * from orderlist_main";
		$stmt = $this->conn->prepare($sql);
		$stmt ->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
}
$tool = new Test();
	
// Display All Notes
if (isset($_POST['action'])&& $_POST['action'] == 'display_notes'){
	$output= '';
	$note = $tool->get_list1();
	if($note) {
		$output .= '  <table id="table" class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Machine / Part.</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Model / Serial</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Manufacturer</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Location</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Owner</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Interval</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Instruction Reference</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Last Cal. / Ver. Date</th>
					  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                  </thead>
                  <tbody>';
	foreach($note as $row){
		$output .= ' <tr>
						<td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/small-logos/machine-1.svg" class="avatar avatar-sm me-3 border-radius-lg" alt="user2">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">'.$row['OrderDate_Main'].'</h6>
                            <p class="text-xs text-secondary mb-0">'.$row['DueDate_Main'].'</p>
                          </div>
                        </div>
                      </td>
					    <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-info">'.$row['POJO_Main'].'</span>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">'.$row['Quantity_Main'].'</p>
                        <p class="text-xs text-secondary mb-0">'.$row['Destination_Main'].'</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-xs text-secondary mb-0">'.$row['Item_Main'].'</span>
                      </td>
                     <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">'.$row['Sub_Assy_Main'].'</span>
                      </td>
					  <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">'.$row['Key_Assy_Main'].'</span>
                      </td>
					  <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">'.$row['Output_Main'].'Y</span>
                      </td>
					   <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">'.$row['LSJ_DueDate'].'</span>
                      </td>
					  <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">365</span>
                      </td>
					  <td>
					   
					   <button type="button" id="'.$row['ID_Main'].'"data-bs-target = "#editTool" data-bs-toggle="modal" class="btn btn-warning editBtn">Edit</button>
					   <button type="button" id="'.$row['ID_Main'].'"  data-bs-toggle="modal"  class="btn btn-danger deleteBtn">Obsolete</button>
					  </td>
                    </tr>';
	}
	$output .='</tbody> </table>';
	echo $output;
	}
}


?>
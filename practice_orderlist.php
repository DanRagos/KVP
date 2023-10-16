<?php
//To cennect css to php file
define('__DEBUG__', true);

//If Username is not set you cannot go back to this page 
include('Connections/Connection.php');
include('Logged.php');

$filterSearch = "";
    if(isset($_GET['search'])){
        $filterSearch = $_GET['search'];
    }

$date = date('Y-m-d');
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/CSS/bootstrap.css?<?=__DEBUG__?time():''//To cennect css to php file?>"  >
    <link rel="stylesheet" type="text/css" href="CSS/style.css?<?=__DEBUG__?time():''//To cennect css to php file?>">
    <title>LSJ List of Orders</title>
    <script src="JS/jquery362.js" crossorigin="anonymous"></script>
    <script src="js/JS/bootstrap.bundle.js" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            form = $('#form1')[0];
            data = new fromData(form);
            {
                $.ajax({
                url:"Wholelist.php", //page where the process is?
                type:"POST", //Method of the form
                data: data,
                success:function(data) //will receive the data from wholelist php (output)
                {
                    $('#result').html(data); //this will change the data in div with the id of #result
                }
                });
            }
            $('#reload').keyup(function(){
                var search = $(this).val();
                if(search != '')
                {
                    load_data(search);
                }
                else
                {
                    load_data();
                }
            });
        });
    </script>
</head> 
<link rel = "icon" href = "Images/LineSeikiLogopreview.png" type = "image/x-icon">
<body>
<?php
include('Navbar.php');
?>
    <div class="row justify-content-md-center HeaderPerPage">
        <div class="col-md-auto">
            <h1>Line Seiki Japan List of Orders</h1>
        </div>
    </div>
<div class="container-fluid ordlist">   
    <div class="container-lg loi">  
        <div>
            <button class='btn-success btn-demo-sched' id="demo-1"></button>
            <button class='btn-danger btn-demo-del' id="demo-2"></button>
        </div>
        <div class="label-button">
            <label class="demo-1" for="demo-1">- Click color green button to <span style="font-weight:bold; color:green;">SCHEDULE</span> the JO.</label>
            <label class="demo-2" for="demo-2">- Click color red button to <span style="font-weight:bold; color:red;">DELETE</span> the JO.</label>
        </div>
        <form class="row g-1 search-base" method="GET" action="practice_orderlist.php">
            <div class="col-md-2">
                <input type="input" class="search" name="search" placeholder="Search..." value="<?php if(isset($_GET['search'])){echo $filterSearch;}?>">
            </div>
        </form>
        <form  class="sort-base" Action="practice_orderlist.php" method="GET" >
            <div class="input-group sorting-ord">
                <select name="sorting" class="form-control choice">
                    <option><--SELECT--></option>
                    <option value="OrderDateFir" <?php if(isset($_GET['sorting']) && $_GET['sorting'] == "OrderDateFir"){ echo"selected";}?> >Order Date</option>
                    <option value="DueDateSec" <?php if(isset($_GET['sorting']) && $_GET['sorting'] == "DueDateSec"){ echo"selected";}?>>Due Date</option>
                    <option value="POJOThir" <?php if(isset($_GET['sorting']) && $_GET['sorting'] == "POJOThir"){ echo"selected";}?>>PO/PRS/JO</option>
                    <option value="QuantityFou" <?php if(isset($_GET['sorting']) && $_GET['sorting'] == "QuantityFou"){ echo"selected";}?>>Quantity</option>
                </select>
                <button type="submit" name="SORT" class="input-group-text btn btn-primary btn-sorting" id="basic-addon2">Sort</button>
            </div>
        </form>
    </div>
    <p style="color:green; text-align:center; font-weight:bold;">  
        <?php
        if(isset($_SESSION['notify'])){
            echo($_SESSION['notify']);
            unset($_SESSION['notify']);
        }
        ?>
    </p>
    <div class="container-fluid ">
        <div id="table-scroll2">
            <table class="table table-bordered table-striped table-hover form-loi">
                <tr class="table-striped-header">
                    <th>Order Date</th>
                    <th>Due Date</th>
                    <th>P0/PRS/JO</th>
                    <th>Quantity</th>
                    <th>Destination</th>
                    <th>Item Model</th>
                    <th>Output</th>
                    <th>Customer DueDate</th>
                </tr>
            </table>
            <?php
                if(isset($_GET['search'])){
                    $filterSearch = $_GET['search'];
                    $query = "SELECT * FROM orderlist_main WHERE OrderDate_Main LIKE '%$filterSearch%' OR DueDate_Main LIKE '%$filterSearch%' OR POJO_Main LIKE '%$filterSearch%' OR Quantity_Main LIKE '%$filterSearch%' OR Destination_Main LIKE '%$filterSearch%' OR Item_Main LIKE '%$filterSearch%'";
                    unset($_SESSION['search']);

                }elseif(isset($_GET['sorting']) && $_GET['sorting'] == "OrderDateFir"){
                    $query = "SELECT * FROM orderlist_main ORDER BY OrderDate_Main ASC";

                }elseif(isset($_GET['sorting']) && $_GET['sorting'] == "DueDateSec"){
                    $query = "SELECT * FROM orderlist_main ORDER BY DueDate_Main ASC";

                }elseif(isset($_GET['sorting']) && $_GET['sorting'] == "POJOThir"){
                    $query = "SELECT * FROM orderlist_main ORDER BY POJO_Main ASC";

                }elseif(isset($_GET['sorting']) && $_GET['sorting'] == "QuantityFou"){
                    $query = "SELECT * FROM orderlist_main ORDER BY Quantity_Main ASC";

                }else{
                    $query = "SELECT * FROM orderlist_main WHERE DueDate_Main > '$date'";
                }
                $rold=array();
                $query_run = mysqli_query($con, $query);
                $sqldb = "SELECT EM_JO_Num, LEFT(EM_JO_Num, 7) FROM em_table";  // to trim the jo number in em table ex.(421422-1 becomes 421422-)
                $sqldb_run = mysqli_query($con, $sqldb);
                
                while($row = mysqli_fetch_array($sqldb_run)){
                    $rold[]= $row['LEFT(EM_JO_Num, 7)'];
                }
                

                if(mysqli_num_rows($query_run) > 0){
                    //String Manipulation for column MODEL

                    //Displaying the table in UI 
                    foreach($query_run as $items){
                        //for changing color if it's already scheduled  ETO DI GAGANA SINCE IBANG TABLE YUNG HINAHANAP NIYA POJO NAKALAGAY NOT POMain
                        if(in_array($items['POJO_Main'], $rold)==TRUE){
                            $c = "background-color:#D9C19D;";
                        }else{
                            $c = "background-color:#fdf4cd;";
                        }
                        
                        $needed = $items['POJO_Main'];

            ?>
            <div class="accordion accordion-flush" id="accordion_<?php echo $items['POJO_Main']?>">
                <div class="accordion-item" >
                    <h2 class="accordion-header" id="flush_<?php echo $items['POJO_Main']?>">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne_<?php echo $items['POJO_Main']?>" aria-expanded="false" aria-controls="collapseOne_<?php echo $items['POJO_Main']?>">
                        <div class="container-fluid" style="<?php echo $c ?>">
                            <div class="row" id="result">
                                <div class="col-2" style="margin-left:30px; font-size:17px;"><?php echo $items['OrderDate_Main']?></div>
                                <div class="col-1" style="margin-left:-70px; font-size:17px;"><?php echo $items['DueDate_Main']?></div>
                                <div class="col-1" style="margin-left:60px; font-size:17px;"><?php echo $items['POJO_Main']?></div>
                                <div class="col-1" style="margin-left:50px; font-size:17px;"><?php echo $items['Quantity_Main']?></div>
                                <div class="col-2" style="margin-left:10px; font-size:17px;"><?php echo $items['Destination_Main']?></div>
                                <div class="col-2" style="margin-left:-70px; font-size:17px;"><?php echo $items['Item_Main']?></div>
                                <div class="col-1" style="margin-left:-20px; font-size:17px;"><?php echo $items['Output_Main']?></div>
                                <div class="col-1" style="margin-left:40px; font-size:17px;"><?php echo $items['LSJ_DueDate']?></div>
                            </div>
                        </div>    
                    </button>
                    </h2>
                    <div id="collapseOne_<?php echo $items['POJO_Main']?>" class="accordion-collapse collapse" aria-labelledby="flush_<?php echo $items['POJO_Main']?>" data-bs-parent="#accordion_<?php echo $items['POJO_Main']?>">
                        <!-- Button trigger modal for customer due date -->    
                        <div>
                            <button type="button" class="btn btn-primary Duedatebut" data-bs-toggle="modal" data-bs-target="#CduedateModal_<?php echo $items['ID_Main']?>" style="margin-left:43%; margin-right:43%; margin-top:18px;">Set Customer Duedate</button>
                        </div>
                        <!-- Modal for customer due date -->
                        <div class="modal fade" id="CduedateModal_<?php echo $items['ID_Main']?>" tabindex="-1" aria-labelledby="CduedateModalLabel_<?php echo $items['ID_Main']?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="CduedateModalLabel_<?php echo $items['ID_Main']?>">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="Wholelist.php" id="form1">
                                            <input type="hidden" name="pojo_main" value="<?php echo $items['POJO_Main']?>">
                                            <input type="hidden" name="id_main" value="<?php echo $items['ID_Main']?>">
                                            <input type="date" name="Cduedate" min="<?php echo $date?>">
                                    </div>
                                    <div class="modal-footer" >
                                        <button type="submit" class="btn btn-primary" name ="submitCdate" id="reload">Set as customer due date</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
                        if($items['Sub_Assy_Main'] === NULL){
                        ?>
                            <button  class='btn btn-success sub_assy_decider' name='station' data-bs-toggle="modal" data-bs-target="#ordList_<?php echo $items['POJO_Main']?>">Choose Sub-Assy</button> 
                            <!--This is the modal-->
                            <div class="modal" id="ordList_<?php echo $items['POJO_Main']?>" tabindex="-1"  aria-labelledby="<?php echo $items['POJO_Main']?>">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="<?php echo $items['POJO_Main']?>">Select Sub-Assemblys</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="POST" action="WholeList.php">
                                            <div class="modal-body">
                                                <p style="color:red; text-align:center;">  
                                                    <?php
                                                        if(isset($_SESSION['php_checkbox'])){
                                                            echo($_SESSION['php_checkbox']);
                                                            unset($_SESSION['php_checkbox']);
                                                        }
                                                    ?>
                                                </p>
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td><input type="checkbox" name="sub_assy[]" value="COIL WINDING(EM)"> COIL WINDING (EM)</td>
                                                        <td><input type="checkbox" name="sub_assy[]" value="COIL ASSY(EM)"> COIL ASSY (EM)</td>
                                                        <td><input type="checkbox" name="sub_assy[]" value="with STAMP on FRAME or BRACKET(MZ)"> WITH STAMP ON FRAME OR BRACKET (MZ)</td>
                                                        <td><input type="checkbox" name="sub_assy[]" value="OUTGOING INSPECTION(ELEC)"> OUTGOING INSPECTION (ELEC)</td>
                                                        <td><input type="checkbox" name="sub_assy[]" value="DRIVE YOKE"> DRIVE YOKE (MECH)</td>
                                                        <td><input type="checkbox" name="sub_assy[]" value="WHEEL SHAFT"> WHEEL SHAFT (MECH)</td>
                                                        <td><input type="checkbox" name="sub_assy[]" value="COUNT LEVER"> COUNT LEVER (MECH)</td>
                                                        <td><input type="checkbox" name="sub_assy[]" value="W/orW/O COUNT LEVER ASSY"> W/ OR W/O COUNT LEVER ASSY (MECH)</td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="checkbox" name="sub_assy[]" value="FR(LMS/HRF/OL/S92)"> FR (LMS/HRF/OL/S92)</td>
                                                        <td><input type="checkbox" name="sub_assy[]" value="MG(LMS)">MG (LMS)</td>
                                                        <td><input type="checkbox" name="sub_assy[]" value="LG(LMS)">LG (LMS)</td>
                                                        <td><input type="checkbox" name="sub_assy[]" value="PAP(OL/S92)">PAP (OL/S92)</td>
                                                        <td><input type="checkbox" name="sub_assy[]" value="CSA(OL/S92)">CSA (OL/S92)</td>
                                                        <td><input type="checkbox" name="sub_assy[]" value="LGP(OL/S92)">LGP (OL/S92)</td>
                                                        <td><input type="checkbox" name="sub_assy[]" value="Main Assy">Main Assy</td>
                                                    </tr>
                                                </table>
                                                <hr>
                                                <div class="row" style="justify-content:center; font-weight:bold;">
                                                    <div class="col-4"><input type="radio" name="Pre-req" value="1" required style="height:25px; weight:25px;">Sub-Assy W/ Prerequisite</div>
                                                    <div class="col-4"><input type="radio" name="Pre-req" value="2" style="height:25px; weight:25px;">Sub-Assy W/O Prerequisite</div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <input type="hidden" name="POJO_Main" value="<?php echo $items['POJO_Main']?>">
                                                <button type="submit" name="ordStation_Change" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }else{
                            //for POJO that has a numbering like 412912-1 -2 -3
                            $getter = "SELECT * FROM orderlist WHERE POJO LIKE '%$needed%'";
                            $getter_run = mysqli_query($con, $getter);

                            
                            while($sub = mysqli_fetch_assoc($getter_run)){
                                $ord_id = $sub['Ord_ID'];
                                $pojo_ord = $sub['POJO'];
                                $key_assy = $sub['Key_Assy'];
                                $assem = explode(',',$sub['Sub_Assy_Ord']);
                                $counter = count($assem);
                        ?>
                            <div class="accordion-body ">
                                <div class="col-md-12 mb-0">
                                    <div class="card">
                                        <div class="card-body">
                                                <h6 class="card-title" style="color:white; background-color:black;">
                                                    <div class="row" style="margin-left:5%; ">
                                                        <div class="col-2"><?php echo $sub['OrderDate']?></div>
                                                        <div class="col-2"><?php echo $sub['DueDate']?></div>
                                                        <div class="col-2"><?php echo $sub['POJO']?></div>
                                                        <div class="col-2"><?php echo $sub['Quantity']?></div>
                                                        <div class="col-2"><?php echo $sub['Destination']?></div>
                                                        <div class="col-2"><?php echo $sub['Item']?></div>

                                                        <input type="hidden" name="OrderDate_Orig" value="<?php echo $sub['OrderDate']?>">
                                                        <input type="hidden" name="DueDate_Orig" value="<?php echo $sub['DueDate']?>">
                                                        <input type="hidden" name="Quantity_Orig" value="<?php echo $sub['Quantity']?>">
                                                        <input type="hidden" name="Destination_Orig" value="<?php echo $sub['Destination']?>">
                                                        <input type="hidden" name="Item_Orig" value ="<?php echo $sub['Item']?>">
                                                    </div> 
                                                </h6>
                                                <div class="row">
                                                    <?php
                                                    ///////////////////////////////////////////////////////////////////////////////////////////
                                                    for($i = 0; $i < $counter; $i++){
                                                    $numb = $i;
                                                    $disabler=""; // This is to disable the SCHEDULE button when need prerequisite
                                                    $disabler2=""; // This is to disable the DONE button at the end of the sub assy
                                                    $sub_holder = $assem[$i];
                                                        if($key_assy > 0){ // Disable when have PREREQUISITE (key_assy 1 or 0) 1 means have prerequisite | NULL means no prerequisite
                                                            if($numb > 0){ 
                                                                $cr = $numb - 1;
                                                                $decision = "SELECT * FROM sub_assy WHERE JO_Number = '$pojo_ord' AND Num_of_assy = '$cr' AND Num_done_overall = Final_Quantity";
                                                                $decision_run = mysqli_query($con, $decision);
                                                                if(mysqli_num_rows($decision_run)>0){
                                                                    $current = "SELECT * FROM sub_assy WHERE JO_Number = '$pojo_ord' AND Num_of_assy = '$numb' AND Num_done_overall = Final_Quantity";
                                                                    $current_run = mysqli_query($con, $current);
                                                                    if(mysqli_num_rows($current_run)>0){
                                                                        $disabler = "Disabled";
                                                                    }else{
                                                                        $last_phase = "SELECT * FROM creatschedule WHERE POJO2 = '$pojo_ord' AND Sub_Assembly = '$sub_holder' AND sequence_assi = '$numb'";
                                                                        $last_phase_run= mysqli_query($con, $last_phase);
                                                                        if(mysqli_num_rows($last_phase_run)>0){
                                                                            $disabler = "Disabled";
                                                                        }else{
                                                                            $last_last = "SELECT * FROM sub_assy WHERE Connection_ID = '$ord_id' AND Assembly_sub = '$sub_holder' AND Num_of_assy = '$numb' AND Num_Items_Done = 0";
                                                                            $last_last_run = mysqli_query($con, $last_last);
                                                                            if(mysqli_num_rows($last_last_run)>0){
                                                                                $disabler = "Disabled";
                                                                            }else{
                                                                                $disabler = "";
                                                                            }
                                                                        }
                                                                    }
                                                                }else{
                                                                    $disabler = "Disabled";
                                                                }

                                                                
                                                            }else{
                                                                $decision2 = "SELECT * FROM sub_assy WHERE JO_Number = '$pojo_ord' AND Num_of_assy = '0' AND  Num_done_overall = Final_Quantity";
                                                                $decision2_run = mysqli_query($con, $decision2);
                                                                if(mysqli_num_rows($decision2_run)>0){
                                                                    $disabler = "Disabled";
                                                                }else{
                                                                    $last_phase = "SELECT * FROM creatschedule WHERE POJO2 = '$pojo_ord' AND Sub_Assembly = '$sub_holder' AND sequence_assi = '$numb'";
                                                                    $last_phase_run= mysqli_query($con, $last_phase);
                                                                    if(mysqli_num_rows($last_phase_run)>0){
                                                                        $disabler = "Disabled";
                                                                    }else{
                                                                        $last_last = "SELECT * FROM sub_assy WHERE Connection_ID = '$ord_id' AND Assembly_sub = '$sub_holder' AND Num_of_assy = '$numb' AND Num_Items_Done = 0";
                                                                        $last_last_run = mysqli_query($con, $last_last);
                                                                        if(mysqli_num_rows($last_last_run)>0){
                                                                            $disabler = "Disabled";
                                                                        }else{
                                                                            $disabler = "";
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }else{  //NO PREREQUISITE
                                                            $decision = "SELECT * FROM sub_Assy WHERE JO_Number = '$pojo_ord' AND Num_of_assy = '$numb' AND Status_Sub = 'Done'";
                                                            $decision_run = mysqli_query($con, $decision);
                                                            if(mysqli_num_rows($decision_run)>0){
                                                                $disabler = "Disabled";
                                                            }else{
                                                                $last_phase = "SELECT * FROM creatschedule WHERE POJO2 = '$pojo_ord' AND Sub_Assembly = '$sub_holder' AND sequence_assi = '$numb'";
                                                                $last_phase_run= mysqli_query($con, $last_phase);
                                                                if(mysqli_num_rows($last_phase_run)>0){
                                                                    $disabler = "Disabled";
                                                                }else{
                                                                    $last_last = "SELECT * FROM sub_assy WHERE Connection_ID = '$ord_id' AND Assembly_sub = '$sub_holder' AND Num_of_assy = '$numb' AND Num_Items_Done = 0";
                                                                    $last_last_run = mysqli_query($con, $last_last);
                                                                    if(mysqli_num_rows($last_last_run)>0){
                                                                        $disabler = "Disabled";
                                                                    }else{
                                                                        $disabler = "";
                                                                    }
                                                                }
                                                            }
                                                        }

                                                        $almost = "SELECT * FROM sub_assy WHERE JO_Number = '$pojo_ord' AND Status_Sub = 'Done'";
                                                        $almost_run = mysqli_query($con, $almost);
                                                        if(mysqli_num_rows($almost_run)!=$counter){
                                                            $disabler2 = "style='display:none;'";
                                                        }else{
                                                            $disabler2 = "";
                                                        }   
                                                    
                                                        $actual_output = "SELECT Num_done_overall FROM sub_assy WHERE Connection_ID = '$ord_id' AND Assembly_Sub = '$assem[$i]' AND last_output = 'Latest'";
                                                        $actual_output_run = mysqli_query($con, $actual_output);

                                                        $magic="";

                                                        if(mysqli_num_rows($actual_output_run)>0){
                                                            while($g = mysqli_fetch_assoc($actual_output_run)){
                                                                $magic = $g['Num_done_overall'];
                                                            }
                                                        }else{
                                                            $magic = "0";
                                                        }

                                                        //Disable DONE BUTTON 
                                                        $Ddone = "SELECT POJO from orderlist WHERE Ord_ID = '$ord_id' AND status = 'finish'";
                                                        $Ddone_run = mysqli_query($con, $Ddone);
                                                        $done_finisher = "";
                                                        if(mysqli_num_rows($Ddone_run)>0){
                                                            $done_finisher = "Disabled";
                                                        }else{
                                                            $done_finisher = "";
                                                        }
                                                    ?>
                                                        <div class="col-md-2 mb-1">
                                                            <div class="card" >
                                                                <h6 class="card-title text-center" style="font-size:13px;"><?php echo $assem[$i]?></h6>
                                                                <div id="test">
                                                                    <p><?php echo $magic?> / <?php echo $sub['Quantity']?></p> 
                                                                </div>
                                                            </div>
                                                            <form method = "POST" action ="Schedule_Inserting.php" >
                                                                <input id="<?php echo $numb?>" type="hidden" name="sequence" value="<?php echo $numb?>">
                                                                <input  id="<?php echo $numb?>" type="hidden" name="POJO_Orig" value="<?php echo $sub['POJO']?>">
                                                                <input  id="<?php echo $numb?>" type="hidden" name="sub_assy_holder" value="<?php echo $assem[$i]?>">
                                                                <input id="<?php echo $numb?>" type="hidden" name="Ord_Id_Holder" value="<?php echo $sub['Ord_ID']?>"> 
                                                                <button type="submit" id="btn" class="btn btn-info" name="Sched_Go" value="<?php echo $numb?>" style="width:100%;" <?php echo $disabler?>>sched</button>
                                                            </form>
                                                        </div>
                                                    <?php       
                                                    }
                                                    $finish_Assy = $counter - 1;
                                                    $vanish = "SELECT Final_Quantity, Num_done_overall, JO_Number, Schedule_ID_sub, Connection_ID FROM sub_assy WHERE Connection_ID = '$ord_id' AND Num_of_assy = '$finish_Assy'";
                                                    $vanish_run = mysqli_query($con, $vanish); ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                                    while($t=mysqli_fetch_assoc($vanish_run)){
                                                    ?>                                                          
                                                    <div class="col-md-2 mb-1">
                                                        <div class="card" <?php echo $disabler2?>>
                                                            <h6 class="card-title text-center" style="font-size:13px;">Mark as Done</h6>
                                                            <p><?php echo $t['Num_done_overall']?> / <?php echo $t['Final_Quantity']?></p>
                                                            <form method = "POST" action ="Schedule_Inserting.php">
                                                                <input type="hidden" name="JOnumber" value="<?php echo $t['JO_Number']?>">
                                                                <input type="hidden" name="Schedule_ID_sub" value="<?php echo $t['Schedule_ID_sub']?>">
                                                                <input type="hidden" name="connection_id" value="<?php echo $t['Connection_ID']?>">
                                                                <input type="hidden" name="overall_done" value="<?php echo $t['Num_done_overall']?>">
                                                                <button type="submit" class="btn btn-info" name="finish" value="" style="width:100%;" <?php echo $done_finisher?>>DONE</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php
                    }
                }else{
                    ?><div class="container-fluid">
                        <div class="row">
                            <div class="col-12">NO RECORD FOUND</div>
                        </div>
                    </div><?php
                }
            ?>
        </div>
    </div>
</div>    
</body>
</html>
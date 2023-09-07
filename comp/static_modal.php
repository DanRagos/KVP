<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade modal-lg" id="addTool" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <img src="../img/line_jpg.jpg" class="img-fluid" style="width:25%;height:15%;padding-right:14px;"
                    alt="...">
                <h5 class="modal-title " id="staticBackdropLabel">Register Tool for Calibration / Verification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h6>Requestor </h6>
                        </div>
                        <div class="col">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">IMTE Name</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">ID No.:</label>
                                <input type="text" id="id" name="id" class="form-control">
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Request No.:</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Requested by: </label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Date Request.:</label>
                                <input type="date" class="form-control" value=<?php echo date("Y-m-d") ?>>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col ">
                            <div class="form-check">
                                <label class="form-label">Request:</label>
                                <input type="checkbox" class="form-check-input" id="customCheckDisabled">
                                <label class="custom-control-label" for="customCheckDisabled">Register</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Reason :</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Reference Doc.:</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>

                    <hr class="bg-danger border-2 border-top border-secondary">
                    <div class="row">
                        <div class="col">
                            <h6>Calibration Personnel </h6>
                        </div>
                        <div class="col ">
                            <div class="form-check">
                                <label class="form-label">Action Taken:</label>
                                <input type="checkbox" class="form-check-input" id="reg">
                                <label class="custom-control-label" for="reg">Register</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Date:</label>
                                <input type="date" class="form-control" value=<?php echo date("Y-m-d")?>>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group input-group-dynamic">
                                <textarea class="form-control" rows="3" placeholder="Remarks"
                                    spellcheck="false"></textarea>
                            </div>
                        </div>

                        <div class="col">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Reference Doc.:</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label class="form-label">Judgement:</label>
                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="customRadio1">
                                <label class="custom-control-label" for="customRadio1">FIT for Use</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="customRadio2">
                                <label class="custom-control-label" for="customRadio2">NOT FIT for USE</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="customRadio3">
                                <label class="custom-control-label" for="customRadio3">FOR DISPOSAL</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="customRadio4">
                                <label class="custom-control-label" for="customRadio4">OTHERS</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Validated by: </label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col">
                            <p> This is to certify that the item has been received in Good condition after request has
                                been
                                granted: </p>
                            <div class="input-group input-group-static mb-4">
                                <label class="form-label">Recipient:</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group input-group-static mb-4">
                                <label class="form-label">Remarks:</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>



                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Confirm</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<!-- modal for dashboard -->
<div class="modal fade modal-lg" id="viewModal" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <img src="../img/line_jpg.jpg" class="img-fluid" style="width:25%;height:15%;padding-right:14px;"
                    alt="...">
                <h5 class="modal-title " id="staticBackdropLabel">Verification / Calibration for this Month</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID
                                        No. / IMTE Name</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Type</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Model / Serial</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Location / Owner</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        PM Interval</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        PM Schedule</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Deadline</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="../assets/img/small-logos/machine-2.svg"
                                                    class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">212</h6>
                                                <p class="text-xs text mb-0">Handheld Laser Particle Counter</p>
                                            </div>
                                        </div>
                                    </td>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm bg-gradient-success">Calibration</span>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">3886 GEO-a</p>
                                        <p class="text-xs text-secondary mb-0">619264</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">Clean Room</p>
                                        <p class="text-xs text-secondary mb-0">PDN-COB</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">3Y</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-success text-xs font-weight-bold">December 2, 2022</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-danger text-xs font-weight-bold">December 8, 2022</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="../assets/img/small-logos/machine-2.svg"
                                                    class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">207</h6>
                                                <p class="text-xs text mb-0">Universal Bevel Protractor</p>
                                            </div>
                                        </div>
                                    </td>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm bg-gradient-success">Verification</span>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">187-901</p>
                                        <p class="text-xs text-secondary mb-0">76261</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">Calibration</p>
                                        <p class="text-xs text-secondary mb-0">Calibration Personnel</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">2Y</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-success text-xs font-weight-bold">December 2, 2022</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-danger text-xs font-weight-bold">December 8, 2022</span>
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade modal-lg" id="pendModal" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <img src="../img/line_jpg.jpg" class="img-fluid" style="width:25%;height:15%;padding-right:14px;"
                    alt="...">
                <h5 class="modal-title " id="staticBackdropLabel">Delayed Schedules</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="table-responsive p-0">
                        <table id="calibTable" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID
                                        No. / IMTE Name</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Type</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Model / Serial</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Location / Owner</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        PM Interval</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        PM Schedule</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Deadline</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="../assets/img/small-logos/machine-2.svg"
                                                    class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">212</h6>
                                                <p class="text-xs text mb-0">Handheld Laser Particle Counter</p>
                                            </div>
                                        </div>
                                    </td>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm bg-gradient-success">Calibration</span>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">3886 GEO-a</p>
                                        <p class="text-xs text-secondary mb-0">619264</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">Clean Room</p>
                                        <p class="text-xs text-secondary mb-0">PDN-COB</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">3Y</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-success text-xs font-weight-bold">December 2, 2022</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-danger text-xs font-weight-bold">December 8, 2022</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="../assets/img/small-logos/machine-2.svg"
                                                    class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">207</h6>
                                                <p class="text-xs text mb-0">Universal Bevel Protractor</p>
                                            </div>
                                        </div>
                                    </td>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm bg-gradient-success">Verification</span>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">187-901</p>
                                        <p class="text-xs text-secondary mb-0">76261</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">Calibration</p>
                                        <p class="text-xs text-secondary mb-0">Calibration Personnel</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">2Y</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-success text-xs font-weight-bold">December 2, 2022</span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-danger text-xs font-weight-bold">December 8, 2022</span>
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal for Edit Tool / Equipment -->

<div class="modal fade modal-lg" id="editTool" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <img src="../img/line_jpg.jpg" class="img-fluid" style="width:25%;height:15%;padding-right:14px;"
                    alt="...">
                <h5 class="modal-title " id="title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form id="edit-tool-form" action="#" method="post" autocomplete="off">
                        <div class="row">
                            <div class="col">
                                <div class="input-group input-group-static my-3">
                                    <label for="exampleFormControlSelect1" class="ms-0">Type:</label>
                                    <select class="form-control" name="type" id="exampleFormControlSelect1">
                                        <option id="type" selected></option>
                                        <option value=2>Calibration</option>
                                        <option value=1>Verification</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group input-group-static my-3">
                                    <label class="form-">IMTE Name</label>
                                    <input type="text" id="name" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group input-group-static my-3">
                                    <label class="form-">ID No.:</label>
                                    <input type="text" name="id" id="id_no" class="form-control">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group input-group-static my-3">
                                    <label class="form-">Serial:</label>
                                    <input type="text" name="serial" id="serial" class="form-control">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="input-group input-group-static my-3">
                                    <label class="form">Model:</label>
                                    <input type="text" name="model" id="model" class="form-control">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group input-group-static my-3">
                                    <label class="form">Manufacturer:</label>
                                    <input type="text" name="manufacturer" id="manufacturer" class="form-control">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group input-group-static my-3">
                                    <label class="form">Location:</label>
                                    <input type="text" name="location" id="location" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="input-group input-group-static my-3">
                                    <label class="form">Instruction Reference:</label>
                                    <input type="text" name="instruct_reference" id="instruct_reference"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group input-group-static my-3">
                                    <label class="form">Owner:</label>
                                    <input type="text" name="owner" id="owner" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="input-group input-group-static my-0">
                                    <label for="interval_date" class="ms-0">Interval:</label>
                                    <select class="form-control" name="interval_date">
                                        <option id="interval_date" selected>Y</option>
                                        <option>2Y</option>
                                        <option>3Y</option>
                                        <option>4Y</option>
                                        <option>5Y</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group input-group-static my-3">
                                    <label class="form">Reference Doc.:</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="editToolBtn" name="editTool" class="btn btn-primary">Confirm</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal for Editing PM -->
<div class="modal fade modal-lg" id="edit-pm-modal" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-md">
        <div class="modal-content update_pm_contents">

        </div>
    </div>
</div>



<!-- Modal for Report New Db -->
<div class="modal fade" id="reportNewModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="report-form" autocomplete="off">
                <div class="row d-flex justify-content-start">
                    <div class="col-6">
                        <div class="input-group input-group-static mb-4">
                            <label for="reportType" class="ms-0">Report Type</label>
                            <select class="form-control" id="reportType" name="reportType">
                                <option value=0 selected>Select</option>
                                <option value=1>Schedules</option>
                                <option value=2>Contracts</option>
                                <option value=3>Service Report</option>
                            </select>
                        </div>
                    </div>
                    <!----- Report for Schedule Report -->
                    <div id="scheduleReport"" style="display:none;">
                        <div class="row">
                            <div class="col">
                                <div class="input-group input-group-static mb-4">
                                    <label>Report Name</label>
                                    <input type="text" class="form-control" name="reportName">
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group input-group-static mb-4">
                                    <label for="scheduleStatus" class="ms-0">Schedule Type</label>
                                    <select class="form-control" id="schedType" name="schedType">
                                        <option value=1 selected>PMS</option>
                                        <option value=2>Service Call</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group input-group-static mb-4">
                                    <label>Schedule Date</label>
                                    <input name="datefilter" class="form-control" name="schedDate">
                                </div>
                            </div>
                            
                        </div>
                        <div class="row" id="pmsType">
                        <div class="col">
                                <div class="input-group input-group-static mb-4">
                                    <label for="scheduleStatus" class="ms-0">Schedule Status</label>
                                    <select class="form-control" id="scheduleStatus" name="schedStatus">
                                        <option value=0 selected>Not Done</option>
                                        <option value=2 >Done</option>
                                        <option class="unresolved" value=3 style="display:none;">Unresolved</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group input-group-static mb-4">
                                    <label for="scheduleStatus1" class="ms-0">Client (Optional) </label>
                                    <div  class="form-control p-0 sample-select1" id="myDiv" name="client"></div>    
                                </div>
                            </div>
                          
                        </div>
                       
                    </div>
                            <!----- Report for Contract Report Report -->
                            <div id="contractReport" style="display:none;">
                        <div class="row">
                            <div class="col">
                                <div class="input-group input-group-static mb-4">
                                    <label>Report Name</label>
                                    <input type="text" class="form-control" name="reportName" >
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group input-group-static mb-4">
                                    <label>Date Coverage</label>
                                    <input name="datefilter" class="form-control" >
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                        
                            <div class="col">
                                <div class="input-group input-group-static mb-4">
                                    <label for="scheduleStatus" class="ms-0">Contract Status</label>
                                    <select class="form-control" id="scheduleStatus" name="contractStatus">
                                        <option value=1 selected>Active Contract</option>
                                        <option value=2>Completed Contract</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group input-group-static mb-4">
                                    <label for="scheduleStatus1" class="ms-3">Client (Optional) </label>
                                    <div  class="form-control p-0 sample-select1" id="myDiv" name="client"></div>    
                                </div>
                            </div>
                        </div>
                       
                    </div>

                       <!----- Report for Service By -->
                       <div id="serviceReport" style="display:none;">
                        <div class="row">
                            <div class="col">
                                <div class="input-group input-group-static mb-4">
                                    <label>Report Name</label>
                                    <input type="text" class="form-control" name="reportName" >
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group input-group-static mb-4">
                                    <label>Service Date</label>
                                    <input name="datefilter" class="form-control" >
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                        <div class="col">
                                <div class="input-group input-group-static mb-4">
                                    <label for="scheduleStatus" class="ms-0">Schedule Type</label>
                                    <select class="form-control" id="scheduleStatus" name="serviceType">
                                        <option value=0 selected> All </option>
                                        <option value=1 >PMS</option>
                                        <option value=2>Service Call</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group input-group-static mb-4">
                                    <label for="scheduleStatus1" class="ms-3">Client (Optional) </label>
                                    <div  class="form-control p-0 sample-select1" id="myDiv" name="client"></div>    
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group input-group-static mb-4">
                                    <label for="scheduleStatus1" class="ms-0">Serviced By (Required) </label>
                                    <div  class="form-control p-0 sample-select" id="myDiv1" name="service_by"></div>    
                                </div>
                            </div>
                        </div>
                       
                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="report-confirm-btn">Confirm</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
            </form>
        </div>
    </div>
</div>
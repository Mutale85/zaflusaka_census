<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("header.php");
    
        if (isset($_GET['service_number']) && isset($_GET['unit_id'])) {
            $service_number = $_GET['service_number'];
            $parent_id = $_GET['unit_id'];

        }
    ?>
    <style>
    	textarea {
    		resize: none;
    	}
    </style>
</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <?php include("logo.php");?>      
        <div class="app-main">
        	<!-- include navigation -->
            <?php include 'nav.php'; ?>
            <!-- end of nav -->
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                    </div>            
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3 card p-3">
                                <div class="card-header">Add Service Personel</div>
                                <div class="card-body">
                                	<form method="post" id="form_1">
                                		<div class="card-header pb-3">
                                			<h4 class="card-title">Occupants Details</h4>
                                		</div>
                                		<?php
                                            $query = $connect->prepare("SELECT * FROM service_personnel WHERE service_number = ? AND parent_id = ? ");
                                            $query->execute(array($service_number, $parent_id));
                                            $row = $query->fetch();
                                            extract($row);
                                        ?>
                                		<div class="row mt-3">
                                            <div class="form-group col-md-6">
                                                <label>Quarter number</label>
                                                <textarea name="quarter_number" id="quarter_number" rows="3" class="form-control" rows="2"><?php echo $quarter_number; ?></textarea>
                                                <input type="hidden" name="parent_id" id="parent_id" value="<?php echo $_SESSION['parent_id']?>">
                                                <input type="hidden" name="personnel_id" id="personnel_id" value="<?php echo $id?>">
                                            </div>
                                			<div class="form-group col-md-6">
                                				<label>Service Number</label>
                                				<input type="text" name="service_number" id="service_number" class="form-control" value="<?php echo $service_number; ?>">
                                			</div>
                                			<div class="form-group col-md-6">
                                				<label>Rank</label>
                                                <select name="rank" id="rank" class="form-control" required>
                                                    <option value="<?php echo $rank; ?>"><?php echo $rank; ?></option>
                                                    <option value="Col">Col</option>
                                                    <option value="LtCol">LtCol</option>
                                                    <option value="Maj">Maj</option>
                                                    <option value="Cpt">Cpt</option>
                                                    <option value="Lt">Lt</option>
                                                    <option value="2Lt">2Lt</option>
                                                    <option value="WOI">WOI</option>
                                                    <option value="WOII">WOII</option>
                                                    <option value="F/SGT">F/SGT</option>
                                                    <option value="SGT">SGT</option>
                                                    <option value="CPL">CPL</option>
                                                    <option value="SAC">SAC</option>
                                                    <option value="LAC">LAC</option>
                                                </select>
                                			</div>
                                			<div class="form-group col-md-6">
                                				<label>First Names</label>
                                				<input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo $firstname; ?>" required>
                                			</div>
                                			<div class="form-group col-md-6">
                                				<label>Surname</label>
                                				<input type="text" name="surname" id="surname" class="form-control" value="<?php echo $surname; ?>" required>
                                			</div>
                                			<div class="form-group col-md-6">
                                				<label>Trade / Branch</label>
                                				<input type="text" name="trade_branch" id="trade_branch" class="form-control" value="<?php echo $trade_branch; ?>" required>
                                			</div>
                                            <div class="form-group col-md-6">
                                                <label>Unit</label>
                                                <input type="text" name="unit" id="unit" class="form-control" value="<?php echo $unit; ?>">
                                            </div>
                                			<div class="form-group col-md-6">
                                				<label>Phone Number</label>
                                				<input type="text" name="phone_number" id="phone_number" class="form-control" value="<?php echo $phone_number; ?>" required>
                                			</div>
                                            <div class="form-group col-md-6">
                                                <label>Gender</label>
                                                <select name="gender" class="form-control" id="gender" required>
                                                    <option value="<?php echo $gender; ?>"><?php echo $gender; ?></option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                			<div class="form-group col-md-6">
                                				<label>Marital Status</label>
                                				<select name="marital_status" class="form-control" id="marital_status" required>
                                					<option value="<?php echo $marital_status; ?>"><?php echo $marital_status; ?></option>
                                					<option value="Single">Single</option>
                                					<option value="Married">Married</option>
                                				</select>
                                			</div>
                                		</div>
                                        <div class="border border-primary p-4 mb-3" id="spouseDetails" style="display: none;">
                                            <h4>Spouse Details</h4>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>First name</label>
                                                    <input type="text" name="spouse_firstname" id="spouse_firstname" class="form-control" value="<?php echo $spouse_firstname; ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Surname</label>
                                                    <input type="text" name="spouse_surname" id="spouse_surname" class="form-control" value="<?php echo $spouse_surname; ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Service Number (If Service Personel)</label>
                                                    <input type="text" name="spouse_service_number" id="spouse_service_number" class="form-control" value="<?php echo $spouse_service_number; ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Spouse Rank (If Service Personell)</label>
                                                    
                                                    <select name="spouse_rank" id="spouse_rank" class="form-control" required>
                                                        <option value="<?php echo $spouse_rank; ?>"><?php echo $spouse_rank; ?></option>
                                                        <option value="Col">Col</option>
                                                        <option value="LtCol">LtCol</option>
                                                        <option value="Maj">Maj</option>
                                                        <option value="Cpt">Cpt</option>
                                                        <option value="Lt">Lt</option>
                                                        <option value="2Lt">2Lt</option>
                                                        <option value="WOI">WOI</option>
                                                        <option value="WOII">WOII</option>
                                                        <option value="F/SGT">F/SGT</option>
                                                        <option value="SGT">SGT</option>
                                                        <option value="CPL">CPL</option>
                                                        <option value="SAC">SAC</option>
                                                        <option value="LAC">LAC</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Spouse NRC</label>
                                                    <input type="text" name="spouse_nrc" id="spouse_nrc" class="form-control" value="<?php echo $spouse_nrc; ?>">

                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Phone Number</label>
                                                    <input type="text" name="spouse_phone_number" id="spouse_phone_number" class="form-control" value="<?php echo $spouse_phone_number; ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Spouse Occupation</label>
                                                    <input type="text" name="spouse_occupation" id="spouse_occupation" class="form-control" value="<?php echo $spouse_occupation; ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Spouse Employer</label>
                                                    <input type="text" name="spouse_employer" id="spouse_employer" class="form-control" value="<?php echo $spouse_employer; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <button class="btn btn-outline-primary" type="submit" id="save_1">Save and Continue</button>
                                            <button class="btn btn-outline-primary" type="button" id="skip_1">Skip</button>
                                        </div>
                                	</form>
                                    <!-- Dependents -->
                                    <form method="post" id="form_2" class="mt-3" style="display: none;">
                                        <legend>
                                            <div class="d-flex justify-content-between mb-5 border-bottom">
                                                <div><h4 class="mb-3">Children / Dependent Details</h4></div>
                                                <div><button id="addRow" type="button" class="btn btn-info btn-sm"><i class="bi bi-plus"></i> Add </button></div>
                                            </div>
                                            <table class="table table-borderless">
                                                <tbody id="newRow" class="border border-secondary">
                                                <?php
                                                    $date_of_birth = "";
                                                    $query = $connect->prepare("SELECT * FROM children_and_dependants WHERE service_number = ? AND parent_id = ?");
                                                    $query->execute(array($service_number, $parent_id));
                                                    if ($query->rowCount() > 0) {
                                                        foreach ($query->fetchAll() as $row) {
                                                            extract($row);
                                                        
                                                ?>
                                                    <div class="row border-secondary mb-3 p-3">
                                                        
                                                        <input type="hidden" name="parent_id" id="parent_id" value="<?php echo $_SESSION['parent_id']?>">
                                                        <input type="hidden" name="service_number" id="service_number_2" class="form-control" value="<?php echo $service_number ?>">
                                                        <input type="hidden" name="personnel_id" id="personnel_id" class="form-control" value="<?php echo $id ?>">
                                                        <div class="form-group col-md-6">
                                                            <label>Full Names</label>
                                                            <input type="text" name="fullnames[]" id="fullnames" class="form-control" value="<?php echo $fullnames ?>" required>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Gender</label>
                                                            <select name="gender[]" id="gender" class="form-control" required>
                                                                <option value="<?php echo $gender ?>"><?php echo $gender ?></option>
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Relationship</label>
                                                            <select name="relationship[]" id="relationship" class="form-control" required>
                                                                <option value="<?php echo $relationship ?>"><?php echo $relationship ?></option>
                                                                <option value="Niece">Niece</option>
                                                                <option value="Nephew">Nephew</option>
                                                                <option value="Inlaw">Inlaw</option>
                                                                <option value="Brother">Brother</option>
                                                                <option value="Sister">Sister</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>NRC</label>
                                                            <input type="text" name="nrc[]" id="nrc" class="form-control" value="<?php echo $nrc ?>">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label>Occupation</label>
                                                            <select name="occupation[]" id="occupation" class="form-control" required>
                                                                <option value="<?php echo $occupation ?>"><?php echo $occupation ?></option>
                                                                <option value="None">None at the Moment</option>
                                                                <option value="Working">Working</option>
                                                                <option value="High School">High School</option>
                                                                <option value="College/University">College/University</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label>Level of education</label>
                                                            <select name="level_of_education[]" id="level_of_education" class="form-control" required>
                                                                <option value="<?php echo $level_of_education ?>"><?php echo $level_of_education ?></option>
                                                                <option value="None">None</option>
                                                                <option value="Pre School">Pre School</option>
                                                                <option value="Primary School">Primary School</option>
                                                                <option value="Junior High School">Junior High School</option>
                                                                <option value="High School">High School</option>
                                                                <option value="College">College</option>
                                                                <option value="Unversity">Unversity</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label>Date of Birth</label>
                                                            <input type="date" name="date_of_birth[]" id="date_of_birth" class="form-control" required value="<?php echo $date_of_birth ?>" onblur="getAge(this.value)">
                                                        </div>
                                                        <!-- <div class="form-group col-md-3">
                                                            <label>Age</label>
                                                            <input type="text" name="age[]" id="age" class="form-control" required value="<?php echo $age ?>">
                                                        </div> -->
                                                        <div class="col-md-6">
                                                            <a href="<?php echo $id?>" class="btn btn-outline-danger removeChild"> Remove</a>
                                                        </div>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </tbody>
                                            </table>
                                            <div class="d-flex justify-content-between">
                                                <button class="btn btn-outline-secondary" id="back_to_1" type="button">Previous</button>
                                                
                                                <button class="btn btn-outline-primary" id="skip_2" type="button">Skip to Next</button>
                                                <button class="btn btn-outline-success" id="save_2" type="submit">Save and Continue</button>
                                            </div>
                                        </legend>
                                    </form>
                                    <!-- Motor Vehicle -->
                                    <form method="post" id="form_3" class="mt-3" style="display: none;">
                                        <legend>
                                            <table class="table table-borderless">
                                                <div class="d-flex justify-content-between mb-5 border-bottom">
                                                    <div><h4 class="mb-3">Vehicles Details</h4></div>
                                                    <div><button type="button" class="btn btn-outline-primary btn-sm" id="addVehicle"><i class="bi bi-plus"></i> Add </button></div>
                                                </div>
                                                 <tbody id="vehicle_table">
                                                <?php
                                                    $query = $connect->prepare("SELECT * FROM motor_vehicles WHERE service_number = ? AND parent_id = ?");
                                                    $query->execute(array($service_number, $parent_id));
                                                    if ($query->rowCount() > 0) {
                                                        foreach ($query->fetchAll() as $row) {
                                                            extract($row);
                                                        
                                                ?>
                                                
                                                    <div class="row border border-primary mb-3 p-3">
                                                        <input type="hidden" name="parent_id" id="parent_id" value="<?php echo $_SESSION['parent_id']?>">
                                                        <input type="hidden" name="service_number" id="service_number_3" class="form-control" value="<?php echo $service_number ?>">
                                                        <input type="hidden" name="personnel_id" id="personnel_id_3" value="<?php echo $id ?>">
                                                        <div class="form-group col-md-6">
                                                            <label>Vehicle Make</label>
                                                            <input type="text" name="make[]" id="make" class="form-control" required value="<?php echo $make ?>">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Vehicle Model</label>
                                                            <input type="text" name="model[]" id="model" class="form-control" required value="<?php echo $model ?>">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Vehicle Year of Make</label>
                                                            <input type="text" name="year[]" id="year" class="form-control" required value="<?php echo $year ?>">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Vehicle Reg Number</label>
                                                            <input type="text" name="reg_number[]" id="reg_number" class="form-control" required value="<?php echo $reg_number ?>">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Vehicle Color</label>
                                                            <input type="text" name="color[]" id="color" class="form-control" required value="<?php echo $color ?>">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Vehicle Remarks</label>
                                                            <select name="remarks[]" id="remarks" class="form-control">
                                                                <option value="<?php echo $remarks ?>"><?php echo $remarks ?></option>
                                                                <option value=""> </option>
                                                            </select>
                                                            <textarea type="text" name="remarks[]" id="remarks" class="form-control" required><?php echo $remarks ?></textarea>
                                                        </div>
                                                    </div>
                                                </tbody>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </table>
                                            <div class="d-flex justify-content-between">
                                                <button class="btn btn-outline-secondary" id="back_to_2" type="button">Previous</button>
                                                <button class="btn btn-outline-primary" id="skip_3" type="button">Skip to Next</button>
                                                <button class="btn btn-outline-success" id="save_3" type="submit">Save and Continue</button>
                                            </div>
                                        </legend>
                                    </form>
                                    <!-- Private Employees -->
                                    <form method="post" id="form_4" class="mt-3" style="display: none;">
                                        <legend>
                                            <div class="d-flex justify-content-between border-bottom mb-5">
                                                <div><h4 class="mb-3">Private Employees Details</h4></div>
                                                <div><button type="button" id="addnewPvt" class="btn btn-outline-primary btn-sm"><i class="bi bi-plus"></i> Add</button></div>
                                            </div>
                                            <table class="table table-borderless">
                                                <tbody id="newPvt">
                                                <?php
                                                    $date_of_birth = '';
                                                    $query = $connect->prepare("SELECT * FROM private_employees WHERE service_number = ? AND parent_id = ?");
                                                    $query->execute(array($service_number, $parent_id));
                                                    if ($query->rowCount() > 0) {
                                                        foreach ($query->fetchAll() as $row) {
                                                            extract($row);
                                                ?>
                                                
                                                    <div class="row border border-primary mb-3 p-3">
                                                        <input type="hidden" name="parent_id" id="parent_id" value="<?php echo $_SESSION['parent_id']?>">
                                                        <input type="hidden" name="service_number" id="service_number_4" class="form-control">
                                                        <div class="form-group col-md-6">
                                                            <label>Full Names</label>
                                                            <input type="text" name="fullnames[]" id="fullnames" class="form-control" required value="<?php echo $fullnames ?>">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Gender</label>
                                                            <select name="gender[]" id="gender" class="form-control" required>
                                                                <option value="<?php echo $gender ?>"><?php echo $gender ?></option>
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                            </select>
                                                        </div>
                                                        <!-- <div class="form-group col-md-6">
                                                            <label>Age</label>
                                                            <input type="text" name="age[]" id="age" class="form-control" required value="<?php echo $age ?>">
                                                        </div> -->
                                                        <div class="form-group col-md-3">
                                                            <label>Date of Birth</label>
                                                            <input type="date" name="date_of_birth[]" id="date_of_birth" class="form-control" required value="<?php echo $date_of_birth ?>" onblur="getAge(this.value)">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>NRC</label>
                                                            <input type="text" name="nrc[]" id="nrc" class="form-control" required value="<?php echo $nrc ?>">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Employee type</label>
                                                            <select name="employee_type[]" id="employee_type" class="form-control" required>
                                                                <option value="<?php echo $employee_type ?>"><?php echo $employee_type ?></option>
                                                                <option value="Living In">Living In</option>
                                                                <option value="Living Out">Living Out</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Address</label>
                                                            <textarea type="text" name="address[]" rows="3" id="address" class="form-control" required><?php echo $address ?></textarea>
                                                        </div>
                                                    </div>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                            <div class="d-flex justify-content-between">
                                                <button class="btn btn-outline-secondary" id="back_to_3" type="button">Previous</button>
                                                <button class="btn btn-outline-primary" id="skip_4" type="button">Skip to Next</button>
                                                <button class="btn btn-outline-success" id="save_4" type="submit">Save and Continue</button>
                                            </div>
                                        </legend>
                                    </form>
                                    <form method="post" id="form_5" style="display: none;">
                                        <button class="btn btn-outline-secondary" id="back_to_4" type="button">Previous</button>
                                        <button class="btn btn-outline-success" id="save_5" type="button">Save and Complete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FOOTER -->
                <?php include 'footer.php'; ?> 
                <!-- FOOTER END -->    
            </div>
        </div>
    </div>
    <script>

        $("#addRow").click(function () {
            var html = '<div class="row border p-3" id="newaddedRow">'+
                    '<div class="form-group col-md-6">'+
                        '<label>Full Names</label>'+
                        '<input type="text" name="fullnames[]" id="fullnames" class="form-control" required>'+
                    '</div>'+
                    '<div class="form-group col-md-6">'+
                        '<label>Gender</label>'+
                        '<select name="gender[]" id="gender" class="form-control" required>'+
                            '<option value="">Select</option>'+
                            '<option value="Male">Male</option>'+
                            '<option value="Female">Female</option>'+
                        '</select>'+
                    '</div>'+
                    '<div class="form-group col-md-6">'+
                        '<label>Relationship</label>'+
                        '<select name="relationship[]" id="relationship" class="form-control" required>'+
                            '<option value="">Select</option>'+
                            '<option value="Niece">Niece</option>'+
                            '<option value="Nephew">Nephew</option>'+
                            '<option value="Inlaw">Inlaw</option>'+
                            '<option value="Brother">Brother</option>'+
                            '<option value="Sister">Sister</option>'+
                        '</select>'+
                    '</div>'+
                    '<div class="form-group col-md-6">'+
                        '<label>NRC</label>'+
                        '<input type="text" name="nrc[]" id="nrc" class="form-control">'+
                    '</div>'+
                    '<div class="form-group col-md-4">'+
                        '<label>Occupation</label>'+
                        '<select name="occupation[]" id="occupation" class="form-control" required>'+
                            '<option value="">Select</option>'+
                            '<option value="None">None at the Moment</option>'+
                            '<option value="Working">Working</option>'+
                            '<option value="High School">High School</option>'+
                            '<option value="College/University">College/University</option>'+
                        '</select>'+
                    '</div>'+
                    '<div class="form-group col-md-4">'+
                        '<label>Level of education</label>'+
                        '<select name="level_of_education[]" id="level_of_education" class="form-control" required>'+
                            '<option value="">Select</option>'+
                            '<option value="None">None</option>'+
                            '<option value="Pre School">Pre School</option>'+
                            '<option value="Primary School">Primary School</option>'+
                            '<option value="Junior High School">Junior High School</option>'+
                            '<option value="High School">High School</option>'+
                            '<option value="College">College</option>'+
                            '<option value="Unversity">Unversity</option>'+
                        '</select>'+
                    '</div>'+
                    '<div class="form-group col-md-4">'+
                        '<label>Date of Birth</label>'+
                        '<input type="date" name="date_of_birth[]" id="date_of_birth" class="form-control" required>'+
                    '</div>'+
                    '<div class="form-group col-md-6 mt-4">'+
                        '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>'+
                    '</div>'+
                    
                '</div>';

                $('tbody#newRow').append(html);
        });
            
        // remove row
        $(document).on('click', '#removeRow', function () {
            $(this).closest('#newaddedRow').remove();
        });

        $("#addVehicle").click(function(){
            var html = ''+
                '<div class="row border p-3" id="newVehicleTable">'+
                    '<div class="form-group col-md-6">'+
                        '<label>Vehicle Make</label>'+
                        '<input type="text" name="make[]" id="make" class="form-control" required>'+
                    '</div>'+
                    '<div class="form-group col-md-6">'+
                        '<label>Vehicle Model</label>'+
                        '<input type="text" name="model[]" id="model" class="form-control" required>'+
                    '</div>'+
                    '<div class="form-group col-md-6">'+
                        '<label>Vehicle Year of Make</label>'+
                        '<input type="text" name="year[]" id="year" class="form-control" required>'+
                    '</div>'+
                    '<div class="form-group col-md-6">'+
                        '<label>Vehicle Reg Number</label>'+
                        '<input type="text" name="reg_number[]" id="reg_number" class="form-control" required>'+
                    '</div>'+
                    '<div class="form-group col-md-6">'+
                        '<label>Vehicle Color</label>'+
                        '<input type="text" name="color[]" id="color" class="form-control" required>'+
                    '</div>'+
                    '<div class="form-group col-md-6">'+
                        '<label>Vehicle Remarks</label>'+
                        '<textarea type="text" name="remarks[]" id="remarks" class="form-control" required></textarea>'+
                    '</div>'+
                    '<div class="form-group col-md-12">'+
                        
                        '<button type="button"  id="removeRow" class="btn btn-danger">Remove</button>'+
                    '</div>'+
                '</div>';
            $('tbody#vehicle_table').append(html);

        })
        $(document).on('click', '#removeRow', function () {
            $(this).closest('#newVehicleTable').remove();
        });

        $("#addnewPvt").click(function(){
            var html ='<div class="row border p-3" id="newEmployee">'+
                        '<div class="form-group col-md-6">'+
                            '<label>Full Names</label>'+
                            '<input type="text" name="fullnames[]" id="fullnames" class="form-control" required>'+
                        '</div>'+
                        '<div class="form-group col-md-6">'+
                            '<label>Gender</label>'+
                            '<select name="gender[]" id="gender" class="form-control" required>'+
                                '<option value="">Select</option>'+
                                '<option value="Male">Male</option>'+
                                '<option value="Female">Female</option>'+
                            '</select>'+
                        '</div>'+
                        '<div class="form-group col-md-6">'+
                            '<label>Date of Birth</label>'+
                            '<input type="text" name="date_of_birth[]" id="date_of_birth" class="form-control" required>'+
                        '</div>'+
                        '<div class="form-group col-md-6">'+
                            '<label>NRC</label>'+
                            '<input type="text" name="nrc[]" id="nrc" class="form-control" required>'+
                        '</div>'+
                        '<div class="form-group col-md-6">'+
                            '<label>Address</label>'+
                            '<textarea type="text" name="address[]" rows="3" id="address" class="form-control" required></textarea>'+
                        '</div>'+
                        '<div class="form-group col-md-6">'+
                            '<label>Employee type</label>'+
                            '<select name="employee_type[]" id="employee_type" class="form-control" required>'+
                                '<option value="">Select</option>'+
                                '<option value="living_in">Living In</option>'+
                                '<option value="living_out">Living Out</option>'+
                            '</select>'+
                        '</div>'+
                        '<div class="form-group col-md-6">'+
                            
                            '<button type="button"  id="removeRow" class="btn btn-danger" >Remove</button>'+
                        '</div>'+
                    '</div>';
                $("tbody#newPvt").append(html);
        })

        $(document).on('click', '#removeRow', function () {
            $(this).closest('#newEmployee').remove();
        });


        var form_1 = document.getElementById('form_1');
        var form_2 = document.getElementById('form_2');
        var form_3 = document.getElementById('form_3');
        var form_4 = document.getElementById('form_4');
        var form_5 = document.getElementById('form_5');

        var back_to_1 = document.getElementById('back_to_1');
        var back_to_2 = document.getElementById('back_to_2');
        var back_to_3 = document.getElementById('back_to_3');
        var back_to_4 = document.getElementById('back_to_4');

        var skip_1 = document.getElementById('skip_1');
        var skip_2 = document.getElementById('skip_2');
        var skip_3 = document.getElementById('skip_3');
        var skip_4 = document.getElementById('skip_4');

        function checkMarritalStatus(){
            var marital_status = $("#marital_status").val();
            if (marital_status === 'Married') {
                document.getElementById('spouseDetails').style.display = 'block';
            }
        }
        checkMarritalStatus();
        
        $("#service_number").keyup(function(){
            var service_number = $(this).val();
            $("#service_number_2").val(service_number);
            $("#service_number_3").val(service_number);
            $("#service_number_4").val(service_number);
            localStorage.setItem('service_number', service_number);
        })

        if ( localStorage.getItem('service_number')) {
            var service_number = localStorage.getItem('service_number');
            $("#service_number_2").val(service_number);
            $("#service_number_3").val(service_number);
            $("#service_number_4").val(service_number);
        }

        $("#marital_status").change(function(){
            if($(this).val() === 'Married'){
                document.getElementById('spouseDetails').style.display = 'block';
            }else{
                document.getElementById('spouseDetails').style.display = 'none';
            }
        })
        // ================== SAVE FORM ONE =====================

    	$(function(){
			$("#form_1").submit(function(e){
				e.preventDefault();
				var form_1 = document.getElementById('form_1');
				var data = new FormData(form_1);
				var url = 'processing/submitPersonelData_1';
				$.ajax({
					url:url+'?<?php echo time()?>',
					method:"post",
					data:data,
					cache : false,
					processData: false,
					contentType: false,
					beforeSend:function(){
						$("#save_1").html("<i class='spinner-border'></i>");
					},
					success:function(data){
						errorNow(data);
						$("#save_1").html("Save and Continue");
                        $("#form_2").show();
                        $("#form_1").hide();
					}
				})
			})
    	})

        // ================== SAVE FORM TWO =====================

        $(function(){
            $("#form_2").submit(function(e){
                e.preventDefault();
                var form_2 = document.getElementById('form_2');
                var data = new FormData(form_2);
                var url = 'processing/submitPersonelData_2';
                $.ajax({
                    url:url+'?<?php echo time()?>',
                    method:"post",
                    data:data,
                    cache : false,
                    processData: false,
                    contentType: false,
                    beforeSend:function(){
                        $("#save_2").html("<i class='spinner-border'></i>");
                    },
                    success:function(data){
                        errorNow(data);
                        $("#save_2").html("Save and Continue");
                        $("#form_3").show();
                        $("#form_2").hide();
                    }
                })
            })
        })

        // ================== SAVE FORM THREE =====================

        $(function(){
            $("#form_3").submit(function(e){
                e.preventDefault();
                var form_3 = document.getElementById('form_3');
                var data = new FormData(form_3);
                var url = 'processing/submitPersonelData_3';
                $.ajax({
                    url:url+'?<?php echo time()?>',
                    method:"post",
                    data:data,
                    cache : false,
                    processData: false,
                    contentType: false,
                    beforeSend:function(){
                        $("#save_3").html("<i class='spinner-border'></i>");
                    },
                    success:function(data){
                        errorNow(data);
                        $("#save_3").html("Save and Continue");
                        $("#form_4").show();
                        $("#form_3").hide();
                    }
                })
            })
        })

        // ================== SAVE FORM FOUR =====================

        $(function(){
            $("#form_4").submit(function(e){
                e.preventDefault();
                var form_4 = document.getElementById('form_4');
                var data = new FormData(form_4);
                var url = 'processing/submitPersonelData_4';
                $.ajax({
                    url:url+'?<?php echo time()?>',
                    method:"post",
                    data:data,
                    cache : false,
                    processData: false,
                    contentType: false,
                    beforeSend:function(){
                        $("#save_4").html("<i class='spinner-border'></i>");
                    },
                    success:function(data){
                        errorNow(data);
                        $("#save_4").html("Save and Continue");
                        $("#form_5").show();
                        $("#form_4").hide();
                    }
                })
            })
        })

        $(function(){
            $("#save_5").click(function(){
                window.location = './';
            })
        })

        
        if(localStorage.getItem("ID")){
            document.getElementById("savedID").innerHTML = localStorage.getItem("ID");
        }

        //=================== Previous Buttons  ===============================

        back_to_1.addEventListener('click', ()=>{
            $("#form_1").show();
            $("#form_2").hide();
        }) 

        back_to_2.addEventListener('click', ()=>{
            $("#form_2").show();
            $("#form_3").hide();
        })

        back_to_3.addEventListener('click', ()=>{
            $("#form_3").show();
            $("#form_4").hide();
        })

        back_to_4.addEventListener('click', ()=>{
            $("#form_4").show();
            $("#form_5").hide();
        })

        //  ================ SKIP Form Buttons ===========

        skip_1.addEventListener('click', ()=>{
            $("#form_1").hide();
            $("#form_2").show();
        })

        skip_2.addEventListener('click', ()=>{
            $("#form_2").hide();
            $("#form_3").show();
        })

        skip_3.addEventListener('click', ()=>{
            $("#form_3").hide();
            $("#form_4").show();
        })

        skip_4.addEventListener('click', ()=>{
            $("#form_4").hide();
            $("#form_5").show();
        })


        function successNow(msg){
            toastr.success(msg);
            toastr.options.progressBar = true;
            toastr.options.positionClass = "toast-top-center";
        }

        function errorNow(msg){
            toastr.error(msg);
            toastr.options.progressBar = true;
            toastr.options.positionClass = "toast-top-center";
        }

        $(document).on("click", '.removeChild', function(e){
            e.preventDefault();
            var children_and_dependants_id = $(this).attr('href');
            if (!confirm("You wish to remove Details of Child/Dependant?")) {
                return false;
            }else{
                $.ajax({
                    url:'processing/removeChild',
                    method:"post",
                    data:{children_and_dependants_id:children_and_dependants_id},
                    beforeSend:function(){
                        $(this).html("<i class='spinner-border'></i>");
                    },
                    success:function(data){
                        errorNow(data);
                        setTimeout(function(){
                            location.reload();
                        }, 1000);
                    }
                })
            }
        })

        function getAge(dateString) {
            var today = new Date();
            var birthDate = new Date(dateString);
            var age = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            $(this).closest( "#age" ).val(age);
            // document.getElementById("age").value = age;
            // var el = document.getElementById('age');
            // var date = el.closest('age');
            // alert(date.value);
            // return age;
        }
    </script>
</body>
</html>

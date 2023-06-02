<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("header.php");?>
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
                                <div class="card-header">Service Personnel Residents
                                    <div class="btn-actions-pane-right">
                                        <div role="group" class="btn-group-sm btn-group">
                                            <a href="add-personnel" class="btn btn-focus">Add New Personnel</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="service_personnel_table">
                                            <thead>
												<tr>
													<th>Personnel Details</th>
													<th>Other Details</th>
												</tr>
											</thead>
											<tbody id="service_personnel_data">
												<?php
													$parent_id = $_SESSION['parent_id'];

													$query = $connect->prepare("SELECT * FROM service_personnel WHERE parent_id = ?");
													$query->execute(array($parent_id));
													if ($query->rowCount() > 0) {
														foreach ($query->fetchAll() as $row) {
															extract($row);
															
													?>
														<tr>
															<td>
																<table class="table table-bordered">
																	<tr>
																		<th>Service Number</th>
																		<td><?php echo $service_number ?></td>
																	</tr>
																	<tr>
																		<th>Rank</th>
																		<td><?php echo $rank;?></td>
																	</tr>
																	<tr>
																		<th>Names</th>
																		<td><?php echo $firstname;?> <?php echo $surname;?></td>
																	</tr>
																	<tr>
																		<th>Trade / Branch</th>
																		<td><?php echo $trade_branch;?></td>
																	</tr>
																	<tr>
																		<th>Unit</th>
																		<td><?php echo $unit?></td>
																	</tr>
																	<tr>
																		<th>Residential Address</th>
																		<td><?php echo nl2br($quarter_number)?></td>
																	</tr>
																</table>
															</td>
															
															<td>
																<table class="table table-bordered">
																	<tr>
																		<th>Gender</th>
																		<td><?php echo $gender?></td>
																	</tr>
																	<tr>
																		<th>Marital Status</th>
																		<td><?php echo $marital_status?></td>
																	</tr>
																	<tr>
																		<th>Phone</th>
																		<td><?php echo $phone_number;?></td>
																	</tr>
																	<tr>
																		<th>View More</th>
																		<td><a href="personnel/<?php echo $service_number;?>" class=" text-decoration-none"><i class="bi bi-info"></i> More Details</a></td>
																	</tr>
																	<tr>
																		<th>Edit</th>
																		<td><a href="edit-personnel?service_number=<?php echo $service_number;?>&unit_id=<?php echo $parent_id?>" class="editPersonnel text-decoration-none"> <i class="bi bi-pencil-square"></i> Edit</a></td>
																	</tr>
																	<tr>
																		<th>Remove</th>
																		<td><a href="<?php echo $service_number;?>" class="deletePersonnel text-decoration-none text-danger"><i class="bi bi-trash"></i> Delete</a></td>
																	</tr>
																</table>
															</td>
														</tr>
													<?php
														}
													}else{

													}
												?>
											</tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="d-block d-flex justify-content-between card-footer">
                        
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3 card p-3">
                                <div class="card-header">Civilian Personnel Residents
                                    <div class="btn-actions-pane-right">
                                        <div role="group" class="btn-group-sm btn-group">
                                            <a href="add-civillian" class="btn btn-focus">Add Civilian</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="civilian_personnel_table">
                                            <thead>
												<tr>
													<th>Civilian Details</th>
													<th>Other Details</th>
												</tr>
													
											<tbody id="civilian_personnel_data">
												<?php
													$parent_id = $_SESSION['parent_id'];
													$query = $connect->prepare("SELECT * FROM civilian_residents WHERE parent_id = ?");
													$query->execute(array($parent_id));
													if ($query->rowCount() > 0) {
														foreach ($query->fetchAll() as $row) {
															extract($row);
															
													?>
														<tr>
															<td>
																<table class="table table-bordered">
																	<tr>
																		<th>Man Number</th>
																		<td><?php echo $service_number;?></td>
																	</tr>
																	<tr>
																		<th>Names</th>
																		<td><?php echo $firstname;?> <?php echo $surname;?></td>
																	</tr>
																	<tr>
																		<th>Occupation</th>
																		<td><?php echo $occupation;?></td>
																	</tr>
																	<tr>
																		<th>Working Station</th>
																		<td><?php echo $deployment_station;?></td>
																	</tr>
																	<tr>
																		<th>Residential Address</th>
																		<td><?php echo nl2br($quarter_number)?></td>
																	</tr>
																</table>
															</td>
															<td>
																<table class="table table-bordered">
																	<tr>
																		<th>Phone Number</th>
																		<td><?php echo $phone_number;?></td>
																	</tr>
																	<tr>
																		<th>Gender</th>
																		<td><?php echo $gender;?></td>
																	</tr>
																	<tr>
																		<th>Marrital Status</th>
																		<td><?php echo $marital_status;?></td>
																	</tr>
																	
																	<tr>
																		<th>More Info</th>
																		<td><a href="civilian/<?php echo preg_replace("#[^0-9]#", "_", $service_number);?>" class="editCivilian text-decoration-none"> <i class="bi bi-info-square"></i> More Info</a></td>
																	</tr>
																	<tr>
																		<th>Edit</th>
																		<td><a href="edit-civilian?service_number=<?php echo $service_number;?>&unit_id=<?php echo $parent_id?>" class="editCivilian text-decoration-none"> <i class="bi bi-pen"></i></a></td>
																	</tr>
																	<tr>
																		<th>Remove</th>
																		<td><a href="<?php echo $service_number;?>" class="deleteCivilian text-decoration-none text-danger"><i class="bi bi-trash"></i> Delete</a></td>
																	</tr>
																</table>
															</td>
															
														</tr>
													<?php
														}
													}else{

													}
												?>
											</tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="d-block d-flex justify-content-between card-footer">
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
		$(function(){
		
		    $("#service_personnel_table, #civilian_personnel_table").DataTable();
			$(document).on("change",  "#defaulted", function(e){
				var value = $(this).val();
				if (value === "1") {
					$("#one, #two").show();
				}else{
					$("#one, #two").hide();
				}
			})

			$("#clientsForm").submit(function(e){
				e.preventDefault();
				var clientsForm = document.getElementById('clientsForm');
				var data = new FormData(clientsForm);
				var url = 'includes/customerSubmit';
				$.ajax({
					url:url+'?<?php echo time()?>',
					method:"post",
					data:data,
					cache : false,
					processData: false,
					contentType: false,
					beforeSend:function(){
						$("#submit_customer").html("<i class='fa fa-spinner fa-spin'></i>");
					},
					success:function(data){
						errorNow(data);
						callListedClients("<?php echo $_SESSION['parent_id']?>");
						$("#submit_customer").html("Submit changes");
					}
				})
			})
		})
		

		$(document).on("click", ".editCustomer", function(e){
			e.preventDefault();
			var getCustomerId = $(this).attr("href");
			$("#exampleModal").modal("show");
			$.ajax({
				url:"includes/editCustomerData",
				method:"post",
				data:{getCustomerId:getCustomerId},
				dataType:"JSON",
				success:function(data){
					$("#ID").val(data.id);
					$("#firstname").val(data.firstname);
					$("#lastname").val(data.lastname);
					$("#customer_id").val(data.customer_id);
					$("#licence").val(data.licence);
					$("#defaulted").val(data.defaulted);
					$("#date_defaulted").val(data.date_defaulted);
					getD();
					$("#currency").val(data.currency);
					$("#amount_defaulted").val(data.amount_defaulted);
					$("#remarks").val(data.remarks);
				}
			})
		})

		function getD(){
			var get = $("#defaulted").val();
			if(get == 1) {
				$("#one, #two").show();
			}else{
				$("#one, #two").hide();
			}
		}

		$(document).on("click", ".deletePersonnel", function(e){
			e.preventDefault();
			var service_number = $(this).attr("href");
			if(confirm("Once deleted, all details cannot be recovered")){
				$.ajax({
					url:"includes/removePersonnel",
					method:"post",
					data:{'action':'delete_service_personnel', service_number:service_number},
					success:function(data){
						successNow(data);
						fetchSevicePersonnels("<?php echo $_SESSION['parent_id']?>");
					}
				})
			}else{
				return false;
			}
		})

		$(document).on("click", ".deleteCivilian", function(e){
			e.preventDefault();
			var service_number = $(this).attr("href");
			if(confirm("Once deleted, all details cannot be recovered")){
				$.ajax({
					url:"includes/removeCivilian",
					method:"post",
					data:{'action':'delete_service_personnel', service_number:service_number},
					success:function(data){
						successNow(data);
						fetchCivilians("<?php echo $_SESSION['parent_id']?>");
					}
				})
			}else{
				return false;
			}
		})

		

		
		// ================================= DISPLAYS ======================================
		function fetchSevicePersonnels(parent_id){
			var unit_id = parent_id;
			$.ajax({
				url:"includes/fetchSevicePersonnel",
				method:"post",
				data:{unit_id:unit_id},
				success:function(data){
					$("#service_personnel_data").html(data);
				}
			})
		}
		fetchSevicePersonnels("<?php echo $_SESSION['parent_id']?>");
		function fetchCivilians(parent_id){
			var unit_id = parent_id;
			$.ajax({
				url:"includes/fetchCivilians",
				method:"post",
				data:{unit_id:unit_id},
				success:function(data){
					$("#civilian_personnel_data").html(data);
				}
			})
		}
		fetchCivilians("<?php echo $_SESSION['parent_id']?>");

		function successNow(msg){
			toastr.success(msg);
	      	toastr.options.progressBar = true;
	      	toastr.options.positionClass = "toast-top-center";
	      	toastr.options.showDuration = 1000;
	    }

		function errorNow(msg){
			toastr.error(msg);
	      	toastr.options.progressBar = true;
	      	toastr.options.positionClass = "toast-top-center";
	      	toastr.options.showDuration = 1000;
	    }
	</script>
</body>
</html>

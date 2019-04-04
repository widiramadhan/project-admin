<?php
$startDate = date("Y-m-d");
	$endDate = date("Y-m-d");
?>
<div class="row">
	<div class="col-lg-6">
		<div class="card-box">
			<h4 class="m-t-0 m-b-30 header-title">Add Issue</h4>
			<form action="team-action.php?action=save-setup" method="post" enctype="multipart/form-data" id="form">
				<div class="form-group">
					<label>Project Name</label>
					<select name="project_name" id="project" class="form-control" required>
						<option selected disabled>Choose your Option</option>
						<?php
							$callProject = "{call SP_GET_PROJECT_REQUEST	}"; 
							$execProject = sqlsrv_query( $conn, $callProject) or die( print_r( sqlsrv_errors(), true));
							while($dataProject = sqlsrv_fetch_array($execProject)){
						?>
						<option value="<?php echo $dataProject['M_PROJECT_ID'];?>"><?php echo $dataProject['TITLE'];?></option> 
						<?php } ?>
					</select>
					<br />
					
					<label>Issue Type </label>
					<select name="issue_type" id="issue_type" class="form-control" required>
						<option value="" disabled selected>CHOOSE ISSUE TYPE</option>
						<option value="Email">Email</option>
						<option value="Bisreq">Bisreq</option>
					</select>
					<br />
					
					<label>Divisi </label>
					<select name="product_type" id="product_type" class="form-control" required>
						<option selected disabled>CHOOSE DIVISI</option>
						<?php
							$callDivisi = "{call SP_GET_DIVISI}"; 
							$execDivisi = sqlsrv_query( $conn, $callDivisi) or die( print_r( sqlsrv_errors(), true));
							while($dataDivisi = sqlsrv_fetch_array($execDivisi)){
						?>
						<option value="<?php echo $dataDivisi['M_DIVISI_ID'];?>"><?php echo $dataDivisi['DIVISI_NAME'];?></option> 
						<?php } ?>
					</select>
					<br />
					
					<label>Classification </label>
					<select name="classification" id="classification" class="form-control" required>
						<option value="" disabled selected>CHOOSE CLASSIFICATION</option>
						<option value="High">High</option>
						<option value="Medium">Medium</option>
						<option value="Low">Low</option>
					</select>
					<br />
					
					
					
					<label>Issueer Name </label>
					<input type="text" id="iss_name" name="iss_name" class="form-control" required><br />
					
					<label>Issue Description </label>
					<textarea type="text" id="iss_desc" name="iss_desc" class="form-control" required></textarea><br />
					
					<label>Issueer Date </label>
					<input type="text" class="form-control datepicker" id="issue_date" name="issue_date" value="<?php echo $startDate;?>" ><br>
					
					<label>Level </label>
						<select name="level" id="level" class="form-control" required>
						<option value="" disabled selected>CHOOSE LEVEL</option>
						<option value="MAJOR">Major</option>
						<option value="MINOR">Minor</option>
					</select>
					
					
				</div>
				
				<div class="form-group">
					<label>PIC</label>
					<select class="form-control" name="pic" id="pic">
						<option selected disabled>Choose your Option</option>
						<?php
							$call = "{call SP_GET_TEAM}";
							$exec = sqlsrv_query($conn, $call) or die( print_r( sqlsrv_errors(), true));
							while($dt = sqlsrv_fetch_array($exec)){
						?>
							<option value="<?php echo $dt['TEAM_ID'];?>"> <img src="assets/images/team/<?php echo $dt['IMG'];?>"><?php echo $dt['FULLNAME'];?></option>
						<?php } ?>
					</select>
					<br>
				</div>
					<label>Start Date </label>
					<input type="text" class="form-control datepicker" id="start_date" name="start_date" value="<?php echo $startDate;?>" ><br>
					
					<label>End Date </label>
					<input type="text" class="form-control datepicker" id="end_date" name="end_date" value="" ><br>
				
					<label>Status </label>
					<select id="status" name="status" class="form-control" required>
						<option value="" disabled selected>CHOOSE CLASSIFICATION</option>
						<option value="OPEN">OPEN</option>
						<option value="FINISH">FINISH</option>
					</select>
					<br />
					
					<label>Checked By </label>
					<input type="text" id="checkby" name="checkby" class="form-control" required><br />
					
				    <button style="width:100%" type="submit" class="btn btn-custom">Submit</button>
			</form>
			    
		
	</div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script>
$('#status').change(function() { 
  	var status =$('#status').val();
	if(status == 'OPEN'){
		document.getElementById('end_date').disabled = true;
		document.getElementById('checkby').disabled = true;
	}else{
		document.getElementById('end_date').disabled = false;
		document.getElementById('checkby').disabled = false;
	}
	
    });
</script>
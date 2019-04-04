<?php
$startDate = date("Y-m-d");
	$endDate = date("Y-m-d");
?>
<div class="row">
	<div class="col-lg-6">
		<div class="card-box">
			<h4 class="m-t-0 m-b-30 header-title">Add Request</h4>
			<form action="request-action.php?action=save" method="post" enctype="multipart/form-data" id="form">
				<div class="form-group">
					<label>Project Name</label>
					<select name="project_name" id="project" class="form-control" required>
						<option selected disabled>Choose your Option</option>
						<?php
							$callProject = "{call SP_GET_PROJECT_REQUEST}"; 
							$execProject = sqlsrv_query( $conn, $callProject) or die( print_r( sqlsrv_errors(), true));
							while($dataProject = sqlsrv_fetch_array($execProject)){
						?>
						<option value="<?php echo $dataProject['M_PROJECT_ID'];?>"><?php echo $dataProject['TITLE'];?></option> 
						<?php } ?>
					</select>
					<br />
					
					<label>Request Type </label>
					<select name="request_type" id="request_type" class="form-control" required>
						<option value="" disabled selected>CHOOSE REQUEST TYPE</option>
						<option value="Email">Email</option>
						<option value="Bisreq">Bisreq</option>
					</select>
					<br />
					
					<label>Divisi </label>
					<select name="divisi" id="divisi" class="form-control" required>
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
					
					
					
					<label>Requester Name </label>
					<input type="text" id="req_name" name="req_name" class="form-control" required><br />
					
					<label>Request Description </label>
					<textarea type="text" id="req_desc" name="req_desc" class="form-control" required></textarea><br />
					
					<label>Requester Date </label>
					<input type="text" class="form-control datepicker" id="request_date" name="request_date" value="<?php echo $startDate;?>" ><br>
					
					<label>Level </label>
						<select name="level" id="level" class="form-control" required>
						<option value="" disabled selected>CHOOSE LEVEL</option>
						<option value="MAJOR">Major</option>
						<option value="MINOR">Minor</option>
					</select>
					
					
				</div>
				
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
			
					<label>Start Date </label>
					<input type="text" class="form-control datepicker" id="start_date" name="start_date" value="<?php echo $startDate;?>" ><br>
					
					<label>Status </label>
					<select id="status" name="status" class="form-control" required>
						<option value="" disabled selected>CHOOSE CLASSIFICATION</option>
						<option value="OPEN">OPEN</option>
						<option value="FINISH">FINISH</option>
					</select>
					<br />
					
					<div id="ed">
					<label>End Date </label>
					<input type="text" class="form-control datepicker" id="end_date" name="end_date" value="" ><br>
					</div>
					
					
					<div id="cek">
					<label>Checked By </label>
					<input type="text" id="checkby" name="checkby" class="form-control" value="" required><br />
					</div>
				    <button style="width:100%" type="submit" class="btn btn-custom">Submit</button>
			</form>
			    
		
	</div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script>
document.getElementById('ed').style.display='none';
document.getElementById('cek').style.display='none';
$('#status').change(function() { 
  	var status =$('#status').val();
	if(status == 'OPEN'){
		document.getElementById('ed').style.display='none';
		document.getElementById('cek').style.display='none';
	}else{
		document.getElementById('ed').style.display='block';
		document.getElementById('cek').style.display='block';
	}
	
    });
</script>
<div class="row">
	<div class="col-lg-6">
		<div class="card-box">
			<h4 class="m-t-0 m-b-30 header-title">Add Team Mapping</h4>
			<form action="team-action.php?action=save-setup" method="post" enctype="multipart/form-data" id="form">
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
					<select name="product_type" id="request_type" class="form-control" required>
						<option value="" disabled selected>CHOOSE REQUEST TYPE</option>
						<option value="Email">Email</option>
						<option value="Bisreq">Bisreq</option>
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
					
					<label>Divisi </label>
					<select name="product_type" id="product_type" class="form-control" required>
						<option value="" disabled selected>CHOOSE DIVISI</option>
						<option value="production">Production</option>
						<option value="it">IT Solution</option>
					</select>
					<br />
					
					<label>Requester Name </label>
					<input type="text" id="req_name" name="req_name" class="form-control" required>
				
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
				    <button style="width:100%" type="submit" class="btn btn-custom">Submit</button>
			</form>
			    
		</div>
	</div>
</div>
<script src="assets/js/jquery.min.js"></script>

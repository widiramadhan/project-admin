<?php require_once("config/connection.php");
$teamid=$_GET['id'];
$call = "{call SP_GET_TEAM_PROFILE(?)}";
$params = array(
					array($teamid, SQLSRV_PARAM_IN)
				);
$exec = sqlsrv_query( $conn, $call, $params) or die( print_r( sqlsrv_errors(), true)); 
$dataProfile = sqlsrv_fetch_array($exec)
?>
<script src="assets/js/jquery.min.js"></script>
<link rel="stylesheet" href="assets/lib/sweetalert/sweetalert.min.css">
<script src="assets/lib/sweetalert/sweetalert.min.js"></script>
<div class="row">
	<div class="col-md-3">
	
		<div class="card-box">
			<h4 class="header-title mt-0 m-b-20 text-center">Profile Team</h4>
			<div class="panel-body">
             <p class="text-muted font-13">
				<div class="text-center">
					<img src="assets/images/team/<?php echo $dataProfile['IMG'];?>" style="border-radius:50%;width:100px;height:100px;"><br><br>
					<span style="color:#000;font-weight:bold;"><?php echo $dataProfile['FULLNAME'];?></span><br>
					<?php echo $dataProfile['JOB'];?>
				</div>
				<hr>
				<p class="text-muted font-14">
				Email :<br>
				<label><?php echo $dataProfile['EMAIL'];?></label><br>
				Phone :<br>
				<label><?php echo $dataProfile['PHONE'];?></label><br></p>
			</div>
		</div>
	</div>
	<div class="col-md-9">
		<div class="card-box">
			<h4 class="header-title mt-0 m-b-20 text-center">Change Data Profile</h4>
			<div class="panel-body">
				<form method="post" id="editProfile" action="team-action.php?action=update">
					<div class="form-group">
						<label>Full Name</label>
						<input type="text" class="form-control" name="fullname" id="fullname" disabled value="<?php echo $dataProfile['FULLNAME'];?>">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" class="form-control" name="email" id="email" disabled value="<?php echo $dataProfile['EMAIL'];?>">
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input type="text" class="form-control" name="phone"  id="phone" disabled value="<?php echo $dataProfile['PHONE'];?>">
					</div>
					<div class="form-group">
						<label>Position</label>
						<input type="text" class="form-control" name="posistion" id="posistion" disabled value="<?php echo $dataProfile['JOB'];?>">
					</div>
					<div class="form-group">
						<label>Photo <span class="mandatory">*</span></label>				
						<div style="margin-bottom:10px;">
						<input type="file" name="img" id="img" required style="margin-bottom:5px;" disabled />
						</div>
					</div>
					<div class="form-group">
					<button style="width:100%" id="editBox" type="button" class="btn btn-custom btn-rounded w-md waves-effect waves-light mb-4" onclick="enableTextBox()">Edit</button>
					<button style="width:100%" id="updateBox" type="submit" class="btn btn-custom btn-rounded w-md waves-effect waves-light mb-4" hidden>Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="col-md-12">
<div class="card-box">
	<h4 class="header-title mb-3">My Projects</h4>
	<div class="table-responsive">
		<table class="table mb-0">
			<thead>
			<tr>
				<th style="vertical-align:middle;text-align:center;">No</th>
				<th style="vertical-align:middle;text-align:center;">Project Name</th>
				<th style="vertical-align:middle;text-align:center;">Category</th>
				<th style="vertical-align:middle;text-align:center;">Start Date</th>
				<th style="vertical-align:middle;text-align:center;">End Date</th>
				<th style="vertical-align:middle;text-align:center;">Status</th>
				<th style="vertical-align:middle;text-align:center;">Task Completed</th>
			</tr>
			</thead>
			<tbody>
			<?php
				$queryTeamProject = "{call SP_GET_TEAM_PROJECT(?)}";
				$paramsTeamProject = array(array($teamid, SQLSRV_PARAM_IN));  
				$execTeamProject = sqlsrv_query( $conn, $queryTeamProject, $paramsTeamProject) or die( print_r( sqlsrv_errors(), true));
				$no = 0;
		
				while($dataTeamProject = sqlsrv_fetch_array($execTeamProject)){
					$no++;				
			?>
			<tr>
				<td style="vertical-align:middle;text-align:center;"><?php echo $no;?></td>
				<td style="vertical-align:middle;text-align:center;"><?php echo $dataTeamProject['TITLE'];?></td>
				<td style="vertical-align:middle;text-align:center;"><?php echo $dataTeamProject['CATEGORY_TITLE'];?></td>
				<td style="vertical-align:middle;text-align:center;"><?php echo $dataTeamProject['START_DATE']->format('Y-m-d');?></td>
				<td style="vertical-align:middle;text-align:center;"><?php echo $dataTeamProject['END_DATE']->format('Y-m-d');?></td>
				<td style="vertical-align:middle;text-align:center;"><?php echo $dataTeamProject['STATUS'];?></td>
				<td style="vertical-align:middle;text-align:center;"><?php echo $dataTeamProject['TASK_COMPLETED'];?> % </td>
			</tr>
			<?php } ?>		
			</tbody>
		</table>
	</div>
</div>
</div>
<script src="vendor/jquery/jquery.min.js"></script> <script>
function enableTextBox() {
document.getElementById("fullname").disabled = false;
document.getElementById("email").disabled = false;
document.getElementById("phone").disabled = false;
document.getElementById("posistion").disabled = false;
document.getElementById("img").disabled = false;
document.getElementById('editBox').hidden=true;
document.getElementById('updateBox').hidden=false;
}
</script>

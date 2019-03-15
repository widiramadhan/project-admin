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
				<form method="post" action="">
					<div class="form-group">
						<label>Full Name</label>
						<input type="text" class="form-control" name="email" disabled value="<?php echo $dataProfile['FULLNAME'];?>">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" class="form-control" name="email" disabled value="<?php echo $dataProfile['EMAIL'];?>">
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input type="text" class="form-control" name="phone" disabled value="<?php echo $dataProfile['PHONE'];?>">
					</div>
					<div class="form-group">
						<label>Position</label>
						<input type="text" class="form-control" name="phone" disabled value="<?php echo $dataProfile['JOB'];?>">
					</div>
					<button style="width:100%" type="submit" class="btn btn-custom btn-rounded w-md waves-effect waves-light mb-4">Edit</button>
				</form>
			</div>
		</div>
	</div>
</div>
<script src="vendor/jquery/jquery.min.js"></script>
<script>
$(document).ready(function() {
	$('#example').DataTable({
		"lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
		"order": [[ 0, "asc" ]],
		"columnDefs": [ {
		"targets": [0,1],
			"orderable": true
		} ]
	});
} );

$('#selectAll').click(function(e){
    var table= $(e.target).closest('table');
    $('td input:checkbox',table).prop('checked',this.checked);
});
</s

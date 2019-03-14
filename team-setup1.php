<?php
$id=$_GET['id'];
$callSP = "{call SP_GET_PROJECT_ID(?)}";
$paramSP = array(array($id, SQLSRV_PARAM_IN));
$execSP = sqlsrv_query( $conn, $callSP, $paramSP) or die( print_r( sqlsrv_errors(), true));
$r = sqlsrv_fetch_array($execSP);
?>
<div class="row">
	<div class="col-lg-6">
		<div class="card-box">
			<h4 class="m-t-0 m-b-30 header-title">Add Team Mapping</h4>
			<form action="team-action.php?action=save-setup" method="post" enctype="multipart/form-data" id="form">
				<div class="form-group">
					<label>Project Name</label>
					<select name="project_name" id="project" class="form-control" selected required>
						<option value="<?php echo $r['M_PROJECT_ID'];?>"><?php echo $r['TITLE'];?></option>
						<?php
							$callProject = "{call SP_GET_PROJECT_STATUS}"; 
							$execProject = sqlsrv_query( $conn, $callProject) or die( print_r( sqlsrv_errors(), true));
							while($dataProject = sqlsrv_fetch_array($execProject)){
						?>
						<option value="<?php echo $dataProject['M_PROJECT_ID'];?>"><?php echo $dataProject['TITLE'];?></option> 
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label>Team Setup</label>
					<div class="row" id="team"></div>
					<!--<div class="row">
						<?php
							/*$callTeam = "{call SP_GET_TEAM}"; 
							$execTeam = sqlsrv_query( $conn, $callTeam) or die( print_r( sqlsrv_errors(), true));
							while($dataTeam = sqlsrv_fetch_array($execTeam)){*/
						?>
						<br>
						<div class="col-md-6" style="padding-top:10px;padding-bottom:10px">
							<input type="checkbox" name="teams[]" value="<?php //echo $dataTeam['TEAM_ID'];?>">
							<img src="assets/images/team/<?php //echo $dataTeam["IMG"];?>" class="rounded-circle thumb-sm" alt="friend" style="margin-left:10px;margin-right:10px;" />
							<?php //echo $dataTeam['FULLNAME']; ?>
						</div>
						<?php //} ?>
					</div>-->
		    	</div>
				<button style="width:100%" type="submit" class="btn btn-custom">Submit</button>
			</form>
		</div>
	</div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script>
$(document).ready(function(){
	$('#project').on('change', function() {
		var projectID = $('#project').val();
		$.get( "get-team.php",{
			project:$('#project').val()
		}, function(data_team) {
			var type_value = $('#project').val();
			$('#team').empty();
			$.each(data_team, function (index, value) {
				$('#team').append('<div class="col-md-6" style="padding-top:10px;padding-bottom:10px"><input type="checkbox" name="teams[]" value="'+value.TEAM_ID+'"><img src="assets/images/team/'+value.IMG+'" class="rounded-circle thumb-sm" alt="friend" style="margin-left:10px;margin-right:10px;" /> '+value.FULLNAME+'');
			});
		});
	});
	
		$('#project').on('selected', function() {
		var projectID = $('#project').val();
		$.get( "get-team.php",{
			project:$('#project').val()
		}, function(data_team) {
			var type_value = $('#project').val();
			$('#team').empty();
			$.each(data_team, function (index, value) {
				$('#team').append('<div class="col-md-6" style="padding-top:10px;padding-bottom:10px"><input type="checkbox" name="teams[]" value="'+value.TEAM_ID+'"><img src="assets/images/team/'+value.IMG+'" class="rounded-circle thumb-sm" alt="friend" style="margin-left:10px;margin-right:10px;" /> '+value.FULLNAME+'');
			});
		});
	});
});
</script>
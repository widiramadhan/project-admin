
<?php 
require_once("config/connection.php");

		$id=$_POST['id'];
		$callSP = "{call SP_EDIT_PROJECT(?)}";
		$paramSP = array(array($id, SQLSRV_PARAM_IN));
		$execSP = sqlsrv_query( $conn, $callSP, $paramSP) or die( print_r( sqlsrv_errors(), true));
		$r = sqlsrv_fetch_array($execSP);
		

?>
<div class="modal-dialog modal-lg">
	<div class="modal-content">
			<form action="project-action.php?action=update" method="post" enctype="multipart/form-data" id="form">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title" id="myModalLabel">Create Project</h4>
				</div>
				<div class="modal-body">
				<input type="hidden" name="id" value="<?php echo $r['M_PROJECT_ID'];?>" >
				<div class="form-group">
					<label>Title</label>
					<input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value="<?php echo $r['TITLE'];?>">
				</div>
				<div class="form-group">
					<label>Description</label>
					<textarea class="form-control"  id="desc" name="desc" placeholder="Enter Description" style="min-width: 100%"><?php echo $r['DESCRIPTION'];?></textarea>
				</div>
				<div class="form-group">
					<label>Category</label>
					<select name="category" id="category" class="form-control" required>
						<option value="<?php echo $r['CATEGORY_ID'];?>"><?php echo $r['CATEGORY_TITLE'];?></option>
						<option value="1">WEBSITE</option>
						<option value="2">MOBILE</option>
						<option value="3">WEBSITE & MOBILE</option>
					</select>
				</div>	
				<div class="form-group">
					<label>Start Project</label>
				<input type="text" class="form-control datepicker" id="start_date" name="start_date" value="<?php echo $r['START_DATE']->format("Y-m-d");?> ">
				</div>
				<div class="form-group">
					<label>End Project</label>
					<input type="text" class="form-control datepicker" id="end_date" name="end_date"  value="<?php echo $r['END_DATE']->format("Y-m-d");?>">
				</div>
				<div class="form-group">
						<label>Status</label>
						<select name="status" id="status" class="form-control" required>
							<option value="<?php echo $r['STATUS'];?>"><?php echo $r['STATUS'];?></option>
							<option value="Development">Development</option>
							<option value="Development Phase 2">Development Phase 2</option>
							<option value="Go Live">Go Live</option>
							<option value="Pending">Pending</option>
							<option value="UAT">UAT</option>
					
						</select>
				</div>
				<div class="form-group">
					<label>Task Completed (%)</label>
					<input type="text" class="form-control" id="task" name="task" placeholder="Task Completed" value="<?php echo $r['TASK_COMPLETED'];?>">
				</div>
				
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
	</div>
	  <script src="assets/js/jquery.min.js"></script>	
		<script src="assets/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
		 $(function(){
		  $(".datepicker").datepicker({
			  format: 'yyyy-mm-dd',
			  autoclose: true,
			  todayHighlight: true,
		  });
		 });
		</script>
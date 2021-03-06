<script src="assets/js/jquery.min.js"></script>
<link rel="stylesheet" href="assets/lib/sweetalert/sweetalert.min.css">
<script src="assets/lib/sweetalert/sweetalert.min.js"></script>
<div class="row">
	<div class="col-sm-4">
		<button type="button" class="btn btn-custom btn-rounded w-md waves-effect waves-light mb-4" data-toggle="modal" data-target=".bs-example-modal-md"><i class="fa fa-plus-circle"></i> Create Project</button>
	</div>
	<div class="col-sm-8">
		<!--<div class="project-sort float-right">
			<div class="project-sort-item">
				<form class="form-inline">
					<div class="form-group">
						<label for="phase-select">Phase :</label>
						<select class="form-control ml-2 form-control-sm" id="phase-select">
							<option>All Projects(6)</option>
							<option>Complated</option>
							<option>Progress</option>	
						</select>
					</div>
					<div class="form-group">
						<label for="sort-select">Sort :</label>
						<select class="form-control ml-2 form-control-sm" id="sort-select">
							<option>Date</option>
							<option>Name</option>
							<option>End date</option>
							<option>Start Date</option>
						</select>
					</div>
				</form>
			</div>
		</div>-->
	</div><!-- end col-->
</div>
<!-- end row -->

<div class="row">
	<?php
		$callProject = "{call SP_GET_PROJECT}"; 
		$execProject = sqlsrv_query( $conn, $callProject) or die( print_r( sqlsrv_errors(), true));
		$ribbon="";
		while($dataProject = sqlsrv_fetch_array($execProject)){
			$status=$dataProject['STATUS'];
			if($status == "Development"){
				$ribbon = "ribbon-info";
			}else if ($status == "Go Live"){
				$ribbon = "ribbon-success";
			}else if ($status == "Pending"){
				$ribbon = "ribbon-danger";
			}else if ($status == "Development Phase 2"){
				$ribbon = "ribbon-info";
			}else if ($status == "UAT"){
				$ribbon = "ribbon-warning";
			}
	?>
	<div class="col-xl-4">
		<div class="card-box project-box ribbon-box">
			<div class="ribbon <?php echo $ribbon;?>"><?php echo $dataProject['STATUS'];?></div>
			<div class="dropdown float-right">
				<a href="#" class="dropdown-toggle card-drop arrow-none" data-toggle="dropdown" aria-expanded="false">
					<h3 class="m-0 text-muted"><i class="fa fa-ellipsis-v"></i></h3>
				</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="btnGroupDrop1">
					<a data-toggle="modal" data-id="<?php echo $dataProject['M_PROJECT_ID'];?>" data-target=".bs-example-modal-md-2" class="dropdown-item open-AddBookDialog"><i class="fa fa-edit"></i> Edit</a>
					<a class="dropdown-item delete_project " href="project-action.php?action=delete&id=<?php echo $dataProject['M_PROJECT_ID'];?>" title="Remove" ><i class="fa fa-trash-o"></i> Delete</a>
					<a class="dropdown-item" href="index.php?page=team-setup1&id=<?php echo $dataProject['M_PROJECT_ID'];?>"><i class="fa fa-plus-square"></i> Add Teams</a>
				</div>
			</div>
			<br><br><br>
			<p class="text-muted text-uppercase mb-0 font-13"><?php echo $dataProject['CATEGORY_TITLE'];?></p>
			<h4 class="mt-0 mb-3"><a href="index.php?page=project-detail&id=<?php echo $dataProject['M_PROJECT_ID'];?>" class="text-dark"><?php echo $dataProject['TITLE'];?></a></h4>
			<p class="text-muted font-13"><?php echo $dataProject['DESCRIPTION'];?>...<a href="index.php?page=project-detail&id=<?php echo $dataProject['M_PROJECT_ID'];?>" class="font-600 text-muted">view more</a>
			</p>

			<ul class="list-inline">
				<li class="list-inline-item">
					<h4 class="mb-0"><?php echo $dataProject['START_DATE']->format("Y-m-d");?></h4>
					<p class="text-muted" style="text-align:center;">Start Date</p>
				</li>
				<li class="list-inline-item pull-right">
					<h4 class="mb-0"><?php echo $dataProject['END_DATE']->format("Y-m-d");?></h4>
					<p class="text-muted" style="text-align:center;">End Date</p>
				</li>
			</ul>

			<div class="project-members mb-4">
				<label class="mr-3">Team :</label>
				<?php
					$callTeam = "{call SP_GET_PROJECT_TEAM_MAPPING(?)}"; 
					$paramsTeam= array(array($dataProject['M_PROJECT_ID'], SQLSRV_PARAM_IN));  
					$execTeam = sqlsrv_query( $conn, $callTeam,$paramsTeam) or die( print_r( sqlsrv_errors(), true));
					while($dataTeam = sqlsrv_fetch_array($execTeam)){
				?>
				<a href="index.php?page=team-profile&id=<?php echo $dataTeam['TEAM_ID'];?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo $dataTeam["FULLNAME"];?>">
					<img src="assets/images/team/<?php echo $dataTeam["IMG"];?>" class="rounded-circle thumb-sm" alt="friend" />
				</a>
				<?php } ?>
			</div>

			<label class="">Task completed: <span class="text-custom"><?php echo $dataProject['TASK_COMPLETED'];?>/100</span></label>
			<div class="progress mb-1" style="height: 7px;">
				<div class="progress-bar"
					 role="progressbar" aria-valuenow="<?php echo $dataProject['TASK_COMPLETED'];?>" aria-valuemin="0" aria-valuemax="100"
					 style="width: <?php echo $dataProject['TASK_COMPLETED'];?>%;">
				</div>
			</div>

		</div>
	</div>
	<?php } ?>
</div>
<!-- end row -->
<!-- MODAL Add Project -->
<div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form action="project-action.php?action=save" method="post" enctype="multipart/form-data" id="form1" name="form1">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title" id="myModalLabel">Create Project</h4>
				</div>
				<div class="modal-body">
				<div class="form-group">
					<label>Title</label>
					<input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
				</div>
				<div class="form-group">
					<label>Description</label>
					<textarea class="form-control" id="desc" name="desc" placeholder="Enter Description" style="min-width: 100%"></textarea>
				</div>
				<div class="form-group">
					<label>Category</label>
					<select name="category" id="category" class="form-control" required>
						<option value="" disabled selected>CHOOSE CATEGORY</option>
						<option value="1">Website</option>
						<option value="2">Mobile</option>
						<option value="3">Website & Mobile</option>
					</select>
				</div>	
				<div class="form-group">
					<label>Start Project</label>
					<input type="text" class="form-control datepicker" id="start_date" name="start_date" >
				</div>
				<div class="form-group">
					<label>End Project</label>
					<input type="text" class="form-control datepicker" id="end_date" name="end_date">
				</div>
				<div class="form-group">
						<label>Status</label>
						<select name="status" id="status" class="form-control" required>
							<option selected disabled>Choose your Option</option>
							<option value="Development">Development</option>
							<option value="Development Phase 2">Development Phase 2</option>
							<option value="Go Live">Go Live</option>
							<option value="Pending">Pending</option>
							<option value="UAT">UAT</option>
						</select>
				</div>
				<div class="form-group">
					<label>Task Completed (%)</label>
					<input type="text" class="form-control" id="task" name="task" placeholder="Task Completed">
				</div>
				
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- MODAL Edit Project -->
<div class="modal fade bs-example-modal-md-2" id="addBookDialog2" tabindex="-1" role="dialog" aria-hidden="true"></div>

<script src="assets/js/jquery.min.js"></script>
<script>
$(document).ready(function() {
	$(document).on("click", ".open-AddBookDialog", function () {
		var myBookId = $(this).data('id');
		$(".modal-body #bookId").val( myBookId );
		$.ajax({
			type: 'post',
			url: 'project-edit.php',
			data: 'id=' +myBookId,
			dataType: 'HTML',
			success: function(value){
				$("#addBookDialog2").html(value);
			}
		});
	});	
});

$(document).ready(function($){
        $('.delete_project').on('click',function(){
            var getLink = $(this).attr('href');
            swal({
                    title: 'Are you sure?',
                    text: 'Delete this Project?',
                    type: 'warning',
                    html: true,
                    confirmButtonColor: '#d9534f',
                    showCancelButton: true,
                    },function(){
                    window.location.href = getLink
                });
            return false;
        });
    });
	

</script>
	
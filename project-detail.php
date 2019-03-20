

<?php
$projectId=$_GET['id'];
$callProject = "{call SP_GET_PROJECT_ID(?)}"; 
$paramsProject= array(array($projectId, SQLSRV_PARAM_IN));  
$execProject = sqlsrv_query( $conn, $callProject,$paramsProject) or die( print_r( sqlsrv_errors(), true));
$ribbon="";
$dataProject = sqlsrv_fetch_array($execProject);
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
<div class="row">
	<div class="col-xl-8">
		<div class="card-box project-box ribbon-box">
		<ul class="nav nav-tabs tabs-bordered">
		<li class="nav-item">
			<a href="#detail-b1" data-toggle="tab" aria-expanded="false" class="nav-link active show">
				<i class="icon-monitor mr-2"></i> Project Detail
			</a>
		</li>
		<li class="nav-item">
			<a href="#bisreq-b1" data-toggle="tab" aria-expanded="true" class="nav-link">
				<i class="icon-head mr-2"></i>Doc
			</a>
		</li>
		</ul>
		<div class="tab-content">
        <div class="tab-pane active show" id="detail-b1">
			<div class="ribbon <?php echo $ribbon;?>"><?php echo $dataProject['STATUS'];?></div>
			<div class="dropdown float-right">
				<a href="#" class="dropdown-toggle card-drop arrow-none" data-toggle="dropdown" aria-expanded="false">
					<h3 class="m-0 text-muted"><i class="fa fa-ellipsis-v"></i></h3>
				</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="btnGroupDrop1">
					<a data-toggle="modal" data-id="<?php echo $dataProject['M_PROJECT_ID'];?>" data-target=".bs-example-modal-md-2" class="dropdown-item open-AddBookDialog"><i class="fa fa-edit"></i> Edit</a>
					<a class="dropdown-item" href="project-action.php?action=delete&id=<?php echo $dataProject['M_PROJECT_ID'];?>" title="Remove" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash-o"></i> Delete</a>
					<a class="dropdown-item" href="index.php?page=team-setup1&id=<?php echo $dataProject['M_PROJECT_ID'];?>"><i class="fa fa-plus-square"></i> Add Teams</a>
				</div>
			</div>
			<br><br><br>
			<p class="text-muted text-uppercase mb-0 font-13"><?php echo $dataProject['CATEGORY_TITLE'];?></p>
			<h4 class="mt-0 mb-3"><a href="index.php?page=project-detail&id=<?php echo $dataProject['M_PROJECT_ID'];?>" class="text-dark"><?php echo $dataProject['TITLE'];?></a></h4>
			<p class="text-muted font-13"><?php echo $dataProject['DESCRIPTION'];?><a href="index.php?page=project-detail&id=<?php echo $dataProject['M_PROJECT_ID'];?>" class="font-600 text-muted"></a>
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
				<a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo $dataTeam["FULLNAME"];?>">
					<img src="assets/images/team/<?php echo $dataTeam["IMG"];?>" class="rounded-circle thumb-sm" alt="friend" />
					
				</a>
				<?php } ?>
				<a style="margin-left:2px" href="index.php?page=team-setup1&id=<?php echo $dataProject['M_PROJECT_ID'];?>"><span class="add-new-plus"><i class="fa fa-plus"></i> </span></a>
			</div>
			<label class="">Task completed: <span class="text-custom"><?php echo $dataProject['TASK_COMPLETED'];?>/100</span></label>
			<div class="progress mb-1" style="height: 7px;">
				<div class="progress-bar"
					 role="progressbar" aria-valuenow="<?php echo $dataProject['TASK_COMPLETED'];?>" aria-valuemin="0" aria-valuemax="100"
					 style="width: <?php echo $dataProject['TASK_COMPLETED'];?>%;">
				</div>
			</div>

		</div>
		 <div class="tab-pane show" id="bisreq-b1">
			<h4 class="header-title m-b-30">My Files</h4>
			<div class="row">
				<div class="col-lg-3">
					<div class="file-man-box">
						<a href="" class="file-close"><i class="fa fa-times-circle" style="color:red"></i></a>
						<div class="file-img-box">
							<img src="assets/images/file_icons/pdf.svg" alt="icon">
						</div>
						<a href="#" class="file-download"><i class="fa fa-download"></i> </a>
						<div class="file-man-title">
							<h5 class="mb-0 text-overflow">invoice_project.pdf</h5>
							<p class="mb-0"><small>568.8 kb</small></p>
						</div>
					</div>
				</div>

			</div>
		</div>
		</div>

			

		</div>
	</div>

	<div class="col-md-4">
		<div class="card-box">
		<?php
			$callComment = "{call SP_GET_COMMENT(?)}"; 
			$paramsComment= array(array($projectId, SQLSRV_PARAM_IN));  
			$execComment = sqlsrv_query( $conn, $callComment,$paramsComment) or die( print_r( sqlsrv_errors(), true));
			$no = 0;
			while($dataComment = sqlsrv_fetch_array($execComment)){
			$no++;	
		?>
			<h4 class="header-title m-b-30">Comments (<?php echo $no;?>)</h4>

			<div>

				<div class="media mb-3">
					<div class="d-flex mr-3">
						<a href="#"> <img class="media-object rounded-circle thumb-sm" alt="64x64" src="assets/images/team/<?php echo $dataComment['IMG'];?>"> </a>
					</div>
					<div class="media-body">
						<h5 class="mt-0"><?php echo $dataComment['FULLNAME'];?></h5>
						<p class="font-13 text-muted mb-0">
							<a href="" class="text-dark"></a>
							<?php echo $dataComment['COMMENT'];?>
						</p>
					</div>
				</div>
				
			<?php } ?>
				<div class="media">
					<div class="d-flex mr-3">
						<a href="#"> <img class="media-object rounded-circle thumb-sm" alt="64x64" src="assets/images/avatar-1.jpg"> </a>
					</div>
					<div class="media-body">
						<input type="text" class="form-control input-sm" placeholder="Write the comment...">
						<div class="mt-2 text-right">
							<button type="submit" class="btn btn-sm btn-primary waves-effect waves-light">Send <i class="fa fa-send ml-1"></i> </button>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div><!-- end col -->
</div>
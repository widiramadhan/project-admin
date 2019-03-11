<div class="row">
	<div class="col-sm-4">
		<button type="button" class="btn btn-custom btn-rounded w-md waves-effect waves-light mb-4"><i class="fa fa-plus-circle"></i> Create Project</button>
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
			<br><br><br>
			<p class="text-muted text-uppercase mb-0 font-13"><?php echo $dataProject['CATEGORY_TITLE'];?></p>
			<h4 class="mt-0 mb-3"><a href="" class="text-dark"><?php echo $dataProject['TITLE'];?></a></h4>
			<p class="text-muted font-13"><?php echo $dataProject['DESCRIPTION'];?>...<a href="#" class="font-600 text-muted">view more</a>
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
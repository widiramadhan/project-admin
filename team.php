<div class="row">
	<div class="col-sm-4">
		 <a href="index.php?page=add-team" class="btn btn-custom btn-rounded w-md waves-effect waves-light mb-4"><i class="fa fa-plus-circle"></i> Add Team </a>
	</div>
</div>
<div class="row">
	<?php
		$callTeam = "{call SP_GET_TEAM}"; 
		$execTeam = sqlsrv_query( $conn, $callTeam) or die( print_r( sqlsrv_errors(), true));
		while($dataTeam = sqlsrv_fetch_array($execTeam)){
	?>
	<div class="col-lg-3">
		<div class="text-center card-box">
			<div class="member-card pt-2 pb-2">
				<div class="thumb-lg member-thumb m-b-10 mx-auto">
					<img src="assets/images/team/<?php echo $dataTeam['IMG'];?>" class="rounded-circle img-thumbnail" alt="profile-image" style="width:100px;height:90px;">
				</div>
				<div class="">
					<h4 class="m-b-5"><?php echo $dataTeam['FULLNAME'];?></h4>
					<p class="text-muted"><?php echo $dataTeam['JOB'];?><span></p>
				</div>
				<ul class="social-links list-inline m-t-20">
					<li class="list-inline-item">
						<a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="<?php echo $dataTeam['EMAIL'];?>"><i class="fa fa-envelope-o"></i></a>
					</li>
					<li class="list-inline-item">
						<a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="" data-original-title="<?php echo $dataTeam['PHONE'];?>"><i class="fa fa-phone"></i></a>
					</li>
				</ul>
				<button type="button" class="btn btn-primary m-t-20 btn-rounded btn-bordered waves-effect w-md waves-light">Detail</button>
			</div>
		</div>
	</div>
	<?php } ?>
</div>
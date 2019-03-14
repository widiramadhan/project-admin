<div class="row">
	<div class="col-sm-4">
		 <button class="btn btn-custom btn-rounded w-md waves-effect waves-light mb-4" data-toggle="modal" data-target=".bs-example-modal-md"><i class="fa fa-plus-circle"></i> Add Team </button>
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
				<button type="button" class="btn btn-custom m-t-20 btn-rounded btn-bordered waves-effect w-md waves-light">Detail</button>
			</div>
		</div>
	</div>
	<?php } ?>
</div>
<!-- MODAL  -->
<div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<form action="team-action.php?action=save" method="post" enctype="multipart/form-data" id="form">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title" id="myModalLabel">Add Team</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
					<label>Name</label>
					<input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
				</div>
				<div class="form-group">
					<label>Job</label>
					<input type="text" class="form-control" id="job" name="job" placeholder="Enter Job">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control" id="email"  name="email" placeholder="Enter Email">
				</div>
				<div class="form-group">
					<label>No Handphone</label>
					<input type="text" class="form-control" id="nohp" name="nohp" placeholder="Enter Number">
				</div>
				<div class="form-group">
				<label>Photo <span class="mandatory">*</span></label>				
				<div style="margin-bottom:10px;">
					<input type="file" name="img" id="img" required style="margin-bottom:5px;" />
				</div>
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
<div class="row">
	<div class="col-lg-12">
		<div class="card-box">
			<h4 class="m-t-0 m-b-30 header-title">Add Team</h4>
			<form action="team-action.php?action=save" method="post" enctype="multipart/form-data" id="form">
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
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>

</div>
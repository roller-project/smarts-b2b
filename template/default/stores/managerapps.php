<div class="row">
	<?php foreach ($apps as $key => $value) { ?>
		
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header bg-primary text-white"><h5><?php echo $value->app_name;?>
			<div class="float-right dropdown">
			  <button class="btn btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    <i class="fa fa-ellipsis-h"></i>
			  </button>
			  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
			    <a class="dropdown-item" href="#">Domain</a>
			    <a class="dropdown-item" href="#">Settings</a>
			    <a class="dropdown-item" href="#">Report</a>
			  </div>
			</div>
			</h5></div>
			<div class="card-body">
				Post : 1 item<br>
				Image : 237<br>
				View : 5022<br>
				Create : <?php echo $value->app_created;?><br>
			</div>
		</div>
	</div>
	<?php } ?>
</div>
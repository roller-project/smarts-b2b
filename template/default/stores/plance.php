<?php echo form_open();?>
<label>Enter Plance Name</label>
<input type="text" name="name" class="form-control form-lg">
<br>
<h4>Select Plance</h4>
<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-header"><h4>Free</h4></div>
			<div class="card-body">
				Apps : 1<br>
				Support : 24-72h<br>
				HDD : 1 GB<br>
				Bandwith : 10 GB<br>
			</div>
			<div class="card-footer"><button type="submit" name="saveplance" value="1" class="btn btn-info btn-block">Register</button></div>
		</div>
	</div>
	<div class="col">
		<div class="card">
			<div class="card-header"><h4>10$/Month</h4></div>
			<div class="card-body">
				Apps : 10<br>
				Support : 1-12h<br>
				HDD : 10 GB<br>
				Bandwith : 100 GB<br>
			</div>
			<div class="card-footer"><button type="submit" name="saveplance" value="10" class="btn btn-info btn-block">Register</button></div>
		</div>
	</div>

	<div class="col">
		<div class="card">
			<div class="card-header"><h4>20$/Month</h4></div>
			<div class="card-body">
				Apps : 100<br>
				Support : 1-2h<br>
				HDD : 100 GB<br>
				Bandwith : 10000 GB<br>
			</div>
			<div class="card-footer"><button type="submit" name="saveplance" value="20" class="btn btn-info btn-block">Register</button></div>
		</div>
	</div>


</div>

<?php echo form_close();?>

<div style="-moz-box-direction: normal;
    -moz-box-orient: vertical;
    -moz-box-pack: center;
    -moz-box-align: stretch;
    margin: 0px;
    padding: 0px 16px;
    display: flex;
    align-items: stretch;
    justify-content: center;
    flex-direction: column;
    flex: 1 1 0%;

}">
<div class="loginForm">

	<div class="card">
		<div class="card-header" style="padding:20px; padding-left: 50px; padding-right: 50px; ">
			<h4><i class="fas fa-unlock fa-icon"></i> Login to account</h4>
			
		</div>
		<div class="card-body" style="padding:50px;">
			

			
			<?php echo form_open(site_url("login.html"));?>
			<label for="email">Email</label>
			<div class="input-group mb-3">
			  <input type="email" name="email" class="form-control" placeholder="Enter email" required="">
			  

			</div>
			 

			  <label for="exampleInputPassword1">Password</label>
			  <div class="input-group mb-3">
			    
			    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required="">
			    
			  </div>


			  


			  <?php echo @$captcha; ?>
			  <div class="row">
			  	<div class="col">
			  		<label class="form-check-label" for="exampleCheck1"><input type="checkbox" name="remember"> Remember</label>
			  	</div>

			  	<div class="col text-right">
			  		<a class="form-check-label" for="exampleCheck1" href="<?php echo site_url("forget.html");?>">Forget Password</a>
			  	</div>

			  	
			  </div>
			 <br>
			  <button type="submit" class="btn btn-primary btn-block">Login</button>
			  
			</form>
			
		</div>
		<div class="card-footer"  style="padding-left:50px;padding-right:50px; background-color: #FFF;">
			<div class="orderby"><span>Or sign in with</span></div>
			<div class="row">
				<div class="col">
					<a href="/login.html?with=google" class="btn btn-outline-info btn-block"><i class="fab fa-google"></i> Google</a>
				</div>
				<div class="col">
					<a href="/login.html?with=facebook" class="btn btn-outline-info btn-block"><i class="fab fa-facebook"></i> Facebook</a>
				</div>
			</div>
		</div>
		
	</div>
	
</div>
</div>


<style type="text/css">
	.orderby{
		margin-top: -25px;
		text-align: center;
		margin-bottom: 15px;
	}
	.orderby span{ background-color: #FFF; text-transform: uppercase; padding-left: 5px; padding-right: 5px; }
	.loginForm{
		margin: auto;
		width: 500px;
		align-items: stretch;
    width: 100%;
    margin: auto;
    pointer-events: auto;
    background: rgb(255, 255, 255) none repeat scroll 0% 0%;
    overflow: hidden;
    border-radius: 4px;
    max-width: 460px;
    box-shadow: rgba(116, 129, 141, 0.1) 0px 1px 1px 0px;
   
    -moz-box-align: stretch;
    -moz-box-direction: normal;
    -moz-box-orient: vertical;
    display: flex;
    padding: 0px;
    flex-direction: column;



	}
	.card-header{
		background-color: #FFF;
	}
	main{
		-moz-box-direction: normal;

-moz-box-orient: vertical;

margin: 0px;

padding: 0px;

width: 100%;

min-height: 100vh;

color: rgb(36, 42, 49);

background: rgb(245, 247, 249) none repeat scroll 0% 0%;

display: flex;

flex-direction: column;
max-width: 100%;
min-width: 100%;
	}
</style>



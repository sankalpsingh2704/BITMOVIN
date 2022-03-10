<form id="login_form" name="login_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">				
	<div class="form-group">
		<label for="email_input">Email:</label>
		<input class="form-control" type="email" id="email_input" name="email_input" />
	</div>
	<div class="form-group">
		<label for="password_input">Password:</label>
		<input class="form-control" type="password" id="password_input" name="password_input" />
	</div>
	<div>
		<span>
			<input class="btn-primary btn" type="submit" id="submit_btn" name="submit_btn" value="Login" />
		</span>
	</div>
</form>
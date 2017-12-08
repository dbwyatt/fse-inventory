
<div class="content"> <!-- wrapper for login form -->
	
	<?php

	// if the user is good to go, allow the to try logging in
	if(!isset($on_hold_message))
	{
		if(isset($login_error_mesg))
		{
	?>
			<div class="row justify-content-center padding_medium">
				<div class="col-6">
					<p>
						Login Error #' . $this->authentication->login_errors_count . '/' . config_item('max_allowed_attempts') . ': Invalid Username, Email Address, or Password.
					</p>
					<p>
						Username, email address and password are all case sensitive.
					</p>
				</div>
			</div>
	<?php
		}

		if($this->input->get(AUTH_LOGOUT_PARAM))
		{
			//display logout notification BOOTSTRAP NOTIFY
	?>
			<div class="row justify-content-center padding_medium">
				<div class="col-6">
					<div id="logout_status_message" class="alert alert-primary alert-dismissable" role="alert">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						You have successfully logged out.
					</div>
				</div>
			</div>
	<?php
		}


		// <form> begin
		echo form_open($login_url, ['class' => 'std-form']);
	?>
			<div class="row justify-content-center padding_large">
				<div class="col-sm-3 form_styled_container">
					<!-- Username Field -->
					<label for="login_string" class="col-form-label">Username or Email</label>
					<input type="text" class="form-control" id="login_string" placeholder="Username or email">

					<br>

					<!-- Password Field -->
					<label for="login_pass" class="col-form-label">Password</label>
				    <input class="form-control" type="password" id="login_pass" placeholder="Password"
					    <?php if(config_item('max_chars_for_password') > 0)
								echo 'maxlength="' . config_item('max_chars_for_password') . '"'; 
						?> readonly="readonly" onfocus="this.removeAttribute('readonly');">

					<br>

					<?php
						if(config_item('allow_remember_me'))
						{
					?>
							<input type="checkbox" id="remember_me" name="remember_me" value="yes" />
							<label id="login_rememberme_label" for="remember_me" class="form_label">Remember Me</label>
					<?php
						}
					?>

					<br>

					<div class="row justify-content-center padding_top_medium">
						<button type="submit" class="btn btn-primary" id="submit_button">Login</button>
					</div>

					<div class="row justify-content-center padding_top_medium">
						<a class="lightgrey" href="<?php echo site_url('authenticate/recover'); ?>">Can't access your account?</a>
					</div>

				</div>
			</div>
		</form>

	<?php

		}
		else
		{
			// EXCESSIVE LOGIN ATTEMPTS ERROR MESSAGE
			echo '
				<div style="border:1px solid red;">
					<p>
						Excessive Login Attempts
					</p>
					<p>
						You have exceeded the maximum number of failed login<br />
						attempts that this website will allow.
					<p>
					<p>
						Your access to login and account recovery has been blocked for ' . ( (int) config_item('seconds_on_hold') / 60 ) . ' minutes.
					</p>
					<p>
						Please use the <a href="/examples/recover">Account Recovery</a> after ' . ( (int) config_item('seconds_on_hold') / 60 ) . ' minutes has passed,<br />
						or contact us if you require assistance gaining access to your account.
					</p>
				</div>
			';
		}
	?>

</div>
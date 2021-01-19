<body>
	<!-- sign in -->
	<form class="sign-in segments-page" action="<?php echo base_url('login'); ?>" method="POST">
		<div class="container">
			<div class="container">
				<div class="signin-contents">
					<div class="pages-title">
						<div class="brnd-logo">
							<img src="<?php echo base_url(); ?>assets/images/logo.png" alt="">
						</div>
						<h3>Sign In</h3>
					</div>
					<form>
						<div class="input-field col s12">
							<i class="material-icons prefix">account_circle</i>
							<input id="username" type="text" name="username">
							<label for="username"> Username</label>
						</div>
						<div class="input-field col s12">
							<i class="material-icons prefix">lock</i>
							<input id="password" type="password" name="password">
							<label for="password"> Password</label>

						</div>
						<div class="sign-in-btn col s12">
							<button class="btn waves-effect waves-light" name="login">Sign in <i class="material-icons right"></i></button>
						</div>
						<div class="container">
							<?php if ($this->session->flashdata("Success") != null) {
							?>
								<div class="row">
									<div class="login-msg col s12">
										<div class="alrt green lighten-2">
											<p>
											<?php echo $this->session->flashdata("Success"); ?>
											</p>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if ($this->session->flashdata("Failed") != null) {
							?>
								<div class="row">
									<div class="login-msg col s12">
										<div class="alrt red lighten-2">
											<p>
											<?php echo $this->session->flashdata("Failed"); ?>
											</p>
										</div>
									</div>
								</div>
							<?php } ?>
							<?php if ($this->session->flashdata("InvalidAccess") != null) {
							?>
								<div class="row">
									<div class="login-msg col s12">
										<div class="alrt orange lighten-2">
											<p>
											<?php echo $this->session->flashdata("InvalidAccess"); ?>
											</p>
										</div>
									</div>
								</div>
							<?php } ?>
						
						
								<!-- <div class="row">
									<div class="login-msg col s12">
										<div class="alrt red lighten-2">
											<p>
											Red Color
											</p>
										</div>
									</div>
								</div>
							 -->
			
						

						
							<!-- <div class="row">
								<div class="login-msg col s12">
									<div class="alrt orange lighten-2">
										<p>User does not exist</p>
									</div>
								</div>
							</div> -->
						</div>

					</form>

				</div>
			</div>
		</div>
	</form>
</body>
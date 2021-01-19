		<section class="CreateVendor">
			<div class="container">
				<div class="settings">
					<div class="user-view">
						<img src="<?php echo base_url(); ?>assets/images/user.png" />
					</div>
					<div class="pages-title">
						<h3>Add Vendor</h3>
					</div>
					<form class="create-vendor" method="POST" action="<?php echo base_url('signup'); ?>">
						<div class="row">
							<div class="col m6 s12 s12">
								<div class="input-field tooltipped" data-position="top" data-delay="50" data-tooltip="Password will be same as Username" class="validate" required="" aria-required="true">
									<input id="username" type="text" name="username" class="validate" required="" aria-required="true">
									<label for="username"> Username</label>
								</div>
							</div>
							<div class="col m6 s12 s12">
								<div class="input-field ">
									<select name="type">
										<option value="">Choose Option</option>
										<option value="Admin">Admin</option>
										<option value="Vendor" selected>Vendor</option>
									</select>
									<label>Select User Type </label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col m6 s12">
								<div class="input-field ">
									<input id="Name" type="text" name="Name" class="validate" required="" aria-required="true">
									<label for="Name"> Full Name</label>
								</div>
							</div>
							<div class="col m6 s12">
								<div class="input-field tooltipped " data-position="top" data-delay="50" data-tooltip="This email address will be used for account reset and invoices" required="" aria-required="true">
									<input id="email" type="email" name="email" class="validate" required="" aria-required="true">
									<label for="email"> Email address</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col m6 s12">
								<div class="input-field tooltipped" data-position="top" data-delay="50" data-tooltip="Phone number to be used for sms notifications" required="" aria-required="true">
									<input id="contact" type="number" min="6000000000" max="9999999999" name="Contact" class="validate" required="" aria-required="true">
									<label for="contact">Phone number</label>
								</div>
							</div>
							<div class="col m6 s12">
								<div class="input-field tooltipped" data-position="top" data-delay="50" data-tooltip="Enter opening credits" required="" aria-required="true">
									<input id="credits" type="number" name="Credits" class="validate" required="" aria-required="true">
									<label for="credits"> Credits</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col m12 center-align">
								<button class="btn waves-effect waves-light" name="submit">Create</button>
							</div>
						</div>
						<div class="container">
							<?php if ($this->session->flashdata('UserSuccess') != null) { ?>
								<div class="row">
									<div class="login-msg col s12">
										<div class="alrt green lighten-2">
											<p> <?php echo $this->session->flashdata('UserSuccess') ?></p>
										</div>
									</div>
								</div>
							<?php } ?>

							<?php //if ($this->session->flashdata('Userfailed') != null) { 
							?>


							<!-- <div class="row">
							<div class="login-msg col s12">
								<div class="alrt red lighten-2">
									<p>Invalid Password</p>
								</div>
							</div>
						</div> -->
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
		</section>
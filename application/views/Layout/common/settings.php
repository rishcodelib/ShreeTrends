<section class="Settings">
	<div class="container">
		<div class="settings">
			<div class="user-view">
				<img src="<?php echo base_url(); ?>assets/images/user.png" />
			</div>
			<div class="pages-title">
				<h3>Settings</h3>
			</div>
			
			<form class="create-vendor" action="<?php echo base_url('User/settings'); ?>" method="POST" enctype="multipart/form-data">
				<div class="row">
					<div class="col m6 s12 s12">
						<div class="input-field" class="validate" aria-required="true">
							<input id="username" disabled type="text" name="username" class="validate" value="<?php echo ($this->session->userdata('user')->Username) ?>">
							<label for="username"> Username</label>
						</div>
					</div>
					<div class="col m6 s12">
						<div class="input-field ">
							<input id="Name" type="text" disabled name="Name" aria-required="true" value="<?php echo ($this->session->userdata('user')->Name) ?>">
							<label for="Name"> Full Name</label>
						</div>
					</div>
				</div>
				<div class="row">

					<div class="col m6 s12 s12">
						<div class="input-field ">
							<input disabled id="password" type="text" name="Name" aria-required="true" value="<?php echo ($this->session->userdata('user')->ContactNo) ?>">
							<label for="password"> Contact Number</label>
						</div>
					</div>
					<div class="col m6 s12">
						<div class="input-field tooltipped " data-position="top" data-delay="50" data-tooltip="This email address will be used for account reset and invoices" aria-required="true">
							<input disabled id="email" type="email" name="email" value="<?php echo ($this->session->userdata('user')->EmailID) ?>">
							<label for="email"> Email address</label>
						</div>
					</div>
				</div>
				<div class="row">

					<div class="col m12 s12 s12">
						<div class="input-field ">
							<input type="text" name="updatepassword" id="password">
							<label for="password">Enter New Password</label>
						</div>
					</div>

				</div>

				<div class="row">
					<div class="col m12 center-align">
						<button class="btn waves-effect waves-light" name="updatePwd">Update</button>
					</div>
				</div>

			</form>
			<div class="container">
				<?php if ($this->session->flashdata('success') != null) { ?>
					<div class="row">
						<div class="login-msg col s12">
							<div class="alrt green lighten-2">
								<p> <?php echo $this->session->flashdata('success') ?></p>
							</div>
						</div>
					</div>
				<?php } ?>
				<?php if ($this->session->flashdata('failed') != null) { ?>
					<div class="row">
						<div class="login-msg col s12">
							<div class="alrt red lighten-2">
								<p> <?php echo $this->session->flashdata('failed') ?></p>
							</div>
						</div>
					</div>
				<?php } ?>




			</div>
		</div>
	</div>
</section>
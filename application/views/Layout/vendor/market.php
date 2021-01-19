<!--market body start -->
<!-- product -->
<section class="product segments-page">
	<div class="container">
		<div class="section-title">
			<h3>Your Products: </h3>
			<br>
			<hr>
		</div>
		<?php if ($this->session->flashdata('OrderSuccess') != NULL) { ?>

			<div class="container">
				<div class="row">
					<div class="login-msg col s12">
						<div class="alrt green lighten-2">
							<p>
							<?php echo 	$this->session->flashdata('OrderSuccess'); ?>
							</p>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<div class="row">
			<?php
			// print_r($view);
			if ($view == NULL) { ?>
				<div class="home-error">
					<div class="container">
						<div class="row center-align">
							<div class="col m12 s12">
								<i class="material-icons large">error</i>
								<h3>No products to show</h3>
								<h4>Please contact administrator</h4>
							</div>
						</div>
					</div>
				</div>
				<?php } else {
				foreach ($view as $val) {	?>
					<div class="col m3 s6">
						<div class="content">
							<a href="<?php echo base_url('user/itemview/') . $val->ProductID ?>"><img src="<?php echo base_url() . $val->ImagePath . $val->ImageName ?>" alt="">
								<p><?php echo $val->ProductName; ?></p>
								<h5><?php echo "₹ " . $val->price; ?></h5>
							</a>
						</div>
					</div>
			<?php 	}
			} ?>
			<!-- <div class="col s3">
				<div class="content">
					<a href=""><img src="<?php echo base_url(); ?>assets/images/style1.jpg" alt="">
						<p>Casual Clothes in a Modern Style</p>
					</a>
					<h5>$28</h5>
				</div>
			</div> -->
			<!-- <div class="col s3">
				<div class="content">
					<a href=""><img src="<?php echo base_url(); ?>assets/images/style1.jpg" alt="">
						<p>Casual Clothes in a Modern Style</p>
					</a>
					<h5>$28</h5>
				</div>
			</div>
			<div class="col s3">
				<div class="content">
					<a href=""><img src="<?php echo base_url(); ?>assets/images/style1.jpg" alt="">
						<p>Casual Clothes in a Modern Style</p>
					</a>
					<h5>$28</h5>
				</div>
			</div> -->
		</div>


		<!-- <div class="row">
				<div class="col s3">
					<div class="content">
						<a href=""><img src="<?php echo base_url(); ?>assets/images/style1.jpg" alt="">
						<p>Casual Clothes in a Modern Style</p></a>
						<h5>$28</h5>
					</div>
				</div>
				<div class="col s3">
					<div class="content">
						<a href=""><img src="<?php echo base_url(); ?>assets/images/style1.jpg" alt="">
						<p>Casual Clothes in a Modern Style</p></a>
						<h5>$28</h5>
					</div>
                </div>
                <div class="col s3">
					<div class="content">
						<a href=""><img src="<?php echo base_url(); ?>assets/images/style1.jpg" alt="">
						<p>Casual Clothes in a Modern Style</p></a>
						<h5>$28</h5>
					</div>
				</div>
				<div class="col s3">
					<div class="content">
						<a href=""><img src="<?php echo base_url(); ?>assets/images/style1.jpg" alt="">
						<p>Casual Clothes in a Modern Style</p></a>
						<h5>$28</h5>
					</div>
				</div>
			</div> -->
		<!-- <div class="row">
				<div class="prdcts-pagination">
					<div class="pagination">
						<ul>
							<li class="disabled"><a href="">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">4</a></li>
                		    <li><a href="">5</a></li> 
						</ul>
					</div>
				</div>
			</div> -->

	</div>

</section>
<!-- end product -->
<!--market Ends -->
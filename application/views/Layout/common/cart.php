<section class="cart-page">
	<div class="segments-page">
		<div class="container">
			<div class="pages-title">
				<h3>Cart</h3>
			</div>
			<div class="cart">
				<?php
				unset($data);
				print_r($this->session->userdata());
				?>
				<!-- <div class="cart-product">
					<div class="row">
						<div class="col m2 s12">
							<div class="contents">
								<img src="<?php echo base_url(); ?>assets/images/product1.jpg" alt="">
							</div>
						</div>
						<div class="col m8 s8">
							<div class="contents">
								<h4>Casual Clothes in a Modern Style</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus cum autem illo libero </p>
								<h5>$28</h5>
								<p>Quantity: 5</p>
							</div>
						</div>
						<div class="col m2 s2">
							<div class="contents remove">
								<a href=""><i class="fa fa-remove"></i></a>
							</div>
						</div>
					</div>
				</div> -->
				<div class="cart-error">
					<div class="container">
						<div class="row center-align">
							<div class="col m12">
								<i class="material-icons large">remove_shopping_cart</i>
								<h3>Cart is empty</h3>
								<h4>Kindly add products</h4>
							</div>
						</div>
					</div>
				</div>

			</div>
			<div class="total-pay">
				<!-- <div class="row">
					<div class="col s8">
						<div class="contents">
							<p>Casual Clothes in a Modern Style</p>
						</div>
					</div>
					<div class="col s4">
						<div class="contents right">
							<p>$99</p>
						</div>
					</div>
				</div> -->
				<div class="row">
					<div class="col s8">
						<div class="contents">
							<h5>Total</h5>
						</div>
					</div>
					<div class="col s4">
						<div class="contents right">
							<h5>₹ 0</h5>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col m12">
						<div class="right-align">
							<button class="btn"><i class="fa fa-send"></i>Proceed to Chekcout</button>
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>
</section>
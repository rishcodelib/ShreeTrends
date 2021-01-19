	<!-- product details -->
	<section class="single-prdct">
		<div class="segments-page">
			<div class="container">
				<div class="product-details">
					<?php // print_r($details); 
					?>
					<div class="contents">
						<div class="row">
							<div class="col m6 s12">
								<div class="product-d-slide owl-carousel owl-theme">
									<div class="content">
										<img src="<?php echo base_url() . $details[0]->ImagePath . $details[0]->ImageName ?>" alt="" />
									</div>

								</div>
							</div>
							<div class="col m6 s12">

								<?php if (($this->session->userdata('user')->type) == 'Vendor') { ?>
									<div class="desc-short">
									<h4><?php echo "Product Name: " . $details[0]->ProductName ?></h4>
									<p><?php echo "Description: " . $details[0]->ProductDesc ?> </p>
									<h5><?php echo "Price: " . "₹ " . $details[0]->price ?></h5>
									</div>
									<form action="<?php echo base_url('user/itemView/') .  $details[0]->ProductID ?>" method="POST" enctype="multipart/form-data">
										<div class="prod-specs">
											<h5>Select Sizes: </h5>
											<div class="prdct-sizes center-align">

												<div class="row">
													<div class="input-field col s12 hide">
														<input id="pid" type="text" name="pid" value="<?php echo $details[0]->ProductID ?>">
														<label for="pid"> Product ID</label>
													</div>
													<?php foreach ($details as $val) {	?>
														<div class="col m4">
															<div class="select-size">
																<input required name="size" type="radio" id="<?php echo "size" .	$val->Size; ?>" value="<?php echo $val->Size; ?> " />
																<label for="<?php echo "size" .	$val->Size; ?>"><?php echo	$val->Size; ?></label>
															</div>
															<div class="qty-status">
																<span> Available :<?php echo $val->Stock; ?></span>
															</div>
														</div>
													<?php  } ?>
												</div>

											</div>

											<div class="row">
												<div class="col m12">
													<div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
													<input required type="number" name="quant" id="number" value="1" />
													<div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div>
												</div>
											</div>

										</div>

										<div class="add-cart">
											<button class="btn waves-effect waves-light" name="submit" type="submit"><i class="fa fa-shopping-cart"></i> Proceed to Checkout</button>
										</div>

									</form>
								<?php } else if (($this->session->userdata('user')->type) == 'Admin') { ?>
									<table class="item-view-table">

										<tr>
											<td><b>Product Name: </b> </td>
											<td><?php echo $details[0]->ProductName ?> </td>
										</tr>
										<tr>
											<td><b>Product Price: </b> </td>
											<td><?php echo "₹ " . $details[0]->price ?> </td>
										</tr>
										<tr>
											<td><b>Description: </b> </td>
											<td><?php echo $details[0]->ProductDesc ?> </td>
										</tr>
										<tr>
											<td><b>Product ID: </b> </td>
											<td><?php echo $details[0]->ProductID ?> </td>
										</tr>

										<div class="row">

											<?php foreach ($details as $val) {	?>
												<div class="col m4">
													<div class="select-size">
														<tr>
															<td><b>Available Size: (<?php echo $val->Size; ?>) </b> </td>
															<td>Available Stock: (<?php echo $val->Stock; ?>)</td>

														</tr>

													</div>

												</div>
											<?php  } ?>
									</table>
							</div>
						<?php } ?>

						</div>
					</div>
				</div>

			</div>
		</div>
		</div>
	</section>
	<!-- end product details -->
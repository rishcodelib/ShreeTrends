<?php //echo ($this->session->userdata('user')->type) 
?>
<section class="home">
	<div class="product segments-page">
		<div class="container">
			<div class="row">
				<div class="col m4 offset-m4 s12">
					<div class="section-title center-align">
						<div class="input-field">

							<select name="UserID" id="Vendor">
								<option value="">Choose Option</option>
								<?php
								foreach ($userID as $id) { ?>
									<option value="<?php echo  $id->userID ?>"><?php echo $id->userID . ") " . $id->Name ?></option>
								<?php } ?>
								<!-- <option value="">Vendor 2</option> -->
							</select>
							<label>Select Vendor</label>
						</div>
					</div>
				</div>
			</div>


			<div class="row" id="newdata">

				<div class="home-error">
					<div class="container">
						<div class="row center-align">
							<div class="col m12 s12">
								<i class="material-icons large">error</i>
								<h3>No products to show.</h3>
								<h4>Kindly select vendor</h4>
							</div>
						</div>
					</div>
				</div>



			</div>


		</div>
	</div>
	
</section>
<script>
	$(document).ready(function() {
		// console.log(a);
		$("#Vendor").change(function() {
			var a = $("#Vendor").val();
			// alert(a);
			$.ajax({
				type: 'POST',
				url: "<?php echo base_url() . 'user/VendorView/' ?>" + a,
				dataType: 'json',
				// cache: false,
				success: function(result) {
					$("#newdata").html('');
					$.each(result, function(i, val) {
						console.log(val.ProductID);
						$("#newdata").append('<div class="col m3 s6"><a href="<?php echo base_url() . 'user/itemview/' ?>' + val.ProductID + '"><div class="content" id="newBase"> <img src="<?php echo base_url(); ?>' + val.ImagePath + val.ImageName + '" alt=""><p id="name"> ' + val.ProductName + '</p><h5 id="price">₹ ' + val.price + '</h5> </a></div>	</div>');
					});

				}
			});
		});
	});
</script>
<section class="billings">
    <div class="container">
        <div class="row">
            <div class="col m4 offset-m4 s12">
                <div class="section-title center-align">
                    <div class="input-field">

                        <select name="UserID" id="lookup">
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
        
        <div class="row">
            <div class="col m12 s12">
                <div style="overflow-x:auto;">
                <table class="billing">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>UserID.</th>
                            <th>ProductID</th>
                            <th>Stock Available</th>
                            <th>Debited Amount <p> (₹ 20/- for new) OR (₹ 5/- pm)</p>
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($bill as $val) { ?>


                            <tr>
                                <td><?php echo $val->Date ?></td>
                                <td><?php echo $val->UserID ?></td>
                                <td><?php echo $val->ProductID ?></td>

                                <td><?php echo $val->StockAvailable ?></td>
                                <td><?php echo $val->Debit ?></td>

                            </tr>
                        <?php   } ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
	// $(document).ready(function() {
	// 	// console.log(a);
	// 	$("#Vendor").change(function() {
	// 		var a = $("#Vendor").val();
	// 		// alert(a);
	// 		$.ajax({
	// 			type: 'POST',
	// 			url: "<?php //echo base_url() . 'user/VendorView/' ?>" + a,
	// 			dataType: 'json',
	// 			// cache: false,
	// 			success: function(result) {
	// 				$("#newdata").html('');
	// 				$.each(result, function(i, val) {
	// 					console.log(val.ProductID);
	// 					$("#newdata").append('<div class="col m3 s6">	<div class="content" id="newBase"><img src="<?php echo base_url();?>' + val.ImagePath + val.ImageName + '" alt=""><p id="name"> ' + val.ProductName + '</p><h5 id="price">₹ '+ val.price+'</h5></div>	</div>');
	// 				});

	// 			}
	// 		});
	// 	});
	// });
</script>
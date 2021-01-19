<section class="checkout-page">
    <div class="segments-page">
        <div class="container">
            <div class="pages-title">
                <h3>Checkout</h3>
            </div>
            <div class="row">
                <div class="col m12">
                    <h4>Customer Details: </h4>

                </div>
            </div>

            <form method="post" action="<?php echo base_url('user/checkoutpage') ?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="col m6 s12">
                        <div class="checkout">
                            <div class="input-field">
                                <input id="phone" type="tel" name="cust_phone[]" class="validate " minlength="10" maxlength="10"  required>
                                <label for="phone">Customer Contact Number</label>
                            </div>
                            <div class="input-field">
                                <input id="phone" type="tel" name="cust_phone[]"minlength="10" maxlength="10"  class="validate" >
                                <label for="phone">Alternate Customer Contact Number</label>
                            </div>
                            <div class="input-field">
                                <textarea id="textarea1" name="cust_address" class="materialize-textarea" required></textarea>
                                <label for="textarea1"> Customer Delivery Address</label>
                            </div>
                            <div class="input-field">
                                <textarea id="comments" name="Comments" class="materialize-textarea"></textarea>
                                <label for="comments"> Additional comments</label>
                            </div>

                        </div>
                    </div>

                    <div class="col m6 s12">

                        <div class="row">
                            <div class="col s12">
                                <h5> Your Order Summary:</h5>




                            </div>
                        </div>
                        <?php if ($this->session->flashdata("Available") != null) {
                        ?>
                            <div class="row">
                                <div class="login-msg col s12">
                                    <div class="alrt green lighten-2">
                                        <p>
                                            <?php echo $this->session->flashdata("Available"); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if ($this->session->flashdata("NotAvailable") != null) {
                        ?>
                            <div class="row">
                                <div class="login-msg col s12">
                                    <div class="alrt red lighten-2">
                                        <p>
                                            <?php echo $this->session->flashdata("NotAvailable"); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="total-pay">
                            <div class="row">
                                <div class="col s4">
                                    <div class="contents">
                                        <p><?php echo "<b>Item </b>: " . $ProductName  ?></p>

                                    </div>
                                </div>
                                <div class="col s4">
                                    <div class="contents right">
                                        <p> <?php echo "<b>Qty.</b> " . $ProductQuantity . " x "; ?> </p>
                                    </div>
                                </div>
                                <div class="col s4">
                                    <div class="contents right">
                                        <p> <?php echo "<b>₹</b> " . $ProductPrice . "/-"; ?> </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <div class="contents ">
                                        <p><?php echo "<b>Product Description:</b> " . $ProductDesc  ?></p>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <hr>
                                <div class="col s8">
                                    <div class="contents">
                                        <h5> Total Amount</h5>
                                    </div>
                                </div>
                                <div class="col s4">
                                    <div class="contents right">

                                        <h5><?php echo "₹ " . $TotalAmount . "/-"; ?></h5>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col m12">
                                    <div class="right-align">
                                        <button class="btn" name="PlaceOrder" <?php if ($this->session->flashdata('NotAvailable') != NULL) {
                                                                                    echo "disabled";
                                                                                } ?>> Place Order <i class="fa fa-send"></i></button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>


        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $('input#input_text, textarea#textarea2').characterCounter();
    });
</script>
<section class="Order-dispatch">
    <div class="container">
        <div class="pages-title">
            <h3>Update Order</h3>
        </div>
        <?php
        // print_r($details[0]->status);

        foreach ($details as $val) { ?>
            <form>


                <div class="row">
                    <div class="col m6 s12">
                        <div class="input-field " class="validate" required="" aria-required="true">
                            <input disabled id="order-id" value="<?php echo $val->OrderID ?>" type="text" class="validate">
                            <label for="order-id"> Order ID</label>
                        </div>
                    </div>
                    <div class="col m6 s12">
                        <div class="input-field " class="validate" required="" aria-required="true">
                            <input disabled id="vendor-id" value="<?php echo $val->UserID ?>" type="text" class="validate">
                            <label for="vendor-id"> Vendor ID</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col m6 s12">
                        <div class="input-field" class="validate" required="" aria-required="true">
                            <input disabled value="<?php echo $val->CustomerName ?>" id="name" type="text" name="name" class="validate">
                            <label for="name"> Customer Name</label>
                        </div>
                    </div>
                    <div class="col m6 s12">
                        <div class="input-field" class="validate" required="" aria-required="true">
                            <input disabled id="contact" value="<?php echo $val->Cust_phone ?>" type="number" name="contactno" class="validate">
                            <label for="contact"> Contact number</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col m12 s12">
                        <div class="center-align">
                            <h4>Tracking details: </h4>
                        </div>
                    </div>
                </div>

                <?php if ($dispatchDetails == NULL) { ?>
                    <div class="row">
                        <div class="col m6 s12">
                            <div class="input-field" class="validate" required="" aria-required="true">
                                <input disabled id="company-name" type="text" name="company" class="validate" value="" />
                                <label for="company-name"> Company Name</label>
                            </div>
                        </div>
                        <div class="col m6 s12">
                            <div class="input-field" class="ddidate" required="" aria-required="true">
                                <input disabled id="consignment-number" type="text" name="ConsNbr" class="validate" value="" />
                                <label for="consignment-number"> Consignment number</label>
                            </div>
                        </div>
                    </div>
                <?php
                }
                foreach ($dispatchDetails as $dd) {
                ?>

                    <div class="row">
                        <div class="col m6 s12">
                            <div class="input-field" class="validate" required="" aria-required="true">
                                <input disabled id="company-name" type="text" name="company" class="validate" value="<?php echo $dd->Company_name ?>" />
                                <label for="company-name"> Company Name</label>
                            </div>
                        </div>
                        <div class="col m6 s12">
                            <div class="input-field" class="ddidate" required="" aria-required="true">
                                <input disabled id="consignment-number" type="text" name="ConsNbr" class="validate" value="<?php echo $dd->Consignment_No ?>" />
                                <label for="consignment-number"> Consignment number</label>
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
            </form>




    </div>
</section>
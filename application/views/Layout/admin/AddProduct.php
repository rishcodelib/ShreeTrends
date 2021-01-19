<section class="AddProduct">
    <div class="container">
        <div class="settings">
            <div class="pages-title">
                <h3>Add Product</h3>
            </div>
            <form method="POST" action="<?php echo base_url('User/addProduct'); ?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="container">
                        <div class="container">
                            <?php if ($this->session->flashdata('Success') != NULL) { ?>
                                <div class="row">
                                    <div class="login-msg col s12">
                                        <div class="alrt green lighten-2">
                                            <p> <?php echo $this->session->flashdata('Success'); ?> </p>
                                            <!-- <p>Login Successful</p> -->
                                        </div>
                                    </div>
                                </div>

                            <?php }
                            if ($this->session->flashdata('Reject') != NULL) { ?>
                                <div class="row">
                                    <div class="login-msg col s12">
                                        <div class="alrt red lighten-2">
                                            <p> <?php echo $this->session->flashdata('Reject'); ?> </p>
                                            <!-- <p>Invalid Password</p> -->
                                        </div>
                                    </div>
                                </div>

                            <?php }
                            if ($this->session->flashdata('Invalid') != NULL) { ?>
                                <div class="row">
                                    <div class="login-msg col s12">
                                        <div class="alrt orange lighten-2">
                                            <p><?php echo $this->session->flashdata('Invalid'); ?> </p>
                                            <!-- <p>User does not exist</p> -->
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col m6 center-align">
                        <div class="product-photo ">
                            <div class="contents">
                                <img src="<?php if ($this->session->flashdata('path') != NULL) {
                                                echo base_url($this->session->flashdata('path'));
                                            } else {
                                                echo base_url('assets/images/product1.jpg');
                                            } ?>" />
                                <div class="file-field input-field">
                                    <div class="btn">
                                        <span>Upload</span>
                                        <input type="file" name="productImage" required>
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" placeholder="Upload one or more files">
                                    </div>
                                </div>
                                <!-- <div class="button-upload">

                                    <input id="button-file-photo" type="file" multiple>
                                    
                                    <label for="button-file-photo">
                                        <span>Upload</span>
                                    </label>
                                </div> -->
                                <span>*Select upto 3 Photos (500px X 500px)</span>

                            </div>
                        </div>
                        <div class="container">

                            <?php if ($this->session->flashdata('UploadSuccess') != NULL) {
                            ?>

                                <div class="row">
                                    <div class="col m12 s12">
                                        <div class="login-msg">
                                            <div class="alrt green lighten-2">
                                                <p> <?php echo $this->session->flashdata('UploadSuccess'); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if ($this->session->flashdata('UploadRejected') != NULL) {
                            ?>
                                <div class="row">
                                    <div class="login-msg">
                                        <div class="col m12 s12">
                                            <div class="alrt red lighten-2">
                                                <p>
                                                    <?php echo $this->session->flashdata('UploadRejected'); ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                    </div>

                    <div class="col m6 s12">
                        <div class="input-field ">
                            <select name="VendorID" required>
                                <option value="">Choose Vendor</option>
                                <?php

                                foreach ($userID as $Uid) { ?>
                                    <option value="<?php echo ($Uid->userID); ?>"><?php echo '(' . ($Uid->userID) . ') ' .  ($Uid->Name) ?></option>
                                <?php } ?>
                            </select>
                            <label>Select Vendor</label>
                        </div>
                        <div class="input-field ">
                            <input id="ProdName" type="text" name="ProdName" class="validate" required="" aria-required="true">
                            <label for="ProdName">Product name</label>
                        </div>
                        <div class="input-field ">
                            <textarea id="ProdDesc" class="materialize-textarea" name="ProdDesc" data-length="120" required="" aria-required="true"></textarea>
                            <label for="ProdDesc">Product Description</label>
                        </div>
                        <div class="input-field ">
                            <input id="ProdAmt" type="number" name="ProdAmt" class="validate" required="" aria-required="true">
                            <label for="ProdAmt">Price</label>
                        </div>

                        <!-- Sample for your Help -->
                        <div class="stocks">
                            <div class="row">
                                <div class="col m6 s6">
                                    <div class="stocks-heading">
                                        <h5>Stocks: </h5>
                                    </div>

                                </div>
                                <div class="col m6 s6 right-align">
                                    <a class="btn-floating waves-effect waves-light center-align" id="addSize"><i class="material-icons"></i>+</a>
                                </div>
                            </div>
                            <div class="stock-enter" id="newSizes">
                                <div class="row">
                                    <div class="col m6 s6">
                                        <div class="input-field ">
                                            <input id="size" type="number" name="size[]" class="validate" required="" aria-required="true">
                                            <label for="size">Enter Size</label>
                                        </div>
                                    </div>
                                    <div class="col m6 s6">
                                        <div class="input-field ">
                                            <input id="stock" type="number" name="stock[]" class="validate" required="" aria-required="true">
                                            <label for="stock">Quantity</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
                <!-- Sample -->
                <div class="row">
                    <div class="container">
                        <!-- <input type="submit" value="upload" /> -->
                        <div class="col m12 center-align">
                            <button class="btn waves-effect waves-light" name="submit">Submit <i class="material-icons right"></i></button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</section>
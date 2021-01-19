<section class="UpdateProduct">
    <div class="container">
        <div class="settings">
            <div class="pages-title">
                <h3>Update Product</h3>
            </div>
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
                        if ($this->session->flashdata('NoImage') != NULL) { ?>
                            <div class="row">
                                <div class="login-msg col s12">
                                    <div class="alrt orange lighten-2">
                                        <p><?php echo $this->session->flashdata('NoImage'); ?> </p>
                                        <!-- <p>User does not exist</p> -->
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <form method="POST" action="<?php echo base_url('User/UpdateProduct') ."/" .  $details[0]->ProductID; ?>/" enctype="multipart/form-data">

                <div class="row">
                    <div class="col m6 center-align">
                        <div class="product-photo ">
                           
                            <div class="contents">
                                <img src="<?php echo base_url() . $details[0]->ImagePath . $details[0]->ImageName; ?>" />
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
                        <!-- patti -->
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
                        <!--  -->

                    </div>
                    <div class="col m6 s12">


                        <div class="input-field hide">
                            <input id="VendorID" type="text" name="VendorID"  class="validate" value="<?php echo  $details[0]->UserID ?>" required>
                            <label for="VendorID">Vendor ID</label>
                        </div>
                        <div class="input-field hide ">
                            <input id="ProdID" type="text" name="ProductID"  class="validate " value="<?php echo  $details[0]->ProductID ?>" required>
                            <label for="ProdID">Product ID</label>
                        </div>
                        <div class="input-field ">
                            <input id="ProdName" type="text" name="ProdName" class="validate" value="<?php echo ($details[0]->ProductName); ?>" required>
                            <label for="ProdName">Product name</label>
                        </div>

                        <div class="input-field ">
                            <input id="ProdDesc" type="text" name="ProdDesc" class="validate" value="<?php echo ($details[0]->ProductName); ?>" required>
                            <label for="ProdDesc">Product Description</label>

                        </div>
                        <div class="input-field ">
                            <input id="ProdAmt" type="number" name="ProdAmt" class="validate" value="<?php echo ($details[0]->price); ?>" required>
                            <label for="ProdAmt">Price</label>
                        </div>


                        <!-- Sample for your Help -->
                        <!-- <div class="stocks">
                            <div class="row">
                                <div class="col m6 s6">
                                    <div class="stocks-heading">
                                        <h5>Stocks: </h5>
                                    </div>
                                </div>
                                <div class="col m6 s6 right-align">
                                    <a class="btn-floating waves-effect waves-light blue center-align" id="addSize"><i class="material-icons"></i>+</a>
                                </div>
                            </div>
                            <div class="stock-enter" id="newSizes">
                                <?php foreach ($details as $val){ ?>
                                <div class="row">
                                    <div class="col m6 s6">
                                        <div class="input-field ">
                                            <input id="size" type="number" name="size[]" value="<?php echo  $val->Size ?>" class="validate" required>
                                            <label for="size">Enter Size</label>
                                        </div>
                                    </div>
                                    <div class="col m6 s6">
                                        <div class="input-field ">
                                            <input id="stock" type="number" name="stock[]" value="<?php echo  $val->Stock ?>" class="validate" required>
                                            <label for="stock">Quantity</label>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div> -->



                    </div>
                </div>
                <!-- Sample -->
                <div class="row">
                    <div class="container">
                        <!-- <input type="submit" value="upload" /> -->
                        <div class="col m12 center-align">
                            <button class="btn waves-effect waves-light" name="submit">Update Product <i class="material-icons right"></i></button>
                        </div>
                    </div>
                </div>



            </form>
        </div>
    </div>
</section>
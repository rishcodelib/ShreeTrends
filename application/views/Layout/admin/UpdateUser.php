<section class="UpdateProduct">
    <div class="container">
        <div class="settings">
            <div class="pages-title">
                <h3>Update USER</h3>
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
            <form method="POST" action="<?php echo base_url('User/UpdateUser/') . $details[0]->UserID; ; ?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="col m6 center-align">
                        <div class="product-photo ">
                            <div class="contents">
                                <img src="<?php echo base_url('assets/images/user.png'); ?>" />

                                <!-- <div class="button-upload">

                                    <input id="button-file-photo" type="file" multiple>
                                    
                                    <label for="button-file-photo">
                                        <span>Upload</span>
                                    </label>
                                </div> -->

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


                        <div class="input-field ">
                            <input id="ProdID" type="text" name="Name"  class="validate" value="<?php echo $details[0]->Name; ?>" required>
                            <label for="ProdID">Full Name</label>
                        </div>
                        <div class="input-field ">
                            <input id="ProdName" type="number" name="Contactno" class="validate" value="<?php echo $details[0]->ContactNo; ?>" required>
                            <label for="ProdName">Contact Number</label>
                        </div>

                        <div class="input-field ">
                            <input id="ProdDesc" type="number" name="Credits" class="validate" value="<?php echo $details[0]->Credits; ?>" required>
                            <label for="ProdDesc">Credits</label>

                        </div>
                        <div class="input-field ">
                            <input id="ProdAmt" type="text" name="Email" class="validate" value="<?php echo $details[0]->EmailID; ?>" required>
                            <label for="ProdAmt">Email</label>
                        </div>
                   


                        <!-- Sample for your Help -->




                    </div>
                </div>
                <!-- Sample -->
                <div class="row">
                    <div class="container">
                        <!-- <input type="submit" value="upload" /> -->
                        <div class="col m12 center-align">
                            <button class="btn waves-effect waves-light" name="submit">Update User <i class="material-icons right"></i></button>
                        </div>
                    </div>
                </div>



            </form>
        </div>
    </div>
</section>
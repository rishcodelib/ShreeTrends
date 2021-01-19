<section class="manageproducts">

    <div class="row center-align">
        <h1>Manage Products</h1>
        <div class="row">
            <div class="container">
                <div class="container">
                    <?php if ($this->session->flashdata('Success') != NULL) { ?>
                        <div class="row">
                            <div class="login-msg col s12">
                                <div class="alrt green lighten-2">
                                    <p> <?php echo $this->session->flashdata('Success'); ?> </p>
                                  
                                </div>
                            </div>
                        </div>

                    <?php }
                    if ($this->session->flashdata('Reject') != NULL) { ?>
                        <div class="row">
                            <div class="login-msg col s12">
                                <div class="alrt red lighten-2">
                                    <p> <?php echo $this->session->flashdata('Reject'); ?> </p>
                                  
                                </div>
                            </div>
                        </div>
                    <?php }?>

                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <hr>
        <div class="row">
            <div style="overflow-x:auto;">
            <table class="orders-table">
                <thead>
                    <tr>
                        <th>Date </th>
                        <th>Time </th>
                        <th>Vendor ID</th>
                        <th>Product ID</th>
                        <th>Product Name</th>

                        <th>Price</th>
                        <th>Size</th>
                        <th>Stock</th>
                        <th>Image</th>
                      
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
             


                <tbody class="table-hover">
                    <?php foreach ($ProdDetails as $val) {  ?>
                        <tr>
                            <td><?php echo $val->Date ?></td>
                            <td><?php echo $val->Time ?></td>
                            <td><?php echo $val->UserID ?></td>
                            <td><?php echo $val->ProductID ?></td>
                            <td><?php echo $val->ProductName ?></td>
                            <td><?php echo $val->price ?></td>
                            <td><?php echo $val->Size ?></td>
                            <td><?php echo $val->Stock ?></td>

                            </td>
                            <td>
                                <div class="product-thumb">
                                    <img src="<?php echo base_url() . $val->ImagePath .   $val->ImageName  ?>" />
                                </div>
                            </td>
                            <!-- <td><a href="<?php //echo base_url('user/UpdateProduct/') . $val->ProductID  ?>"><i class="material-icons">edit</i></a></td> -->
                            <td><a href="<?php echo base_url('user/UpdateProduct/') . $val->ProductID  ?>"><i class="material-icons">edit</i></a></td>
                            <td><a href="<?php echo base_url('user/DeleteProduct/') . $val->ProductID  ?>"><i class="material-icons">delete</i></a></td>
                            <!-- <td><a class="modal-trigger" href="#modal1"><i class="material-icons">delete</i></a></td> -->
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
            </div>
            <!-- <div id="modal1" class="modal">
                    <div class="modal-content">
                        <h4>Confirmation</h4>
                        <p>Are you sure you want to delete this product ?</p>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="modal-action modal-close btn-flat">Agree</a>
                    </div>
                </div> -->
        </div>
    </div>


</section>
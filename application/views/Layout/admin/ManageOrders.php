<section class="manage-orders">
    <div class="row center-align">
        <h1>Manage Orders</h1>
    </div>
    <div class="container">
        <hr />
        <?php if ($this->session->flashdata('Success') != NULL) { ?>
            <div class="row">
                <div class="col m12 s12">

                    <div class="container">
                        <div class="container">
                            <div class="login-msg col s12">
                                <div class="alrt green lighten-2">
                                    <p><?php echo ($this->session->flashdata('Success')) ?> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php if ($this->session->flashdata('failed') != NULL) { ?>
            <div class="row">
                <div class="col m12 s12">

                    <div class="container">
                        <div class="container">
                            <div class="login-msg col s12">
                                <div class="alrt red lighten-2">
                                    <p><?php echo ($this->session->flashdata('failed')) ?> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="row">
            <div class="col m12 s12">
                <div style="overflow-x:auto;">
                <table class="orders">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>User ID</th>
                            <th>Order ID</th>
                            <th>Product ID</th>
                            <th>Customer Contact Number</th>
                            <th>Customer Address</th>
                            <th>Comments</th>
                            <th>Order Amount</th>
                            <th>Quantity</th>
                            <th>Size</th>
                            <th>Status</th>
                            <th>Print Details</th>
                            <th>Add Tracking Details</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        foreach ($details as $val) { ?>
                            <tr>
                                <td> <?php echo $val->Date; ?> </td>
                                <td> <?php echo $val->UserID; ?> </td>
                                <td> <?php echo $val->OrderID; ?> </td>
                                <td> <?php echo $val->ProductID; ?> </td>
                                <td> <?php echo $val->Cust_phone; ?></td>
                                <td> <?php echo $val->Cust_Address; ?> </td>
                                <td> <?php echo $val->Comments; ?></td>
                                <td> <?php echo $val->amount; ?> </td>
                                <td> <?php echo $val->quantity; ?></td>
                                <td> <?php echo $val->size; ?></td>

                                <td> <?php
                                        if ($val->status == 'RECEIVED') {
                                            echo "<h6 class= 'blue-text '>RECEIVED </h6>";
                                        } 
                                        elseif($val->status == 'DISPATCHED') {
                                            echo "<h6 class= 'teal-text '>DISPATCHED </h6>";                                          
                                        }
                                        elseif ($val->status == 'CONFIRMED') {
                                            echo "<h6 class= 'yellow-text text-darken-4 '>CONFIRMED </h6>";
                                        }
                                        else {
                                            echo "<h6>STATUS ERROR <br>NEED MAINTAINCE</h6>";
                                        } ?> </td>
                                <td> <a href="<?php echo base_url() . 'user/printDetails/'  . $val->OrderID ?>" target="_blank"><i class="material-icons">print</i></a></td>
                                <td><a href="<?php echo base_url() . 'user/OrderDispatch/'  . $val->OrderID ?>"><i class="material-icons">edit</i></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</section>
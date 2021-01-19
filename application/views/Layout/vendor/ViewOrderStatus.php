<section class="View-Order-Status" style="margin-top:100px ;">
    <div class="row center-align">
        <h1>View Order Status</h1>
    </div>
    <div class="container">
        <hr />
        <div class="row">
            <div class="col m12 s12">
                <div style="overflow-x:auto;">
                <table class="orders">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Order ID</th>
                            <th>Product ID</th>
                            <th>Customer Contact Number</th>
                            <th>Customer Address</th>
                            <th>Comments</th>
                            <th>Order Amount</th>
                            <th>Quantity</th>
                            <th>Size</th>
                            <th>Status</th>
                            <th>Details</th>
                           
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        foreach ($details as $val) { ?>
                            <tr>
                                <td> <?php echo $val->Date; ?> </td>
                                <td> <?php echo $val->OrderID; ?> </td>
                                <td> <?php echo $val->ProductID; ?> </td>
                                <td> <?php echo $val->Cust_phone; ?></td>
                                <td> <?php echo $val->Cust_Address; ?> </td>
                                <td> <?php echo $val->Comments; ?></td>
                                <td> <?php echo $val->amount; ?> </td>
                                <td> <?php echo $val->quantity; ?></td>
                                <td> <?php echo $val->size; ?></td>
                                <td> <?php
                                        if ($val->status == 'DISPATCHED') {
                                            echo "<h6 class= 'teal-text '>DISPATCHED </h6>";
                                        } else {
                                            echo "<h6 class= 'red-text'> " . $val->status . "</h6>"; 
                                        } ?> </td>
                                <td><a href="<?php echo base_url() . 'user/DispatchDetails/'  . $val->OrderID ?>"><i class="material-icons">edit</i></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>        
                </div>
            </div>
        </div>
    </div>
</section>
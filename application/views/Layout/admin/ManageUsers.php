<section class="manageproducts">
    <div class="row center-align">
        <h1>Manage Users</h1>
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
                    <?php } ?>
                    <?php if ($this->session->flashdata('Other') != NULL) { ?>
                        <div class="row">
                            <div class="login-msg col s12">
                                <div class="alrt orange lighten-2">
                                    <p><?php echo $this->session->flashdata('Other'); ?> </p>
                                    <!-- <p>User does not exist</p> -->
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
    <!-- <div class="search-sort">
        <div class="container">
            <div class="row">
                <div class="col m5">
                    <label>Search: </label>
                    <input type="text" class="form-control" placeholder="Search..." id="search_query" />
                </div>
                <div class="col m5">
                    <label>Status:</label>
                    <select class="form-control" id="">
                        <option value="0">All</option>
                        <option value="1">Pending</option>
                        <option value="2">Delivered</option>
                        <option value="3">Canceled</option>
                    </select>
                </div>
                <div class="col m2">
                    <button class="btn waves-effect waves-light" name="submit">Submit</button>
                </div>

            </div>
        </div>
    </div> -->

    <div class="container">
        <hr>
        <div class="row">
            <div style="overflow-x:auto;">
            <table class="orders-table">
                <thead>
                    <tr>
                        <th>Date & Time </th>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Username </th>
                        <th>ContactNo</th>
                        <th>EmailID</th>
                        <th>Credits</th>
                        <th>Edit</th>
                        <th>Revoke Access</th>


                    </tr>
                </thead>
                <?php //print_r($UserDetails); 
                ?>


                <tbody class="table-hover">
                    <?php foreach ($UserDetails as $val) {  ?>
                        <tr>
                            <td><?php echo $val->created_at ?></td>
                            <td><?php echo $val->UserID
                                ?></td>
                            <td><?php echo $val->Name
                                ?></td>
                            <td><?php echo $val->Username
                                ?></td>
                            <td><?php echo $val->ContactNo
                                ?></td>
                            <td><?php echo $val->EmailID
                                ?></td>
                            <td><?php echo $val->Credits
                                ?></td>
                            </td>
                            <td><a href="<?php echo base_url('user/UpdateUser/') . $val->UserID ?>"><i class="material-icons">edit</i></a></td>
                            <td><a href="<?php echo base_url('user/RevokeAccess/') . $val->UserID ?>"><i class="material-icons">vpn_key</i></a></td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
            </div>
        </div>
    </div>


</section>
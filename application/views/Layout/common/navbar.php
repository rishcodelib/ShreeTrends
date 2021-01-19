<!-- navbar -->
<div class="navbar">
    <div class="row">
        <div class="col m3 s3">
            <div class="content-left">
                <a href="#slide-out" data-activates="slide-out" class="sidebar"><i class="fa fa-bars"></i></a>
                
            </div>
        </div>
        <div class=" col m6 s6">
            <div class="content-center center-align">
            <div class="brnd-lgo">
                    <?php if (($this->session->userdata('user')->type) == "Vendor") { ?>
                        <a href="<?php echo base_url('User/market') ?>">
                            <img src="<?php echo base_url(); ?>assets/images/logo.png" />
                        </a>
                    <?php } else { ?>
                        <a href="<?php echo base_url('User/home') ?>">
                            <img src="<?php echo base_url(); ?>assets/images/logo.png" />
                        </a>
                    <?php  } ?>
                </div>
            </div>
        </div>
        <div class="col m3 s3">
            <div class="content-right">
                <?php if (($this->session->userdata('user')->type) == "Vendor") { ?>
                    <!-- <a href="<?php //echo base_url('user/cart') ?>">
                        <i class="fa fa-shopping-cart"></i> <span> Cart</span>
                    </a> -->
                <?php } ?>
                <a href="<?php echo base_url('Welcome/logout') ?>">
                    <i class="fa fa-power-off"></i> <span> Sign Out</span>
                </a>
            </div>
        </div>
    </div>

</div>


<!-- end navbar -->
<?php

// $type == "none";
$type = ($this->session->userdata('user')->type);
if ($type == "Admin") { ?>
    <!-- sidebar -->
    <div class="sidebar-panel">
        <ul id="slide-out" class="collapsible side-nav">
            <li>

                <div class="user-view">
                    <img src="<?php echo base_url(); ?>assets/images/user.png" />
                    <span class="white-text name"><?php echo "<i> Name : </i>" . ($this->session->userdata('user')->Name) ?></span>

                    <span class="white-text name"><?php echo "UserType : " . ($this->session->userdata('user')->type) ?></span>
                </div>
            </li>
            <li><a href="<?php echo base_url("User/Home") ?>"><i class="fa fa-home"></i>Home</a></li>
            <li>
                <div class="collapsible-header">
                    <i class="fa fa-user"></i>Users <span><i class="fa fa-angle-right right"></i></span>
                </div>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="<?php echo base_url('User/CreateVendor') ?>">Add User</a>
                        </li>
                        <li><a href="<?php echo base_url('User/ManageUser') ?>">Manage Users</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <div class="collapsible-header">
                    <i class="fa fa-female"></i>Products <span><i class="fa fa-angle-right right"></i></span>
                </div>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="<?php echo base_url('User/addProduct') ?>">Add Product</a></li>

                        <li><a href="<?php echo base_url('User/ManageProducts') ?> ">Manage Products</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="<?php echo base_url('user/AdminStorageBilling') ?>"> <i class="fa fa-female"></i> Storage Billing</a>
            </li>
            <li>
                <a href="<?php echo base_url('User/ManageOrders') ?>"> <i class="fa fa-female"></i>Orders</a>
            </li>

            <li><a href="<?php echo base_url('User/settings') ?>"><i class="fa fa-cog"></i>Settings </a></li>


        </ul>
    </div>
<?php } else if ($type == "Vendor") { ?>
    <div class="sidebar-panel">
        <ul id="slide-out" class="collapsible side-nav">
            <li>
                <div class="user-view">
                    <i class="fa fa-user fa-5x"></i>
                    <span class="white-text name"><?php echo "<i> Name : </i>" . ($this->session->userdata('user')->Name) ?></span>

                    <span class="white-text name"><?php echo "<i> Available Credits : </i>" . ($this->session->userdata('user')->Credits) ?></span>
                </div>
            </li>

            <li><a href="<?php echo base_url('User/market'); ?>"><i class="fa fa-home"></i>Home </a></li>
            <li><a href="<?php echo base_url('User/ViewStatus'); ?>"><i class="fa fa-shopping-cart"></i>Order Status </a></li>
            <li><a href="<?php echo base_url('User/VendorStorageBilling') ;?>"><i class="fa fa-file"></i>Billing Status</a></li>
            <li><a href="<?php echo base_url('User/settings') ;?>"><i class="fa fa-cog"></i>Settings </a></li>

        </ul>
    </div>
<?php } else {
    redirect("/");
} ?>
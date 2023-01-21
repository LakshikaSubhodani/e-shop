<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <img class="navbar-brand" src="../img/fav.ico">

    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="../img/default-user.png" class="user-image" alt="user-image">
                <?php // echo $log_user->user_firstname . ' ' . $log_user->user_lastname; 
                ?>
                <b class="fa fa-angle-down"></b></a>
            <ul class="dropdown-menu">
                <li><a href="<?php //echo base_url('admin/profile') 
                                ?>"><i class="fa fa-fw fa-user"></i>Profile</a></li>
                <li class="divider"></li>
                <li><a href="<?php // echo base_url('admin/logout') 
                                ?>"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="<?php // echo base_url('admin/dashboard') 
                            ?>"><i class="fa fa-fw fa fa-home"></i>HOME</a>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-fw fa-paper-plane-o"></i> Product <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                <ul id="submenu-1" class="collapse">
                    <li><a href="new_product.php<?php // echo base_url('admin/newnotice') 
                                                ?>"><i class="fa fa-angle-double-right "></i> New Product </a></li>
                    <li><a href="new_category.php<?php // echo base_url('admin/noticelist') 
                                                    ?>"><i class="fa fa-angle-double-right"></i> New Category</a></li>
                </ul>
            </li>

            <?php
            //loding admin view according to the role
            // $data['log_user'] = $log_user;
            // $role_id = $log_user->faculty_Id;
            // if ($role_id == 1 or $role_id == 3 or $role_id == 4 or $role_id == 5 or $role_id == 6) { 
            ?>
            <!-- manage student and student feed back load -->
            <li>
                <a href="#" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-fw fa-group (alias)"></i> Customers<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                <ul id="submenu-2" class="collapse">
                    <li><a href="<?php //echo base_url('admin/managestudent') 
                                    ?>"><i class="fa fa-angle-double-right"></i> MANAGE </a></li>
                </ul>
            </li>

            <?php // } 
            ?>
            <li>
                <a href="#" data-toggle="collapse" data-target="#submenu-3"><i class="fa fa-fw fa-user-plus"></i> Vendors <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                <ul id="submenu-3" class="collapse">

                    <li><a href="<?php // echo base_url('admin/registration') 
                                    ?>"><i class="fa fa-angle-double-right "></i> New Vendor </a></li>
                    <?php // if ($role_id == 1) { 
                    ?>
                    <li><a href="<?php // echo base_url('admin/manageadmin') 
                                    ?>"><i class="fa fa-angle-double-right"></i> Vendor List</a></li>
                    <?php // } 
                    ?>
                </ul>
            </li>


        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>
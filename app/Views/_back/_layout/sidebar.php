<aside class="main-sidebar sidebar-dark-warning">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link text-sm navbar-white">
        <img src="" alt="Parahyangan Golf Logo" class="brand-image" />
        <span class="brand-text font-weight-light-navy">&nbsp;</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-5">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
			   with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?php echo site_url('dashboard'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                            <!--span class="right badge badge-danger">New</span-->
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Master
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo site_url('Back/Users'); ?>" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview menu-closed">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Transaction
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo site_url('smartcard_usage'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Smartcard Usage</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('topup'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Top Up</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview menu-closed">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Report
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo site_url('smartcard_report'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Usage Report</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('topup_report'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Top Up Report</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview menu-closed">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Role Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo site_url('module'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Modules</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('permissions'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Permissions</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="<?php echo base_url('login/out') ?>" class="nav-link">
                        <i class="nav-icon fa fa-user"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
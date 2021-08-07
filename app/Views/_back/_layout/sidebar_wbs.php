<aside class="main-sidebar sidebar-dark-warning">
    <!-- Brand Logo -->
    <!-- <a href="" class="brand-link text-sm navbar-white">
        <img src="" alt="" class="brand-image" />
        <span class="brand-text font-weight-light-navy">&nbsp;</span>
    </a> -->

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-5">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
			   with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?php echo site_url('Back/WbsDashboard'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                            <!--span class="right badge badge-danger">New</span-->
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Master
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo site_url('Back/Wbs'); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Wbs</p>
                            </a>
                        </li>
                    </ul>

                </li>

                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Report
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Usage Report</p>
                            </a>
                        </li> -->

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="<?php echo site_url('Back/Login/out') ?>" class="nav-link">
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

<script>
    $(function() {
        var path = window.location.href; // Mengambil data URL pada Address bar
        $('nav a').each(function() {
            // Jika URL pada menu ini sama persis dengan path...
            if (this.href === path) {
                // Tambahkan kelas "active" pada menu ini
                $("li a").removeClass('active');
                // $("li a").addClass('active');
                $(this).addClass('active');

                // $('#master').addClass('menu-open');
            }
        });


    });
</script>
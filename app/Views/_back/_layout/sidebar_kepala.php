<aside class="main-sidebar sidebar-dark-warning">

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav id="navigation" class="mt-3">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
			   with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?php echo site_url('Back/KepalaDashboard'); ?>" class="nav-link active">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                            <!--span class="right badge badge-danger">New</span-->
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo site_url('Back/Login/out') ?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
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
<?php
$session = \Config\Services::session() ?>
<aside class="main-sidebar sidebar-dark-warning">

    <!-- Brand Logo -->
    <a href="" class="brand-link ">
        <img src="<?= base_url('assets/img/logo front.png') ?>" alt="" class="brand-image">
        <span class="brand-text font-weight-light-navy">&nbsp;</span>
    </a>


    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-3">
            <ul id="nav" class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
			   with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?php echo site_url('Back/TipikorDashboard'); ?>" class="nav-link active">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                            <!--span class="right badge badge-danger">New</span-->
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo site_url('Back/Tipikor'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-hands-helping"></i>
                        <p>
                            Master Pengaduan
                            <!-- <i class="right fas fa-angle-left"></i> -->
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
                $(this).addClass('active');
            }
        });
    });
</script>
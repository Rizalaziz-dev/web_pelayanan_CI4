<aside class="main-sidebar sidebar-dark-warning">

    <!-- Brand Logo -->
    <a href="" class="brand-link ">
        <img src="<?= base_url('assets/img/logo front.png') ?>" alt="" class="brand-image">
        <span class="brand-text font-weight-light-navy">&nbsp;</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav id="navigation" class="mt-3">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
			   with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?php echo site_url('Back/Sitaraa/Dashboard'); ?>" class="nav-link active">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                            <!--span class="right badge badge-danger">New</span-->
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo site_url('Back/Sitaraa/Suspect'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>
                            Data Tersangka
                            <!--span class="right badge badge-danger">New</span-->
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo site_url('Back/Sitaraa/PreProsecution'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-user-tag"></i>
                        <p>
                            Pra Penuntutan
                            <!--span class="right badge badge-danger">New</span-->
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo site_url('Back/Sitaraa/Prosecution'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-balance-scale"></i>
                        <p>
                            Penuntutan
                            <!--span class="right badge badge-danger">New</span-->
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="<?php echo site_url('Back/Sitaraa/execution'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-user-check"></i>
                        <p>
                            Eksekusi
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
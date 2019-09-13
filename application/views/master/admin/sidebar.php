<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="./index.html">
            <img src="<?=base_url()?>assets/admin/img/brand/logo.png" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="<?=base_url()?>assets/admin/img/theme/team-4-800x800.jpg">
                        </span>
                        <div class="media-body ml-2 d-none d-lg-block">
                            <span class="mb-0 text-sm font-weight-bold"><?php echo $this->session->userdata['loginData']['email']; ?></span>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Selamat Datang</h6>
                    </div>
                    <a href="<?=base_url()?>admin/home/profile" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>My profile</span>
                    </a>
                    <!-- <a href="./examples/profile.html" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>Settings</span>
                    </a>
                    <a href="./examples/profile.html" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>Activity</span>
                    </a>
                    <a href="./examples/profile.html" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>Support</span>
                    </a> -->
                    <div class="dropdown-divider"></div>
                    <a href="<?=base_url()?>admin/home/logout" class="dropdown-item">
                        <i class="ni ni-user-run"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="<?=base_url()?>admin/home">
                            <img src="<?=base_url()?>assets/admin/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item  class=" active" ">
          <a class=" nav-link active " href="<?=base_url()?>admin/home"> <i class="ni ni-tv-2 text-primary"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?=base_url()?>admin/kategori">
                        <i class="ni ni-bullet-list-67 text-blue"></i> Kategori
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?=base_url()?>admin/lomba">
                        <i class="ni ni-planet text-orange"></i> Lomba
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?=base_url()?>admin/pendaftaran">
                        <i class="ni ni-badge text-yellow"></i> Pendaftaran
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="<?=base_url()?>admin/user">
                        <i class="ni ni-single-02 text-red"></i> User
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url()?>admin/seminar">
                        <i class="ni ni-building text-purple"></i> Peserta Seminar
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url()?>admin/pengumuman">
                        <i class="ni ni-air-baloon text-info"></i> Pengumuman
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
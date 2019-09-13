<?php if ($page == "home") { ?>
    <!-- Cloned navbar -->
    <!-- Cloned navbar that comes in on scroll -->
    <nav id="navbar-clone" class="navbar is-fixed ">
        <div class="container">
            <!-- Brand -->
            <div class="navbar-brand">
                <a href="<?= base_url() ?>" class="navbar-item">
                    <img class="" src="<?= base_url() ?>assets/app/images/logo/logo.png" alt="">
                    <span class="brand-name">IITF 2019</span>
                </a>
                <!-- Responsive toggle -->
                <span class="navbar-burger burger" data-target="cloneNavbarMenu">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </div>
            <!-- Menu -->
            <div id="cloneNavbarMenu" class="navbar-menu">
                <div class="navbar-end">
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" href="<?= base_url() ?>#about">Tentang</a>
                    </div>
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" href="<?= base_url() ?>#reward">Lomba</a>
                    </div>
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" href="<?= base_url() ?>#timeline">Timeline</a>
                    </div>
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" href="<?= base_url() ?>seminar/register">Ikuti Seminar UI/UX</a>
                    </div>
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" onclick="showWhatsApp();">
                            <i class="fab fa-whatsapp"></i>
                            Hubungi Kami
                        </a>
                    </div>
                    <!-- Sign up -->
                    <div class="navbar-item is-nav-link">
                        <a href="<?= base_url((($email == null) || ($email == '') ? 'login' : 'user')) ?>" class="button k-button k-primary raised has-gradient slanted">
                            <span class="text">
                                <?php if ($email == null || $email == '') {
                                        echo '<i class="far fa-user-circle"></i> Area Peserta';
                                    } else {
                                        echo $email;
                                    } ?>
                            </span>
                            <span class="front-gradient"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- /Cloned navbar -->
    <!-- Static navbar -->
    <nav class="navbar">
        <div class="container">
            <!-- Brand -->
            <div class="navbar-brand">
                <a href="<?= base_url() ?>" class="navbar-item">
                    <img class="" src="<?= base_url() ?>assets/app/images/logo/logo.png" alt="">
                    <span class="brand-name">IITF 2019</span>
                </a>
                <!-- Responsive toggle -->
                <span class="navbar-burger burger" data-target="navbarMenu">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </div>
            <!-- Menu -->
            <div id="navbarMenu" class="navbar-menu light-menu">
                <div class="navbar-end">
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" href="<?= base_url() ?>#about">Tentang</a>
                    </div>
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" href="<?= base_url() ?>#reward">Lomba</a>
                    </div>
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" href="<?= base_url() ?>#timeline">Timeline</a>
                    </div>
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" href="<?= base_url() ?>seminar/register">Ikuti Seminar UI/UX</a>
                    </div>
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" onclick="showWhatsApp();">
                            <i class="fab fa-whatsapp"></i>
                            Hubungi Kami
                        </a>
                    </div>
                    <!-- Sign up -->
                    <div class="navbar-item is-nav-link">
                        <a href="<?= base_url((($email == null) || ($email == '') ? 'login' : 'user')) ?>" class="button k-button k-primary raised has-gradient slanted">
                            <span class="text">
                                <?php if ($email == null || $email == '') {
                                        echo '<i class="far fa-user-circle"></i> Area Peserta';
                                    } else {
                                        echo $email;
                                    } ?>
                            </span>
                            <span class="front-gradient"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- /Static navbar -->
<?php } else if ($page == "timeline") { ?>

    <nav id="navbar-clone" class="navbar is-fixed">
        <div class="container">
            <!-- Brand -->
            <div class="navbar-brand">
                <a href="<?= base_url() ?>" class="navbar-item">
                    <img class="" src="<?= base_url() ?>assets/app/images/logo/logo.png" alt="">
                    <span class="brand-name">IITF 2019</span>
                </a>
                <!-- Responsive toggle -->
                <span class="navbar-burger burger" data-target="navbarMenu">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </div>
            <!-- Menu -->
            <div id="navbarMenu" class="navbar-menu light-menu">
                <div class="navbar-end">
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" href="<?= base_url() ?>#about">Tentang</a>
                    </div>
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" href="<?= base_url() ?>#reward">Lomba</a>
                    </div>
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" href="<?= base_url() ?>#timeline">Timeline</a>
                    </div>
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" href="<?= base_url() ?>seminar/register">Ikuti Seminar UI/UX</a>
                    </div>
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" onclick="showWhatsApp();">
                            <i class="fab fa-whatsapp"></i>
                            Hubungi Kami
                        </a>
                    </div>
                    <!-- Sign up -->
                    <div class="navbar-item is-nav-link">
                        <a href="<?= base_url((($email == null) || ($email == '') ? 'login' : 'user')) ?>" class="button k-button k-primary raised has-gradient slanted">
                            <span class="text">
                                <?php if ($email == null || $email == '') {
                                        echo '<i class="far fa-user-circle"></i> Area Peserta';
                                    } else {
                                        echo $email;
                                    } ?>
                            </span>
                            <span class="front-gradient"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- /Static navbar -->
    <nav class="navbar">
        <div class="container">
            <!-- Brand -->
            <div class="navbar-brand">
                <a href="<?= base_url() ?>" class="navbar-item">
                    <img src="<?= base_url() ?>assets/app/images/logo/logo.png" alt="">
                    <span class="brand-name">IITF 2019</span>
                </a>
                <!-- Responsive toggle -->
                <span class="navbar-burger burger" data-target="navbarMenu">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </div>
            <!-- Menu -->
            <div id="navbarMenu" class="navbar-menu light-menu">
                <div class="navbar-end">
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" href="<?= base_url() ?>#about">Tentang</a>
                    </div>
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" href="<?= base_url() ?>#reward">Lomba</a>
                    </div>
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" href="<?= base_url() ?>#timeline">Timeline</a>
                    </div>
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" href="<?= base_url() ?>seminar/register">Ikuti Seminar UI/UX</a>
                    </div>
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" onclick="showWhatsApp();">
                            <i class="fab fa-whatsapp"></i>
                            Hubungi Kami
                        </a>
                    </div>
                    <!-- Sign up -->
                    <div class="navbar-item is-nav-link">
                        <a href="<?= base_url((($email == null) || ($email == '') ? 'login' : 'user')) ?>" class="button k-button k-primary raised has-gradient slanted">
                            <span class="text">
                                <?php if ($email == null || $email == '') {
                                        echo '<i class="far fa-user-circle"></i> Area Peserta';
                                    } else {
                                        echo $email;
                                    } ?>
                            </span>
                            <span class="front-gradient"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
<?php } else if ($page == "register") { ?>
    <nav class="navbar is-fixed">
        <div class="container">
            <!-- Brand -->
            <div class="navbar-brand">
                <a href="<?= base_url() ?>" class="navbar-item">
                    <img src="<?= base_url() ?>assets/app/images/logo/logo.png" alt="">
                    <span class="brand-name">IITF 2019</span>
                </a>
                <!-- Responsive toggle -->
                <span class="navbar-burger burger" data-target="navbarMenu">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </div>
            <!-- Menu -->
            <div id="navbarMenu" class="navbar-menu light-menu">
                <div class="navbar-end">
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" href="<?= base_url() ?>#about">Tentang</a>
                    </div>
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" href="<?= base_url() ?>#reward">Lomba</a>
                    </div>
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" href="<?= base_url() ?>#timeline">Timeline</a>
                    </div>
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" href="<?= base_url() ?>seminar/register">Ikuti Seminar UI/UX</a>
                    </div>
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" onclick="showWhatsApp();">
                            <i class="fab fa-whatsapp"></i>
                            Hubungi Kami
                        </a>
                    </div>
                    <!-- Sign up -->
                    <div class="navbar-item is-nav-link">
                        <a href="<?= base_url() ?>login" class="button k-button k-primary raised has-gradient slanted">
                            <span class="text">

                                <!-- <i class="far fa-user-circle"></i>-->Login

                            </span>
                            <span class="front-gradient"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- /Static navbar -->
    <nav id="navbar-clone" class="navbar is-fixed">
        <div class="container">
            <!-- Brand -->
            <div class="navbar-brand">
                <a href="<?= base_url() ?>" class="navbar-item">
                    <img src="<?= base_url() ?>assets/app/images/logo/logo.png" alt="">
                    <span class="brand-name">IITF 2019</span>
                </a>
                <!-- Responsive toggle -->
                <span class="navbar-burger burger" data-target="navbarMenu">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </div>
            <!-- Menu -->
            <div id="navbarMenu" class="navbar-menu light-menu">
                <div class="navbar-end">
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" href="<?= base_url() ?>#about">Tentang</a>
                    </div>
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" href="<?= base_url() ?>#reward">Lomba</a>
                    </div>
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" href="<?= base_url() ?>#timeline">Timeline</a>
                    </div>
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" href="<?= base_url() ?>seminar/register">Ikuti Seminar UI/UX</a>
                    </div>
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" onclick="showWhatsApp();">
                            <i class="fab fa-whatsapp"></i>
                            Hubungi Kami
                        </a>
                    </div>
                    <!-- Sign up -->
                    <div class="navbar-item is-nav-link">
                        <a href="<?= base_url() ?>login" class="button k-button k-primary raised has-gradient slanted">
                            <span class="text">

                                <!-- <i class="far fa-user-circle"></i>-->Login

                            </span>
                            <span class="front-gradient"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- /Static navbar -->
<?php } else if ($page == "login") { ?>
    <nav class="navbar is-fixed">
        <div class="container">
            <!-- Brand -->
            <div class="navbar-brand">
                <a href="<?= base_url() ?>" class="navbar-item">
                    <img src="<?= base_url() ?>assets/app/images/logo/logo.png" alt="">
                    <span class="brand-name">IITF 2019</span>
                </a>
                <!-- Responsive toggle -->
                <span class="navbar-burger burger" data-target="navbarMenu">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </div>
            <!-- Menu -->
            <div id="navbarMenu" class="navbar-menu light-menu">
                <div class="navbar-end">
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" href="<?= base_url() ?>#about">Tentang</a>
                    </div>
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" href="<?= base_url() ?>#reward">Lomba</a>
                    </div>
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" href="<?= base_url() ?>#timeline">Timeline</a>
                    </div>
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" href="<?= base_url() ?>seminar/register">Ikuti Seminar UI/UX</a>
                    </div>
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" onclick="showWhatsApp();">
                            <i class="fab fa-whatsapp"></i>
                            Hubungi Kami
                        </a>
                    </div>
                    <!-- Sign up -->
                    <div class="navbar-item is-nav-link">
                        <a href="<?= base_url() ?>register" class="button k-button k-primary raised has-gradient slanted">
                            <span class="text">

                                <!-- <i class="far fa-user-circle"></i>-->Buat akun

                            </span>
                            <span class="front-gradient"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- /Static navbar -->
    <nav id="navbar-clone" class="navbar is-fixed">
        <div class="container">
            <!-- Brand -->
            <div class="navbar-brand">
                <a href="<?= base_url() ?>" class="navbar-item">
                    <img src="<?= base_url() ?>assets/app/images/logo/logo.png" alt="">
                    <span class="brand-name">IITF 2019</span>
                </a>
                <!-- Responsive toggle -->
                <span class="navbar-burger burger" data-target="navbarMenu">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </div>
            <!-- Menu -->
            <div id="navbarMenu" class="navbar-menu light-menu">
                <div class="navbar-end">
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" href="<?= base_url() ?>#about">Tentang</a>
                    </div>
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" href="<?= base_url() ?>#reward">Lomba</a>
                    </div>
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" href="<?= base_url() ?>#timeline">Timeline</a>
                    </div>
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" href="<?= base_url() ?>seminar/register">Ikuti Seminar UI/UX</a>
                    </div>
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" onclick="showWhatsApp();">
                            <i class="fab fa-whatsapp"></i>
                            Hubungi Kami
                        </a>
                    </div>
                    <!-- Sign up -->
                    <div class="navbar-item is-nav-link">
                        <a href="<?= base_url() ?>register" class="button k-button k-primary raised has-gradient slanted">
                            <span class="text">

                                <!-- <i class="far fa-user-circle"></i>-->Buat akun

                            </span>
                            <span class="front-gradient"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- /Static navbar -->

<?php } else if ($page == "dashboard") { ?>
    <nav class="nav has-shadow">
        <div class="container">
            <div class="nav-left">
                <a href="<?= base_url() ?>" class="nav-item is-tab"><i class="fa fa-home"></i> &nbsp; Home</a>
                <a href="<?= base_url() ?>user?step=4" class="nav-item is-tab"><i class="fa fa-bolt"></i> &nbsp; Detail Pendaftaran</a>
            </div>

            <div class="nav-center">
                <a class="nav-item" href="#">
                    <span class="icon">

                    </span>
                </a>
            </div>

            <span class="nav-toggle">
                <span></span>
                <span></span>
                <span></span>
            </span>

            <div class="nav-right nav-menu">
                <span class="nav-item">
                    <a class="button" href="<?= base_url() ?>logout">
                        <span class="icon">
                            <i class="fa fa-twitter"></i>
                        </span>
                        <span>Log Out</span>
                    </a>
                </span>
            </div>
        </div>
    </nav>
<?php } else if ($page == "steps") { ?>
    <nav class="navbar is-fixed">
        <div class="container">
            <!-- Brand -->
            <div class="navbar-brand">
                <a href="<?= base_url() ?>" class="navbar-item">
                    <img src="<?= base_url() ?>assets/app/images/logo/logo.png" alt="">
                    <span class="brand-name">IITF 2019</span>
                </a>
                <!-- Responsive toggle -->
                <span class="navbar-burger burger" data-target="navbarMenu">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </div>
            <!-- Menu -->
            <div id="navbarMenu" class="navbar-menu light-menu">
                <div class="navbar-end">
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" href="<?= base_url() ?>">Home</a>
                    </div>
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" href="<?= base_url() ?>user/dashboard">Dashboard</a>
                    </div>
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" onclick="showWhatsApp();">
                            <i class="fab fa-whatsapp"></i>
                            Hubungi Kami
                        </a>
                    </div>
                    <!-- Sign up -->
                    <div class="navbar-item is-nav-link">
                        <a href="<?= base_url((($email == null) || ($email == '') ? 'login' : 'logout')) ?>" class="button k-button k-primary raised has-gradient slanted">
                            <span class="text">
                                <?php if ($email == null || $email == '') {
                                        echo '<i class="far fa-user-circle"></i> Area Peserta';
                                    } else {
                                        echo 'Logout';
                                    } ?>
                            </span>
                            <span class="front-gradient"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- /Static navbar -->
<?php } else { ?>
    <nav class="navbar is-fixed">
        <div class="container">
            <!-- Brand -->
            <div class="navbar-brand">
                <a href="<?= base_url() ?>" class="navbar-item">
                    <img src="<?= base_url() ?>assets/app/images/logo/logo.png" alt="">
                    <span class="brand-name">IITF 2019</span>
                </a>
                <!-- Responsive toggle -->
                <span class="navbar-burger burger" data-target="navbarMenu">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </div>
            <!-- Menu -->
            <div id="navbarMenu" class="navbar-menu light-menu">
                <div class="navbar-end">
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" href="<?= base_url() ?>#about">Tentang</a>
                    </div>
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" href="<?= base_url() ?>#reward">Lomba</a>
                    </div>
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" href="<?= base_url() ?>#timeline">Timeline</a>
                    </div>
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" href="<?= base_url() ?>seminar/register">Ikuti Seminar UI/UX</a>
                    </div>
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" onclick="showWhatsApp();">
                            <i class="fab fa-whatsapp"></i>
                            Hubungi Kami
                        </a>
                    </div>

                    <!-- Sign up -->
                    <div class="navbar-item is-nav-link">
                        <a href="<?= base_url((($email == null) || ($email == '') ? 'login' : 'user')) ?>" class="button k-button k-primary raised has-gradient slanted">
                            <span class="text">
                                <?php if ($email == null || $email == '') {
                                        echo '<i class="far fa-user-circle"></i> Area Peserta';
                                    } else {
                                        echo $email;
                                    } ?>
                            </span>
                            <span class="front-gradient"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- /Static navbar -->
    <nav id="navbar-clone" class="navbar is-fixed">
        <div class="container">
            <!-- Brand -->
            <div class="navbar-brand">
                <a href="<?= base_url() ?>" class="navbar-item">
                    <img src="<?= base_url() ?>assets/app/images/logo/logo.png" alt="">
                    <span class="brand-name">IITF 2019</span>
                </a>
                <!-- Responsive toggle -->
                <span class="navbar-burger burger" data-target="navbarMenu">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </div>
            <!-- Menu -->
            <div id="navbarMenu" class="navbar-menu light-menu">
                <div class="navbar-end">
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" href="<?= base_url() ?>#about">Tentang</a>
                    </div>
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" href="<?= base_url() ?>#reward">Lomba</a>
                    </div>
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" href="<?= base_url() ?>#timeline">Timeline</a>
                    </div>
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" href="<?= base_url() ?>seminar/register">Ikuti Seminar UI/UX</a>
                    </div>
                    <!-- Menu item -->
                    <div class="navbar-item is-nav-link">
                        <a class="is-centered-responsive is-semibold" onclick="showWhatsApp();">
                            <i class="fab fa-whatsapp"></i>
                            Hubungi Kami
                        </a>
                    </div>

                    <!-- Sign up -->
                    <div class="navbar-item is-nav-link">
                        <a href="<?= base_url((($email == null) || ($email == '') ? 'login' : 'user')) ?>" class="button k-button k-primary raised has-gradient slanted">
                            <span class="text">
                                <?php if ($email == null || $email == '') {
                                        echo '<i class="far fa-user-circle"></i> Area Peserta';
                                    } else {
                                        echo $email;
                                    } ?>
                            </span>
                            <span class="front-gradient"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- /Static navbar -->
<?php } ?>

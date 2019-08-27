<!-- Pageloader -->
<div class="pageloader is-theme"></div>
<div class="infraloader is-active"></div>
<div class="media-wrapper">
    <!-- Landing page Hero -->
    <section class="hero">
        <div class="hero-head">
            <?php //$this->load->view("component/nav"); ?>
            <!-- Cloned navbar -->
            <!-- Cloned navbar that comes in on scroll -->
            <nav id="navbar-clone" class="navbar is-fixed ">
                <div class="container">
                    <!-- Brand -->
                    <div class="navbar-brand">
                        <a href="<?= base_url() ?>" class="navbar-item">
                            <img class="" src="<?= base_url() ?>assets/app/images/logo/logo_iitf.png" alt="">
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
                            <!-- Menu item -->
                            <div class="navbar-item is-nav-link">
                                <a class="is-centered-responsive" href="<?=base_url()?>">
                                    <!-- <i class="fab fa-whatsapp"></i> -->
                                    Tentang
                                </a>
                            </div>

                            <div class="navbar-item is-nav-link">
                                <a class="is-centered-responsive" href="#" target="_blank">
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
                            <img class="" src="<?= base_url() ?>assets/app/images/logo/logo_iitf.png" alt="">
                            <span class="brand-name" style="color:white">IITF 2019</span>
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
                            <!-- Menu item -->
                            <div class="navbar-item is-nav-link">
                                <a class="is-centered-responsive" href="<?=base_url()?>">
                                    <!-- <i class="fab fa-whatsapp"></i> -->
                                    Tentang
                                </a>
                            </div>
                            <div class="navbar-item is-nav-link">
                                <a class="is-centered-responsive" href="#" target="_blank">
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
        </div>
        <!-- Hero Image and Title -->
        <div class="hero-body">
            <div class="container">
                <div class="columns is-vcentered">

                    <!-- Landing page Title -->
                    <div class="column is-5 is-offset-1 post-caption">
                        <div class="divider"></div>
                        <h1 class="title is-2 is-semibold is-spaced main-title" style="color:white"><?= $lomba[0]['nama'] ?> </h1>

                        <!-- <div class="author-block">
                            <div class="author-name">
                                <span>by Admin iitf</span>
                                <span><small>di</small> Purwokerto<small>, 27 Agustus</small></span>
                            </div>
                        </div> -->

                    </div>
                    <!-- Hero image -->
                    <div class="column is-5">
                        <figure class="image">
                            <img class="blog-featured" src="assets/app/images/media/post3.svg" alt="">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="columns">

                <div class="column is-9">
                    <!-- Content wrapper -->
                    <div class="post-body">
                        <!-- <p class="intro">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p> -->

                        <h2>Tentang lomba <?= $lomba[0]['nama'] ?> (<?= $lomba[0]['kategori'] ?>) </h2>

                        <p><?= $lomba[0]['deskripsi'] ?></p>

                        <blockquote>Tema Perlombaan ini adalah `` <?= $lomba[0]['tema'] ?>.``</blockquote>
                        <!-- <blockquote>Kategori Lomba ini adalah `` <?= $lomba[0]['kategori'] ?>.``</blockquote> -->
                        <p>Untuk penjelasan lebih jelas mengenai perlombaan dapat didownload panduan yang berada pada link dibawah.</p>

                        <h2>Cara mendaftar</h2>

                        <p>Ini Gimana yah gaes? langkah langkah? apa gambar ? apa video? apa apa?.</p>

                        <h2>Hadiah yang di dapat</h2>

                        <ol style="color: white; margin-left:20px">
                            <?php
                            $no = 1;
                            foreach ($lomba as $key => $val) { ?>
                            <li>
                                Juara <?= $no++; ?> : Uang Pembinaan + Sertifikat + Trophi
                            </li>
                            <?php } ?>
                        </ol>
                        <h2>Harga Pendaftaran</h2>
                        <blockquote>Rp <?= number_format($lomba[0]['harga']) ?></blockquote>
                        <!-- <hr> -->
                        <div class="cta-wrapper animated preFadeInUp fadeInUp">
                            <a href="<?= base_url() ?>assets/Guide_book/<?= $lomba[0]['guide_book'] ?>" class="button k-button k-primary raised has-gradient is-fat is-bold">
                                <span class="text">Download Panduan lomba <?= $lomba[0]['nama'] ?></span>
                                <span class="front-gradient"></span>
                            </a>
                        </div>
                    </div>
                    <!-- /Content wrapper -->
                </div>
            </div>
        </div>
    </section>
</div>
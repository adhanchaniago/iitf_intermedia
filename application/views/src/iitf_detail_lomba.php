<!-- Pageloader -->
<div class="pageloader is-theme"></div>
<div class="infraloader is-active"></div>
<div class="media-wrapper">
    <!-- Landing page Hero -->
    <section class="hero">
        <div class="hero-head">
            <?php $this->load->view("component/nav"); ?>

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
                            <img class="blog-featured" src="assets/Guide_book/<?= $lomba[0]['file_gambar'] ?>" alt="">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-12">
                    <!-- Content wrapper -->
                    <div class="post-body">
                        <!-- <p class="intro">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p> -->

                        <h2>Tentang lomba <?= $lomba[0]['nama'] ?> (<?= $lomba[0]['kategori'] ?>) </h2>

                        <p><?= $lomba[0]['deskripsi'] ?></p>

                        <blockquote>Tema Perlombaan ini adalah `` <?= $lomba[0]['tema'] ?>.``</blockquote>
                        <!-- <blockquote>Kategori Lomba ini adalah `` <?= $lomba[0]['kategori'] ?>.``</blockquote> -->
                        <p>Untuk penjelasan lebih jelas mengenai perlombaan dapat didownload panduan yang berada pada link dibawah.</p>

                        <h2>Cara mendaftar</h2>

                        <p>Tata Cara Pendaftaran lengkap dapat dilihat pada guide book yang terdapat pada panduan di akhir halaman ini,
                            atau bisa langsung klik Tombol daftar dibawah ini.</p>
                        <a href="<?= base_url() ?>daftar" target="_blank" class="button k-button k-primary raised has-gradient is-fat is-bold">
                            <span class="text">Daftar</span>
                            <span class="front-gradient"></span>
                        </a>
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

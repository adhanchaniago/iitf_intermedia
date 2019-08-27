<!-- Pageloader -->
<div class="pageloader is-theme"></div>
<div class="infraloader is-active"></div>
<div class="dark-wrapper">
    <!-- Landing page Hero -->
    <section class="hero is-fullheight my-header2">
        <div class="hero-head">
            <!-- nav-->
            <?php $this->load->view('component/nav') ?>
            <!--end nav-->
        </div>
        <!-- Animated particles -->
        <!-- <div id="particles-js"></div> -->
        <div id="particles-js2"></div>
        <!-- <div id="particles-js3"></div> -->
        <!-- Banner -->
        <div class="hero-body has-text-centered ">
            <div class="container">
                <div class="column is-6 is-offset-3">
                    <div class="roadmap-image">
                        <img style="width:80%;  margin-top: 50px;" src="<?= base_url() ?>assets/app/images/logo/iitf_new.png" alt="banner">
                    </div>
                    <!-- <h1 class="title is-2  is-semibold is-spaced main-title">IITF 2019</h1> -->
                    <h2 class="subtitle is-5  is-thin" style="margin-bottom: 100px;">
                        < Jadikan Teknologi Sebagai Ruang Kreatifitas />
                    </h2>
                    <!-- Play video button -->
                    <!-- <div class="cta-wrapper has-text-centered">
                    <div class="video-button levitate js-modal-btn" data-video-id="6WG7D47tGb0">
                        <img src="assets/app/images/icons/play.svg" alt="">
                    </div>
                </div>
                     -->
                </div>

            </div>
        </div>
        <!-- Banner -->
        <!-- Hero Image and Title -->
        <div class="hero-body" id="about">
            <div class="container">
                <div class="columns is-vcentered">

                    <!-- Landing page Title -->
                    <div class="column is-5 landing-caption">
                        <h2 class="title is-1  is-semibold is-spaced main-title">Tentang IITF</h2>
                        <!-- Divider -->
                        <div class="divider"></div>
                        <h3 class="subtitle is-7 is-thin" style="font-size:1rem;">
                            Lorem ipsum dolor amet. amet amet dah lorem ipsum dolor amet lorem ipsum dolor amet lorem ipsum dolor amet
                        </h3>
                        <!-- CTA -->
                        <!-- <p>
                                    <a href="#start" class="button k-button k-primary raised has-gradient is-fat is-bold">
                                        <span class="text">Get Started</span>
                                        <span class="front-gradient"></span>
                                    </a>
                                </p> -->
                        <!-- <a class="button k-button k-secondary raised has-gradient is-fat is-bold rounded">
                            <span class="text">Selengkapnya</span>
                            <span class="front-gradient"></span>
                        </a> -->

                    </div>
                    <!-- Hero image -->
                    <div class="column is-7">
                        <figure class="image">
                            <img style="width:80%; margin-left:50px;" src="assets/app/images/bg/about.svg" alt="About iitf">
                        </figure>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hero footer -->
        <div class="hero-foot">
            <div class="container">
                <div class="has-text-centered">
                    <div class="buy-title is-centered" style="color:black !important;">Dipersembahkan oleh</div>
                </div>
                <div class="tabs is-centered">
                    <!-- Client / partner list -->
                    <ul>
                        <li><a><img style="width:80px; height:10%;" class="hero-logo" src="assets/app/images/logo/logo_amikom.png" alt="AMIKOM Purwokerto"></a></li>
                        <li><a><img style="width:80px; height:10%;" class="hero-logo" src="assets/app/images/logo/banner.png" alt="IITF 2019"></a></li>
                        <li><a><img style="width:80px; height:10%;" class="hero-logo" src="assets/app/images/logo/intermedia.png" alt="INTERMEDIA"></a></li>
                    </ul>
                </div>
            </div>
        </div>

    </section>
    <!-- /Landing page Hero -->

    <!-- Icon Features section -->
    <section id="start" class="section is-transparent is-relative">
        <!-- Container -->
        <div class="container">

            <div class="has-text-centered">
                <div class="buy-title" style="color: black !important;">RANGKAIAN KEGIATAN</div>
                <!-- Divider -->
                <div class="divider is-centered"></div>
            </div>

            <!-- Content Rangkaian Kegiatan -->
            <div class="content-wrapper is-medium">
                <div class="columns is-vcentered">
                    <!-- Feature -->
                    <div class="column is-4">
                        <a href="<?= base_url() ?>detail">
                            <div class="feature">
                                <img src="assets/app/images/rangkaian-kegiatan/roadshow.svg" alt="" data-aos="fade-up" data-aos-delay="100" data-aos-offset="200" data-aos-easing="ease-out-quart">
                                <h4 class="title is-6 is-tight ">Roadshow</h4>
                                <p>Supercharged features to make you happy and lorem ipsum sit dolor amet</p>
                            </div>
                        </a>
                    </div>
                    <!-- Feature -->
                    <div class="column is-4">
                        <a href="<?= base_url() ?>detail">
                            <div class="feature">
                                <img src="assets/app/images/rangkaian-kegiatan/lomba.svg" alt="" data-aos="fade-up" data-aos-delay="300" data-aos-offset="200" data-aos-easing="ease-out-quart">
                                <h4 class="title is-6 is-tight ">Lomba</h4>
                                <p>Supercharged features to make you happy and lorem ipsum sit dolor amet</p>
                            </div>
                        </a>
                    </div>
                    <!-- Feature -->
                    <div class="column is-4">
                        <a href="<?= base_url() ?>detail">
                            <div class="feature">
                                <img src="assets/app/images/rangkaian-kegiatan/festival.svg" alt="" data-aos="fade-up" data-aos-delay="500" data-aos-offset="200" data-aos-easing="ease-out-quart">
                                <h4 class="title is-6 is-tight ">Festival</h4>
                                <p>Supercharged features to make you happy and lorem ipsum sit dolor amet</p>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Play video button -->
                <!-- <div class="cta-wrapper has-text-centered">
                    <div class="video-button levitate js-modal-btn" data-video-id="6WG7D47tGb0">
                        <a>Scroll Up !</a>
                    </div>
                </div> -->
                <!-- CTA -->
                <!-- <p>
                        <a href="#roadmap" class="button k-button k-primary raised has-gradient is-fat is-bold">
                            <span class="text">Selengkapnya</span>
                            <span class="front-gradient"></span>
                        </a>
                    </p> -->
            </div>
            <!-- Content Rangkaian Kegiatan-->
        </div>
        <!-- /Container -->
    </section>
    <!-- /Icon Features section -->


    <!-- ICO section -->
    <section class="section is-medium is-end" id="reward">
        <!-- Container -->
        <div class="container">

            <!-- Title & subtitle -->
            <h2 class="title is-light is-semibold has-text-centered is-spaced">LOMBA</h2>
            <!-- Divider -->
            <div class="divider is-centered"></div>
            <h4 class="subtitle is-6 is-light has-text-centered is-compact">Beberapa Perlombaan yang diadakan dengan beragam hadiah.</h4>

            <!-- Content wrapper -->
            <div class="content-wrapper is-large">
                <!-- Flying tabs wrapper -->
                <div class="flying-wrapper">
                    <!-- Tabs container -->
                    <div class="flying-tabs-container">
                        <!-- Tabs -->
                        <div class="flying-tabs">
                            <?php
                            $i = 1;
                            foreach ($lomba as $key => $val) { ?>
                            <div class="flying-child tab-<?= $i ?> <?php if ($i == 1) {
                                                                            echo "is-active";
                                                                        } ?>" data-tab="tab-<?= $i ?>"><a href="javascript:void(0);"><?= $val['nama'] ?></a></div>
                            <?php
                                $i++;
                            } ?>
                            <div class="slider"></div>
                        </div>
                    </div>

                    <!-- Tabs content wrapper -->
                    <div class="flying-tabs-content">
                        <!-- Tab 1 -->
                        <?php
                        $j = 1;
                        $k = 0;
                        foreach ($lomba as $key => $value) { ?>
                        <div id="tab-<?= $j ?>" class="tab-content <?php if ($j == 1) {
                                                                            echo "is-active";
                                                                        } ?>">
                            <div class="columns is-vcentered ">
                                <div class="column">
                                    <div class="container">
                                        <div class="hadiah-box animated preFadeInUp fadeInUp">
                                            <?php
                                                $a = 1;
                                                foreach ($value['juara'] as $keya => $val) { ?>
                                            <div class="box-hadiah box-hadiah--<?= $a ?>">
                                                <img class="hadiah-trophy" src="assets/app/images/hadiah/juara_<?= $a ?>.png" alt="juara <?= $a ?>">
                                                <p class="juara"><?= $val['nama'] ?></p>
                                                <!-- <p class="nominal">Rp <?= number_format($val['nominal']) ?></p> -->
                                                <p class="sertif">Sertifikat dan piala</p>
                                            </div>
                                            <?php
                                                    $a++;
                                                    // $k++;
                                                } ?>
                                        </div>
                                        <div class="cta-wrapper has-text-centered animated preFadeInUp fadeInUp">
                                            <a href="<?= base_url() ?>detail?lomba=<?= $value['nama'] ?>" class="button k-button k-primary raised has-gradient is-fat is-bold">
                                                <span class="text">Detail Lomba</span>
                                                <span class="front-gradient"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            $j++;
                            $k++;
                        } ?>
                        <!-- /Tab 1 -->
                    </div>
                </div>

            </div>
            <!-- Content wrapper -->
        </div>
        <!-- /Container -->
    </section>
    <!-- /ICO section -->

    <!-- Roadmap section -->
    <section class="section is-medium is-light" id="timeline">
        <!-- Container -->
        <div class="container">
            <!-- Divider -->
            <div class="divider is-centered"></div>
            <!-- Title & subtitle -->
            <h2 class="title is-dark is-semibold has-text-centered is-spaced">TIMELINE IITF 2019</h2>
            <h4 class="subtitle is-6 is-dark has-text-centered is-compact">Seluruh rangkaian kegiatan akan diadakan pada bulan september dan oktober.</h4>

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Timeline -->
                <div class="krypton-timeline">
                    <div class="timeline">
                        <!-- Events wrapper -->
                        <div class="events-wrapper">
                            <!-- Events list -->
                            <div class="events">
                                <ol>
                                    <!-- Event -->
                                    <li>
                                        <a href="#0" data-date="18/09/2019">
                                            <span>SEP</span>
                                            <span>18</span>
                                        </a>
                                    </li>
                                    <!-- Event -->
                                    <li>
                                        <a href="#0" data-date="20/09/2019">
                                            <span>SEP</span>
                                            <span>20</span>
                                        </a>
                                    </li>
                                    <!-- Event -->
                                    <li>
                                        <a href="#0" data-date="28/09/2019">
                                            <span>SEP</span>
                                            <span>28</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#0" data-date="13/10/2019">
                                            <span>OCT</span>
                                            <span>13</span>
                                        </a>
                                    </li>

                                </ol>

                                <!-- Track line -->
                                <span class="filling-line" aria-hidden="true"></span>
                            </div>
                            <!-- Events list -->
                        </div>
                        <!-- Events wrapper -->

                        <ul class="timeline-navigation">
                            <li><a href="#0" class="prev inactive">Prev</a></li>
                            <li><a href="#0" class="next">Next</a></li>
                        </ul> <!-- .cd-timeline-navigation -->
                    </div> <!-- .timeline -->

                    <!-- Main events content -->
                    <div class="events-content">
                        <ol>
                            <!-- Event -->
                            <li class="selected" data-date="18/09/2019">
                                <!-- Inner -->
                                <div class="inner-wrapper">
                                    <div class="title-wrapper">
                                        <!-- Icon -->
                                        <img src="<?= base_url() ?>assets/app/images/icons/ico/platform-launch.svg" alt="">
                                        <!-- Title & date -->
                                        <div>
                                            <span class="event-title">Satu</span>
                                            <small>January 16th, 2018</small>
                                        </div>
                                    </div>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
                                    </p>
                                </div>
                            </li>

                            <!-- Event -->
                            <li data-date="20/09/2019">
                                <div class="inner-wrapper">
                                    <div class="title-wrapper">
                                        <img src="<?= base_url() ?>assets/app/images/icons/ico/presale.svg" alt="">
                                        <div>
                                            <span class="event-title">Dua</span>
                                            <small>February 28th, 2018</small>
                                        </div>
                                    </div>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
                                    </p>
                                </div>
                            </li>

                            <!-- Event -->
                            <li data-date="28/09/2019">
                                <div class="inner-wrapper">
                                    <div class="title-wrapper">
                                        <img src="<?= base_url() ?>assets/app/images/icons/ico/ico.svg" alt="">
                                        <div>
                                            <span class="event-title">Tiga</span>
                                            <small>February 28th, 2018</small>
                                        </div>
                                    </div>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
                                    </p>
                                </div>
                            </li>

                            <!-- Event -->
                            <li data-date="13/10/2019">
                                <div class="inner-wrapper">
                                    <div class="title-wrapper">
                                        <img src="assets/app/images/icons/ico/ico-2.svg" alt="">
                                        <div>
                                            <span class="event-title">Empat</span>
                                            <small>April 20th, 2018</small>
                                        </div>
                                    </div>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at, eaque hic repellendus sit dicta consequatur quae, ut harum ipsam molestias maxime non nisi reiciendis eligendi! Doloremque quia pariatur harum ea amet quibusdam quisquam, quae, temporibus dolores porro doloribus.
                                    </p>
                                </div>
                            </li>


                        </ol>
                    </div> <!-- .events-content -->
                </div>
                <!-- Timeline -->

            </div>

            <!-- CTA -->
            <div class="cta-wrapper has-text-centered">
                <a href="<?= base_url() ?>timeline" class="button k-button k-primary raised has-gradient is-fat is-bold">
                    <span class="text">TimeLine Selengkapnya</span>
                    <span class="front-gradient"></span>
                </a>
            </div>
        </div>
        <!-- /Container -->
    </section>
    <!-- /Roadmap section -->


    <!-- Company section -->
    <section class="section is-medium has-big-dark-gradient" id="mediapartner">
        <!-- Container -->
        <div class="container">

            <!-- Spaced divider -->
            <div class="divider is-centered"></div>


            <!-- Title & subtitle -->
            <h2 class="title is-light is-semibold has-text-centered is-spaced">Media Partners & Sponsorship</h2>
            <h4 class="subtitle is-6 is-light has-text-centered is-compact">IITF didukung beberapa media partner & Sponsor.</h4>

            <!-- Content wrapper -->
            <div class="content-wrapper is-large">
                <!-- Partner logos -->
                <div class="partners">
                    <!-- Partner -->
                    <!-- <div class="partner-item">
                        <img src="assets/app/images/media-partner/biznet.png" alt="biznet">
                    </div> -->
                    <!-- Partner -->
                    <!-- <div class="partner-item">
                        <img src="assets/app/images/media-partner/ampu-studio.png" alt="ampu studio">
                    </div> -->
                    <!-- Partner -->
                    <div class="partner-item">
                        <a href="https://puskomedia.id" target="_blank">
                            <img src="assets/app/images/media-partner/puskomedia.png" alt="puskomedia">
                        </a>
                    </div>
                    <!-- Partner -->
                    <!-- <div class="partner-item">
                        <img src="assets/app/images/media-partner/kaskus.png" alt="kaskus">
                    </div> -->

                </div>
            </div>


            <!-- CTA -->
            <div class="cta-wrapper has-text-centered">
                <a href="#" class="button k-button k-primary raised has-gradient is-fat is-bold">
                    <span class="text">Open Media Partner & Sponsorship</span>
                    <span class="front-gradient"></span>
                </a>
            </div>

        </div>
        <!-- /Content Media Partner -->
        </div>
    </section>
<!-- /Company section -->
<section class="section is-medium ">
    <!-- Spaced divider -->
    <div class="divider is-centered is-spacer"></div>
    <!-- Title & subtitle -->
    <h2 class="title is-dark is-semibold has-text-centered is-spaced">FAQ</h2>
    <h4 class="subtitle is-6 is-dark has-text-centered is-compact">Beberapa pertanyaan yang mungkin mau kamu tanyakan.</h4>

    <!-- Content FAQ -->
    <div class="content-wrapper is-large">
        <div class="columns">
            <div class="column is-5 is-offset-1">

                <!-- Accordion -->
                <div class="accordion">
                    <!-- Option -->
                    <div class="accordion-option">
                        <input type="checkbox" id="toggle1" class="accordion-toggle" />
                        <label class="accordion-title" for="toggle1">
                            Bagaimana mendaftar iitf ?
                        </label>
                        <div class="accordion-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                        </div>
                    </div>

                    <!-- Option -->
                    <div class="accordion-option">
                        <input type="checkbox" id="toggle2" class="accordion-toggle" />
                        <label class="accordion-title" for="toggle2">
                            Saya tidak punya tim apakah boleh ikut kategori mobile ?
                        </label>
                        <div class="accordion-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                        </div>
                    </div>

                    <!-- Option -->
                    <div class="accordion-option">
                        <input type="checkbox" id="toggle3" class="accordion-toggle" />
                        <label class="accordion-title" for="toggle3">
                            Batas Maksimal pedaftaran kapan ?
                        </label>
                        <div class="accordion-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                        </div>
                    </div>

                    <!-- Option -->
                    <div class="accordion-option">
                        <input type="checkbox" id="toggle4" class="accordion-toggle" />
                        <label class="accordion-title" for="toggle4">
                            Mau daftar tapi bingung caranya ?
                        </label>
                        <div class="accordion-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                        </div>
                    </div>

                    <!-- Option -->
                    <div class="accordion-option">
                        <input type="checkbox" id="toggle5" class="accordion-toggle" />
                        <label class="accordion-title" for="toggle5">
                            Tim saya berbeda sekolah/instansi apakah boleh ?
                        </label>
                        <div class="accordion-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                        </div>
                    </div>
                </div>
                <!-- /Accordion -->
            </div>


            <div class="column is-5">

                <!-- Accordion -->
                <div class="accordion">
                    <!-- Option -->
                    <div class="accordion-option">
                        <input type="checkbox" id="toggle6" class="accordion-toggle" />
                        <label class="accordion-title" for="toggle6">
                            Batas akhir pendaftaran ?
                        </label>
                        <div class="accordion-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                        </div>
                    </div>

                    <!-- Option -->
                    <div class="accordion-option">
                        <input type="checkbox" id="toggle7" class="accordion-toggle" />
                        <label class="accordion-title" for="toggle7">
                            Apakah boleh ngutang ?
                        </label>
                        <div class="accordion-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                        </div>
                    </div>

                    <!-- Option -->
                    <div class="accordion-option">
                        <input type="checkbox" id="toggle8" class="accordion-toggle" />
                        <label class="accordion-title" for="toggle8">
                            Satu tim maksimal berapa orang ?
                        </label>
                        <div class="accordion-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                        </div>
                    </div>

                    <!-- Option -->
                    <div class="accordion-option">
                        <input type="checkbox" id="toggle9" class="accordion-toggle" />
                        <label class="accordion-title" for="toggle9">
                            Saya dapet apa aja kalo ikut ?
                        </label>
                        <div class="accordion-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                        </div>
                    </div>

                    <!-- Option -->
                    <div class="accordion-option">
                        <input type="checkbox" id="toggle10" class="accordion-toggle" />
                        <label class="accordion-title" for="toggle10">
                            Berapa hadiahnya ?
                        </label>
                        <div class="accordion-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                        </div>
                    </div>
                </div>
                <!-- /Accordion -->
            </div>
        </div>
    </div>
    <!-- /Content FAQ -->
</section>
</div>
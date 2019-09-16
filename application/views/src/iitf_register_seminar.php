<style type="text/css">

.spinner {
width: 40px;
height: 40px;
position: relative;
margin: 100px auto;
}

.double-bounce1, .double-bounce2 {
width: 100%;
height: 100%;
border-radius: 50%;
background-color: #333;
opacity: 0.6;
position: absolute;
top: 0;
left: 0;
-webkit-animation: sk-bounce 2.0s infinite ease-in-out;
animation: sk-bounce 2.0s infinite ease-in-out;
}

.double-bounce2 {
-webkit-animation-delay: -1.0s;
animation-delay: -1.0s;
}

@-webkit-keyframes sk-bounce {
0%, 100% { -webkit-transform: scale(0.0) }
50% { -webkit-transform: scale(1.0) }
}

@keyframes sk-bounce {
0%, 100% { 
transform: scale(0.0);
-webkit-transform: scale(0.0);
} 50% { 
transform: scale(1.0);
-webkit-transform: scale(1.0);
}
}
</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<!-- Pageloader -->
<div class="pageloader is-theme"></div>
<div class="infraloader is-active"></div>
<!-- Landing page Hero -->
<section class="hero is-fullheight">
    <div class="hero-head">
        <!-- /Static navbar -->
        <?php $this->load->view('component/nav'); ?>
    </div>
<!-- Core js -->

    <!-- Hero Image and Title -->
    <div class="hero-body">
        <div class="container">
            <div class="columns is-vcentered">

                <!-- Landing page Title -->
                <div class="column is-half-desktop is-full-mobile landing-caption">
                    <h1 class="title is-3 is-semibold is-spaced main-title has-text-centered">Pendaftaran<br>Peserta Seminar UI/UX</h1>
                    <br><br>
                    <form class="login-form" action="javascript:tryRegisterSeminar('<?= base_url(); ?>');">
                        <div class="field">
                            <label class="label">Nama Lengkap</label>
                            <p class="control has-icons-left">
                                <input class="input" type="text" name="nama" id="n" placeholder="misal: Tarjo Ramadhan">
                                <span class="icon is-small is-left"><i class="fas fa-user"></i></span>
                            </p>
                        </div>
                        <div class="field">
                            <label class="label">Alamat Lengkap</label>
                            <p class="control has-icons-left">
                                <textarea class="input" name="alamat" id="al" placeholder="misal: Jalan Kenanga No. 313 Jakarta Pusat"></textarea>
                                <span class="icon is-small is-left"><i class="fas fa-home"></i></span>
                            </p>
                        </div>
                        <div class="field">
                            <label class="label">E-Mail:</label>
                            <p class="control has-icons-left">
                                <input class="input" type="email" name="email" id="email" placeholder="misal: john.doe@example.com">
                                <span class="icon is-small is-left"><i class="fas fa-envelope"></i></span>
                            </p>
                        </div>
                        <div class="field">
                            <label class="label">Nomor HP/WA:</label>
                            <p class="control has-icons-left">
                                <input class="input" type="tel" name="notelp" id="no_hp" placeholder="misal: 0823xxxxxxxx">
                                <span class="icon is-small is-left"><i class="fas fa-phone"></i></span>
                            </p>
                        </div>
                        <div class="field">
                            <label class="label">Asal Sekolah/Institusi:</label>
                            <p class="control has-icons-left">
                                <input class="input" type="text" name="asal" id="asal" placeholder="Isi asal institusi atau sekolah disini.">
                                <span class="icon is-small is-left"><i class="fas fa-building"></i></span>
                            </p>
                        </div>

                        <!-- Label Login -->
                        <div id="warnings"></div><br>
                        <br>
                        <!-- Submit -->
                        <div class="column">
                            <button id="simpan" type="submit" class="button is-button k-button k-primary raised has-gradient is-bold">
                                <span class="text">Daftar</span>
                                <span class="front-gradient"></span>
                            </button>
                        </div>
                    </form>
                </div>
                <!-- Hero image -->
                <div class="column is-half-desktop is-full-mobile ico-countdown">
                    <div class="ico-card animated preFadeInUp fadeInUp">
                        <!-- Countdown -->
                        <div class="buy-title is-centered">
                            Pendaftaran akan berakhir pada
                        </div>
                        <ul id="countdown" class="is-ico">
                            <li id="days">
                                <div class="timer-number">00</div>
                                <div class="label">Days</div>
                            </li>
                            <li id="hours">
                                <div class="timer-number">00</div>
                                <div class="label">Hours</div>
                            </li>
                            <li id="minutes">
                                <div class="timer-number">00</div>
                                <div class="label">Minutes</div>
                            </li>
                            <li id="seconds">
                                <div class="timer-number">00</div>
                                <div class="label">Seconds</div>
                            </li>
                        </ul>
                        <!-- Progress bar 
                        <div class="progress-block">
                            <div class="progress-tags">
                                <div>Pendaftaran</div>
                                <div>Administrasi</div>
                                <div>Pengumuman</div>
                            </div>
                            <progress class="progress ico-progress" value="30" max="100">30%</progress>
                        </div>
                        -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Hero footer -->
    <div class="hero-foot">
        <div class="container">
            <div class="tabs is-centered">
                <!-- Client / partner list -->
                <ul>
                    <li><a><img class="hero-logo" src="<?= base_url() ?>assets/app/images/clients/cryptomarket.svg" alt=""></a></li>
                    <li><a><img class="hero-logo" src="<?= base_url() ?>assets/app/images/clients/bitit.svg" alt=""></a></li>
                    <li><a><img class="hero-logo" src="<?= base_url() ?>assets/app/images/clients/coin.svg" alt=""></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- /Landing page Hero -->
<!-- Core js -->


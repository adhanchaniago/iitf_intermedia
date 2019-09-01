 <!-- Pageloader -->
 <div class="pageloader is-theme"></div>
 <div class="infraloader is-active"></div>
 <!-- Landing page Hero -->
 <section class="hero is-fullheight">
     <div class="hero-head">
         <!-- /Static navbar -->
         <?php $this->load->view('component/nav'); ?>
     </div>
     <!-- Hero Image and Title -->
     <div class="hero-body">
         <div class="container">
             <div class="columns is-vcentered">
                 <!-- Landing page Title -->
                 <div class="column is-half-desktop is-full-mobile landing-caption">
                     <h1 class="title is-3 is-semibold is-spaced main-title has-text-centered">Masuk ke IITF</h1>
                     
                     <form class="login-form" action="javascript:tryLogin('<?= base_url(); ?>');">
                         <!-- Field -->
                         <div class="column">
                             <div class="control-material is-primary">
                                 <input class="material-input" id="u" type="email" required>
                                 <span class="material-highlight"></span>
                                 <span class="bar"></span>
                                 <label for="u">Email</label>
                             </div>
                         </div>
                         <!-- Field -->
                         <div class="column">
                             <div class="control-material is-primary">
                                 <input class="material-input" id="p" type="password" required>
                                 <span class="material-highlight"></span>
                                 <span class="bar"></span>
                                 <label for="p">Kata Sandi</label>
                             </div>
                             <!-- Label Login -->
                             <div id="loginWarnings"></div>
                         </div>

                         <!-- Submit -->
                         <div class="column">
                             <button type="submit" onclick="javascript:tryLogin('<?= base_url(); ?>');" class="button is-button k-button k-primary raised has-gradient is-bold">
                                 <span class="text">Masuk</span>
                                 <span class="front-gradient"></span>
                             </button>
                         </div>
                         <div class="column">
                             <div class="columns">
                                 <div class="column">
                                     Belum Punya Akun? <a href="<?= base_url() ?>register">Daftar Disini</a>
                                 </div>
                                 <div class="column">
                                     <!-- <span style="float:right; margin-top: 0px"> -->
                                         Lupa password anda? <a href="<?= base_url() ?>lupa_password">Klik Disini</a>
                                     <!-- </span> -->
                                 </div>
                             </div>
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
                         <!-- Progress bar -->
                         <div class="progress-block">
                             <!-- Tags -->
                             <div class="progress-tags">
                                 <div>Pendaftaran</div>
                                 <div>Administrasi</div>
                                 <div>Pengumuman</div>
                             </div>
                             <progress class="progress ico-progress" value="30" max="100">30%</progress>
                         </div>
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

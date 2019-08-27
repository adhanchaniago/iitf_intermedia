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
                 <div class="column is-6 landing-caption">
                     <h1 class="title is-3 is-semibold is-spaced main-title has-text-centered">Ubah Kata Sandi</h1>
                     <form class="login-form" action="" method="POST">
                         <!-- Field -->
                         <div class="control-material is-primary">
                             <input class="material-input" id="p" name="password" type="password" required>
                             <span class="material-highlight"></span>
                             <span class="bar"></span>
                             <label for="p">Kata Sandi</label>
                         </div>
                         <!-- Field -->
                         <div class="control-material is-primary">
                             <input class="material-input" id="p2" type="password" required>
                             <span class="material-highlight"></span>
                             <span class="bar"></span>
                             <label for="u">Ulang Kata Sandi</label>
                         </div>

                         <!-- Label Login -->
                         <div id="regWarnings"></div><br>

                         <!-- Submit -->
                         <span>
                             <input type="submit" value="KIRIM" name="kirim" class="button k-button k-primary raised has-gradient is-bold">
                         </span>

                     </form>

                 </div>
                 <!-- Hero image -->
                 <div class="column is-6 ico-countdown">
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
 </section>
 <!-- /Landing page Hero -->
 <!-- Core js -->
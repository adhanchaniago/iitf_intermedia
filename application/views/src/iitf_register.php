 <style>
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

                                <!-- Label Login -->
                                <div id="regWarnings"></div><br>
                                <progress class="progress is-small is-primary" max="100">15%</progress>
                                <!-- Submit -->
                                <span>
                                    <button type="submit"  class="button is-button k-button k-primary raised has-gradient is-bold">
                                        <span class="text">Daftar</span>
                                        <span class="front-gradient"></span>
                                    </button>
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
        
            <!-- Hero footer -->
            <div class="hero-foot">
                <div class="container">
                    <div class="tabs is-centered">
                        <!-- Client / partner list -->
                        <ul>
                            <li><a><img class="hero-logo" src="<?= base_url()?>assets/app/images/clients/cryptomarket.svg" alt=""></a></li>
                            <li><a><img class="hero-logo" src="<?= base_url()?>assets/app/images/clients/bitit.svg" alt=""></a></li>
                            <li><a><img class="hero-logo" src="<?= base_url()?>assets/app/images/clients/coin.svg" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Landing page Hero -->
        <!-- Core js -->
	<div id="modal-register" class="modal">
    <div class="modal-background">

	</div>
    <div class="modal-content">
      <!-- Any other Bulma elements you want -->
      <div class="card">
        	<div id="modal-loading" class="card-content">
				<div class="spinner">
  					<div class="double-bounce1"></div>
  					<div class="double-bounce2"></div>
				</div>
				<center class="title"><h3>Tunggu ya..</h3></center>
			</div>
			<div id="modal-sukses" class="card-content">
				<p>Selamat Kun anda sudah terdaftar</p>
				<p>Cek kotak masuk email anda untuk mengaktivasi akun</p>
				<p align="right">
            	<button
              		id="btn-oke"
              		class="button k-button k-primary raised has-gradient slanted"
            	>
              	<span class="text">
                	Saya Mengerti dan Lanjutkan
              	</span>
              	<span class="front-gradient"></span>
            	</button>
            	</p>
          </div>
      </div>
    </div>
    <!-- <button class="modal-close is-large" aria-label="close"></button> -->
  </div>
=======
     <!-- Hero Image and Title -->
     <div class="hero-body">
         <div class="container">
             <div class="columns is-vcentered">

                 <!-- Landing page Title -->
                 <div class="column is-half-desktop is-full-mobile landing-caption">
                     <h1 class="title is-3 is-semibold is-spaced main-title has-text-centered">Buat Akun IITF</h1>
                     <form class="login-form" action="javascript:tryRegister('<?= base_url(); ?>');">
                         <!-- Field -->
                         <div class="column">
                             <div class="control-material is-primary">
                                 <input class="material-input" id="n" type="text" required>
                                 <span class="material-highlight"></span>
                                 <span class="bar"></span>
                                 <label for="u">Nama</label>
                             </div>
                         </div>
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
                         </div>
                         <!-- Field -->
                         <div class="column">
                             <div class="control-material is-primary">
                                 <input class="material-input" id="p2" type="password" required>
                                 <span class="material-highlight"></span>
                                 <span class="bar"></span>
                                 <label for="u">Ulang Kata Sandi</label>
                             </div>
                         </div>

                         <!-- Label Login -->
                         <div id="regWarnings"></div><br>

                         <!-- Submit -->
                         <div class="column">
                             <button type="submit" class="button is-button k-button k-primary raised has-gradient is-bold">
                                 <span class="text">Daftar</span>
                                 <span class="front-gradient"></span>
                             </button>
                         </div>
                         <div class="column">
                             <div class="columns">
                                 <div class="column">
                                     Sudah Punya Akun? <a href="<?= base_url() ?>login">Login Disini</a>
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
>>>>>>> 62e6df881bbf9a227dd70f0f4a47389841c4bf03

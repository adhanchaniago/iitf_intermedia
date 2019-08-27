 <!-- Pageloader -->
 <div class="pageloader is-theme"></div>
 <div class="infraloader is-active"></div>
 <div class="dark-wrapper">
     <!-- Landing page Hero -->
     <section class="hero is-fullheight">
         <div class="hero-head">
             <!-- /Static navbar -->
             <?php //$this->load->view('component/nav'); 
                ?>
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
                                 <a class="is-centered-responsive" href="<?= base_url() ?>">
                                     <!-- <i class="fab fa-whatsapp"></i> -->
                                     Tentang
                                 </a>
                             </div>

                             <div class="navbar-item is-nav-link">
                                 <a class="is-centered-responsive" onclick="showWhatsApp();" target="_blank">
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
                                 <a class="is-centered-responsive" href="<?= base_url() ?>">
                                     <!-- <i class="fab fa-whatsapp"></i> -->
                                     Tentang
                                 </a>
                             </div>
                             <div class="navbar-item is-nav-link">
                                 <a class="is-centered-responsive" onclick="showWhatsApp();">
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
                     <div class=" column is-6" style="margin:auto">
                         <div class="ico-card animated preFadeInUp fadeInUp">
                             <h1 class="title is-3 is-semibold is-spaced main-title has-text-centered">Lupa Password</h1>
                             <?= $this->session->flashdata('pesan'); ?>
                             <form class="login-form" action="" method="POST">
                                 <!-- Field -->
                                 <div class="control-material is-primary">
                                     <input class="material-input" name="email" type="email" required>
                                     <span class="material-highlight"></span>
                                     <span class="bar"></span>
                                     <label for="u">Email</label>
                                 </div>

                                 <!-- Label Login -->
                                 <!-- <div id="loginWarnings"></div><br> -->

                                 <!-- Submit -->
                                 <div class="cta-wrapper has-text-centered animated preFadeInUp fadeInUp">
                                     <input type="submit" name="kirim" class="button k-button k-primary raised has-gradient is-bold">
                                 </div>

                             </form>
                         </div>
                     </div>
                     <!-- Hero image -->
                     <!--  -->
                 </div>
             </div>
         </div>
     </section>
 </div>
 <!-- /Landing page Hero -->
 <!-- Core js -->
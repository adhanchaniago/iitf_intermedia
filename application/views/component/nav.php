 
 <?php if($page == "home"){?>
                    <!-- Cloned navbar -->
                    <!-- Cloned navbar that comes in on scroll -->
                    <nav id="navbar-clone" class="navbar is-fixed ">
                        <div class="container">
                            <!-- Brand -->
                            <div class="navbar-brand">
                                <a href="<?= base_url()?>" class="navbar-item">
                                    <img class="rotating" src="<?= base_url()?>assets/app/images/logo/krypton-gradient.svg" alt="">
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
                                        <a class="is-centered-responsive" href="#about"">Tentang</a>
                                    </div>
                                    <!-- Menu item -->
                                    <div class="navbar-item is-nav-link">
                                        <a class="is-centered-responsive" href="#reward">Hadiah</a>
                                    </div>
                                    <!-- Menu item -->
                                    <div class="navbar-item is-nav-link">
                                        <a class="is-centered-responsive" href="#timeline">Timeline</a>
                                    </div>
                                    <!-- Menu item -->
                                    <div class="navbar-item is-nav-link">
                                        <a class="is-centered-responsive" href="#" target="_blank">
                                        <i class="fab fa-whatsapp"></i>
                                            WhatsApp
                                        </a>
                                    </div>
                                    <!-- Sign up -->
                                    <div class="navbar-item is-nav-link">
                                        <a href="<?= base_url()?>login" class="button k-button k-primary raised has-gradient slanted">
                                            <span class="text">
                                            <?php if($email == null || $email == ''){
                                                echo '<i class="far fa-user-circle"></i>Area Peserta';
                                            }else{
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
                                <a href="<?= base_url()?>" class="navbar-item">
                                <img class="rotating" src="<?= base_url()?>assets/app/images/logo/krypton-gradient.svg" alt="">
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
                                        <a style="color:black;" class="is-centered-responsive" href="#about">Tentang</a>
                                    </div>
                                    <!-- Menu item -->
                                    <div class="navbar-item is-nav-link">
                                        <a class="is-centered-responsive" href="#reward">Hadiah</a>
                                    </div>
                                    <!-- Menu item -->
                                    <div class="navbar-item is-nav-link">
                                        <a class="is-centered-responsive" href="#timeline">Timeline</a>
                                    </div>
                                    <!-- Menu item -->
                                    <div class="navbar-item is-nav-link">
                                        <a class="is-centered-responsive" href="#" target="_blank">
                                        <i class="fab fa-whatsapp"></i>
                                            WhatsApp
                                        </a>
                                    </div>
                                    <!-- Sign up -->
                                    <div class="navbar-item is-nav-link">
                                        <a href="<?= base_url()?>login" class="button k-button k-primary raised has-gradient slanted">
                                            <span class="text">
                                            <?php if($email == null || $email == ''){
                                                echo '<i class="far fa-user-circle"></i>Area Peserta';
                                            }else{
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
<?php }else if($page == "timeline"){?>

                    <nav id="navbar-clone" class="navbar is-fixed">
                        <div class="container">
                            <!-- Brand -->
                            <div class="navbar-brand">
                                <a href="<?= base_url()?>" class="navbar-item">
                                <img class="rotating" src="<?= base_url()?>assets/app/images/logo/krypton-gradient.svg" alt="">
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
                                        <a class="is-centered-responsive" href="<?= base_url()?>">Tentang</a>
                                    </div>
                                    
                                    <!-- Menu item -->
                                    <div class="navbar-item is-nav-link">
                                        <a class="is-centered-responsive" href="#" target="_blank">
                                        <i class="fab fa-whatsapp"></i>
                                            WhatsApp
                                        </a>
                                    </div>
                                    <!-- Sign up -->
                                    <div class="navbar-item is-nav-link">
                                        <a href="<?= base_url()?>login" class="button k-button k-primary raised has-gradient slanted">
                                            <span class="text">
                                            <?php if($email == null || $email == ''){
                                                echo '<i class="far fa-user-circle"></i>Area Peserta';
                                            }else{
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
                                <a href="<?= base_url()?>" class="navbar-item">
                                <img class="rotating" src="<?= base_url()?>assets/app/images/logo/krypton-gradient.svg" alt="">
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
                                        <a class="is-centered-responsive" href="<?= base_url()?>">Tentang</a>
                                    </div>
                                    
                                    <!-- Menu item -->
                                    <div class="navbar-item is-nav-link">
                                        <a class="is-centered-responsive" href="#" target="_blank">
                                        <i class="fab fa-whatsapp"></i>
                                            WhatsApp
                                        </a>
                                    </div>
                                    <!-- Sign up -->
                                    <div class="navbar-item is-nav-link">
                                        <a href="<?= base_url()?>login" class="button k-button k-primary raised has-gradient slanted">
                                            <span class="text">
                                            <?php if($email == null || $email == ''){
                                                echo '<i class="far fa-user-circle"></i>Area Peserta';
                                            }else{
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
<?php }else{?>
                      
                    <nav class="navbar is-fixed">
                        <div class="container">
                            <!-- Brand -->
                            <div class="navbar-brand">
                                <a href="<?= base_url()?>" class="navbar-item">
                                <img class="rotating" src="<?= base_url()?>assets/app/images/logo/krypton-gradient.svg" alt="">
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
                                        <a class="is-centered-responsive" href="<?= base_url()?>">Tentang</a>
                                    </div>
                                    
                                    <!-- Menu item -->
                                    <div class="navbar-item is-nav-link">
                                        <a class="is-centered-responsive" href="#" target="_blank">
                                        <i class="fab fa-whatsapp"></i>
                                            WhatsApp
                                        </a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </nav>
                    <!-- /Static navbar -->
<?php }?>
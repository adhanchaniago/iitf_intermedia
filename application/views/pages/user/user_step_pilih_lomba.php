<?php $this->load->view('component/nav') ?>
<link rel="stylesheet" href="<?= base_url() ?>assets/app/css/stepper.css" />
<div class="container">
  <div class="columns">
    <div class="column is-4">
      <?php $this->load->view('component/stepper') ?>
    </div>
    <!-- pilih lomba -->
    <div class="column is-8 containerr">
      <h1 class="title">Pilih Perlombaan</h1>
      <h2 class="subtitle">Silakan pilih perlombaan yang ingin anda ikuti.</h2>
      <?php if ($lombaterpilih != null) { ?>
        <div class="notification is-link">Lomba yang Anda pilih sebelumnya: <b><?= $lombaterpilih; ?></b></div>
      <?php } ?>
      <div id="warnings" class=""></div>
      <?php
      if ($bukti == null) { ?>
        <div class="columns">
          <!-- Feature -->
          <?php foreach ($listlomba as $u) { ?>
            <div class="column">
              <a onclick="trySelect('<?= base_url(); ?>','<?= $u['id'] ?>','<?= $id_koor ?>');">
                <div class="pilih">
                  <img src="<?= base_url() ?>assets/Guide_book/<?= $u['file_gambar'] ?>" alt="" data-aos="fade-up" data-aos-delay="300" data-aos-offset="200" data-aos-easing="ease-out-quart">
                  <h4 class="title is-6 is-tight "><?= $u['namalomba']; ?></h4>
                  <h6 class="subtitle is-6 "><br>Kategori: <?= $u['kategori']; ?></h6>
                  <h6 class="subtitle is-6 ">Rp<?= number_format($u['harga'], 0, ',', '.'); ?>,-</h6>
                </div>
              </a>
            </div>
          <?php } ?>
        </div>
      <?php } ?>
    </div>
  </div>
</div>
<footer class="footer" style="padding-bottom:3rem !important;">
  <div class="content has-text-centered">
    <div class="containerr">
      <div class="columns">
        <div class="column is-4"></div>
        <div class="columns">
          <div class="column">
            <br>
            <a href="#">
              <i class="fab fa-whatsapp" style="color:black"></i>
              <p style="color:black">WhatsApp</p>
            </a>
          </div>
          <div class="column is-4">
            <a href="#">
              <img style="width:30%;" src="<?= base_url() ?>assets/app/images/logo/logo.png" alt="">
              <p style="color:black">IITF 2019</p>
            </a>
          </div>
          <div class="column">
            <br>
            <a href="#">
              <i class="fab fa-instagram" style="color:black"></i>
              <p style="color:black">Instagram</p>
            </a>
          </div>
        </div>
        <div class="column is-4">
        </div>
      </div>
    </div>
  </div>
</footer>

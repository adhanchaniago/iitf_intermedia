<div class="steps-success column">
  <div id="step1" class="step minimized">
    <div class="step-header">
      <a href="<?= base_url('user') ?>?step=0" class="header">Step 1 : Biodata Peserta Lomba</a>
      <div class="subheader">
        Peserta Melengkapi biodata diri
      </div>
    </div>
  </div>
  <div id="step2" class="step minimized">
    <div class="step-header">
      <?php if ($step >= 1) { ?>
      <a href="<?= base_url('user') ?>?step=1" class="header">Step 2 : Pilih Perlombaan</a>
      <?php } else { ?>
      <div class="header">Step 2 : Pilih Perlombaan</div>
      <?php } ?>
      <div class="subheader">Peserta memilih Perlombaan yang akan diikuti</div>
    </div>
  </div>
  <div id="step3" class="step minimized">
    <div class="step-header">
      <?php if ($step >= 2 && $keterangan == "kelompok") { ?>
      <a href="<?= base_url('user') ?>?step=2" class="header">Step 3 : Pendaftaraan Team</a>
      <div class="subheader">Menentukan kategori lomba dan nama team</div>
      <?php } else if ($step >= 2 && $keterangan == "individu") { ?>
      <a href="<?= base_url('user') ?>?step=3" class="header">Step 3 : Pembayaran</a>
      <div class="subheader">Melakukan pembayaran dan aktivasi team</div>
      <?php } else { ?>
      <div class="header">Step 3 : Pendaftaraan Team</div>
      <div class="subheader">Menentukan kategori lomba dan nama team</div>
      <?php } ?>
    </div>
  </div>
  <div id="step4" class="step ">
    <div class="step-header">
      <?php if ($step >= 3 && $keterangan == "kelompok") { ?>
      <a href="<?= base_url('user') ?>?step=3" class="header">Step 4 : Pembayaran</a>
      <div class="subheader">Melakukan pembayaran dan aktivasi team</div>
      <?php } else if ($step >= 3 && $keterangan == "individu") { ?>
      <a href="<?= base_url('user') ?>?step=4" class="header">Step 4 : Submit File</a>
      <div class="subheader">
        Mengunggah file yang akan diperlombakan
      </div>
      <?php } else { ?>
      <div class="header">Step 4 : Pembayaran</div>
      <div class="subheader">Melakukan pembayaran dan aktivasi team</div>
      <?php } ?>
    </div>
  </div>
  <?php if($keterangan == null || $keterangan == "kelompok"){ ?>
  <div id="step5" class="step ">
    <div class="step-header">
      <?php if ($step >= 4) { ?>
      <a href="<?= base_url('user') ?>?step=4" class="header">Step 5 : Submit File</a>
      <?php } else { ?>
      <div class="header">Step 5 : Submit File</div>
      <?php } ?>
      <div class="subheader">
        Mengunggah file yang akan diperlombakan
      </div>
    </div>
  </div>
    <?php }else if($keterangan == "individu"){} ?>
</div>
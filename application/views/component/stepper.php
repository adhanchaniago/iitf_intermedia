<div class="steps-success column">
  <div id="step1" class="step minimized">
    <div class="step-header">
      <a href="<?= base_url('user') ?>?step=0" class="header">Step 1 : Biodata Peserta Lomba</a>
      <div class="subheader">
        Melengkapi biodata diri
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
      <div class="subheader">Memilih Perlombaan</div>
    </div>
  </div>
  <div id="step3" class="step minimized">
    <div class="step-header">
      <?php if ($step >= 2 && $keterangan == "kelompok") { ?>
        <a href="<?= base_url('user') ?>?step=2" class="header">Step 3 : Pendaftaraan Team</a>
        <div class="subheader">Mengisi detail team</div>
      <?php } else if ($step >= 2 && $keterangan == "individu") { ?>
        <a href="<?= base_url('user') ?>?step=3" class="header">Step 3 : Pembayaran</a>
        <div class="subheader">Upload Bukti Pembayaran dan aktivasi pendaftaran</div>
      <?php } else { ?>
        <div class="header">Step 3 : Pendaftaraan Team</div>
        <div class="subheader">Mengisi detail team</div>
      <?php } ?>
    </div>
  </div>
  <div id="step4" class="step ">
    <div class="step-header">
      <?php if ($step >= 3 && $keterangan == "kelompok" && $pre_regis == "false") { ?>
        <a href="<?= base_url('user') ?>?step=3" class="header">Step 4 : Pembayaran</a>
        <div class="subheader">Pembayaran dan aktivasi pendaftaran</div>
      <?php } else if ($step >= 3 && $keterangan == "kelompok" && $pre_regis == "true") { ?>
        <a href="<?= base_url('user') ?>?step=4" class="header">Step 4 : Submit File</a>
        <div class="subheader">
          Mengunggah file keperluan lomba
        </div>
      <?php } else if ($step >= 3 && $keterangan == "individu" && $status == "active") { ?>
        <a href="<?= base_url('user') ?>?step=4" class="header">Step 4 : Submit File</a>
        <div class="subheader">
          Mengunggah file keperluan lomba
        </div>
      <?php } else if ($step < 3 && $keterangan == "individu" && $status == "unactive") { ?>
        <div class="header">Step 4 : Submit File</div>
        <div class="subheader">Mengunggah file keperluan lomba</div>
      <?php } else if ($step < 3 && $pre_regis == "false") { ?>
        <div class="header">Step 4 : Pembayaran</div>
        <div class="subheader">Pembayaran dan aktivasi pendaftaran</div>
      <?php } else { ?>
        <div class="header">Step 4 : Submit File</div>
        <div class="subheader">Mengunggah file keperluan lomba</div>
      <?php } ?>
    </div>
  </div>
  <?php if ($keterangan == null || $keterangan == "kelompok" && $pre_regis == "false") { ?>
    <div id="step5" class="step ">
      <div class="step-header">
        <?php if ($step >= 4 && $status == "active") { ?>
          <a href="<?= base_url('user') ?>?step=4" class="header">Step 5 : Submit File</a>
        <?php } else { ?>
          <div class="header">Step 5 : Submit File</div>
        <?php } ?>
        <div class="subheader">
          Mengunggah file keperluan lomba
        </div>
      </div>
    </div>
  <?php } else if ($keterangan == "individu") { } ?>
</div>
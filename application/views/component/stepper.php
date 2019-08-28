<div class="steps column">
        <div class="step minimized">
          <div class="step-header">
            <a href="<?= base_url('user') ?>?step=0" class="header">Step 1 : Pendaftaraan Koordinator Team</a>
            <div class="subheader">
              Melengkapi biodata diri koordinator team
            </div>
          </div>
        </div>
        <div class="step <?= ($step >= 1 ? 'minimized': ''); ?>">
          <div class="step-header">
            <?php if ($step >= 1) { ?>
              <a href="<?= base_url('user') ?>?step=1" class="header">Step 2 : Pilih Kategori Lomba</a>
            <?php } else { ?>
              <div class="header">Step 2 : Pilih Kategori Lomba</div>
            <?php } ?>
            <div class="subheader">Melengkapi biodata diri anggota team</div>
          </div>
        </div>
        <div class="step <?= ($step >= 2 ? 'minimized': ''); ?>">
          <div class="step-header">
            <?php if ($step >= 2) { ?>
              <a href="<?= base_url('user') ?>?step=2" class="header">Step 3 : Pendaftaraan Team</a>
            <?php } else { ?>
              <div class="header">Step 3 : Pendaftaraan Team</div>
            <?php } ?>
            <div class="subheader">Menentukan kategori lomba dan nama team</div>
          </div>
        </div>
        <div class="step <?= ($step >= 3 ? 'minimized': ''); ?>">
          <div class="step-header">
            <?php if ($step >= 3) { ?>
              <a href="<?= base_url('user') ?>?step=3" class="header">Step 4 : Pembayaran</a>
            <?php } else { ?>
              <div class="header">Step 4 : Pembayaran</div>
            <?php } ?>
            <div class="subheader">Melakukan pembayaran dan aktivasi team</div>
          </div>
        </div>
        <div class="step <?= ($step >= 4 ? 'minimized': ''); ?>">
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
      </div>
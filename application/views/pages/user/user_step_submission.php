<?php $this->load->view('component/nav') ?>
<link rel="stylesheet" href="<?= base_url() ?>assets/app/css/stepper.css" />
<div class="container">
  <div class="columns">
    <div class="column is-4">
      <?php $this->load->view('component/stepper') ?>
    </div>
    <!-- pilih lomba -->
    <div class="column is-8 containerr">
      <h1 class="title">Submission</h1>
      <h2 class="subtitle">Silahkan upload file yang diperlukan sesuai dengan keterangan Guide Book perlombaan, disatukan dalam satu file dengan ekstensi *.zip dan upload surat pernyataan dengan ekstensi PDF.</h2>
      <?php if (($submit->lampiran_file != "") || ($submit->lampiran_surat != "")) { ?>
        <div class="notification is-link">Selamat, Anda telah berhasil terdaftar sebagai peserta lomba IITF 2019!<br>Untuk langsung membuka dashboard peserta lomba, <a href="<?= base_url('user/dashboard'); ?>" class="button is-success">Klik disini</a></div>
      <?php } ?>
      <div id="warnings" class=""></div>
      <form action="javascript:submission('<?= base_url(); ?>');" method="POST" enctype="multipart/form-data">
        <?php if($lomba->lampiran == "true"){ ?>
        <div class="field">
          <label class="label">File Perlombaan (ekstensi diterima: ZIP, RAR; Batas Maksimum: 10 MB)</label>
          <div class="control">
            <div class="file is-info has-name">
              <label class="file-label">
                <input class="file-input" type="file" name="perlombaan" id="perlombaan" />
                <span class="file-cta">
                  <span class="file-icon">
                    <i class="fas fa-upload"></i>
                  </span>
                  <span class="file-label">
                    Pilih Berkas
                  </span>
                </span>
                <span class="file-name" id="filename1">
                  <?= $submit->lampiran_file; ?>
                </span>
              </label>
            </div>
          </div>
        </div>
        <?php } ?>
        <div class="field">
          <label class="label">Surat Pernyataan Keaslian Produk (ekstensi diterima: PDF; Batas maksimum: 2 MB)</label>
          <div class="control">
            <div class="file is-info has-name">
              <label class="file-label">
                <input class="file-input" type="file" name="surat" id="surat" />
                <span class="file-cta">
                  <span class="file-icon">
                    <i class="fas fa-upload"></i>
                  </span>
                  <span class="file-label">
                    Pilih Dokumen
                  </span>
                </span>
                <span class="file-name" id="filename2">
                  <?= $submit->lampiran_surat; ?>
                </span>
              </label>
            </div>
          </div>
        </div>
        <div id="progress"></div>
        <div class="field is-grouped">
          <div class="control">
            <input onclick="submission('<?= base_url(); ?>');" type="submit" name="kirim" value="Simpan" class="button is-link">
          </div>
        </div>
      </form>
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

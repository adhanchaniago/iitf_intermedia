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
      <?php if (($submit->lampiran_file != "") && ($submit->lampiran_surat != "")) { ?>
      <div class="notification is-info">Selamat, Anda telah berhasil terdaftar sebagai peserta lomba IITF 2019!</div>
      <?php } ?>
      <div id="warnings" class=""></div>
      <form action="javascript:submission('<?= base_url(); ?>');" method="POST" enctype="multipart/form-data">
        <div class="field">
          <label class="label">File Perlombaan (ekstensi diterima: ZIP, RAR; Batas Maksimum: 50 MB)</label>
          <div class="control">
            <div class="file is-info has-name">
              <label class="file-label">
                <input class="file-input" type="file" name="perlombaan" id="perlombaan"/>
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
        <div class="field">
          <label class="label">Surat Pernyataan Keaslian Produk (ekstensi diterima: PDF; Batas maksimum: 10 MB)</label>
          <div class="control">
            <div class="file is-info has-name">
              <label class="file-label">
                <input class="file-input" type="file" name="surat" id="surat"/>
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

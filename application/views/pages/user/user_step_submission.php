<?php $this->load->view('component/nav') ?>
<link rel="stylesheet" href="<?= base_url() ?>assets/app/css/stepper.css" />
<div class="container">
  <div class="columns">
    <div class="column is-4">
      <?php $this->load->view('component/stepper') ?>
    </div>
    <!-- pilih lomba -->
    <div class="column is-6 containerr">
      <h1 class="title">Submission</h1>
      <h2 class="subtitle">Silahkan upload file yang diperlukan sesuai dengan keterangan Guide Book perlombaan, disatukan dalam satu file dengan ekstensi *.zip dan upload surat pernyataan dengan ekstensi PDF.</h2>
      <form action="<?= base_url() ?>user/submission" method="POST" enctype="multipart/form-data">
        <div class="field">
          <label class="label">File Perlombaan (ekstensi diterima: ZIP)</label>
          <div class="control">
            <div class="file is-info has-name">
              <label class="file-label">
                <input class="file-input" type="file" name="perlombaan" />
                <span class="file-cta">
                  <span class="file-icon">
                    <i class="fas fa-upload"></i>
                  </span>
                  <span class="file-label">
                    Pilih Berkas
                  </span>
                </span>
                <span class="file-name">
                  Pilih Berkas Terlebih dahulu
                </span>
              </label>
            </div>
          </div>
        </div>
        <div class="field">
          <label class="label">Surat Pernyataan (ekstensi diterima: PDF)</label>
          <div class="control">
            <div class="file is-info has-name">
              <label class="file-label">
                <input class="file-input" type="file" name="surat" />
                <span class="file-cta">
                  <span class="file-icon">
                    <i class="fas fa-upload"></i>
                  </span>
                  <span class="file-label">
                    Pilih Berkas
                  </span>
                </span>
                <span class="file-name">
                  Pilih Berkas Terlebih dahulu
                </span>
              </label>
            </div>
          </div>
        </div>
        <div class="field is-grouped">
          <div class="control">
            <input type="submit" name="kirim" value="Simpan" class="button is-link">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

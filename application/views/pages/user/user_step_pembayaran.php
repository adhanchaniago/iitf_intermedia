<?php $this->load->view('component/nav') ?>
<link rel="stylesheet" href="<?= base_url() ?>assets/app/css/stepper.css" />
<div class="container">
  <div class="columns">
    <div class="column is-4">
      <?php $this->load->view('component/stepper') ?>
    </div>
    <!-- pilih lomba -->
    <div class="column is-8 containerr">
      <h1 class="title">Pembayaran</h1>
      <h2 class="subtitle">Silakan lakukan pembayaran sesuai dengan data di bawah ini, lalu unggahkan bukti transfernya disini. Untuk pembayaran dapat transfer melalui rekening <b>BRI</b> a/n <b>Rahmat Hidayat Fitrianto</b> 0xxxxxxxxx sebesar <b>Rp<?= number_format($lomba->harga)?></b></h2>
      <div class="field">
        <form action="<?= base_url() ?>user/bayar" method="POST" enctype="multipart/form-data">
          <div class="field is-grouped">
            <div class="file is-boxed is-success has-name">
              <label class="file-label">
                <input class="file-input" type="file" name="bukti" />
                <span class="file-cta">
                  <span class="file-icon">
                    <i class="fas fa-upload"></i>
                  </span>
                  <span class="file-label">
                    Upload Foto
                  </span>
                </span>
                <span class="file-name">
                  Nama File
                </span>
              </label>
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
</div>

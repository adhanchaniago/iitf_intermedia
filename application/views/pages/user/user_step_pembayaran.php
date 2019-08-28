<?php $this->load->view('component/nav')?>
<link rel="stylesheet" href="<?= base_url()?>assets/app/css/stepper.css" />
<div class="container">
  <div class="columns">
    <div class="column is-4">
      <?php $this->load->view('component/stepper')?>
    </div>
    <!-- pilih lomba -->
    <div class="column is-8">
    <h1 class="title">Pembayaran</h1>
    <h2 class="subtitle">Silakan lakukan pembayaran sesuai dengan data di bawah ini, lalu unggahkan bukti transfernya disini.</h2>
      <div class="field">
        <div class="file is-centered is-boxed is-success has-name">
          <label class="file-label">
            <input class="file-input" type="file" name="resume" />
            <span class="file-cta">
              <span class="file-icon">
                <i class="fas fa-upload"></i>
              </span>
              <span class="file-label">
                Upload Foto
              </span>
            </span>
            <span class="file-name">
              Screen Shot 2017-07-29 at 15.54.25.png
            </span>
          </label>
        </div>
      </div>
    </div>
  </div>
</div>

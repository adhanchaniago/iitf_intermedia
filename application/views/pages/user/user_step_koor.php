<?php $this->load->view('component/nav')?>
<link rel="stylesheet" href="<?= base_url()?>assets/app/css/stepper.css" />
<div class="container">
  <div class="columns">
    <div class="column is-4">
      <?php $this->load->view('component/stepper')?>
    </div>

    <!-- START INPUT DATA  -->
    <!-- Nama -->
    <div class="column is-6">
      <div class="field">
        <label class="label">Nama Lengkap</label>
        <div class="control">
          <input
            name="nama"
            class="input"
            type="text"
            placeholder="tukiem"
            value="<?= $nama ?>"
          />
        </div>
      </div>
      <!-- No wa/hp -->
      <div class="field">
        <label class="label">No Telpon/WA</label>
        <div class="control has-icons-left has-icons-right">
          <input
            name="no_hp"
            class="input is-success"
            type="text"
            placeholder="contoh : 08xxxx"
            value="<?= $nohp ?>"
          />
          <span class="icon is-small is-left">
            <i class="fas fa-user"></i>
          </span>
          <span class="icon is-small is-right">
            <i class="fas fa-check"></i>
          </span>
        </div>
        <p class="help is-success">Kalo sukses</p>
      </div>
      <!-- Email -->

      <div class="field">
        <label class="label">Email</label>
        <div class="control has-icons-left has-icons-right">
          <input
            name="email"
            class="input is-danger"
            type="email"
            placeholder="contoh@contoh.com"
            value="<?= $email ?>"
          />
          <span class="icon is-small is-left">
            <i class="fas fa-envelope"></i>
          </span>
          <span class="icon is-small is-right">
            <i class="fas fa-exclamation-triangle"></i>
          </span>
        </div>
        <p class="help is-danger">This email is invalid</p>
      </div>

      <!-- Instansi -->
      <div class="field">
        <label class="label">Asal Instansi</label>
        <div class="control has-icons-left has-icons-right">
          <input
            name="instansi"
            class="input is-success"
            type="text"
            placeholder="mis : amikom"
            value="<?= $inst ?>"
          />
          <span class="icon is-small is-left">
            <i class="fas fa-home"></i>
          </span>
          <span class="icon is-small is-right">
            <i class="fas fa-check"></i>
          </span>
        </div>
        <p class="help is-success">This username is available</p>
      </div>
      <!-- foto koor -->
      <div class="field">
        <label class="label">Foto Koor</label>
        <div class="control">
          <div class="file is-info has-name">
            <label class="file-label">
              <input class="file-input" type="file" name="resume" />
              <span class="file-cta">
                <span class="file-icon">
                  <i class="fas fa-upload"></i>
                </span>
                <span class="file-label">
                  Pilih Berkas
                </span>
              </span>
              <span class="file-name">
                Screen Shot 2017-07-29 at 15.54.25.png
              </span>
            </label>
          </div>
        </div>
      </div>
      <!--GROUP UPLOAD SURAT PERNYATAAAN-->
      <div class="field is-grouped">
        <div class="control">
          <button class="button is-link">Submit</button>
        </div>
        <div class="control">
          <button class="button is-text">Cancel</button>
        </div>
      </div>

      <!--GROUP SUBMIT BUTTON-->
    </div>
  </div>

  <!-- modal -->
  <div id="modal" class="modal is-active">
    <div class="modal-background"></div>
    <div class="modal-content">
      <!-- Any other Bulma elements you want -->
      <div class="card">
        <div class="card-content">
          <div class="media">
            <div class="media-content">
              <p class="title is-4">
                Hallo,
                <?php // $nama ?>
              </p>
              <p class="subtitle is-6"><?php //$email ?></p>
            </div>
          </div>

          <div class="content">
            Akun kamu sudah terdaftar di IITF, tetapi belum terdaftar sebagai
            peserta. Untuk itu, kamu perlu mengisi bebrapa data yang diperlukan.
            Ikuti langkah-langkah berikut ini untuk mendaftarkan diri sebagai
            peserta
            <a href="#">#panduan pendaftaran</a>
            <br />
            <button
              id="btn-mengerti"
              class="button k-button k-primary raised has-gradient slanted"
            >
              <span class="text">
                Saya Mengerti dan Lanjutkan
              </span>
              <span class="front-gradient"></span>
            </button>
            <br />
            <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
          </div>
        </div>
      </div>
    </div>
    <!-- <button class="modal-close is-large" aria-label="close"></button> -->
  </div>
</div>

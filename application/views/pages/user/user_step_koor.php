<?php $this->load->view('component/nav')?>
<link rel="stylesheet" href="<?= base_url()?>assets/app/css/stepper.css" />
<div class="container">
  <div class="columns">
    <div class="column is-4">
      <?php $this->load->view('component/stepper')?>
    </div>  
    <!-- Nama -->
    <div class="column is-8 containerr">
      <h1 class="title">Biodata Peserta Lomba</h1>
      <h2 class="subtitle">Lengkapilah kolom biodata di bawah ini.</h2>
      <!-- START INPUT DATA  -->
      <form action="javascript:trySave('<?= base_url(); ?>',0);" method="POST">
      <div id="warnings" class=""></div>
      <div class="field">
        <label class="label">Nama Lengkap</label>
        <div class="control has-icons-left">
          <input
            id="nama"
            name="nama"
            class="input <?= (form_error('nama') == "" ? "" : "is-danger"); ?>"
            type="text"
            placeholder="Isi nama lengkap Anda disini"
            value="<?= $nama ?>"
          />
          <span class="icon is-small is-left">
            <i class="fas fa-user"></i>
          </span>
        </div>
        <p class="help is-danger"><?= form_error('nama'); ?></p>
      </div>
      <!-- No wa/hp -->
      <div class="field">
        <label class="label">No Telpon/WA</label>
        <div class="control has-icons-left has-icons-right">
          <input
            id="no_hp"
            name="no_hp"
            class="input"
            type="text"
            placeholder="contoh : 08xxxx"
            value="<?= $nohp ?>"
          />
          <span class="icon is-small is-left">
            <i class="fas fa-phone"></i>
          </span>
        </div>
        <p class="help is-danger"><?= form_error('no_hp'); ?></p>
      </div>
      <!-- Email -->

      <div class="field">
        <label class="label">Email</label>
        <div class="control has-icons-left has-icons-right">
          <input
            id="email"
            disabled
            name="email"
            class="input"
            type="email"
            placeholder="contoh@contoh.com"
            value="<?= $emailUser ?>"
          />
          <span class="icon is-small is-left">
            <i class="fas fa-envelope"></i>
          </span>
        </div>
        <p class="help is-danger"><?= form_error('email'); ?></p>
      </div>

      <!-- Instansi -->
      <div class="field">
        <label class="label">Asal Instansi</label>
        <div class="control has-icons-left has-icons-right">
          <input
            id="instansi"
            name="instansi"
            class="input"
            type="text"
            placeholder="mis : amikom"
            value="<?= $inst ?>"
          />
          <span class="icon is-small is-left">
            <i class="fas fa-home"></i>
          </span>
        </div>
        <p class="help is-danger"><?= form_error('instansi'); ?></p>
      </div>

      <!-- foto koor -->
      <div class="field">
        <label class="label">Kartu Identitas (KTP/SIM/Kartu Pelajar) (ekstensi diterima: PDF, DOC, DOCX; Batas maksimum: 2 MB)</label>
        <div class="control">
          <div class="file is-info has-name">
            <label class="file-label">
              <input class="file-input" type="file" name="resume" id="resume" />
              <span class="file-cta">
                <span class="file-icon">
                  <i class="fas fa-upload"></i>
                </span>
                <span class="file-label">
                  Pilih Berkas
                </span>
              </span>
              <span class="file-name" id="filename">
                <?= $lampiran; ?>
              </span>
            </label>
          </div>
        </div>
      </div>
      <div id="progress"></div>
      <!--GROUP UPLOAD SURAT PERNYATAAAN-->
      <div class="field is-grouped">
        <div class="control">
          <button id="simpan" class="button is-link" onclick="trySaveKoor('<?= base_url(); ?>');">Simpan</button>
        </div>
      </div>

      <!--GROUP SUBMIT BUTTON-->
      </form>
    </div>
    
  </div>

  <?php if ($step == 0) { ?>
  <!-- modal -->
  <div id="modal" class="modal is-active">
    <div class="modal-background"></div>
    <div class="modal-content">
      <!-- Any other Bulma elements you want -->
      <div class="card">
        <div class="card-content">
          <div class="media">
            <div class="media-content">
              
            </div>
          </div>

          <div class="content">
					<p class="title is-4">
                Hallo, <?= $nama ?>!
              </p>
              <p class="subtitle is-6"><?php //$email ?></p>
            Akun kamu sudah terdaftar di IITF, tetapi belum terdaftar sebagai
            peserta. Untuk itu, kamu perlu mengisi bebrapa data yang diperlukan.
            Ikuti langkah-langkah berikut ini untuk mendaftarkan diri sebagai
            peserta
            <!-- <a href="#">#panduan pendaftaran</a> -->
            <br /><br>
            <p align="right">
            <button
              id="btn-mengerti"
              class="button k-button k-primary raised has-gradient slanted"
            >
              <span class="text">
                Saya Mengerti dan Lanjutkan
              </span>
              <span class="front-gradient"></span>
            </button>
            </p>
          </div>
        </div>
      </div>
    </div>
    <!-- <button class="modal-close is-large" aria-label="close"></button> -->
  </div>
  <?php } ?>
</div>
<footer class="footer" style="padding-bottom:3rem !important;">
  <div class="content has-text-centered">
		<div class="containerr">
		<div class="columns">
			<div class="column is-4"></div>
				<div class="columns">
					<div class="column">
						<br>
						<a href="#" >
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

<style type="text/css">
  :root {
    --background-color: #ffffff;
    --primary-color: #e66a53;
  }

  * {
    box-sizing: border-box;
  }

  body {
    /* margin: 0;
    height: 100%;
    width: 100vw; */
    /* background-color: rgba(0, 0, 0, 0.08);
    font-family: Arial; */
    /* display: flex; */
  }

  .steps {
    /* width: auto; */
    /* box-shadow: 0px 10px 15px -5px rgba(0, 0, 0, 0.3); */
    background-color: #fff;
    padding: 24px 0;
    position: relative;
    margin: auto;
  }

  .steps::before {
    content: "";
    position: absolute;
    top: 0;
    height: 24px;
    width: 1px;
    background-color: rgba(0, 0, 0, 0.2);
    left: calc(50px / 2);
    z-index: 1;
  }

  .steps::after {
    content: "";
    position: absolute;
    height: 13px;
    width: 13px;
    background-color: var(--primary-color);
    /* box-shadow: 0px 0px 5px 0px var(--primary-color); */
    border-radius: 15px;
    left: calc(50px / 2);
    bottom: 24px;
    transform: translateX(-45%);
    z-index: 2;
  }

  .step {
    padding: 0 20px 24px 50px;
    position: relative;
    transition: all 0.4s ease-in-out;
    background-color: #fff;
  }

  .step::before {
    content: "";
    position: absolute;
    height: 13px;
    width: 13px;
    background-color: rgb(198, 198, 198);
    border-radius: 15px;
    left: calc(50px / 2);
    transform: translateX(-45%);
    z-index: 2;
  }

  .step::after {
    content: "";
    position: absolute;
    height: 100%;
    width: 1px;
    background-color: rgb(198, 198, 198);
    left: calc(50px / 2);
    top: 0;
    z-index: 1;
  }

  .step.minimized {
    background-color: #fff;
    transition: background-color 0.3s ease-in-out;
    cursor: pointer;
  }

  .header {
    user-select: none;
    font-size: 16px;
    color: rgba(0, 0, 0, 0.6);
  }

  .subheader {
    user-select: none;
    font-size: 14px;
    color: rgba(0, 0, 0, 0.4);
  }

  .step-content {
    transition: all 0.3s ease-in-out;
    overflow: hidden;
    position: relative;
  }

  .step.minimized > .step-content {
    height: 0px;
  }

  .step-content.one {
    height: 460px;
    width: 100%;
    background-color: rgba(0, 0, 0, 0.05);
    border-radius: 4px;
    margin-top: 10px;
  }

  .step-content.two {
    height: 600px;
    width: 100%;
    background-color: rgba(0, 0, 0, 0.05);
    border-radius: 4px;
    margin-top: 10px;
  }

  .step-content.three {
    height: 400px;
    width: 100%;
    background-color: rgba(0, 0, 0, 0.05);
    border-radius: 4px;
    margin-top: 10px;
  }

  .next-btn {
    position: absolute;
    top: 50%;
    left: 50%;
    border: 0;
    padding: 10px 20px;
    border-radius: 4px;
    background-color: red;
    box-shadow: 0 5px 10px -3px rgba(0, 0, 0, 0.3);
    color: #fff;
    transition: background-color 0.3s ease-in-out;
    cursor: pointer;
    transform: translate(-50%, -50%);
  }

  .close-btn {
    position: absolute;
    top: 50%;
    left: 50%;
    border: 0;
    padding: 10px 20px;
    border-radius: 4px;
    background-color: rgb(255, 0, 255);
    box-shadow: 0 5px 10px -3px rgba(0, 0, 0, 0.3);
    color: #fff;
    transition: background-color 0.3s ease-in-out;
    cursor: pointer;
    transform: translate(-50%, -50%);
  }

  /* Irrelevant styling things */
  .close-btn:hover {
    background-color: rgba(255, 0, 255, 0.6);
  }

  .close-btn:focus {
    outline: 0;
  }

  .next-btn:hover {
    background-color: rgba(255, 0, 0, 0.6);
  }

  .next-btn:focus {
    outline: 0;
  }

  .step.minimized:hover {
    background-color: rgba(0, 0, 0, 0.06);
  }

  /*
  */
  

</style>

<?php $this->load->view('component/nav')?>

<div class="container">
  <div class="columns">

  <div class="column is-4">
      <div class="steps column">
        <div class="step column">
          <div class="step-header">
            <div class="header">Step 1 : Pendaftaraan Koor Team</div>
            <div class="subheader">melengkapi biodata diri koordinator team</div>
          </div>
        </div>
        <div class="step minimized">
            <div class="step-header">
              <div class="header">Step 2 : Pilih kategori Lomba</div>
              <div class="subheader">melengkapi biodata diri anggota team</div>
            </div>
          </div>
        <div class="step minimized">
          <div class="step-header">
            <div class="header">Step 3 : Pendaftaraan Team</div>
            <div class="subheader">menentukan kategori lomba dan nama team</div>
          </div>
        </div>
        <div class="step minimized">
          <div class="step-header">
            <div class="header">Step 4 : Pembayaran </div>
            <div class="subheader">melakukan pembayaran dan aktifasi team</div>
          </div>
        </div>
        <div class="step minimized">
          <div class="step-header">
            <div class="header">Step 5 : Submisi File</div>
            <div class="subheader">mengunggah file yang ingin diperlombakan</div>
          </div>
        </div>
      </div>
    </div>

<!-- START INPUT DATA  -->
<div class="column is-6">
  <div class="container">
    <div class="column">
        <div class="lomba">
            <div class="lomba-box box-lomba">
              ha
            </div>
          </div>
    </div>
  </div>
      <div class="field">
        <div class="control">
          <input
            name="nama"
            class="input is-primary"
            type="text"
            placeholder="Nama Lengkap"
          />
        </div>
      </div>
      <div class="field">
        <div class="control">
          <input 
          name="email"
          class="input is-info" 
          type="text" 
          placeholder="Email" />
        </div>
      </div>
      <div class="field">
        <div class="control">
          <input
            name="no_hp"
            class="input is-success"
            type="text"
            placeholder="No. HP"
          />
        </div>
      </div>
      <div class="field">
        <div class="control">
          <input
            name="institusi"
            class="input is-warning"
            type="text"
            placeholder="Asal Sekolah / Institusi"
          />
        </div>
      </div>

      <!--GROUP UPLOAD SURAT PERNYATAAAN-->
      <div class="field">
        <div class="file is-info has-name">
          <label class="file-label">
          <input class="file-input" type="file" name="resume">
          <span class="file-cta">
            <span class="file-icon">
              <i class="fas fa-upload"></i>
            </span>
            <span class="file-label">
              Info file…
            </span>
          </span>
          <span class="file-name">
            Screen Shot 2017-07-29 at 15.54.25.png
          </span>
          </label>
        </div>
      </div>

      <!--GROUP SUBMIT BUTTON-->
      <div class="field is-grouped">
        <div class="control">
          <button class="button is-link">Simpan</button>
        </div>

        <div class="control">
          <button class="button is-text">Cancel</button>
        </diSv>
      </div>

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
        <p class="title is-4">Hallo ! John Smith</p>
        <p class="subtitle is-6">@johnsmith</p>
      </div>
    </div>

    <div class="content">
      Akun kamu sudah terdaftar di iitf tetapi belum terdaftar sebagai peserta. Untuk itu kamu perlu mengisi bebrapa data yang diperlukan  ikuti langkah-langkah berikut ini untuk mendaftarkan diri sebagai peserta 
      <a href="#">#panduan pendaftaran</a> 
      <br>
      <button id="btn-mengerti" class="button k-button k-primary raised has-gradient slanted">
          <span class="text">
            Saya Mengerti dan lanjutkan
          </span>
          <span class="front-gradient"></span>
      </button>
      <br>
      <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
    </div>
  </div>
</div>
  </div>
  <button class="modal-close is-large" aria-label="close"></button>
</div>
</div>


  
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
      <h2 class="subtitle">Silakan lakukan pembayaran sesuai dengan data di bawah ini, lalu unggahkan bukti transfernya disini.</b></h2>
      <div id="warning" class=""></div>
      <table class="table is-stripped">
        <tr>
          <th colspan="2">Rincian Pembayaran</th>
        </tr>
        <tr>
          <td>ID Daftar</td>
          <td><?= $pendaftaran->id ?></td>
        </tr>
        <?php if ($pendaftaran->jumlah_anggota > 0) {?>
          <tr>
            <td>Nama Team</td>
            <td><?= $pendaftaran->nama_team; ?></td>
          </tr>
        <?php } ?>
        <tr>
          <td>Tanggal Daftar</td>
          <td><?= date("d/m/Y", strtotime($pendaftaran->tanggal_daftar)) ?></td>
        </tr>
        <tr>
          <td>Kategori Lomba</td>
          <td><?= $pendaftaran->namalomba; ?></td>
        </tr>
        <tr>
          <td>Biaya Pendaftaran</td>
          <td>Rp<?= number_format($lomba->harga, 0, ",", ".")?>,-</td>
        </tr>
      </table>
      <table class="table is-bordered">
          <tr>
            <td colspan="2">Transfer ke:</td>
          </tr>
          <tr>
            <th>Nama Bank</th>
            <td>002 - Bank Rakyat Indonesia (BRI)</td>
          </tr>
          <tr>
            <th>Atas Nama Rekening</th>
            <td>Rahmat Hidayat Fitrianto</td>
          </tr>
          <tr>
            <th>Nomor Rekening Tujuan</th>
            <td>0077 - 01 - 100172 - 50 - 8</td>
          </tr>
      </table>

      <div id="progress"></div>

      <div class="field">
        <label class="label">Bukti Transfer (ekstensi diterima: JPG, JPEG, PNG; Batas maksimum: 10 MB)</label>
        <form action="javascript:trySaveBayar('<?= base_url(); ?>');" method="POST" enctype="multipart/form-data">
          <div class="field is-grouped">
            <div class="file is-boxed is-success has-name">
              <label class="file-label">
                <input class="file-input" type="file" name="bukti" id="bukti"/>
                <span class="file-cta">
                  <span class="file-icon">
                    <i class="fas fa-upload"></i>
                  </span>
                  <span class="file-label">
                    Upload Foto
                  </span>
                </span>
                <span id="filename" class="file-name">
                  <?= ($pendaftaran->bukti_bayar == "" ? "Pilih berkas foto terlebih dahulu" : $pendaftaran->bukti_bayar); ?>
                </span>
              </label>
            </div>
          </div>
          <div class="field is-grouped">
            <div class="control">
              <input onclick="trySaveBayar('<?= base_url(); ?>');" type="submit" id="simpan" name="kirim" value="Simpan" class="button is-link">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

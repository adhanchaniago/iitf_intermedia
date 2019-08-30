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
      
      <table class="table is-stripped">
        <tr>
          <th colspan="2">Rincian Pembayaran</th>
        </tr>
        <tr>
          <td>ID Daftar</td>
          <td><?= $pendaftaran->id ?></td>
        </tr>
        <?php //if ($perlombaan->jumlah_anggota > 0) {?>
        <tr>
          <td>Nama Team/Koordinator</td>
          <td>aaa</td>
        </tr>
        <?php //} ?>
        <tr>
          <td>Tanggal Daftar</td>
          <td>aaa</td>
        </tr>
        <tr>
          <td>Kategori Lomba</td>
          <td>aaa</td>
        </tr>
        <tr>
          <td>Biaya Pendaftaran</td>
          <td>Rp<?= number_format($lomba->harga, 0, ",", ".")?>,-</td>
        </tr>
      </table>
      
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

<?php $this->load->view('component/nav') ?>
<section class="section main">
  <div class="container">
    <div class="columns">
      <div class="column is-4">
        <div class="card is-fullwidth">
          <header class="card-header">
          </header>
          <div class="card-content">
            <a class="card-avatar">
              <img src="<?= base_url() ?>assets/app/images/illustrations/user.png" class="card-avatar-img">
            </a>
            <div class="card-user">
              <div class="card-user-name">
                <a href="#"><?= $koor->nama ?></a>
              </div>
              <span>
                <a href="#"><span><?= $koor->email ?></span></a>
              </span>
            </div>

            <div class="card-stats">
              <!-- <ul class="card-stats-list">
                <li class="card-stats-item">
                  <a href="#" title="9.840 Tweet">
                    <span class="card-stats-key">Total Pengumuman</span>
                    <span class="card-stats-val"></span>
                  </a>
                </li>
              </ul> -->
            </div>
          </div>
        </div>
        <div class="spacer"></div>
        <div class="box trending">
          <p><span class="title is-5">Data Pendaftaran Lomba</span> </p>
          <hr>
          <div class="columns">
            <div class="column">
              <div class="columns">
                <div class="column">
                  <p>
                    Nama
                  </p>
                </div>
                <div class="column is-6">
                  : <?= $lomba->namalomba ?>
                </div>
              </div>
              <div class="columns">
                <div class="column">
                  <p>
                    Kategori
                  </p>
                </div>
                <div class="column is-6">
                  : <?= $lomba->kategori ?>
                </div>
              </div>
              <div class="columns">
                <div class="column">
                  <p>
                    Keterangan
                  </p>
                </div>
                <div class="column is-6">
                  : <?= $lomba->keterangan ?>
                </div>
              </div>
              <?php if ($lomba->keterangan == 'kelompok') { ?>
                <div class="columns">
                  <div class="column">
                    <p>
                      Nama Team
                    </p>
                  </div>
                  <div class="column is-6">
                    : <?= $pendaftaran->nama_team ?>
                  </div>
                </div>
                <div class="columns">
                  <div class="column">
                    <p>
                      Jumlah Anggota
                    </p>
                  </div>
                  <div class="column is-6">
                    : <?= count($anggota) ?>
                  </div>
                </div>
              <?php } ?>
              <div class="columns">
                <div class="column">
                  <p>
                    Status Pendaftaran
                  </p>
                </div>
                <div class="column is-6">
                  : <?php if ($lomba->status == "active") {
                      echo "<p class='tag is-success'>Aktif</p>";
                    } else {
                      echo "<p class='tag is-danger'>Tidak Aktif</p>";
                    } ?>
                </div>
              </div>
            </div>
          </div>
          <?php foreach ($anggota as $key => $val) { ?>
            <div class="columns">
              <div class="column is-3 is-marginless">
                <div class="image">
                  <img src="<?= base_url() ?>assets/app/images/illustrations/anggota.png">
                </div>
              </div>
              <div class="column is-9">
                <p>
                  <a href="#">
                    <strong><?= $val['nama'] ?></strong>
                  </a>
                </p>
                <a class="button is-primary is-small">
                  <span>
                    <?= $val['no_hp'] ?>
                  </span>
                </a>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
      <div class="column is-8">
        <?php
        // $status_pendaftaran = "true";
        if ($status_pendaftaran == "true") { ?>
          <div class="notification is-info">
            <?php if ($pendaftaran->bukti_bayar == null) { ?>
              <!-- <button class="delete" onclick="((this).parentNode.remove())"></button> -->
              Selamat anda telah lolos tahap seleksi. Silahkan Lakukan Pembayaran.
              <!-- <br><button class="button is-success" data-target="modal" data->Lakukan Pembayaran</button> -->
              <br><button class="button is-success modal-button" data-target="#myModal" aria-haspopup="true">Lakukan Pembayaran</button>
            <?php }else if($pendaftaran->status=="unactive"){ ?>
              Terima kasih sudah mengirimkan bukti pembayaran, tunggu 1 * 24 Jam untuk konfirmasi aktif dari admin. Apabila dalam rentang waktu tersebut status masih <b class="tag is-danger">tidak aktif</b> harap menghubungi Contact Person yang ada.
            <?php }else if($pendaftaran->status=="active"){ ?>
              Selamat anda lolos seleksi finalis perlombaan, dimohon untuk hadir pada tanggal 13 Oktober 2019 untuk melakukan presentasi final ditempat yang sudah ditentukan.
            <?php } ?>
            <div class="modal" id="myModal">
              <div class="modal-background"></div>
              <div class="modal-content">
                <div class="box">
                  <div id="warning" class=""></div>
                  <div class="columns is-12">
                    <div class="column is-6">
                      <table class="table is-stripped">
                        <tr>
                          <th colspan="2">Rincian Pembayaran</th>
                        </tr>
                        <tr>
                          <td>ID Daftar</td>
                          <td><?= $pendaftaran->id ?></td>
                        </tr>
                        <?php if ($pendaftaran->jumlah_anggota > 0) { ?>
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
                          <td>Rp<?= number_format($lombaI->harga, 0, ",", ".") ?>,-</td>
                        </tr>
                      </table>
                    </div>
                    <div class="column is-6">
                      <table class="table is-stripped">
                        <tr>
                          <th colspan="2">Transfer ke:</td>
                        </tr>
                        <tr>
                          <td>Nama Bank</th>
                          <td>002 - Bank Rakyat Indonesia (BRI)</td>
                        </tr>
                        <tr>
                          <td>Atas Nama</th>
                          <td>Rahmat Hidayat Fitrianto</td>
                        </tr>
                        <tr>
                          <td>Nomor Rekening</th>
                          <td>0077 - 01 - 100172 - 50 - 8</td>
                        </tr>
                        <tr>
                          <td></td>
                          <td></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <div id="progress"></div>
                  <div class="field">
                    <label class="label">Bukti Transfer (ekstensi diterima: JPG, JPEG, PNG; Batas maksimum: 1 MB)</label>
                    <form action="javascript:trySaveBayar('<?= base_url(); ?>');" method="POST" enctype="multipart/form-data">
                      <div class="field is-grouped">
                        <div class="file is-boxed is-success has-name">
                          <label class="file-label">
                            <input class="file-input" type="file" name="bukti" id="bukti" />
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
              <button class="modal-close is-large" aria-label="close"></button>
            </div>
          </div>
        <?php  } else if($status_pendaftaran == "false") { ?>
          <div class="notification is-danger">
            <!-- <button class="delete" onclick="((this).parentNode.remove())"></button> -->
            Mohon maaf anda tidak lolos tahap seleksi, Silahkan coba lagi tahun depan. Tetap Semangat!!
          </div>
        <?php } ?>
        <h3 style="margin-bottom:20px;">Pengumuman</h3>
        <div class="box">

          <?php
          if ($pengumuman != null) {
            foreach ($pengumuman as $key => $val) { ?>
              <article class="media">
                <div class="media-left">
                  <figure class="image is-64x64">
                    <img src="<?= base_url() ?>assets/app/images/illustrations/pengumuman.png" alt="Image">
                  </figure>
                </div>
                <div class="media-content">
                  <div class="content">
                    <p>
                      <strong><?= $val['judul'] ?></strong> <small>oleh @admin_iitf</small> <small style="float:right;"><?= $val['tanggal'] ?></small>
                      <br>
                      <?= $val['deskripsi'] ?>
                    </p>
                  </div>
                  <nav class="level">
                    <div class="level-left">

                    </div>
                  </nav>
                </div>
              </article>
            <?php }
            } else { ?>
            <article class="media">
              <p>Belum Ada Pengumuman</p>
            </article>
          <?php } ?>
        </div>
      </div>

      <!-- ini side kanana -->
      <div class="column is-3">

      </div>
    </div>
  </div>
</section>

<footer class="footer" style="padding-bottom:3rem !important;">
  <div class="content has-text-centered">
    <div class="container">
      <div class="columns">
        <div class="column is-4"></div>
        <div class="columns">
          <div class="column">
            <br>
            <a href="https://api.whatsapp.com/send?phone=6282326295275" target="_blank">
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
            <a href="https://www.instagram.com/iitf_intermedia/?hl=en" target="_blank">
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
<script>
  document.querySelectorAll('.modal-button').forEach(function(el) {
    el.addEventListener('click', function() {
      var target = document.querySelector(el.getAttribute('data-target'));

      target.classList.add('is-active');

      target.querySelector('.modal-close').addEventListener('click', function() {
        target.classList.remove('is-active');
      });
    });
  });
</script>
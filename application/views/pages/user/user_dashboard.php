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
              <img src="asstes/app/images/hadiah/juara_1.png" class="card-avatar-img">
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
                    Status Pendaftaran
                  </p>
                </div>
                <div class="column is-6">
                  : <?php if($lomba->status == "active"){echo "Aktif"; }else{echo "Tidak Aktif"; } ?>
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
            </div>
          </div>
          <?php foreach($anggota as $key => $val){ ?>
          <div class="columns">
            <div class="column is-3 is-marginless">
              <div class="image">
                <img src="https://placehold.it/200x200">
              </div>
            </div>
            <div class="column is-9">
              <p>
                <a href="#">
                  <strong><?=$val['nama']?></strong>
                </a>
              </p>
              <a class="button is-primary is-small">
                <span>
                  <?=$val['no_hp']?>
                </span>
              </a>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
      <div class="column is-8">
        <div class="notification is-danger">
          <button class="delete" onclick="((this).parentNode.remove())"></button>
          ini pengumuan kalo ada notif mendadak up to you dah
				</div>
				<h3 style="margin-bottom:20px;">Pengumuman</h3>
        <div class="box">
			
          <?php foreach ($pengumuman as $key => $val) { ?>
            <article class="media">
              <div class="media-left">
                <figure class="image is-64x64">
                  <img src="http://placehold.it/128x128" alt="Image">
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

<?php $this->load->view('component/nav') ?>
<link rel="stylesheet" href="<?= base_url() ?>assets/app/css/stepper.css" />
<div class="container">
  <div class="columns">
    <div class="column is-4">
      <?php $this->load->view('component/stepper') ?>
    </div>
    <!-- START INPUT DATA  -->
    <div class="column is-6 containerr">
      <h1 class="title">Pendaftaran Team</h1>
      <h2 class="subtitle">Silakan isi nama team dan tambahkan anggota team Anda disini.</h2>
      <!-- Nama team -->
      <?=$this->session->flashdata('pesan')?>
      <form action="<?= base_url() ?>user/team" method="POST" enctype="multipart/form-data">
        <div class="container">
          <div class="columns">
            <div class="column is-6">
              <div class="field">
                <label class="label">Nama Team</label>
                <div class="control">
                  <input name="nama_team" class="input" type="text" placeholder="Contoh: iWD(intermedia Web Design)" value="<?= $pendaftaran->nama_team ?>" />
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--GROUP UPLOAD SURAT PERNYATAAAN-->
        <br>
        <div class="field is-grouped">
          <div class="control">
            <a class="button is-success" id="btnTambah" onclick="setForm()">
              <span class="icon is-small">
                <i class="fas fa-plus"></i>
              </span>
              <span>Tambah anggota</span>
            </a>
          </div>
        </div>
        <div id="form"></div>
        <!-- </div> -->
        <br>
        <!--GROUP UPLOAD SURAT PERNYATAAAN-->
        <div class="field is-grouped">
          <div class="control">
            <input type="submit" name="kirim" value="Simpan" class="button is-link">
          </div>
          <!-- Tombol Batal saya hapus, little buggy... -->
        </div>
      </form>
      <!--GROUP SUBMIT BUTTON-->
      <script>
        var wadah = document.getElementById("form");
        var currentForm = 0;
        var btn = document.getElementById("btnTambah");
        if (<?=count($langgota)?> != 0) {
          if (<?= count($langgota) ?> >= <?= $anggota->jumlah_anggota ?>) {
            btn.style.visibility = "hidden";
          } else {
            btn.style.visibility = "visible";
          }
          <?php foreach ($langgota as $key => $val) { ?>
          // curform++;
          currentForm++;
          var data = '<div id="form' + currentForm + '" class="column box">' +
            '<div class="columns"><div class="column is-8"><h3>Anggota ' + currentForm + '</h3></div><div class="column is-4"><div class="control" style="float:right"><a onclick="removeForm(' + currentForm + ')" href="<?= base_url() ?>user/delAnggota/<?= $val['id'] ?>" class="button is-danger is-outlined"><span>Hapus</span><span class="icon is-small"><i class="fas fa-times"></i></span></a></div></div></div>' +
            '<div class="field">' +
            '<label class="label">Nama Lengkap</label>' +
            '<div class="control has-icons-left">' +
            '<input name="nama[]" class="input" type="text" placeholder="Masukkan nama anggota" value="<?= $val['nama'] ?>"/>' +
            '<span class="icon is-small is-left">' +
            '<i class="fas fa-user"></i>' +
            '</span>' +
            '</div>' +
            '</div>' +
            '<div class="field">' +
            '<label class="label">No Telpon/WA</label>' +
            '<div class="control has-icons-left">' +
            '<input name="no_hp[]" class="input" type="text" placeholder="contoh : 08xxxx" value="<?= $val['no_hp'] ?>"/>' +
            '<span class="icon is-small is-left">' +
            '<i class="fas fa-phone"></i>' +
            '</span>'
            // +'<span class="icon is-small is-right">'
            //   +'<i class="fas fa-check"></i>'
            // +'</span>'
            +
            '</div>'
            // +'<p class="help is-success">Kalo sukses</p>'
            +
            '</div>' +
            '<div class="field">' +
            '<label class="label">Identitas diri (ekstensi diterima: PDF, DOC, DOCX) maksimal 1 MB</label>' +
            '<div class="control">' +
            '<div class="file is-info has-name">' +
            '<label class="file-label">' +
            '<input type="hidden" name="id_anggota[]" value="<?=$val['id']?>">' +
            '<input class="file-input" type="file" name="identitas'+currentForm+'" id="identitas'+currentForm+'"/>' +
            '<span class="file-cta">' +
            '<span class="file-icon">' +
            '<i class="fas fa-upload"></i>' +
            '</span>' +
            '<span class="file-label">' +
            'Pilih Berkas' +
            '</span>' +
            '</span>' +
            '<span class="file-name" id="filename'+currentForm+'">' +
            '<?=$val['lampiran_identitas']?>' +
            '</span>' +
            '</label>' +
            '</div>' +
            '</div>' +
            '</div></div>';
          wadah.innerHTML += data;
          <?php } ?>
        }

        function setForm() {
          // alert('g');
          currentForm++;
          var data = '<div id="form' + currentForm + '" class="column box">' +
            '<div class="columns"><div class="column is-8"><h3>Anggota ' + currentForm + '</h3></div><div class="column is-4"><div class="control" style="float:right"><a onclick="removeForm(' + currentForm + ')" class="button is-danger is-outlined"><span>Hapus</span><span class="icon is-small"><i class="fas fa-times"></i></span></a></div></div></div>' +
            '<div class="field">' +
            '<label class="label">Nama Lengkap</label>' +
            '<div class="control has-icons-left">' +
            '<input name="nama[]" class="input" type="text" placeholder="Masukkan nama anggota" value=""/>' +
            '<span class="icon is-small is-left">' +
            '<i class="fas fa-user"></i>' +
            '</span>' +
            '</div>' +
            '</div>' +
            '<div class="field">' +
            '<label class="label">No Telpon/WA</label>' +
            '<div class="control has-icons-left">' +
            '<input name="no_hp[]" class="input" type="text" placeholder="contoh : 08xxxx" value=""/>' +
            '<span class="icon is-small is-left">' +
            '<i class="fas fa-phone"></i>' +
            '</span>'
            // +'<span class="icon is-small is-right">'
            //   +'<i class="fas fa-check"></i>'
            // +'</span>'
            +
            '</div>'
            // +'<p class="help is-success">Kalo sukses</p>'
            +
            '</div>' +
            '<div class="field">' +
            '<label class="label">Identitas diri (ekstensi diterima: PDF, DOC, DOCX) maksimal 1 MB</label>' +
            '<div class="control">' +
            '<div class="file is-info has-name">' +
            '<label class="file-label">' +
            '<input class="file-input" type="file" name="identitas'+currentForm+'" id="identitas'+currentForm+'" />' +
            '<span class="file-cta">' +
            '<span class="file-icon">' +
            '<i class="fas fa-upload"></i>' +
            '</span>' +
            '<span class="file-label">' +
            'Pilih Berkas' +
            '</span>' +
            '</span>' +
            '<span class="file-name" id="filename'+currentForm+'">' +
            'Pilih Dokumen Identitas' +
            '</span>' +
            '</label>' +
            '</div>' +
            '</div>' +
            '</div></div>';
          wadah.innerHTML += data;

          console.log(currentForm);
          if (currentForm >= <?= $anggota->jumlah_anggota ?>) {
            btn.style.visibility = "hidden";
          }

        }

        function removeForm(val) {
          confirm("yakin mau menghapus anggota " + val);
          currentForm--;
          var el = document.getElementById("form" + val);
          el.remove();
          if (currentForm < <?= $anggota->jumlah_anggota ?> || <?= count($langgota) ?> < currentForm) {
            btn.style.visibility = "visible";
          }
        }
      </script>
    </div>
  </div>
</div>
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

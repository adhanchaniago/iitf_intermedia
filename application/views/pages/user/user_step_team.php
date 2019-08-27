<?php $this->load->view('component/nav')?>
<link rel="stylesheet" href="<?= base_url()?>assets/app/css/stepper.css" />
<div class="container">
  <div class="columns">
    <div class="column is-4">
      <?php $this->load->view('component/stepper')?>
    </div>

    <!-- START INPUT DATA  -->
    
    <div class="column is-6">
      <!-- Nama team -->
      <div class="container">
        <div class="columns">
          <div class="column is-6">
              <div class="field">
                  <label class="label">Nama Team</label>
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
          </div>
          <!-- <div class="column is-2">
              <div class="field">
                  <label class="label">Jumlah anggota</label>
                  <div class="control">
                          <div class="select is-primary">
                            <select >
                              <option>Pilih jumlah anggota</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                            </select>
                          </div>
                  </div>
                </div>
          </div> -->
        </div>
      </div>

 
  <!--GROUP UPLOAD SURAT PERNYATAAAN-->
  <br>
  <div class="field is-grouped">
      <div class="control">
          <a class="button is-success" onclick="setForm()">
              <span class="icon is-small">
                <i class="fas fa-check"></i>
              </span>
              <span>Tambah anggota</span>
            </a>
      </div>
      
    </div>
    <div id="form">

      </div>
    <br>
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
        <script>
            var wadah = document.getElementById("form");
            var currentForm = 0;
            
            function setForm(){
               // alert('g');
              currentForm++;
                var data = '<div id="form'+currentForm+'" class="column box">'
                  +'<div class="columns"><div class="column is-8"><h3>Anggota '+currentForm+'</h3></div><div class="column is-4"><div class="control"><a onclick="removeForm('+currentForm+')" class="button is-danger is-outlined"><span>Hapus</span><span class="icon is-small"><i class="fas fa-times"></i></span></a></div></div></div>' 
                  +'<div class="field">'
                  +'<label class="label">Nama Lengkap</label>'
                  +'<div class="control">'
                  +'<input name="nama" class="input" type="text" placeholder="tukiem" value="<?= $nama ?>"/>'
                  +'</div>'
                  +'</div>'
                  +'<div class="field">'
                  +'<label class="label">No Telpon/WA</label>'
                  +'<div class="control has-icons-left has-icons-right">'
                    +'<input name="no_hp" class="input is-success" type="text" placeholder="contoh : 08xxxx" value="<?= $nohp ?>"/>'
                    +'<span class="icon is-small is-left">'
                      +'<i class="fas fa-user"></i>'
                    +'</span>'
                    +'<span class="icon is-small is-right">'
                      +'<i class="fas fa-check"></i>'
                    +'</span>'
                  +'</div>'
                  +'<p class="help is-success">Kalo sukses</p>'
                +'</div>'
                +'<div class="field">'
                  +'<label class="label">Foto Koor</label>'
                  +'<div class="control">'
                    +'<div class="file is-info has-name">'
                      +'<label class="file-label">'
                      +'<input class="file-input" type="file" name="resume" />'
                        +'<span class="file-cta">'
                          +'<span class="file-icon">'
                            +'<i class="fas fa-upload"></i>'
                          +'</span>'
                          +'<span class="file-label">'
                            +'Pilih Berkas'
                          +'</span>'
                        +'</span>'
                        +'<span class="file-name">'
                          +'Screen Shot 2017-07-29 at 15.54.25.png'
                        +'</span>'
                      +'</label>'
                    +'</div>'
                  +'</div>'
                +'</div></div>';
              wadah.innerHTML += data;
         
            } 
            function removeForm(val){
              confirm("yakin mau menghapus form anggota "+val);
              currentForm--;
              var el = document.getElementById("form"+val);
              el.remove();
            }
          </script>
      </div>
    </div>
  </div>
</div>

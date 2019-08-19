<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        IITF Admin Profile
    </title>
    <?php $this->load->view('assets/admin/stylesheet') ?>
</head>

<body class="">
    <!-- sidebar -->
    <?php $this->load->view('master/admin/sidebar') ?>
    <!-- end sidebar -->
    <div class="main-content">
        <!-- header -->
        <?php $this->load->view('master/admin/header') ?>
        <!-- end header -->
        <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
            <div class="container-fluid">
                <div class="header-body">
                    <?php echo $this->session->flashdata('pesan') ?>
                </div>
            </div>
        </div>
        <div class="container-fluid mt--7">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-12 order-xl-1">
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Profil Saya</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <h6 class="heading-small text-muted mb-4">Informasi User</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-email">Email address</label>
                                                <input type="email" id="input-email" disabled class="form-control form-control-alternative" placeholder="<?=$this->session->userdata['loginData']['email']?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <!-- Address -->
                                <h6 class="heading-small text-muted mb-4">Ubah Password</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-address">Password Lama</label>
                                                <input id="input-address" name="old_pass" class="form-control form-control-alternative" placeholder="Masukkan Password Lama" value="" type="password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-address">Password Baru</label>
                                                <input id="input-address" name="new_pass" class="form-control form-control-alternative" placeholder="Masukkan Password Baru" value="" type="password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group focused">
                                                <input type="submit" value="simpan" name="kirim" class="btn btn-primary">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view('master/admin/footer') ?>
        </div>
    </div>
</body>
<?php $this->load->view('assets/admin/javascript') ?>

</html>
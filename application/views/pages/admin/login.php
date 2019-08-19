<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        IITF Admin Login
    </title>
    <?php $this->load->view('assets/admin/stylesheet') ?>
</head>

<body class="bg-default">
    <div class="main-content">
        <!-- Header -->
        <div class="header bg-gradient-primary py-7 py-lg-8">
            <div class="container">
                <div class="header-body text-center mb-3">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-6">
                            <h1 class="text-white">Selamat Datang Admin IITF!</h1>
                            <p class="text-lead text-light">Silahkan Login untuk melanjutkan</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
        <!-- Page content -->
        <div class="container mt--8 pb-2">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="card bg-secondary shadow border-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <?php echo $this->session->flashdata('pesan') ?>
                            <form action="" method="POST" role="form">
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <input class="form-control" name="email" value="<?= set_value('email') ?>" placeholder="Email" type="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input class="form-control" name="password" placeholder="Password" type="password">
                                    </div>
                                </div>
                                <!-- <div class="custom-control custom-control-alternative custom-checkbox">
                                    <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                                    <label class="custom-control-label" for=" customCheckLogin">
                                        <span class="text-muted">Remember me</span>
                                    </label>
                                </div> -->
                                <div class="text-center">
                                    <input type="submit" class="btn btn-primary my-4" name="kirim" value="Sign In">
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- <div class="row mt-3">
                        <div class="col-6">
                            <a href="#" class="text-light"><small>Forgot password?</small></a>
                        </div>
                        <div class="col-6 text-right">
                            <a href="#" class="text-light"><small>Create new account</small></a>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <footer class="py-5">
            <div class="container">
                <div class="row align-items-center justify-content-xl-between">
                    <div class="col-xl-6">
                        <div class="copyright text-center text-xl-left text-muted">
                            © 2018 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
<?php $this->load->view('assets/admin/javascript') ?>

</html>
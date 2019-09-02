<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        IITF Admin Dashboard
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
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <h3 class="mb-0">Data User IITF</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Email Pendaftar</th>
                                        <th scope="col">Tanggal Registrasi</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no=1;
                                    foreach($user as $key => $val){ ?>
                                    <tr>
                                        <th scope="row">
                                            <?=$no++?>
                                        </th>
                                        <td>
                                            <?=$val['email']?>
                                        </td>
                                        <td>
                                            <?=$val['tanggal_reg']?>
                                        </td>
                                        <td>
                                            <?=$val['status']?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer py-4">
                            <!-- <nav aria-label="...">
                                <ul class="pagination justify-content-end mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">
                                            <i class="fas fa-angle-left"></i>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">
                                            <i class="fas fa-angle-right"></i>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav> -->
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view('master/admin/footer') ?>
        </div>
    </div>
</body>
<?php $this->load->view('assets/admin/javascript')?>
</html>
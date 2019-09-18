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
                        <a style="float:right" href="<?=base_url()?>admin/pendaftaran/export" class="btn btn-success">Export Excel</a>
                        <h3 class="mb-0">Data Pendaftar Lomba IITF</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Pendaftar</th>
                                        <th scope="col">Nama Lomba</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Bukti Bayar</th>
                                        <th scope="col">Aksi</th>
                                        <th scope="col">Status Pendaftaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($pendaftar as $key => $val) { ?>
                                        <tr>
                                            <th scope="row">
                                                <?= $no++ ?>
                                            </th>
                                            <td>
                                                <?= $val['nama_koor'] ?>
                                            </td>
                                            <td>
                                                <?= $val['nama_lomba'] ?>
                                            </td>
                                            <td>
                                                <?= $val['status'] ?>
                                            </td>
                                            <td>
                                                <?= $val['bukti_bayar'] ?>
                                            </td>
                                            <td>
                                                <?php if ($val['status'] == "active") {
                                                        echo "Terkonfirmasi";
                                                    } else { ?>
                                                    <a href="<?= base_url() ?>admin/pendaftaran/konfirmasi?id=<?= $val['id_pendaftaran'] ?>" class="btn btn-md btn-primary"></i>Konfirmasi</a>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if ($val['pre_registration'] == "true" && $val['status_pendaftaran'] == null) { ?>
                                                    <button id="ubah" class="btn btn-info" data-toggle="modal" data-target="#deleteModal" data-id="<?= $val['id_pendaftaran'] ?>">Pilih Status Pendaftaran</button>
                                                <?php }else{ ?>
                                                    <?php if($val['status_pendaftaran'] == "true"){
                                                        echo "Lolos";
                                                    }else if($val['status_pendaftaran'] == "false"){
                                                        echo "Tidak Lolos";
                                                    } ?>
                                                <?php } ?>
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
     <!-- Modal Status-->
     <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-primary" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pilih Status Pendaftaran</h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/pendaftaran/ubah_status') ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="id" value="">
                        <select name="sp" class="form-control">
                            <option value="">Silahkan Pilih</option>
                            <option value="true">Lolos</option>
                            <option value="false">Tidak Lolos</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                        <input class="btn btn-danger" type="submit" name="kirim" value="Kirim">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<?php $this->load->view('assets/admin/javascript') ?>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<script>
    $(document).on("click", "#ubah", function() {
        var id = $(this).data('id');
        $('input[name="id"]').val(id);
    });
</script>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        IITF Admin Dashboard
    </title>
    <?php $this->load->view('assets/admin/stylesheet') ?>

    <!-- JQuery DataTable Css -->
    <link href="<?php echo base_url(); ?>assets/admin/js/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
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
                        <a style="float:right" href="#" class="btn btn-primary btn-md" data-toggle="modal" data-target="#exampleModal">Tambah Peserta</a>
                        <a style="float:right" href="<?=base_url()?>admin/seminar/export" target="_blank" class="btn btn-success">Export Excel</a>
                        <h3 class="mb-0">Data Peserta Seminar UI/UX</h3>
                        </div>
                        
                        <div class="table-responsive">
                            <table id="tabel-seminar" class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Kode Daftar</th>
                                        <th scope="col">Nama Lengkap</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Nomor HP/WA</th>
                                        <th scope="col">Asal Sekolah/Institusi</th>
                                        <th scope="col">Periode</th>
                                        <th scope="col">Status Bayar</th>
                                        <th scope="col">Daftar Ulang</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no=1;
                                    foreach($pendaftar as $key => $val){ ?>
                                    <tr>
                                        <th scope="row">
                                            <?=$no++?>
                                        </th>
                                        <td>
                                            <?=$val['id_daf']?>
                                        </td>
                                        <td>
                                            <?=$val['nama']?>
                                        </td>
                                        <td>
                                            <?=$val['email']?>
                                        </td>
                                        <td>
                                            <?=$val['notelp']?>
                                        </td>
                                        <td>
                                            <?=$val['institusi']?>
                                        </td>
                                        <td>
                                            <?=strtoupper($val['htm_status'])?>
                                        </td>
                                        <td>
                                            <?php if($val['status_bayar'] == TRUE){echo "Lunas"; }else{ ?>
                                            <a href="<?=base_url()?>admin/seminar/bayar?id=<?=$val['id_daf']?>" class="btn btn-md btn-primary"></i>Bayar</a>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if($val['status_ulang'] == TRUE){echo "Hadir"; }else{ ?>
                                            <a id="daful" href="#" class="btn btn-md btn-primary" onclick="daftarulang('<?=base_url()?>', '<?=$val['id_daf']?>')"></i>Presensi</a>
                                            <?php } ?>
                                        </td>
                                        <td>
                                        <a id="delete" href="#" data-toggle="modal" data-target="#deleteModal" data-id="<?= $val['id_daf'] ?>" class="btn btn-md btn-danger"> Hapus</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer py-4">
                        </div>
                    </div>
                </div>
            </div>
            <div id="okay"></div>
            <?php $this->load->view('master/admin/footer') ?>
        </div>
    </div>
    <!-- Modal Tambah-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Peserta Seminar Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <form name="formTambah" action="javascript:tryRegisterSeminarAdmin('<?= base_url(); ?>');" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" id="n" name="nama" class="form-control" required placeholder="Nama Lengkap *">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="alamat" rows=5 placeholder="Alamat *" class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" required placeholder="Email *">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="notelp" id="no_hp" class="form-control" required placeholder="Nomor HP/WA *">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="asal" class="form-control" placeholder="Asal Sekolah/Institusi">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="checkbox">
                                    <input type="checkbox" name="anggota">
                                    Anggota Intermedia?
                                </label>
                            </div>
                            <div class="row">
                                <div class="col-md-12" id="warnings"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <input id="simpan" type="submit" class="btn btn-primary" name="Kirim" value="Simpan">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Hapus-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-danger" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Peserta</h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">�</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/seminar/delete') ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="id">
                        Apakah anda yakin menghapus data ini?
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                        <input class="btn btn-danger" type="submit" name="kirim" value="Ya!">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<?php $this->load->view('assets/admin/javascript')?>
<script src="<?php echo base_url(); ?>assets/app/js/custom.js"></script>
<!-- Jquery DataTable Plugin Js -->
<script src="<?php echo base_url(); ?>assets/admin/js/plugins/jquery-datatable/jquery.dataTables.js"></script>

<script>
$(document).ready( function() {
    $("#tabel-seminar").DataTable();
    $(document).on("click", "#delete", function() {
        var id = $(this).data('id');
        $('input[name="id"]').val(id);
    });
});
</script>
</html>
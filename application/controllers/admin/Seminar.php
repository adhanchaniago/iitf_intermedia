<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Seminar extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('DataModel');
    }

    public function index()
    {
        if ($this->IsLoggedIn()) {
            $pendaftar = $this->db->query("SELECT * FROM tb_seminar ORDER BY id_daf ASC")->result_array();
            $data = array(
                "pendaftar" => $pendaftar
            );
            $this->load->view('pages/admin/seminar',$data);
        }else{ 
            redirect('admin/home/login');
        }
    }

    public function bayar()
    {
        if ($this->IsLoggedIn()) {
            $id = $this->input->get('id');
            $this->db->update('tb_seminar', array(
                "status_bayar" => TRUE
            ), array("id_daf" => $id));
            redirect('admin/seminar','refresh');
        }else{ 
            redirect('admin/home/login');
        }
    }

    public function export()
    {
        if ($this->IsLoggedIn()) {
            $this->load->library("excel");
            $object = new PHPExcel();
            $object->setActiveSheetIndex(0);
            $table_columns = array("ID Pendaftaran", "Nama Peserta", "Email", "Alamat", "Nomor HP/WA", "Asal Sekolah/Institusi");
            $column = 0;
            foreach ($table_columns as $field) {
                $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
                $column++;
            }
            $employee_data = $this->db->query("SELECT * FROM tb_seminar WHERE status_bayar = 1")->result();
            $excel_row = 2;
            foreach ($employee_data as $row) {
                $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->id_daf);
                $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->nama);
                $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->email);
                $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->alamat);
                $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->notelp);
                $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->institusi);

                $excel_row++;
            }
            $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Daftar Peserta Seminar.xls"');
            $object_writer->save('php://output');
        } else {
            redirect('admin/home/login');
        }
    }

    public function daftarulang()
    {
        if ($this->IsLoggedIn()) {
            $id = $this->input->get('id');
            $cek_bayar = $this->db->select('id_daf, status_bayar, htm_status, tgl_daftar')
                                    ->from("tb_seminar")
                                    ->where("id_daf", $id)
                                    ->get()->row();
            
            if ($cek_bayar->status_bayar == TRUE) {
                $this->db->update('tb_seminar', array(
                    "status_ulang" => TRUE
                ), array("id_daf" => $id));
                echo "<script>location.reload();</script>";
            } else {
                $htm = strtoupper($cek_bayar->htm_status);
                $tgl = $cek_bayar->tgl_daftar;
                echo "<script>alert(\"Pendaftar dengan ID '$id' belum lunas membayar HTM!!!\\nDia daftar pada periode $htm pada $tgl\");</script>";
            }
        }else{ 
            redirect('admin/home/login');
        }
    }

    public function delete()
    {
        if($this->IsLoggedIn()){
            $id = $this->input->post('id');
            $q = $this->DataModel->delete('id_daf', $id, 'tb_seminar');
            if ($q) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable fade show" role="alert">
                                            <span class="alert-inner--icon"><i class="ni ni-bulb-61"></i></span>
                                            <span class="alert-inner--text"> Hapus Data "' . $id . '" Berhasil </span>
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            </div>');
                redirect('admin/seminar');
            }
        }else{
            redirect('admin/home/login');
        }
        
    }
}

/* End of file Seminar.php */

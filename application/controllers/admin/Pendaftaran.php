<?php

class Pendaftaran extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('DataModel');
    }

    public function index()
    {
        if ($this->IsLoggedIn()) {
            $pendaftar = $this->DataModel->select('tb_lomba.nama as nama_lomba,tb_koor.nama as nama_koor,tb_pendaftaran.status,tb_pendaftaran.bukti_bayar,tb_pendaftaran.id as id_pendaftaran,tb_lomba.pre_registration,tb_pendaftaran.status_pendaftaran');
            $pendaftar = $this->DataModel->getJoin('tb_lomba', 'tb_pendaftaran.id_lomba = tb_lomba.id', 'inner');
            $pendaftar = $this->DataModel->getJoin('tb_koor', 'tb_koor.id = tb_pendaftaran.id_koor', 'inner');
            $pendaftar = $this->DataModel->getData('tb_pendaftaran')->result_array();
            $data = array(
                "pendaftar" => $pendaftar
            );
            $this->load->view('pages/admin/pendaftaran', $data);
        } else {
            redirect('admin/home/login');
        }
    }

    public function ubah_status(){
        if($this->IsLoggedIn()){
            $id = $this->input->post('id');
            $sp = $this->input->post('sp');
            $data = array(
                "status_pendaftaran" => $sp
            );
            $this->DataModel->getWhere('id', $id);
            $this->DataModel->update('tb_pendaftaran', $data);
            redirect('admin/pendaftaran');
        }else{
            redirect('admin/home/login');
        }
    }

    public function konfirmasi()
    {
        if ($this->IsLoggedIn()) {
            $id = $this->input->get('id');
            $data = array(
                "status" => 'active'
            );
            $this->DataModel->getWhere('id', $id);
            $this->DataModel->update('tb_pendaftaran', $data);

            $p = $this->DataModel->getWhere('id', $id);
            $p = $this->DataModel->getData('tb_pendaftaran')->row();

            $step = $this->DataModel->select('tb_user.id');
            $step = $this->DataModel->getWhere('tb_koor.id', $p->id_koor);
            $step = $this->DataModel->getJoin('tb_user', 'tb_user.id = tb_koor.id_user', 'inner');
            $step = $this->DataModel->getData('tb_koor')->row();
            // die(json_encode($step));

            $data = array(
                "step_selesai" => "4"
            );

            $this->DataModel->getWhere('id', $step->id);
            $this->DataModel->update('tb_user', $data);

            redirect('admin/pendaftaran');
        } else {
            redirect('admin/home/login');
        }
    }

    public function export()
    {
        if ($this->IsLoggedIn()) {
            $pendaftar = $this->DataModel->select('tb_lomba.nama as nama_lomba,tb_koor.nama as nama_koor,tb_pendaftaran.status,tb_pendaftaran.bukti_bayar,tb_pendaftaran.id as id_pendaftaran');
            $pendaftar = $this->DataModel->getJoin('tb_lomba','tb_pendaftaran.id_lomba = tb_lomba.id','inner');
            $pendaftar = $this->DataModel->getJoin('tb_koor','tb_koor.id = tb_pendaftaran.id_koor','inner');
            $pendaftar = $this->DataModel->getData('tb_pendaftaran')->result();
            
            $employee_data = $pendaftar;
            $data['row'] = $employee_data;
            $this->load->view('pages/admin/excel_pendaftaran', $data, FALSE);

            // $this->load->library("excel");
            // $object = new PHPExcel();
            // $object->setActiveSheetIndex(0);
            // $table_columns = array("ID Pendaftaran", "Nama Team", "Jumlah Anggota", "L File", "L Surat", "L Bayar", "Status");
            // $column = 0;
            // foreach ($table_columns as $field) {
            //     $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            //     $column++;
            // }
            // $employee_data = $this->DataModel->getData('tb_pendaftaran')->result();
            // $excel_row = 2;
            // foreach ($employee_data as $row) {
            //     $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->id);
            //     $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->nama_team);
            //     $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->nama_team);
            //     $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->nama_team);
            //     $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->nama_team);


            //     $excel_row++;
            // }
            // $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
            // header('Content-Type: application/vnd.ms-excel');
            // header('Content-Disposition: attachment;filename="Employee Data.xls"');
            // $object_writer->save('php://output');
        } else {
            redirect('admin/home/login');
        }
    }

}

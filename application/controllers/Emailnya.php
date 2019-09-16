<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

// class Emailnya extends CI_Controller {

//     public function index()
//     {
//         $config = array(
//             'protocol' => 'smtp',
//             'smtp_host' => 'smtp.gmail.com',
//                             'smtp_crypto' => 'tls',
//                             'smtp_port' => '587',
            
//             'smtp_user' => 'iitfintermedia@gmail.com', // informasi rahasia ini jangan di gunakan sembarangan
//             'smtp_pass' => 'intermediaiitf2019', // informasi rahasia ini jangan di gunakan sembarangan
//             'mailtype' => 'html',
//             'charset' => 'iso-8859-1',
//             'wordwrap' => TRUE
//         );

//         $data['id_daf'] = "SMR0020";
//         $data['nama'] = "Rahmawati Mahabibi";
//         $data['alamat'] = "Jalanin aja dulu";
//         $data['emailnya'] = "mhsrahmawati1@gmail.com";
//         $data['nohp'] = "0812 1212 2121";
//         $data['htm'] = "presale";
//         $data['biaya'] = 30000;

//         $message = $this->load->view('emails/seminar_bukti', $data, TRUE);

//         $this->load->library('email', $config);
//         $this->email->set_newline("\r\n");
//         $this->email->from($config['smtp_user']);
//         $this->email->to("dwichan@outlook.com");
//         $this->email->subject('Selamat, Anda Berhasil Menjadi Peserta Seminar UI/UX!');
//         $this->email->message($message);

//         return $this->email->send();
//     }

//     public function lihat_bukti()
//     {
//         $data['id_daf'] = "SMR0020";
//         $data['nama'] = "Rahmawati Mahabibi";
//         $data['alamat'] = "Jalanin aja dulu";
//         $data['emailnya'] = "mhsrahmawati1@gmail.com";
//         $data['nohp'] = "0812 1212 2121";
//         $data['htm'] = "presale";
//         $data['biaya'] = 30000;

//         $this->load->view('emails/seminar_bukti', $data, FALSE);
//     }

//     public function lihat_hadir()
//     {
//         $data['id_daf'] = "SMR0020";
//         $data['nama'] = "Rahmawati Mahabibi";
//         $data['alamat'] = "Jalanin aja dulu";
//         $data['emailnya'] = "mhsrahmawati1@gmail.com";
//         $data['nohp'] = "0812 1212 2121";
//         $data['htm'] = "presale";
//         $data['biaya'] = 30000;

//         $this->load->view('emails/seminar_hadir', $data, FALSE);
//     }

//     public function lihat_daftar()
//     {
//         $data['id_daf'] = "SMR0020";
//         $data['nama'] = "Rahmawati Mahabibi";
//         $data['htm'] = "presale";
//         $data['biaya'] = 30000;

//         $this->load->view('emails/seminar_daftar', $data, FALSE);
//     }

// }

/* End of file Emailnya.php */

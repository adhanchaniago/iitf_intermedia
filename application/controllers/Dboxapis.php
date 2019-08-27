<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dboxapis extends CI_Controller {

    public function index()
    {
        echo "OK";
    }

    public function testupload()
    {
        $this->load->library('dropbox');
        $userfile = $this->input->get('file');

        /**
         * Parameter:
         * $foldertarget: tentukan dimana file tersebut akan disimpan di cloud
         * $filename: tentukan alamat file yang akan diupload (harus disimpan di hosting dulu)
         */
        echo $this->dropbox->uploadNewFile("/", $userfile); // folder, alamat file upload, nama baru.

        /**
         * Parameter:
         * $foldertarget: tentukan dimana file tersebut akan disimpan di cloud
         * $filename: tentukan alamat file yang akan diupload (harus disimpan di hosting dulu)
         * $filename_uploaded: nama file baru yang akan dibuat di Dropbox
         */
        echo $this->dropbox->uploadNewFilename("/", $userfile, "test.pdf"); // folder, alamat file upload, nama baru.
    }
}

/* End of file Dboxapis.php */

<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dboxapis extends CI_Controller {

    public function index()
    {
        echo "OK";
    }

    public function testdownload()
    {
        $this->load->library('dropbox');
        $out = $this->input->get('out');
        
        /**
         * Parameter:
         * $path: alamat file di dropbox (untuk awalan "/Apps/IITF 2019" nya tidak perlu ditulis), bisa juga dengan id file atau rev file
         * $output: tentukan dimana file tersebut akan disimpan (di hosting tentunya)
         * 
         * Return: JSON
         */
        echo $this->dropbox->downloadFile("/test.pdf", $out);

        /** Output:
         * {"response":1,"http_code":200}
         */
    }

    public function testupload()
    {
        $this->load->library('dropbox');
        $userfile = $this->input->get('file');

        /**
         * Parameter:
         * $foldertarget: tentukan dimana file tersebut akan disimpan di cloud
         * $filename: tentukan alamat file yang akan diupload (harus disimpan di hosting dulu)
         * 
         * Return: JSON
         */
        echo $this->dropbox->uploadNewFile("/", $userfile); // folder, alamat file upload, nama baru.

        /**
         * Parameter:
         * $foldertarget: tentukan dimana file tersebut akan disimpan di cloud
         * $filename: tentukan alamat file yang akan diupload (harus disimpan di hosting dulu)
         * $filename_uploaded: nama file baru yang akan dibuat di Dropbox
         * 
         * Return: JSON
         */
        echo $this->dropbox->uploadNewFilename("/", $userfile, "test.pdf"); // folder, alamat file upload, nama baru.

        /** Output:
         * {
         *   "response": {
         *       "name": "test.pdf",
         *       "path_lower": "/test.pdf",
         *       "path_display": "/test.pdf",
         *       "id": "id:YOeFt-UVZ3AAAAAAAAAAIA",
         *       "client_modified": "2019-08-27T14:27:37Z",
         *       "server_modified": "2019-08-27T14:27:38Z",
         *       "rev": "015911a13093987000000016f9471b0",
         *       "size": 4804,
         *       "is_downloadable": true,
         *       "content_hash": "a15e6f7d18668dd71beeacabe1c434e03810551e46de4a389dbfe577002c907c"
         *   },
         *   "http_code": 200
         * }
         */
    }
}

/* End of file Dboxapis.php */

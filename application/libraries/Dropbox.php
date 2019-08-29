<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dropbox
{
    protected $ci;

    // Library written by DwiChan0905

    // Access Token didapat dari console Dropbox: https://www.dropbox.com/developers
    private $token = 'XIdehloNGvAAAAAAAAAAGPPZ7-_ZqU7GtvSaPjgY6j91rY77g5-SwbMcgxRXQROd';

    public function __construct()
    {
        $this->ci =& get_instance();
    }

    /**
	 * Mulai proses download berkas dari Dropbox dan disimpan ke dalam hosting
	 *
	 * @access 	public
	 * @param	string
	 * @return	string
	 */
    public function downloadFile($path = "/", $output = "")
    {
        $api_url = 'https://content.dropboxapi.com/2/files/download'; //dropbox api url

        $headers = array('Authorization: Bearer ' . $this->token, // Access Token, jangan kesebar
            'Content-Type: application/octet-stream',
            'Dropbox-API-Arg: '.
            json_encode(
                array(
                    "path"=> $path
                )
            )

        );

        $ch = curl_init($api_url);

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FILE, fopen($output, "w"));
//        curl_setopt($ch, CURLOPT_VERBOSE, 1); // debug

        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        return json_encode(array(
            "response" => json_decode($response),
            "http_code" => $http_code
        ));
    }

    /**
	 * Mulai proses upload berkas ke dalam folder di Dropbox
	 *
	 * @access 	public
	 * @param	string
	 * @return	string
	 */
    public function uploadNewFile($foldertarget = "/", $filename)
    {
        $api_url = 'https://content.dropboxapi.com/2/files/upload'; //dropbox api url

        $headers = array('Authorization: Bearer ' . $this->token, // Access Token, jangan kesebar
            'Content-Type: application/octet-stream',
            'Dropbox-API-Arg: '.
            json_encode(
                array(
                    "path"=> $foldertarget . basename($filename),
                    "mode" => "overwrite",
                    "autorename" => true,
                    "mute" => false
                )
            )

        );

        $ch = curl_init($api_url);

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, true);

        $path = $filename;
        $fp = fopen($path, 'rb');
        $filesize = filesize($path);

        curl_setopt($ch, CURLOPT_POSTFIELDS, fread($fp, $filesize));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($ch, CURLOPT_VERBOSE, 1); // debug

        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        return json_encode(array(
            "response" => json_decode($response),
            "http_code" => $http_code
        ));
    }

    /**
	 * Mulai proses upload berkas ke dalam folder di Dropbox dan beri nama file baru
	 *
	 * @access 	public
	 * @param	string
	 * @return	string
	 */
    public function uploadNewFilename($foldertarget = "/", $filename, $filename_uploaded)
    {
        $api_url = 'https://content.dropboxapi.com/2/files/upload'; //dropbox api url

        $headers = array('Authorization: Bearer ' . $this->token, // Access Token, jangan kesebar
            'Content-Type: application/octet-stream',
            'Dropbox-API-Arg: '.
            json_encode(
                array(
                    "path"=> $foldertarget . $filename_uploaded,
                    "mode" => "overwrite",
                    "autorename" => true,
                    "mute" => false
                )
            )

        );

        $ch = curl_init($api_url);

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, true);

        $path = $filename;
        $fp = fopen($path, 'rb');
        $filesize = filesize($path);

        curl_setopt($ch, CURLOPT_POSTFIELDS, fread($fp, $filesize));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($ch, CURLOPT_VERBOSE, 1); // debug

        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        return json_encode(array(
            "response" => json_decode($response),
            "http_code" => $http_code
        ));
    }

}

/* End of file Dropbox.php */

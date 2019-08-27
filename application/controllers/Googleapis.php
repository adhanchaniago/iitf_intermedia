<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Googleapis extends CI_Controller {

    private $client = null;
    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        global $client;
        $client = new Google_Client();
    }
    

    public function index()
    {
        
    }

    public function testgoogle()
	{
        global $client;
		echo "Google API Version: " . $client->getLibraryVersion();
	}
}

/* End of file Controllername.php */

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class administrateur extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }
    function index(){
		//Allowing akses to encadrant only
		if($this->session->userdata('level')==='0'){
		$this->load->view('dashboardAdmin');
		}else{
		echo "Access Denied";
		}
	}

}
 
		
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class entreprise extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }
    function index(){
		//Allowing akses to encadrant only
		if($this->session->userdata('level')==='1'){
		$this->load->view('dashboardEntreprise');
		}else{
		echo "Access Denied";
		}
	}
}
 
		
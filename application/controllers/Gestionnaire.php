<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Gestionnaire extends CI_Controller{

	public function __construct()
	{parent::__construct();
		$this->load->library('pagination');
		$this->load->helper('url', 'form');
	$this->load->database();	
	$this->load->model('Gestionnaire_model');
	}
    function index(){
		//Allowing akses to encadrant only
		if($this->session->userdata('level')==='1'){
		$this->load->view('dashboard');
		}else{
		echo "Access Denied";
		}
	}
      
	function afficherOffres(){
		$params = array();
		$limit_per_page = 10;
		$start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$total_records = $this->Gestionnaire_model->get_total();
		if ($total_records > 0) 
		{
			// get current page records
			$params["results"] = $this->Gestionnaire_model->get_current_page_records($limit_per_page ,$start_index);
			$config['base_url'] = base_url() . 'Gestionnaire/afficherOffres';
			$config['total_rows'] = $total_records;
			$config['per_page'] = $limit_per_page;
			$config["uri_segment"] = 3;
			$this->pagination->initialize($config);
			// build paging links
			$params["links"] = $this->pagination->create_links();
		}	
		
		$this->load->view('offresGeneral', $params);
		
	}
	public function custom()
	{
		// init params
		$params = array();
		$limit_per_page = 2;
		$page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
		$total_records = $this->Gestionnaire_model->get_total();
		if ($total_records > 0)
		{
			// get current page records
			$params["results"] = $this->Gestionnaire_model->get_current_page_records($llimit_per_page ,$page);
			$config['base_url'] = base_url() . 'Gestionnaire/custom';
			$config['total_rows'] = $total_records;
			$config['per_page'] = $limit_per_page;
			$config["uri_segment"] = 3;
			// custom paging configuration
			$config['num_links'] = 2;
			$config['use_page_numbers'] = TRUE;
			$config['reuse_query_string'] = TRUE;
			$config['full_tag_open'] = '<div class="pagination">';
			$config['full_tag_close'] = '</div>';
			$config['first_link'] = 'First Page';
			$config['first_tag_open'] = '<span class="firstlink">';
			$config['first_tag_close'] = '</span>';
			$config['last_link'] = 'Last Page';
			$config['last_tag_open'] = '<span class="lastlink">';
			$config['last_tag_close'] = '</span>';
			$config['next_link'] = 'Next Page';
			$config['next_tag_open'] = '<span class="nextlink">';
			$config['next_tag_close'] = '</span>';
			$config['prev_link'] = 'Prev Page';
			$config['prev_tag_open'] = '<span class="prevlink">';
			$config['prev_tag_close'] = '</span>';
			$config['cur_tag_open'] = '<span class="curlink">';
			$config['cur_tag_close'] = '</span>';
			$config['num_tag_open'] = '<span class="numlink">';
			$config['num_tag_close'] = '</span>';
			$this->pagination->initialize($config);
			// build paging links
			$params["links"] = $this->pagination->create_links();
		}
		
		$this->load->view('offresGeneral', $params);
		
	}
	

}
?>
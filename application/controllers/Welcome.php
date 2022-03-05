<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
		$this->load->helper('url');
		$this->load->library('pagination');
		$this->load->helper('url', 'form');
		$this->load->database();	
		$this->load->model('welcome_model');
		$this->load->model('login_model');
		$this->load->library('session');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	
	public function index()
	{	
		$this->load->view('welcome_message');
	}
	public function getOffres(){
		$params = array();
		$limit_per_page = 10;
		$start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$total_records = $this->welcome_model->get_total();
		if ($total_records > 0) 
		{
			// get current page records
			$params["results"] = $this->welcome_model->get_current_page_records($limit_per_page ,$start_index);
			$config['base_url'] = base_url() . 'Welcome/getoffres';
			$config['total_rows'] = $total_records;
			$config['per_page'] = $limit_per_page;
			$config["uri_segment"] = 3;
			$this->pagination->initialize($config);
			// build paging links
			$params["links"] = $this->pagination->create_links();
		}				
		$this->load->view('offresGeneral', $params);
		
	}
	public function loginPage(){
		$this->load->view('login');
	}
	function isLoggedIn()
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
            $this->load->view('login');
        }
        else
        { 
            if ($this->session->userdata('status')=='0'){
                redirect('/dashboardAdmin');
            }elseif ($this->session->userdata('status')=='1') {
                redirect('/dashboardCollecteur');
            }else {
                redirect('/dashboard');
            }
            
        }
    }
    
    
    /**
     * This function used to logged in user
     */
    public function loginMe()
    {   $email = $this->input->post('mail',TRUE);
        $password = $this->input->post('pass',TRUE);
        $validate = $this->login_model->loginMe($email,$password);
        if($validate->num_rows() > 0){
        $data = $validate->row_array();
        $name = $data['nom'];
        $email = $data['login'];
        $matricule = $data['mdp'];
        $level = $data['classe'];
        $sesdata = array(
        'username' => $name,
        'email' => $email,
        'matricule'=>$matricule,
        'level' => $level,
        'logged_in' => TRUE
        );
        $this->session->set_userdata($sesdata);        
        if($level === '0'){
        redirect('administrateur');       
        }elseif($level === '1'){
        redirect('entreprise');        
        }elseif($level === '2'){
			redirect('collecteur');        
		}else{
        redirect('particulier');
        }
        }else{
        echo $this->session->set_flashdata('msg','Username or Password is Wrong');
        redirect('login');
        }
    }

}

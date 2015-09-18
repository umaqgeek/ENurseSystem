<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nurses extends MY_Controller 
{
        var $parent_page = "nurses";
	function __construct()
	{
            parent::__construct(); 
            $nst_id = $this->session->userdata('nst_id');
            if ($nst_id != 3) {
                $this->session->set_flashdata('error', 'Access Denied!');
                redirect(site_url('login/logout'));
            }
	}
        
        private function viewpage($page='v_mainpage', $data=array())
        {
            // check for the flashdata
            $error = $this->session->flashdata('error');
            if ($error != "") {
                $data['error'] = $error;
            }
            $sucess = $this->session->flashdata('sucess');
            if ($sucess != "") {
                $data['sucess'] = $sucess;
            }
            $info = $this->session->flashdata('info');
            if ($info != "") {
                $data['info'] = $info;
            }
                
            echo $this->load->view('v_header', $data, true);
            echo $this->load->view($this->parent_page.'/v_menu', $data, true);
            echo $this->load->view($this->parent_page.'/'.$page, $data, true);
            echo $this->load->view('v_footer', $data, true);
        }


        public function index($stat='')
	{
            $this->viewpage();
        }
        
        function checkPatient()
        {
            $search = $this->input->post('search');
            
            $this->load->model('m_nus_patient');
            $isExist = $this->m_nus_patient->isExist($search);
            if ($isExist) {
                
            } else {
                $this->session->set_flashdata('info', 'This patient is new.');
                redirect(site_url('nurses/newPatient'));
            }
        }
        
        public function newPatient()
        {
            
        }
}

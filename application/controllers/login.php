<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller 
{
        var $parent_page = "login";
	function __construct()
	{
            parent::__construct(); 
            $this->load->model('m_nus_bed');
	}
        
        private function viewpage($page='v_login', $data=array())
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
            echo $this->load->view('v_menu', $data, true);
            echo $this->load->view($this->parent_page.'/'.$page, $data, true);
            echo $this->load->view('v_footer', $data, true);
        }


        public function index()
	{
            $this->viewpage();
	}
        
        public function searchPatient($stat=-1)
        {
            if ($stat != -1) {
                $ser = $this->input->post('ser');
                $this->load->model('m_nus_patient');
                $patient = $this->m_nus_patient->getPatient($ser);
                $data['patient'] = $patient;
                echo $this->load->view('login/ajax/v_ajax_search_detail', $data, true);
            } else {
                $this->viewpage('v_search_patient');
            }
        }
        
        public function dashboard()
        {
            $this->viewpage('v_dashboard');
        }
        
        function getAjaxDashboard()
        {
            $this->load->model('m_nus_bed');
            $this->load->model('m_nus_bed_status');
            $this->load->model('m_nus_patient_gender');
            $data['wards'] = $this->m_conndb->getAll('nus_ward');
            $data['wards2'] = $this->m_conndb->getAll('nus_ward');
            $data['status'] = $this->m_nus_bed_status->getAll();
            $data['gender'] = $this->m_nus_patient_gender->getAll();
            echo $this->load->view('login/ajax/v_ajax_dashboard', $data, true);
        }
        
        function checklogin()
        {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            $bol_login = $this->simpleloginsecure->login($username, $password);
            
            if ($bol_login) {
                $nst_id = $this->session->userdata('nst_id');
                if ($nst_id == 1) {
                    redirect(site_url('staffs'));
                } else if ($nst_id == 3) {
                    redirect(site_url('nurses'));
                } else {
                    $this->session->set_flashdata('error', 'Wrong User Type!');
                    redirect(site_url('login'));
                }
            } else {
                $this->session->set_flashdata('error', 'Invalid Username/Password!');
                redirect(site_url('login'));
            }
        }
        
        function logout()
        {
            $this->simpleloginsecure->logout();
            redirect(site_url('login'));
        }
}

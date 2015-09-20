<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Staffs extends MY_Controller 
{
        var $parent_page = "staffs";
	function __construct()
	{
            parent::__construct(); 
            $nst_id = $this->session->userdata('nst_id');
            if ($nst_id != 1) {
                $this->session->set_flashdata('error', 'Access Denied!');
                redirect(site_url('login/logout'));
            }
	}
        
        private function viewpage($page='v_mainpage', $data=array())
        {
            // check for the flashdata
            $error = $this->session->flashdata('error');
            if ($error != "") {
                $data->error = $error;
            }
            $sucess = $this->session->flashdata('sucess');
            if ($sucess != "") {
                $data->sucess = $sucess;
            }
            $info = $this->session->flashdata('info');
            if ($info != "") {
                $data->info = $info;
            }
                
            echo $this->load->view('v_header', $data, true);
            echo $this->load->view($this->parent_page.'/v_menu', $data, true);
            echo $this->load->view($this->parent_page.'/'.$page, $data, true);
            echo $this->load->view('v_footer', $data, true);
        }


        public function index($stat='')
	{
            try {
                $crud = new grocery_CRUD();

                $crud->set_theme('datatables');
                
                switch ($stat) {
                    case '':
                    default:
                        $crud->set_table('nus_staff');
                        $crud->set_relation('nst_id', 'nus_staff_type', 'nst_desc');
                        $crud->set_relation('nw_id', 'nus_ward', 'nw_name');
                        $crud->display_as('ns_fullname', 'Full Name')
                                ->display_as('ns_username', 'Username')
                                ->display_as('ns_password', 'Password')
                                ->display_as('nst_id', 'User Type')
                                ->display_as('nw_id', 'Ward Name');
                        $crud->required_fields('ns_fullname', 'ns_username', 
                                'ns_password', 'nst_id');
                        break;
                    case 'manageWadStatus':
                        $crud->set_table('nus_bed_status');
                        $crud->display_as('nbs_desc', 'Description')
                                ->display_as('nbs_code', 'Code')
                                ->display_as('nc_id', 'Color');
                        $crud->required_fields('nbs_code', 'nbs_desc', 'nc_id');
                        $crud->set_relation('nc_id', 'nus_color', 'nc_desc');
                        break;
                    case 'manageWard':
                        $crud->set_table('nus_ward');
                        $crud->display_as('nw_name', 'Ward Name');
                        $crud->required_fields('nw_name');
                        break;
                    case 'manageBed':
                        $crud->set_table('nus_bed');
                        $crud->set_relation('nw_id', 'nus_ward', 'nw_name');
                        $crud->display_as('nb_bed_no', 'Bed No.')
                                ->display_as('nw_id', 'Ward Name')
                                ->display_as('np_pmi_id', 'Patient Name')
                                ->display_as('nbs_id', 'Bed Status')
                                ->display_as('nb_datetime', 'Registered Date/Time')
                                ->display_as('ns_id', 'Nurse Incharge');
                        $crud->required_fields('nb_bed_no', 'nw_id');
                        $crud->set_relation('np_pmi_id', 'nus_patient', 'np_fullname');
                        $crud->set_relation('nbs_id', 'nus_bed_status', 'nbs_desc');
                        $crud->set_relation('ns_id', 'nus_staff', 'ns_fullname');
                        break;
                    case 'manageGender':
                        $crud->set_table('nus_patient_gender');
                        $crud->display_as('npg_desc', 'Description')
                                ->display_as('npg_code', 'Code')
                                ->display_as('nc_id', 'Color');
                        $crud->set_relation('nc_id', 'nus_color', 'nc_desc');
                        break;
                }

                $output = $crud->render();

                $this->viewpage('v_mainpage', $output);
                
            } catch (Exception $e) {
                show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
            }
        }
}

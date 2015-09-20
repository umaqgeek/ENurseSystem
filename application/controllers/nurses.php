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
                        $user_ward_id = $this->session->userdata('nw_id');
                        $crud->set_table('nus_bed');
                        $crud->where('nus_bed.nw_id', $user_ward_id);
                        $crud->columns('nb_bed_no', 'np_pmi_id', 'nbs_id', 'nb_datetime', 'ns_id');
                        $crud->display_as('nb_bed_no', 'Bed No.')
                                ->display_as('np_pmi_id', 'Patient Name')
                                ->display_as('nbs_id', 'Remarks')
                                ->display_as('nb_datetime', 'Date/Time Registered')
                                ->display_as('ns_id', 'Nurse');
                        $crud->set_relation('nbs_id', 'nus_bed_status', 'nbs_desc');
                        $crud->set_relation('ns_id', 'nus_staff', 'ns_fullname');
                        $crud->set_relation('np_pmi_id', 'nus_patient', 'np_fullname');
//                        $crud->unset_add();
//                        $crud->unset_delete();
                        $crud->edit_fields('np_pmi_id', 'nbs_id', 'nb_datetime', 'ns_id');
                        $crud->add_fields('nb_bed_no', 'nw_id', 'nbs_id');
                        $crud->field_type('nw_id', 'hidden');
//                        $crud->field_type('nbs_id', 'hidden');
                        $crud->required_fields('nb_bed_no');
                        $crud->unset_read();
//                        $crud->change_field_type('nb_bed_no', 'readonly');
                        $crud->change_field_type('ns_id', 'readonly');
                        $crud->callback_before_update(array($this, 'autoRegisterBed'));
                        $crud->callback_before_insert(array($this, 'addBed'));
                        break;
                    case 'patient':
                        $crud->set_table('nus_patient');
                        $crud->set_relation('np_gender', 'nus_patient_gender', 'npg_desc');
                        $crud->required_fields('np_pmi_no', 'np_fullname', 'np_ic', 'np_passport', 'np_gender');
                        $crud->fields('np_pmi_id', 'np_fullname', 'np_ic', 'np_passport', 'np_gender');
                        $crud->field_type('np_pmi_id', 'hidden');
                        $crud->display_as('np_pmi_id', 'PMI No.')
                                ->display_as('np_fullname', 'Full Name')
                                ->display_as('np_ic', 'IC No.')
                                ->display_as('np_passport', 'Passport No.')
                                ->display_as('np_gender', 'Gender');
                        $crud->callback_before_insert(array($this, 'autoInsertPriKeyPatient'));
                        break;
                }

                $output = $crud->render();

                $this->viewpage('v_mainpage', $output);
                
            } catch (Exception $e) {
                show_error($e->getMessage().' --- '.$e->getTraceAsString());
            }
        }
        
        function autoRegisterBed($post_array)
        {
//            $post_array['nb_datetime'] = date('Y-m-d H:i:s');
            $post_array['ns_id'] = $this->session->userdata('ns_id');
            return $post_array;
        }
        
        function addBed($post_array)
        {
            $post_array['nw_id'] = $this->session->userdata('nw_id');
            $post_array['nbs_id'] = 1;
            return $post_array;
        }
        
        function autoInsertPriKeyPatient($post_array)
        {
            $post_array['np_pmi_id'] = $post_array['np_ic'] . $this->my_func->getCheckDigit(1);
            return $post_array;
        }
}

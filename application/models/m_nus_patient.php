<?php
  class M_nus_patient extends CI_Model {
	  
	  function isExist($search='-') {
		  $this->db->select('*');
		  $this->db->from('nus_patient np');
                  $this->db->where('np.np_ic', $search);
                  $this->db->or_where('np.np_passport', $search);
		  $q = $this->db->get();
		  if($q->num_rows() > 0) {
			  return true;
		  } else {
                          return false;
                  }
	  }
          
          function getPatient($search='-') {
		  $this->db->select('*');
		  $this->db->from('nus_patient np, nus_patient_gender npg, nus_bed nb, nus_ward nw');
                  $this->db->where('np.np_gender = npg.npg_id');
                  $this->db->where('np.np_pmi_id = nb.np_pmi_id');
                  $this->db->where('nb.nw_id = nw.nw_id');
                  $this->db->where('np.np_ic', $search);
                  $this->db->or_where('np.np_passport', $search);
		  $q = $this->db->get();
		  if($q->num_rows() > 0) {
			  foreach($q->result() as $r) {
				  $d[] = $r;
			  }
			  return $d;
		  }
	  }
	
  }

?>
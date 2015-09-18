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
	
  }

?>
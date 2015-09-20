<?php
  class M_nus_bed_status extends CI_Model {
	  
	  function getAll() {
		  $this->db->select('*');
		  $this->db->from('nus_bed_status nbs');
                  $this->db->join('nus_color nc', 'nc.nc_id = nbs.nc_id', 'left');
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
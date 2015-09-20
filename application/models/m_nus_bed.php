<?php
  class M_nus_bed extends CI_Model {
	  
	  function getAll_byParent($nw_id, $nbs_id=-1, $npg_id=-1) {
		  $this->db->select('*, nc.nc_color AS color2, nc1.nc_color AS color1');
		  $this->db->from('nus_bed nb');
                  $this->db->join('nus_patient np', 'np.np_pmi_id = nb.np_pmi_id', 'left');
                  $this->db->join('nus_patient_gender npg', 'npg.npg_id = np.np_gender', 'left');
                  $this->db->join('nus_ward nw', 'nw.nw_id = nb.nw_id', 'left');
                  $this->db->join('nus_bed_status nbs', 'nbs.nbs_id = nb.nbs_id', 'left');
                  $this->db->join('nus_staff ns', 'ns.ns_id = nb.ns_id', 'left');
                  $this->db->join('nus_color nc', 'nc.nc_id = nbs.nc_id', 'left');
                  $this->db->join('nus_color nc1', 'nc1.nc_id = npg.nc_id', 'left');
                  $this->db->where('nb.nw_id', $nw_id);
                  if ($nbs_id != -1) {
                      $this->db->where('nb.nbs_id', $nbs_id);
                  }
                  if ($npg_id != -1) {
                      $this->db->where('np.np_gender', $npg_id);
                  }
                  $this->db->group_by('nb.nb_id');
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
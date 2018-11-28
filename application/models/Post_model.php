<?php
class Post_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
				$this->load->library('session');
        }
		
		
		public function get_project()
    {
		$user_id = $this->session->userdata('user_id');
       
			$this->db->where('user_id', $user_id);
            $query = $this->db->get('projects');
            return $query->result_array();
      
    }

public function set_project($data)
{
   
	

    return $this->db->insert('projects', $data);
}

public function get_project_by_id($project_id = 0)
    {
		
        if ($project_id === 0)
        {
            $query = $this->db->get('projects');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('projects', array('project_id' => $project_id));
        return $query->row_array();
    }


 public function update_project($data, $project_id)  
    {
       
            $this->db->where('project_id', $project_id);
            return $this->db->update('projects', $data);
        
    }

public function delete_project($project_id)
    {
        $this->db->where('project_id', $project_id);
        return $this->db->delete('projects');
    }

}
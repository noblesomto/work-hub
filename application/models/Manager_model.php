<?php
class Manager_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
				$this->load->library('session');
        }
		
		
		 
	
	public function get_project_by_id($project_id)
    {
		$array = array('projects.project_id' => $project_id, 'proposal.status' => 'confirmed');
		
			$this->db->select('*');
		$this->db->from('proposal');
		$this->db->join('projects', 'proposal.project_id = projects.project_id','left');
		$this->db->where($array);
		$result = $this->db->get()->result_array();
		 return $result;
        }
		
		
		public function add_comment($data){
        
        return $this->db->insert('manager',$data);
      
    }
    
		
	
	public function get_comments_for_project($project_id)    {
		
			$this->db->where('project_id', $project_id);
            $query = $this->db->get('manager');
            return $query->result_array();
       
    }
	
	
	public function get_projects($user_id)    {
			
			$this->db->where('status', 'confirmed');
			 $where = '(user_id="'.$user_id.'" or poster_id = "'.$user_id.'")';
       		$this->db->where($where);
			$this->db->order_by('id','DESC');
            $query = $this->db->get('proposal');
            return $query->result_array();
       
    }
	
public function see_upload($user_id)    {
			
			$this->db->where('status', 'confirmed');
			$this->db->where('poster_id', $user_id);
            $query = $this->db->get('proposal');
            return $query->result_array();
       
    }
	

public function upload_project($prop,$data) 
    {
        $this->db->where('proposal_id', $prop);
          return $this->db->update('proposal', $data);
        
    }

public function get_download($proposal_id)
    {		
          $query = $this->db->get_where('proposal', array('proposal_id' => $proposal_id));
        return $query->row_array();
        
    } 

 public function add_rating($data){
        
        return $this->db->insert('review',$data);
      
    }

public function get_rating_number($provider)
{
	
    return $this->db
        ->where('freelancer', $provider)
		->count_all_results('review');
}



public function update_rating($provider,$rate)
    {
      
		
          $this->db->where('user_id', $provider);
          return $this->db->update('user_table', $rate);
        
    }




}